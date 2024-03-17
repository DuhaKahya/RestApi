<?php

namespace Services;

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
        return $this->articleRepository->getOne($id); 
    }

    public function update($article, $id) {
        $this->articleRepository->update($article, $id);
    }

    public function delete($id) {
        $this->articleRepository->delete($id);
    }

    public function getOne($id) {
        return $this->articleRepository->getOne($id);
    }
}

?>
