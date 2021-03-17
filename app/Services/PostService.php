<?php

namespace App\Services;

use App\Dto\CategoryDto;
use App\Models\Category;

class PostService
{

    /**
     * Category Model
     *
     * @var App\Model
     */
    private $categoryModel;

    public function __construct(Category $category)
    {
        $this->categoryModel = $category;
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
}
