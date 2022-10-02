<?php

namespace packages\Infrastructure\Post;

use App\Models\Post as EloquentPost;
use packages\UseCase\Post\QueryService\PostQueryServiceInterface;
use packages\Domain\Domain\Post;
use packages\UseCase\Post\Dto\PostDetailDto;
use packages\UseCase\Post\Dto\PostEditDto;
use packages\UseCase\Post\Dto\UsersPostDto;

/**
 * Post 参照系(QueryService)
 */
class PostQueryService implements PostQueryServiceInterface
{
    /**
     * 投稿一覧を取得
     *
     * @return array
     */
    public function indexPosts(string $sort = 'id', string $direction = 'desc', string $offset = null, string $limit = null): array
    {
        $eloqPostList = EloquentPost::orderBy($sort, $direction)
            ->when($offset, function ($query, $offset) {
                return $query->offset($offset);
            })
            ->when($limit, function ($query, $limit) {
                return $query->limit($limit);
            })
            ->get()
            ->all();

        $eloqPostDtoList = array_map(function ($eloqPost) {
            return new Post(
                $eloqPost->id,
                $eloqPost->user_id,
                $eloqPost->title,
                $eloqPost->content,
                $eloqPost->created_at,
                $eloqPost->updated_at
            );
        }, $eloqPostList);

        return $eloqPostDtoList;
    }

    /**
     * 投稿者IDから投稿一覧を取得
     *
     * @return array
     */
    public function fetchUserPost(int $userId): array
    {
        $eloqPostList = EloquentPost::where('user_id', $userId)->get()->all();

        $usersPostDtoList = array_map(function ($eloqPost) {
            return new UsersPostDto(
                $eloqPost->id,
                $eloqPost->title,
                $eloqPost->content,
                $eloqPost->created_at,
                $eloqPost->updated_at
            );
        }, $eloqPostList);

        return $usersPostDtoList;
    }

    /**
     * 投稿詳細を取得
     *
     * @param integer $postId
     * @return PostDetailDto
     */
    public function getPostDatail(int $postId): PostDetailDto
    {
        $eloqPost = EloquentPost::find($postId);
        return new PostDetailDto(
            $eloqPost->id,
            $eloqPost->user_id,
            $eloqPost->title,
            $eloqPost->content,
            $eloqPost->createdAt,
            $eloqPost->updatedAt
        );
    }

    /**
     * 更新対象の投稿を取得
     *
     * @param integer $postId
     * @return PostEditDto
     */
    public function getEditTarget(int $postId): PostEditDto
    {
        $eloqPost = EloquentPost::find($postId);
        return new PostEditDto(
            $eloqPost->id,
            $eloqPost->title,
            $eloqPost->content
        );
    }

    /**
     * Undocumented function
     *
     * @param integer $postId
     * @return Post
     */
    public function findById(int $postId): Post
    {
        $eloqPost = EloquentPost::find($postId);
        return new Post(
            $eloqPost->id,
            $eloqPost->user_id,
            $eloqPost->title,
            $eloqPost->content,
            $eloqPost->creted_at,
            $eloqPost->updated_at
        );
    }
}
