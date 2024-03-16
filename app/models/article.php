<?php

namespace Models;

class Article {
    public int $id;
    public string $title;
    public string $description;
    public float $price;
    public string $image;
    public int $stock;
    public string $category_id;
    public Category $category;


}

    
