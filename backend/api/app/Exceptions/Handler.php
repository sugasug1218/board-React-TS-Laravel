<?php

namespace App\Exceptions;

use App\Consts\JwtErrorConst;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\UnauthorizedException;
use Illuminate\Validation\ValidationException;
use PDOException;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Throwable;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array<int, class-string<Throwable>>
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
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
        $this->reportable(function (Throwable $e) {
            //
        });
    }

    /**
     * Render an exception into an HTTP response.
     */
    public function render($request, Throwable $exception)
    {

        // 発生した例外をロギング
        Log::notice($exception->getMessage());

        $e = $this->prepareException($exception);

        if ($e instanceof ValidationException) {
            return $this->convertValidationExceptionErrorResponse($e, $request);
        } elseif ($e instanceof UnauthorizedException) {
            return response()->errors(Response::$statusTexts[Response::HTTP_UNAUTHORIZED], Response::HTTP_UNAUTHORIZED);
        } elseif ($e instanceof AuthenticationException) {
            return response()->errors(Response::$statusTexts[Response::HTTP_UNAUTHORIZED], Response::HTTP_UNAUTHORIZED);
        }

        // return response()->errors($exception->getMessage(), 400);
        return response()->errors(Response::$statusTexts[Response::HTTP_INTERNAL_SERVER_ERROR], Response::HTTP_INTERNAL_SERVER_ERROR);
    }

    /**
     * FormRequest バリデーションエラー
     *
     * @param ValidationException $e
     * @param int $request
     * @return Illuminate\Http\Response
     */
    protected function convertValidationExceptionErrorResponse(ValidationException $e, $request)
    {
        // エラー内容を配列に変換
        $errors = [];
        foreach ($e->errors() as $attribute => $details) {
            foreach ($details as $detail) {
                $errors[$attribute][] = $detail;
            }
        }
        return response()->errors($errors, Response::HTTP_BAD_REQUEST);
    }
}
