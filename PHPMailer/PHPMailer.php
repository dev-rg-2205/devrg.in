<?php

namespace PHPMailer\PHPMailer;

use PHPMailer\PHPMailer\Exception;

class PHPMailer
{
    public $Host;
    public $Username;
    public $Password;
    public $Port = 587;
    public $SMTPAuth = true;
    public $SMTPSecure = 'tls';

    protected $to = [];
    protected $fromEmail;
    protected $fromName;
    protected $replyTo;
    protected $subject;
    protected $body;
    protected $headers = [];

    public function isSMTP() {}

    public function setFrom($email, $name = '')
    {
        $this->fromEmail = $email;
        $this->fromName = $name;
        $this->headers[] = "From: {$name} <{$email}>";
    }

    public function addAddress($email)
    {
        $this->to[] = $email;
    }

    public function addReplyTo($email, $name = '')
    {
        $this->replyTo = $email;
        $this->headers[] = "Reply-To: {$email}";
    }

    public function isHTML($bool = true)
    {
        if ($bool) {
            $this->headers[] = "MIME-Version: 1.0";
            $this->headers[] = "Content-type:text/html;charset=UTF-8";
        }
    }

    public function __set($name, $value)
    {
        if ($name === 'Subject') {
            $this->subject = $value;
        }
        if ($name === 'Body') {
            $this->body = $value;
        }
    }

    public function send()
    {
        if (empty($this->to)) {
            throw new Exception("No recipient added");
        }

        $to = implode(',', $this->to);
        $headers = implode("\r\n", $this->headers);

        if (!mail($to, $this->subject, $this->body, $headers)) {
            throw new Exception("Mail sending failed");
        }

        return true;
    }
}
