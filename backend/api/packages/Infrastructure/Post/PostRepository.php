<?php

namespace packages\Infrastructure\Post;

use packages\Domain\Domain\Post\Post;
use packages\Domain\Domain\Post\PostRepositoryInterface;
use App\Models\Post as EloquentPost;

/**
 * Post 永続化系(Repository)
 */
class PostRepository implements PostRepositoryInterface
{
    /**
     * 新規投稿
     *
     * @param Post $post
     * @return Post
     */
    public function save(Post $post): Post
    {
        $eloqentPost = new EloquentPost();
        $eloqentPost->fill([
            'user_id' => $post->getUserId(),
            'title' => $post->getTitle(),
            'content' => $post->getContent()
        ])->save();

        return new Post(
            $eloqentPost->id,
            $eloqentPost->user_id,
            $eloqentPost->title,
            $eloqentPost->content,
            $eloqentPost->created_at
        );
    }

    /**
     * 投稿の更新
     *
     * @param integer $postId
     * @param string $title
     * @param string $content
     * @return Post
     */
    public function update(int $postId, string $title, string $content): Post
    {
        $eloqEditPost = EloquentPost::find($postId);
        $eloqEditPost->fill([
            'title' => $title,
            'content' => $content
        ])->save();

        return new Post(
            $eloqEditPost->id,
            $eloqEditPost->user_id,
            $eloqEditPost->title,
            $eloqEditPost->content,
            $eloqEditPost->updated_at
        );
    }

    /**
     * 投稿削除
     *
     * @param integer $postId
     * @return mixed
     */
    public function delete(int $postId)
    {
        $eloqDeletePost = EloquentPost::find($postId);
        $eloqDeletePost->delete();
    }
}
