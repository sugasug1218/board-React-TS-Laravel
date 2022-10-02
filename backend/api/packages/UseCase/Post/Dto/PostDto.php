<?php

namespace packages\UseCase\Post\Dto;

class PostDto
{
    private int $postId;
    private int $userId;
    private string $title;
    private string $content;
    private \DateTime $createdAt;
    private \DateTime $updatedAt;

    public function __construct(
        int $postId,
        int $userId,
        string $title,
        string $content,
        \DateTime $createdAt,
        \DateTime $updatedAt
    ) {
        $this->postId = $postId;
        $this->userId = $userId;
        $this->title = $title;
        $this->content = $content;
        $this->createdAt = $createdAt;
        $this->updatedAt = $updatedAt;
    }

    /**
     * @return int
     */
    public function getPostId()
    {
        return $this->postId;
    }

    /**
     * @return int
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * @return \DateTime
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }
}
