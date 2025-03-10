<?php

abstract class Product {
    protected string $name;
    protected float $purchasePrice;
    protected int $tax;
    protected float $profit;
    protected string $description;
    protected string $category;

    public function __construct(string $name, float $purchasePrice, int $tax, float $profit, string $description) {
        $this->name = $name;
        $this->purchasePrice = $purchasePrice;
        $this->tax = $tax;
        $this->profit = $profit;
        $this->description = $description;
    }

    abstract public function getInfo(): array;

    public function getSalePrice(): float {
        return round($this->purchasePrice + $this->profit + ($this->purchasePrice * $this->tax / 100), 2);
    }

    public function setCategory(string $category): void {
        $this->category = $category;
    }
}

class Music extends Product {
    private string $artist;
    private array $numbers = [];

    public function __construct(string $name, float $purchasePrice, int $tax, float $profit, string $description, string $artist) {
        parent::__construct($name, $purchasePrice, $tax, $profit, $description);
        $this->artist = $artist;
        $this->setCategory("Music");
    }

    public function addNumber(string $number): void {
        $this->numbers[] = $number;
    }

    public function getInfo(): array {
        return [
            "Category" => $this->category,
            "Name" => $this->name,
            "Sale Price" => $this->getSalePrice(),
            "Info" => [
                "Artist" => $this->artist,
                "Extra info" => $this->numbers
            ]
        ];
    }
}

class Movie extends Product {
    private string $quality;

    public function __construct(string $name, float $purchasePrice, int $tax, float $profit, string $description, string $quality) {
        parent::__construct($name, $purchasePrice, $tax, $profit, $description);
        $this->quality = $quality;
        $this->setCategory("Movie");
    }

    public function getInfo(): array {
        return [
            "Category" => $this->category,
            "Name" => $this->name,
            "Sale Price" => $this->getSalePrice(),
            "Info" => $this->quality
        ];
    }
}

class Game extends Product {
    private string $genre;
    private array $requirements = [];

    public function __construct(string $name, float $purchasePrice, int $tax, float $profit, string $description, string $genre) {
        parent::__construct($name, $purchasePrice, $tax, $profit, $description);
        $this->genre = $genre;
        $this->setCategory("Game");
    }

    public function addRequirement(string $requirement): void {
        $this->requirements[] = $requirement;
    }

    public function getInfo(): array {
        return [
            "Category" => $this->category,
            "Name" => $this->name,
            "Sale Price" => $this->getSalePrice(),
            "Info" => [
                "Genre" => $this->genre,
                "Extra info" => $this->requirements
            ]
        ];
    }
}

class ProductList {
    private array $products = [];

    public function addProduct(Product $product): void {
        $this->products[] = $product;
    }

    public function getProducts(): array {
        return array_map(fn($product) => $product->getInfo(), $this->products);
    }
}


