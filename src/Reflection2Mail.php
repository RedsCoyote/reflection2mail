<?php

namespace App;

use App\Exceptions\UndefinedClassException;
use ReflectionClass;

class Reflection2Mail
{
    protected $fileName;
    protected $mailer;

    public function __construct(Mailer $mailer, $sourceClass = self::class)
    {
        $this->mailer = $mailer;
        $this->fileName = (new ReflectionClass($sourceClass))
            ->getFileName();
        if (!empty($this->fileName) && !file_exists($this->fileName)) {
            throw new UndefinedClassException('Undefined class: ' . $sourceClass);
        }
    }

    public function sendSource()
    {
        $sourceCode = file_get_contents($this->fileName);
        $this->mailer->getMessage()->setBody($sourceCode);
        $this->mailer->send();
    }
}
