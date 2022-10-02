<?php

namespace packages\Domain\Domain\Post;

class Post
{
    private int $id;
    private int $userId;
    private string $title;
    private string $content;
    private \DateTime $createdAt;

    public function __construct(
        int $id,
        int $userId,
        string $title,
        string $content,
        \DateTime $createdAt
    ) {
        $this->id = $id;
        $this->userId = $userId;
        $this->title = $title;
        $this->content = $content;
        $this->createdAt = $createdAt;
    }

    /**
     * 投稿IDを取得
     *
     * @return integer
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * 投稿者IDを取得
     *
     * @return integer
     */
    public function getUserId(): int
    {
        return $this->userId;
    }

    /**
     * 投稿タイトルを取得
     *
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * 投稿コンテンツ(本文)を取得
     *
     * @return string
     */
    public function getContent(): string
    {
        return $this->content;
    }

    /**
     * 投稿作成日を取得
     *
     * @return \DateTime
     */
    public function getCreatedAt(): \DateTime
    {
        return $this->createdAt;
    }
}
