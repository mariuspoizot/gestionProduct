<?php

class Produits {

    private int $id;
    private string $noprod ;
    private string $name;
    private float $price;
    private string $descr;

    public function __construct(int $id , string $noprod , string $name , float $price , string $descr) {
        $this->id = $id;
        $this->noprod = $noprod;
        $this->name = $name;
        $this->price = $price;
        $this->descr = $descr;
    }
    public function getId(): int
    {
        return $this->id;
    }
    public function setId(int $id): self
    {
        $this->id = $id;

        return $this;
    }
    public function getNoprod(): string
    {
        return $this->noprod;
    }
    public function setNoprod(string $noprod): self
    {
        $this->noprod = $noprod;

        return $this;
    }
    public function getName(): string
    {
        return $this->name;
    }
    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }
    public function getPrice(): float
    {
        return $this->price;
    }
    public function setPrice(float $price): self
    {
        $this->price = $price;

        return $this;
    }
    public function getDescr(): string
    {
        return $this->descr;
    }
    public function setDescr(string $descr): self
    {
        $this->descr = $descr;

        return $this;
    }
    public function __toString(): string {
        return "ID : ".$this->getId() ."<br>N° de Produit : ". $this->getNoprod() . "<br> Name : ". $this->getName() ."<br> Price : ". $this->getPrice() ."<br>Description : ". $this->getDescr(); 
    }
}