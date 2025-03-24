<?php

namespace App\Entity;

use App\Repository\OrderDetailRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: OrderDetailRepository::class)]
class OrderDetail
{
    #[ORM\Id]
    #[ORM\ManyToOne(inversedBy: 'orderDetails')]
    private ?Order $order = null;
    #[ORM\Id]
    #[ORM\ManyToOne(inversedBy: 'orderDetails')]
    private ?Product $product = null;


    #[ORM\Column]
    private ?int $quantity = null;

    #[ORM\Column]
    private ?int $price = null;

    

    public function getOrderId(): ?int
    {
        return $this->order;
    }

    public function getQuantity(): ?int
    {
        return $this->quantity;
    }

    public function setQuantity(int $quantity): static
    {
        $this->quantity = $quantity;

        return $this;
    }

    public function getPrice(): ?int
    {
        return $this->price;
    }

    public function setPrice(int $price): static
    {
        $this->price = $price;

        return $this;
    }

    public function setOrderId(?Order $order): static
    {
        $this->order = $order;

        return $this;
    }

    public function getProductId(): ?Product
    {
        return $this->product;
    }

    public function setProductId(?Product $product_id): static
    {
        $this->product = $product_id;

        return $this;
    }
}
