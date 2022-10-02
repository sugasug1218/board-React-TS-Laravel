<?php

namespace packages\Domain\Domain\PreUser;

class PreUser
{
    private int $id;
    private string $email;
    private string $actKey;
    private \Datetime $expiry;
    private string $status;
    private \Datetime $createAt;
    private \Datetime $updatedAt;

    public function __construct(
        int $id,
        string $email,
        string $actKey,
        string $status,
        \DateTime $expiry,
        \Datetime $createAt,
        \Datetime $updatedAt,
    ) {
        $this->id = $id;
        $this->email = $email;
        $this->actKey = $actKey;
        $this->expiry = $expiry;
        $this->status = $status;
        $this->createAt = $createAt;
        $this->updatedAt = $updatedAt;
    }

    public function getUserId()
    {
        return $this->id;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getActKey()
    {
        return $this->actKey;
    }

    public function getExpiry()
    {
        return $this->expiry;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function getCreatedAt()
    {
        return $this->createAt;
    }

    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }
}
