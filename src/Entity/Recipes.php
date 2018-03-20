<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\RecipesRepository")
 */
class Recipes
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=150)
     */
    private $names_recipes;

    /**
     * @ORM\Column(type="text", length=300)
     */
    private $descriptions_recipes;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\CategoriesRecipes", cascade={"persist"})
     */
    private $categories_recipes;
    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Ingredients", cascade={"persist"})
     */
    private $ingredients;


    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Orders", cascade={"persist"})
     */
    private $orders;

    /**
     * @return mixed
     */
    public function getOrders()
    {
        return $this->orders;
    }

    /**
     * @param mixed $orders
     */
    public function setOrders (Orders $Orders)
    {
        $this->Orders = $Orders;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getIngredients()
    {
        return $this->ingredients;
    }

    public function addIngredient(Ingredient $ingredient)
    {
        $this->ingredients[] = $ingredient;
        return $this;
    }

    public function removeIngredient (Ingredient $ingredient)
    {
        $this->ingredients->removeElement($ingredient);
    }

    /**
     * @return mixed
     */
    public function getCategoriesRecipes()
    {
        return $this->categories_recipes;
    }

    public function addCategoryRecipe(CategoryRecipe $CategoryRecipe)
    {
        $this->categories_recipes[] = $CategoryRecipe;
        return $this;
    }

    public function removeRecipe (removeRecipe $removeRecipe)
    {
        $this->categories_recipes->removeElement($removeRecipe);
    }

    public function __construct()
    {
        $this->categories_recipes = new ArrayCollection();
        $this->ingredients = new ArrayCollection();
    }


    /**
     * @return mixed
     */
    public function getNamesRecipes()
    {
        return $this->names_recipes;
    }

    /**
     * @param mixed $names_recipes
     */
    public function setNamesRecipes($names_recipes): void
    {
        $this->names_recipes = $names_recipes;
    }

    /**
     * @return mixed
     */
    public function getDescriptionsRecipes()
    {
        return $this->descriptions_recipes;
    }

    /**
     * @param mixed $descriptions_recipes
     */
    public function setDescriptionsRecipes($descriptions_recipes): void
    {
        $this->descriptions_recipes = $descriptions_recipes;
    }

    public function getId()
    {
        return $this->id;
    }
}
