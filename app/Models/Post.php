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

    /**
     * List all posts of an author
     *
     * @param integer $authorId
     * @return array
     */
    public function listAuthorPosts(int $authorId): array
    {
        $posts = [];
        try {
            $posts =  \DB::table('posts as p')
                ->join('categories as c', 'p.category_id', 'c.id')
                ->select('p.id as postId', 'p.title', 'p.slug', 'c.name as category')
                ->where('p.author_id', $authorId)
                ->orderBy('p.id', 'DESC')
                ->get()
                ->toArray();
        } catch (\Exception $ex) {
            le('', $ex, ['author' => $authorId]);
        }

        return $posts;
    }
}
