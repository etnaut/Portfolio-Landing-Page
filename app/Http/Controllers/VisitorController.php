<?php

namespace App\Http\Controllers;

use App\Models\Visitor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class VisitorController extends Controller
{
    /**
     * Log a page view or session activity.
     */
    public function logVisit(Request $request)
    {
        try {
            $sessionId = $request->session()->getId();
            if (!$sessionId) {
                $sessionId = Str::uuid()->toString();
                $request->session()->put('_visitor_id', $sessionId);
            }

            $ip = $request->ip();
            $userAgent = $request->userAgent() ?? '';

            $device = $this->parseDevice($userAgent);
            $browser = $this->parseBrowser($userAgent);

            $visitor = Visitor::where('session_id', $sessionId)->first();

            if (!$visitor) {
                $location = $this->resolveLocation($ip);

                $visitor = Visitor::create([
                    'session_id' => $sessionId,
                    'ip_address' => $ip,
                    'display_name' => $request->session()->get('visitor_display_name'),
                    'city' => $location['city'],
                    'country' => $location['country'],
                    'country_code' => $location['country_code'],
                    'device' => $device,
                    'browser' => $browser,
                    'page_views' => 1,
                    'last_activity_at' => now(),
                ]);
            } else {
                $visitor->increment('page_views');
                $visitor->update([
                    'last_activity_at' => now(),
                    'device' => $device,
                    'browser' => $browser,
                ]);

                if ($request->session()->has('visitor_display_name') && !$visitor->display_name) {
                    $visitor->update(['display_name' => $request->session()->get('visitor_display_name')]);
                }
            }

            // Firebase Realtime Database Sync
            $this->syncToFirebase($visitor);

            return $visitor;
        } catch (\Throwable $e) {
            report($e);
            return null;
        }
    }

    /**
     * Sync visitor and stats to Firebase Realtime Database.
     */
    private function syncToFirebase(Visitor $visitor): void
    {
        try {
            $cleanSessionId = preg_replace('/[^a-zA-Z0-9_\-]/', '_', $visitor->session_id);
            $baseUrl = 'https://sql-practical-exam-default-rtdb.asia-southeast1.firebasedatabase.app/portfolio_visitors';

            $displayName = $visitor->display_name ?? 'Guest #' . substr(md5($visitor->session_id), 0, 4);

            Http::timeout(2)->patch("{$baseUrl}/active_sessions/{$cleanSessionId}.json", [
                'session_id' => $visitor->session_id,
                'display_name' => $displayName,
                'city' => $visitor->city ?? 'Manila',
                'country' => $visitor->country ?? 'Philippines',
                'device' => $visitor->device ?? 'Desktop',
                'browser' => $visitor->browser ?? 'Browser',
                'page_views' => $visitor->page_views,
                'last_activity_at' => now()->timestamp * 1000,
            ]);

            $totalViews = Visitor::sum('page_views');
            $uniqueVisitors = Visitor::count();

            Http::timeout(2)->patch("{$baseUrl}/stats.json", [
                'total_views' => $totalViews ?: 1,
                'unique_visitors' => $uniqueVisitors ?: 1,
                'last_updated' => now()->timestamp * 1000,
            ]);
        } catch (\Exception $e) {
            // Silence background HTTP sync timeout
        }
    }

    /**
     * Get live viewer statistics and recent visitors list.
     */
    public function stats(Request $request)
    {
        $this->logVisit($request);

        $sessionId = $request->session()->getId();

        $totalViews = Visitor::sum('page_views');
        $uniqueVisitors = Visitor::count();
        $activeOnline = Visitor::where('last_activity_at', '>=', now()->subMinutes(5))->count();

        // ensure at least 1 online
        if ($activeOnline < 1) {
            $activeOnline = 1;
        }

        $recentVisitors = Visitor::latest('last_activity_at')
            ->take(10)
            ->get()
            ->map(function ($v) {
                $displayName = $v->display_name ?? 'Guest #' . substr(md5($v->session_id), 0, 4);
                return [
                    'id' => $v->id,
                    'display_name' => $displayName,
                    'is_custom_name' => !empty($v->display_name),
                    'city' => $v->city ?? 'Unknown',
                    'country' => $v->country ?? 'Philippines',
                    'country_code' => strtolower($v->country_code ?? 'ph'),
                    'device' => $v->device ?? 'Desktop',
                    'browser' => $v->browser ?? 'Browser',
                    'views' => $v->page_views,
                    'is_online' => $v->last_activity_at >= now()->subMinutes(5),
                    'last_seen' => $v->last_activity_at ? $v->last_activity_at->diffForHumans() : 'Just now',
                ];
            });

        $current = Visitor::where('session_id', $sessionId)->first();

        return response()->json([
            'success' => true,
            'total_views' => $totalViews ?: 1,
            'unique_visitors' => $uniqueVisitors ?: 1,
            'active_online' => $activeOnline,
            'recent_visitors' => $recentVisitors,
            'current_visitor' => $current ? [
                'display_name' => $current->display_name,
                'city' => $current->city,
                'country' => $current->country,
                'device' => $current->device,
            ] : null,
        ]);
    }

    /**
     * Heartbeat ping to keep visitor active.
     */
    public function ping(Request $request)
    {
        $sessionId = $request->session()->getId();
        if ($sessionId) {
            Visitor::where('session_id', $sessionId)->update([
                'last_activity_at' => now(),
            ]);
        }

        $activeOnline = Visitor::where('last_activity_at', '>=', now()->subMinutes(5))->count();

        return response()->json([
            'success' => true,
            'active_online' => max(1, $activeOnline),
            'total_views' => Visitor::sum('page_views') ?: 1,
        ]);
    }

    /**
     * Set optional custom display name for current visitor.
     */
    public function setName(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:50',
        ]);

        $name = trim($request->input('name'));
        $request->session()->put('visitor_display_name', $name);

        $sessionId = $request->session()->getId();
        if ($sessionId) {
            Visitor::where('session_id', $sessionId)->update([
                'display_name' => $name,
            ]);
        }

        return response()->json([
            'success' => true,
            'message' => 'Your display name has been updated!',
            'name' => $name,
        ]);
    }

    /**
     * Resolve IP Geolocation.
     */
    private function resolveLocation(string $ip): array
    {
        // Fallback for localhost or private IPs
        if (in_array($ip, ['127.0.0.1', '::1']) || str_starts_with($ip, '192.168.') || str_starts_with($ip, '10.')) {
            return [
                'city' => 'Manila',
                'country' => 'Philippines',
                'country_code' => 'PH',
            ];
        }

        try {
            $response = Http::timeout(3)->get("http://ip-api.com/json/{$ip}?fields=status,country,countryCode,city");
            if ($response->successful() && $response->json('status') === 'success') {
                return [
                    'city' => $response->json('city') ?? 'Manila',
                    'country' => $response->json('country') ?? 'Philippines',
                    'country_code' => $response->json('countryCode') ?? 'PH',
                ];
            }
        } catch (\Exception $e) {
            // Ignore API timeout
        }

        return [
            'city' => 'Manila',
            'country' => 'Philippines',
            'country_code' => 'PH',
        ];
    }

    /**
     * Simple Device parser.
     */
    private function parseDevice(string $ua): string
    {
        if (preg_match('/(tablet|ipad|playbook)|(android(?!.*mobile))/i', $ua)) {
            return 'Tablet';
        }
        if (preg_match('/(Mobile|iP(hone|od)|Android|BlackBerry|IEMobile|Kindle|Silk)/i', $ua)) {
            return 'Mobile';
        }
        return 'Desktop';
    }

    /**
     * Simple Browser parser.
     */
    private function parseBrowser(string $ua): string
    {
        if (preg_match('/Edg/i', $ua)) return 'Edge';
        if (preg_match('/Chrome/i', $ua)) return 'Chrome';
        if (preg_match('/Safari/i', $ua)) return 'Safari';
        if (preg_match('/Firefox/i', $ua)) return 'Firefox';
        if (preg_match('/MSIE|Trident/i', $ua)) return 'Internet Explorer';
        return 'Browser';
    }
}
