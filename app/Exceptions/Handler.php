<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;
use PHPMailer\PHPMailer\PHPMailer;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        $this->reportable(function (Throwable $e) {
            // $mail = new PHPMailer();
            // $mail->CharSet = "utf-8";
            // $mail->isSMTP();
            // $mail->Host = 'smtp.office365.com';
            // $mail->SMTPAuth = true;
            // $mail->Username = 'notification@buv.edu.vn';
            // $mail->Password = '9Nw1Gt2X046476c';
            // $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            // $mail->Port = 587;
            // $mail->addAddress( 'tung.ds@buv.edu.vn' );
            // $mail->addAddress( 'chung.nd@buv.edu.vn' );
            // $mail->isHTML(true);
            // $mail->setFrom('notification@buv.edu.vn', '[ERROR] scholarship portal');
            // $mail->Subject = '[ERROR] scholarship';
            // $mail->Body = view("scholarship.email.error_notify", ['e' => $e])->render();
            // $mail->send();
        });
    }
}
