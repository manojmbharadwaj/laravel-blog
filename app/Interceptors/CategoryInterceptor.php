<?php

namespace App\Interceptors;

use App\Dto\CategoryDto;
use Illuminate\Support\Str;

class CategoryInterceptor
{

    public $categoryDto;

    public function __construct(CategoryDto $categoryDto)
    {
        $this->categoryDto = $categoryDto;
    }

    /**
     * Prepare DTO to create new category
     *
     * @return CategoryDto
     */
    public function prepareStoreCategoryDto(): CategoryDto
    {
        request()->validate([
            'category' => ['required', 'max:255']
        ]);

        return $this->categoryDto
            ->setUserId()
            ->setName(request('category'))
            ->setSlug(Str::slug(request('category')))
            ->setCreatedBy();
    }
}
