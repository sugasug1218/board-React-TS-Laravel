<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Response as ResponseFacade;
use Illuminate\Http\Response;

class ApiResponseServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        // 成功時のレスポンス
        ResponseFacade::macro('success', function ($data, $code = Response::HTTP_OK) {
            return response()->json([
                'status' => 'success',
                'code' => $code,
                'message' => Response::$statusTexts[$code],
                'payload' => $data
            ], $code);
        });

        // 処理失敗
        ResponseFacade::macro('errors', function ($errors, $code = Response::HTTP_BAD_REQUEST) {
            return response()->json([
                'status' => 'error',
                'code' => $code,
                'message' => Response::$statusTexts[$code],
                'errors' => $errors
            ], $code);
        });

        // debug用
        ResponseFacade::macro('debug', function ($data, $code = Response::HTTP_PROCESSING, $trace = null) {
            return response()->json([
                'status' => 'debug',
                'code' => $code,
                'message' => Response::$statusTexts[$code],
                'debug' => $data,
                'trace' => $trace
            ], $code);
        });
    }
}
