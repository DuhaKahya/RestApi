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
        return $this->articleRepository->insert($article);
    }

    public function update($article, $id) {
        return $this->articleRepository->update($article, $id);
    }

    public function delete($id) {
        return $this->articleRepository->delete($id);
    }

    public function getOne($id) {
        return $this->articleRepository->getOne($id);
    }


}

?>
