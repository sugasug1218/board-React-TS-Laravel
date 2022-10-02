<?php

namespace App\Http\Requests\Api\Post;

use Illuminate\Foundation\Http\FormRequest;

class PostCreateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'user_id' => ['integer'],
            'title' => ['required', 'string', 'max:50'],
            'content' => ['required', 'string', 'max:400']
        ];
    }

    public function attributes()
    {
        return [
            'user_id' => '投稿者ID',
            'title' => '投稿タイトル',
            'content' => '投稿本文'
        ];
    }
}
