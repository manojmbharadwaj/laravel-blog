<?php

namespace App\Dto;

class PostDto extends BaseDto
{

    /**
     * Posts primary key.
     *
     * @var int
     */
    protected $id;

    /**
     * Post Title
     *
     * @var string
     */
    protected $title;

    /**
     * Slug prepared from Post Title
     *
     * @var string
     */
    protected $slug;

    /**
     * Post
     *
     * @var string
     */
    protected $post;

    /**
     * User ID
     *
     * @var int
     */
    protected $authorId;

    /**
     * Category ID
     *
     * @var int
     */
    protected $categoryId;

    /**
     * Get posts primary key.
     *
     * @return  int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * Set posts primary key.
     *
     * @param  int  $id  Posts primary key.
     *
     * @return  self
     */
    public function setId(int $id): self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get post Title
     *
     * @return  string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * Set post Title
     *
     * @param  string  $title  Post Title
     *
     * @return  self
     */
    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get slug prepared from Post Title
     *
     * @return  string
     */
    public function getSlug(): string
    {
        return $this->slug;
    }

    /**
     * Set slug prepared from Post Title
     *
     * @param  string  $slug  Slug prepared from Post Title
     *
     * @return  self
     */
    public function setSlug(string $slug): self
    {
        $this->slug = $slug;

        return $this;
    }

    /**
     * Get post
     *
     * @return  string
     */
    public function getPost(): string
    {
        return $this->post;
    }

    /**
     * Set post
     *
     * @param  string  $post  Post
     *
     * @return  self
     */
    public function setPost(string $post): self
    {
        $this->post = $post;

        return $this;
    }

    /**
     * Get user ID
     *
     * @return  int
     */
    public function getAuthorId(): int
    {
        return $this->authorId;
    }

    /**
     * Set user ID
     *
     * @param  int  $authorId  User ID
     *
     * @return  self
     */
    public function setAuthorId(): self
    {
        $this->authorId = auth()->id();

        return $this;
    }

    /**
     * Get category ID
     *
     * @return  int
     */
    public function getCategoryId(): int
    {
        return $this->categoryId;
    }

    /**
     * Set category ID
     *
     * @param  int  $categoryId  Category ID
     *
     * @return  self
     */
    public function setCategoryId(int $categoryId): self
    {
        $this->categoryId = $categoryId;

        return $this;
    }
}
