<?php

namespace packages\UseCase\Post\Create;

// use App\Models\Post as EloquentPost;
use App\Http\Requests\Api\Post\PostCreateRequest;
use Carbon\Carbon;
use packages\Domain\Domain\Post\Post;
use packages\Domain\Domain\Post\PostRepositoryInterface;
use packages\UseCase\Post\Create\PostCreateUseCaseInterface;

class PostCreateInteractor implements PostCreateUseCaseInterface
{
    private PostRepositoryInterface $postRepository;

    /**
     * @param PostRepositoryInterface $postRepository
     */
    public function __construct(PostRepositoryInterface $postRepository)
    {
        $this->postRepository = $postRepository;
    }

    /**
     * @param PostCreateRequest $request
     * @return Post
     */
    public function create(PostCreateRequest $request): Post
    {
        $post = new Post(
            mt_rand(),
            $request->user_id,
            $request->title,
            $request->content,
            Carbon::now()
        );
        return $this->postRepository->save($post);
    }
}
