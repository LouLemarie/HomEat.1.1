<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\OrdersRepository")
 */
class Orders
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="decimal", scale=2)
     */
    private $price;


    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Review", cascade={"persist"})
     */
    private $reviews;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Status", cascade={"persist"})
     */
    private $status;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Recipes", cascade={"persist"})
     */

    private $recipes;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", cascade={"persist"})
     */
    private $user;

    /**
     * @return mixed
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param mixed $user
     */
    public function setUser(User $user)
    {
        $this->user = $user;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getRecipes()
    {
        return $this->recipes;
    }
    public function setRecipes(Recipes $recipes)
    {
        $this->recipes = $recipes;
        return $this;
    }



    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }


    public function setStatus(Status $status)
    {
        $this->status = $status;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getReviews()
    {
        return $this->reviews;
    }

    public function __construct()
    {
        $this->reviews = new ArrayCollection();
    }

    public function addReview (Review $Review)
    {
        $this->reviews[] = $Review;
        return $this;
    }

    public function removeReview (Review $Review)
    {
        $this->reviews->removeElement($Review);
    }

    /**
     * @return mixed
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param mixed $price
     */
    public function setPrice($price): void
    {
        $this->price = $price;
    }

    /**
     * @return mixed
     */
    public function getQuantities()
    {
        return $this->quantities;
    }

    /**
     * @param mixed $quantities
     */
    public function setQuantities($quantities): void
    {
        $this->quantities = $quantities;
    }

    /**
     * @ORM\Column(type="integer")
     */
    private $quantities;


    public function getId()
    {
        return $this->id;
    }
}
