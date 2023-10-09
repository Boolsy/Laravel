<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use Exception;
use Throwable;


class Handler extends ExceptionHandler
{
    /**
     * La liste des données qui ne doivent jamais être mises en session lors d'exceptions de validation.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Enregistre les rappels de gestion des exceptions pour l'application.
     */
    public function register(): void
    {
        $this->reportable(function (Throwable $e) {
            // Ici, vous pouvez effectuer des actions en réponse à des exceptions, par exemple, les journaliser.
        });
    }

    /**
     * Personnalise la manière dont les exceptions sont rendues.
     */
    public function render($request, Throwable $exception)
    {
        if ($exception instanceof NotFoundHttpException) {
            // Si l'exception est de type NotFoundHttpException, retournez une vue "404" avec un code de réponse 404.
            return response()->view('404', [], 404);
        }

        if ($exception instanceof AccessDeniedHttpException) {
            return response()->view('403', [], 403);
        }

        // Sinon, laissez la classe parente gérer la rendu de l'exception.
        return parent::render($request, $exception);
    }
}
