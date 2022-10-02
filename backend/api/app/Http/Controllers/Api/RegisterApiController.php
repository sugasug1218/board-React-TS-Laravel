<?php

namespace App\Http\Controllers\Api;

use App\Enums\StatusType;
use App\Http\Controllers\Controller;
use App\Models\PreUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;

// use App\Http\Services\RegisterService;

class RegisterApiController extends Controller
{
    public function __construct()
    {
        $this->registerService = "";
    }

    private function getParams($request)
    {
        return $request->only([
            'name', 'email', 'password'
        ]);
    }

    private function makeActKey(string $email)
    {
        return base64_encode($email . time());
    }

    // private function 

    /**
     * ユーザー仮登録
     *
     * @param Request $request
     * @return App\Model\User
     */
    public function preRegist(Request $request)
    {
        $email = $request->only(['email']);
        return $this->registerService->preRegisterService($email);
    }

    public function verifyToken()
    {
        // トークンを復号化
        // $decode_actKey = base64_decode($actKey);
    }

    /**
     * 会員登録
     *
     * @return void
     */
    public function register(Request $request)
    {
        $param = $this->getParams($request);

        // Cache::put('data', $request['email']);

        // return Cache::get('data');
        // $result = User::create([
        //     'name' => $param['name'],
        //     'email' => $param['email'],
        //     'password' => Hash::make($param['password'])
        // ]);

        // return $result->id;
    }
}
