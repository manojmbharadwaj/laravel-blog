<?php

namespace App\Models;

use App\Dto\PostDto;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    /**
     * Save New Post.
     *
     * @param PostDto $dto
     * @return boolean
     */
    public function addPost(PostDto $dto): bool
    {
        try {
            $post = new Post();
            $post->title = $dto->getTitle();
            $post->slug = $dto->getSlug();
            $post->author_id = $dto->getAuthorId();
            $post->category_id = $dto->getCategoryId();
            $post->post = $dto->getPost();

            $post->save();

            $dto->setId($post->id);

            return true;
        } catch (\Exception $ex) {
            le('Exception while creating new Post. ', $ex, ['dto' => $dto]);
        }

        return false;
    }
}
