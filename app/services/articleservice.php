<?php

namespace Services;

use Repositories\ArticleRepository;
use Models\Article;

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
        return $this->articleRepository->getOne($id); 
    }

    public function update($article) {
        $this->articleRepository->update($article);
    }

    public function delete($id) {
        $this->articleRepository->delete($id);
    }
}

?>
