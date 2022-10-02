<?php

namespace App\Http\Middleware;

use Closure;
use App\Consts\JwtErrorConst;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Exceptions\TokenBlacklistedException;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;
use Tymon\JWTAuth\Http\Middleware\BaseMiddleware;

class ValidateAccessToken extends BaseMiddleware
{

    /**
     * アクセストークンの検証
     *
     * @param Request $request
     * @param Closure $next
     * @param string[] ...$guards
     * @return mixed
     */
    public function handle(Request $request, Closure $next, ...$guards)
    {
        if ((!$request->header('Authorization'))) {
            return response()->errors(JwtErrorConst::JWT_NOTHING, Response::HTTP_UNAUTHORIZED);
        }

        // トークンを検証して細かくハンドリングする
        try {
            foreach ($guards as $guard) {
                if (!auth($guard)->parseToken()->checkOrFail()) {
                    return response()->errors(JwtErrorConst::JWT_INVALID, Response::HTTP_UNAUTHORIZED);
                }
            }
        } catch (TokenInvalidException $e) {
            return response()->errors(JwtErrorConst::JWT_INVALID, Response::HTTP_UNAUTHORIZED);
        } catch (TokenExpiredException $e) {
            return response()->errors(JwtErrorConst::JWT_EXPIRED, Response::HTTP_UNAUTHORIZED);
        } catch (TokenBlacklistedException $e) {
            return response()->errors(JwtErrorConst::JWT_BLACKLIST, Response::HTTP_UNAUTHORIZED);
        } catch (JWTException $e) {
            return response()->errors(JwtErrorConst::JWT_SOMETHING, Response::HTTP_UNAUTHORIZED);
        }

        $response = $next($request);

        return $response;
    }
}
