<?php

namespace App\Services;

use App\Dto\CategoryDto;
use App\Dto\PostDto;
use App\Models\Category;
use App\Models\Post;

class PostService
{

    /**
     * Category Model
     *
     * @var App\Model\Category
     */
    private $categoryModel;

    /**
     * Post Model
     *
     * @var App\Model\Post
     */
    private $postModel;

    public function __construct(Category $category, Post $post)
    {
        $this->categoryModel = $category;
        $this->postModel = $post;
    }

    /**
     * Create New Category
     *
     * @param CategoryDto $dto
     * @return boolean
     */
    public function createCategory(CategoryDto $dto): bool
    {
        $res = $this->categoryModel->addCategory($dto);

        if ($res) {
            $dto->setMessages('Category created successfully.');
            return true;
        }

        $dto->setErrors('Failed to create Category. Please try again.');
        return false;
    }

    /**
     * Save new post
     *
     * @param PostDto $dto
     * @return boolean
     */
    public function createNewPost(PostDto $dto): bool
    {
        $res = $this->postModel->addPost($dto);

        if ($res) {
            $dto->setMessages('Post created successfully.');
            return true;
        }

        $dto->setErrors('Failed to create Post. Please try again.');
        return false;
    }
}
