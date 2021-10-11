<?php


namespace App\Helpers;

use Illuminate\Support\Facades\Mail;
class MailManager
{
    /**
     * 寄送註冊驗證信
     * @param string $email
     * @param string $url
     */
    public function sendRegisterMail(
        string $email,
        string $url
    ){
        Mail::send('mail.register', ['data' => ['url' => $url]], function($message) use ($email) {
            $message->to($email)
                ->subject('【 PodcastArea 】註冊認證信');
        });
    }
}
