<?php

class Orders {
    
    public int $id;
    public int $shoppingcartid;
    public string $date; 

    public function getId(): int {
        return $this->id;
    }

    public function getShoppingcartid(): int {
        return $this->shoppingcartid;
    }

    public function getDate(): string {
        return $this->date;
    }

    public function setId(int $id): void {
        $this->id = $id;
    }

    public function setShoppingcartid(int $shoppingcartid): void {
        $this->shoppingcartid = $shoppingcartid;
    }

    public function setDate(string $date): void {
        $this->date = $date;
    }



 
}
