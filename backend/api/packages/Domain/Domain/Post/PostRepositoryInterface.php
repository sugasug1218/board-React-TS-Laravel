<?php

namespace packages\Domain\Domain\Post;

use packages\Domain\Domain\Post\Post;

interface PostRepositoryInterface
{
    /**
     * 新規投稿
     *
     * @param Post $post
     * @return Post
     */
    public function save(Post $post): Post;

    /**
     * 投稿の更新
     *
     * @param integer $postId
     * @param string $title
     * @param string $content
     * @return Post
     */
    public function update(int $postId, string $title, string $content): Post;

    /**
     * 投稿削除
     *
     * @param integer $postId
     * @return mixed
     */
    public function delete(int $postId);
}
