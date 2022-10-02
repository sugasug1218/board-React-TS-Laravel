<?php

namespace App\Consts;

class JwtErrorConst
{
    const JWT_NOTHING = "トークンが付与されていません";
    const JWT_INVALID = "トークンが無効です";
    const JWT_EXPIRED = "トークンの有効期限が切れています。";
    const JWT_BLACKLIST = "ログアウト済みのトークンです。";
    const JWT_SOMETHING = "その他のトークンエラーです。";
}
