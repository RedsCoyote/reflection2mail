<?php

namespace App;

use Swift_Mailer;
use Swift_Message;
use Swift_SmtpTransport;

class Mailer
{
    protected $from;
    protected $to;
    protected $mailer;
    protected $message;

    public function __construct()
    {
        $transport = (new Swift_SmtpTransport('localhost', 25))
            ->setUsername('your username')
            ->setPassword('your password')
        ;
        $this->mailer = new Swift_Mailer($transport);
        $this->message = (new Swift_Message('Class Source'));
    }
    
    public function getMessage()
    {
        return $this->message;
    }

    public function setTo($to)
    {
        $this->message->setTo($to);
        return $this;
    }

    public function setFrom($from)
    {
        $this->message->setFrom($from);
        return $this;
    }

    public function send()
    {
        $this->mailer->send($this->getMessage());
    }
}
