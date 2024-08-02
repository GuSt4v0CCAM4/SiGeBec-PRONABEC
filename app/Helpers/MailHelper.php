<?php

namespace App\Helpers;

use App\Mail\ServiceMailable;
use Illuminate\Support\Facades\Mail;

class MailHelper
{
    /**
     * Enviar un correo electrónico.
     *
     * @param string $to
     * @param string $subject
     * @param string $view
     * @param array $data
     * @return void
     */
    public static function enviarCorreo($to, $subject, $view, $data)
    {
        Mail::to($to)->send(new ServiceMailable($data, $subject, $view));
    }
}