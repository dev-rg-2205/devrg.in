<?php

namespace PHPMailer\PHPMailer;

class SMTP
{
    const DEFAULT_PORT = 25;
    const CRLF = "\r\n";

    public function connect($host, $port = null)
    {
        if ($port === null) {
            $port = self::DEFAULT_PORT;
        }
        return fsockopen($host, $port);
    }

    public function hello($host)
    {
        return "HELO " . $host . self::CRLF;
    }

    public function quit()
    {
        return "QUIT" . self::CRLF;
    }
}
