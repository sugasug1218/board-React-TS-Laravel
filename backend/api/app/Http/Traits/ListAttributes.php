<?php

namespace App\Http\Traits;

trait ListAttributes
{
    /**
     * リストの共通バリデーション項目名定義
     * @return array
     */
    public static function getAttributes()
    {
        return [
            'sort' => 'ソート対象',
            'direction' => 'ソート順',
            'limit' => '取得件数',
            'offset' => '取得開始位置'
        ];
    }
}
