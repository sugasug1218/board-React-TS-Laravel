<?php

namespace packages\UseCase\Post\Create;

use packages\Domain\Domain\Post\Post;
use App\Http\Requests\Api\Post\PostCreateRequest;

interface PostCreateUseCaseInterface
{
    /**
     * 新規投稿
     *
     * @param PostCreateRequest $request
     * @return Post
     */
    public function create(PostCreateRequest $request): Post;
}
