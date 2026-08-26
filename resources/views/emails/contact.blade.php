<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>New Portfolio Contact Message</title>
    <style>
        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif;
            background-color: #0a0a0f;
            color: #f0f0f0;
            margin: 0;
            padding: 20px;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            background: #13131c;
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0,0,0,0.5);
        }
        .header {
            background: #111118;
            padding: 24px;
            border-bottom: 2px solid #e8ff47;
        }
        .header h2 {
            margin: 0;
            color: #e8ff47;
            font-size: 22px;
        }
        .header p {
            margin: 5px 0 0 0;
            color: #7a7a8c;
            font-size: 14px;
        }
        .content {
            padding: 24px;
        }
        .field {
            margin-bottom: 20px;
        }
        .label {
            font-size: 12px;
            text-transform: uppercase;
            letter-spacing: 0.08em;
            color: #e8ff47;
            font-weight: 600;
            margin-bottom: 6px;
        }
        .value {
            font-size: 15px;
            color: #ffffff;
            background: #0a0a0f;
            padding: 12px 16px;
            border-radius: 8px;
            border: 1px solid rgba(255,255,255,0.07);
        }
        .message-body {
            font-size: 15px;
            line-height: 1.6;
            color: #e0e0e0;
            white-space: pre-wrap;
            background: #0a0a0f;
            padding: 16px;
            border-radius: 8px;
            border: 1px solid rgba(255,255,255,0.07);
        }
        .attachments-notice {
            margin-top: 20px;
            padding: 12px;
            background: rgba(232, 255, 71, 0.05);
            border: 1px dashed rgba(232, 255, 71, 0.3);
            border-radius: 8px;
            font-size: 13px;
            color: #a8ff78;
        }
        .footer {
            padding: 16px 24px;
            background: #0a0a0f;
            border-top: 1px solid rgba(255, 255, 255, 0.07);
            font-size: 12px;
            color: #7a7a8c;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h2>New Contact Inquiry</h2>
            <p>Sent via Daryl Dagpin's Portfolio Website</p>
        </div>
        <div class="content">
            <div class="field">
                <div class="label">Sender Name</div>
                <div class="value">{{ $senderName }}</div>
            </div>
            <div class="field">
                <div class="label">Sender Email</div>
                <div class="value"><a href="mailto:{{ $senderEmail }}" style="color: #e8ff47; text-decoration: none;">{{ $senderEmail }}</a></div>
            </div>
            <div class="field">
                <div class="label">Subject</div>
                <div class="value">{{ $subjectText }}</div>
            </div>
            <div class="field">
                <div class="label">Message</div>
                <div class="message-body">{{ $messageBody }}</div>
            </div>

            @if(!empty($uploadedFiles) && count($uploadedFiles) > 0)
                <div class="attachments-notice">
                    📎 <strong>Attachments Included:</strong> {{ count($uploadedFiles) }} file(s) attached to this email.
                </div>
            @endif
        </div>
        <div class="footer">
            Received on {{ now()->format('F j, Y \a\t g:i A T') }} • Daryl Tuante Dagpin Portfolio
        </div>
    </div>
</body>
</html>
