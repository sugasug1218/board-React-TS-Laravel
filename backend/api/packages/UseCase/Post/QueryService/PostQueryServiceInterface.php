<?php

namespace packages\UseCase\Post\QueryService;

use packages\Domain\Domain\Post;
use packages\UseCase\Post\Dto\PostDetailDto;
use packages\UseCase\Post\Dto\PostEditDto;

interface PostQueryServiceInterface
{
    /**
     * 投稿一覧を取得
     *
     * @return array
     */
    public function indexPosts(string $sort, string $direction, string $offset = null, string $limit = null): array;

    /**
     * 投稿者IDから投稿一覧を取得
     *
     * @return array
     */
    public function fetchUserPost(int $userId): array;

    /**
     * 投稿詳細を取得
     *
     * @param integer $postId
     * @return PostDetailDto
     */
    public function getPostDatail(int $postId): PostDetailDto;

    /**
     * 更新対象の投稿を取得
     *
     * @param integer $postId
     * @return PostEditDto
     */
    public function getEditTarget(int $postId): PostEditDto;

    /**
     * 投稿IDでエンティティ生成
     *
     * @param integer $postId
     * @return Post
     */
    public function findById(int $postId): Post;
}
