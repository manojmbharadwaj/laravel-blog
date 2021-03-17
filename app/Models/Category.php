<?php

namespace App\Models;

use App\Dto\CategoryDto;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    /**
     * Save New Category Details.
     *
     * @param CategoryDto $dto
     * @return boolean
     */
    public function addCategory(CategoryDto $dto): bool
    {
        try {
            $category = new Category();
            $category->name = $dto->getName();
            $category->slug = $dto->getSlug();
            $category->created_by = $dto->getCreatedBy();
            $category->save();

            $dto->setId($category->id);

            return true;
        } catch (\Exception $ex) {
            le('Exception while creating new category. ', $ex, ['dto' => $dto]);
        }

        return false;
    }
}
