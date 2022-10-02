<?php

namespace packages\UseCase\Post\Dto;

class PostEditDto
{
    private $postId;
    private $title;
    private $content;

    public function __construct(int $postId, string $title, string $content)
    {
        $this->postId = $postId;
        $this->title = $title;
        $this->content = $content;
    }

    /**
     * @return int
     */
    public function getPostId()
    {
        return $this->postId;
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
}
