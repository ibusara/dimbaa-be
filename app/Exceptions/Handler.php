<?php

namespace App\Exceptions;

use BadMethodCallException;
use Illuminate\Database\QueryException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Psy\Exception\TypeErrorException;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class Handler extends ExceptionHandler
{
    /**
     * A list of exception types with their corresponding custom log levels.
     *
     * @var array<class-string<\Throwable>, \Psr\Log\LogLevel::*>
     */
    protected $levels = [
        //
    ];

    /**
     * A list of the exception types that are not reported.
     *
     * @var array<int, class-string<\Throwable>>
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed to the session on validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
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
        $this->renderable(function (NotFoundHttpException $e, $request) {
            if ($request->is('api/*')) {
                return response()->json([
                    'error' => true,
                    'message' => 'You seem lost. Check the endpoint and try again!'
                ], 404);
            }
        });
        $this->renderable(function (MethodNotAllowedHttpException $e, $request) {
            if ($request->is('api/*')) {
                return response()->json([
                    'error' => true,
                    'message' => 'Error: Invalid HTTP method used to access the resource'
                ], 500);
            }
        });
        $this->renderable(function (QueryException $e, $request) {
            if ($request->is('api/*')) {
                return response()->json([
                    'error' => true,
                    'message' => 'Querying the resource throws an error :'.explode('(',$e->getMessage())[0].'.'
                ], 405);
            }
        });
        $this->renderable(function (TypeErrorException $e, $request) {
            if ($request->is('api/*')) {
                return response()->json([
                    'error' => true,
                    'message' => $e->getMessage()
                ], 500);
            }
        });
        $this->renderable(function (BadMethodCallException $e, $request) {
            if ($request->is('api/*')) {
                return response()->json([
                    'error' => true,
                    'message' => $e->getMessage()
                ], 500);
            }
        });

    }
}
