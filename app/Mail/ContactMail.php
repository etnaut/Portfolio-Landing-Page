<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactMail extends Mailable
{
    use Queueable, SerializesModels;

    public $senderName;
    public $senderEmail;
    public $subjectText;
    public $messageBody;
    public $uploadedFiles;

    public function __construct($senderName, $senderEmail, $subjectText, $messageBody, $uploadedFiles = [])
    {
        $this->senderName = $senderName;
        $this->senderEmail = $senderEmail;
        $this->subjectText = $subjectText;
        $this->messageBody = $messageBody;
        $this->uploadedFiles = $uploadedFiles;
    }

    public function build()
    {
        $email = $this->from(config('mail.from.address', 'hello@example.com'), $this->senderName)
                     ->replyTo($this->senderEmail, $this->senderName)
                     ->subject($this->subjectText)
                     ->view('emails.contact');

        if (!empty($this->uploadedFiles)) {
            foreach ($this->uploadedFiles as $file) {
                if (is_array($file) && isset($file['path'])) {
                    $email->attach($file['path'], [
                        'as' => $file['name'] ?? null,
                        'mime' => $file['mime'] ?? null,
                    ]);
                } elseif ($file instanceof \Illuminate\Http\UploadedFile) {
                    $email->attach($file->getRealPath(), [
                        'as' => $file->getClientOriginalName(),
                        'mime' => $file->getClientMimeType(),
                    ]);
                }
            }
        }

        return $email;
    }
}
