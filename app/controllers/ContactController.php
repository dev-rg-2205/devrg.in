<?php

require_once __DIR__ . '/../services/Mailer.php';

class ContactController
{
    public static function handle($post)
    {
        foreach (['name','email','subject','message'] as $field) {
            if (empty($post[$field])) return false;
        }

        return Mailer::sendContactMail([
            'name' => htmlspecialchars($post['name']),
            'email' => filter_var($post['email'], FILTER_VALIDATE_EMAIL),
            'subject' => htmlspecialchars($post['subject']),
            'message' => htmlspecialchars($post['message']),
        ]);
    }
}
