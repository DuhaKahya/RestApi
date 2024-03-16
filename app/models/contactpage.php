<?php

class ContactPage{
    
    public int $id;
    public string $name;
    public string $email;
    public string $subject;
    public string $message;
    public string $date; 



    
    public function getId(): int {
        return $this->id;
    }
    
    public function getName(): string {
        return $this->name;
    }
    
    public function getEmail(): string {
        return $this->email;
    }
    
    public function getSubject(): string {
        return $this->subject;
    }
    
    public function getMessage(): string {
        return $this->message;
    }
    
    public function getDate(): string {
        return $this->date;
    }
    
    public function setId(int $id): void {
        $this->id = $id;
    }
    
    public function setName(string $name): void {
        $this->name = $name;
    }
    
    public function setEmail(string $email): void {
        $this->email = $email;
    }
    
    public function setSubject(string $subject): void {
        $this->subject = $subject;
    }
    
    public function setMessage(string $message): void {
        $this->message = $message;
    }
    
    public function setDate(string $date): void {
        $this->date = $date;
    }
}
