<?php

namespace App\Dto;

class CategoryDto extends BaseDto
{
    /**
     * Category ID. Primary Key
     *
     * @var int
     */
    protected $id;

    /**
     * Category Name
     *
     * @var string
     */
    protected $name;

    /**
     * Category Slug
     *
     * @var string
     */
    protected $slug;

    /**
     *
     * @var int
     */
    protected $createdBy;

    /**
     * Get category ID. Primary Key
     *
     * @return  int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * Set category ID. Primary Key
     *
     * @param  int  $id  Category ID. Primary Key
     *
     * @return  self
     */
    public function setId(int $id): self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get category Name
     *
     * @return  string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Set category Name
     *
     * @param  string  $name  Category Name
     *
     * @return  self
     */
    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get category Slug
     *
     * @return  string
     */
    public function getSlug(): string
    {
        return $this->slug;
    }

    /**
     * Set category Slug
     *
     * @param  string  $slug  Category Slug
     *
     * @return  self
     */
    public function setSlug(string $slug): self
    {
        $this->slug = $slug;

        return $this;
    }

    /**
     * Get the value of createdBy
     *
     * @return  int
     */
    public function getCreatedBy(): int
    {
        return $this->createdBy;
    }

    /**
     * Set the value of createdBy
     *
     * @param  int  $createdBy
     *
     * @return  self
     */
    public function setCreatedBy(int $createdBy = 0): self
    {
        $this->createdBy = ($createdBy > 0) ? $createdBy : auth()->id();

        return $this;
    }
}
