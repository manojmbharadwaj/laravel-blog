<?php

namespace App\Interceptors;

use App\Dto\PostDto;
use Illuminate\Support\Str;

class PostInterceptor
{
    /**
     * Posts DTO
     *
     * @var App\Dto\PostDto
     */
    public $postDto;

    public function __construct(PostDto $postDto)
    {
        $this->postDto = $postDto;
    }

    /**
     * Prepare Post DTO to save new post
     *
     * @return PostDto
     */
    public function prepareStorePostDto(): PostDto
    {

        request()->validate([
            'title' => ['required', 'max:255'],
            'category_id' => ['required'],
            'post' => ['required'],
        ]);

        return $this->postDto
            ->setUserId()
            ->setAuthorId()
            ->setPost(request('post'))
            ->setTitle(request('title'))
            ->setSlug(Str::slug(request('title')))
            ->setCategoryId(request('category_id'));
    }
}
