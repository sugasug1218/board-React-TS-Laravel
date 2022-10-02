<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthContoller extends Controller
{

    public function __construct()
    {
        $this->middleware('jwt:api')->except(['login']);
    }

    /**
     * ログイン
     */
    public function login(Request $request)
    {
        $credentials = request(['email', 'password']);

        if (!$token = auth('api')->attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        $response = [
            'id' => auth('api')->id(),
            'access_token' => $token,
            'storage_path' => storage_path()
        ];

        return response()->success($response);
    }

    /**
     * ログイン中ユーザーの情報取得
     * 
     * @param string $email
     * @return \Illuminate\Http\JsonResponse
     */
    public function me()
    {
        if (!is_null($user = auth('api')->user())) {
            return response()->success($user);
        }
    }

    /**
     * ログアウト
     */
    public function logout()
    {
        // auth('api')->logout();
        auth('api')->invalidate();
        return response()->success('ログアウト成功');
    }
}
