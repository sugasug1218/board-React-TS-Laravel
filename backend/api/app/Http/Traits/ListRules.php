<?php

namespace App\Http\Traits;

use Illuminate\Validation\Rule;

trait ListRules
{
    /**
     * 共通のバリデーションルール定義
     * @return array
     */
    public static function getRules()
    {
        return [
            'direction' => [
                'nullable',
                Rule::in(['asc', 'desc'])
            ],
            'limit' => [
                'nullable',
                'integer'
            ],
            'offset' => [
                'nullable',
                'integer'
            ]
        ];
    }
}
