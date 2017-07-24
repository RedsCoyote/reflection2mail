<?php
require __DIR__ . '/../vendor/autoload.php';

$mailer = new \App\Mailer();
$mailer->setTo('mail@mail.ru')
    ->setFrom('newmail@mail.ru');

(new \App\Reflection2Mail($mailer))->sendSource();

(new \App\Reflection2Mail($mailer, \App\Mailer::class))->sendSource();
