<?php
namespace App\Entity;

use Symfony\Component\Validator\Constraints as Assert;

class SearchCategory
{
    /**
     * @Assert\NotNull(message="Aucune Catégorie séléctionnée.")
     */
    private string $category;

    /**
     * Get the value of category
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * Set the value of category
     *
     * @return  self
     */
    public function setCategory($category)
    {
        $this->category = $category;

        return $this;
    }
}