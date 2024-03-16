<?php

use Repositories\ArticleRepository;

class ArticleService {

    private $articleRepository;

    public function __construct() {
        $this->articleRepository = new ArticleRepository();
    }

    public function getAll() {
        return $this->articleRepository->getAll();
    }

    public function insert($article) {
        $this->articleRepository->insert($article);
    }

    public function getArticleById($id) {
        return $this->articleRepository->getArticleById($id);
    }

    public function update($article) {
        $this->articleRepository->update($article);
    }


    

    
    
   

    

}