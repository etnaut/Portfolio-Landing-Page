<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{
    public function send(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'          => 'required|string|max:100',
            'email'         => 'required|email|max:150',
            'subject'       => 'required|string|max:200',
            'message'       => 'required|string|max:5000',
            'attachments.*' => 'nullable|file|max:10240|mimes:pdf,doc,docx,txt,png,jpg,jpeg,webp,gif,zip,rar,7z',
        ], [
            'attachments.*.max' => 'Each attachment must not exceed 10MB.',
            'attachments.*.mimes' => 'Allowed file types: PDF, DOC, DOCX, TXT, Images, ZIP, RAR.',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors'  => $validator->errors()->all()
            ], 422);
        }

        $recipientEmail = config('mail.to_address', env('MAIL_TO_ADDRESS', 'daryl21t@gmail.com'));

        try {
            $uploadedFiles = [];
            if ($request->hasFile('attachments')) {
                foreach ($request->file('attachments') as $file) {
                    if ($file->isValid()) {
                        $uploadedFiles[] = $file;
                    }
                }
            }

            Mail::to($recipientEmail)->send(new ContactMail(
                $request->input('name'),
                $request->input('email'),
                $request->input('subject'),
                $request->input('message'),
                $uploadedFiles
            ));

            return response()->json([
                'success' => true,
                'message' => "Thank you! Your message has been sent successfully to {$recipientEmail}."
            ]);

        } catch (\Exception $e) {
            Log::error('Contact Email Sending Failed: ' . $e->getMessage());

            return response()->json([
                'success' => false,
                'message' => 'Failed to send email. Details: ' . $e->getMessage()
            ], 500);
        }
    }
}
