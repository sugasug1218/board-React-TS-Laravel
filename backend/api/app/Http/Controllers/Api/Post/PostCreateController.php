<?php

namespace App\Http\Controllers\Api\Post;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Post\PostCreateRequest;
use packages\UseCase\Post\Create\PostCreateUseCaseInterface;

class PostCreateController extends Controller
{
    public function create(PostCreateRequest $request, PostCreateUseCaseInterface $interactor)
    {
        // $userId = auth('api')->id();
        $params = $request->only(['title', 'content']);
        $params['user_id'] = 1;

        $postCreateRequest = new PostCreateRequest($params);
        $result = $interactor->create($postCreateRequest);

        return response()->success($result);
    }
}
