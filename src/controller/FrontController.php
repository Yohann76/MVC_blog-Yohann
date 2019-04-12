<?php

namespace App\src\controller;

class FrontController extends Controller
{
    public function home()
    {
        $articles = $this->articleDAO->getArticles();
        return $this->view->render('home', [
            'articles' => $articles
        ]);
    }

    public function article($articleId)
    {
        $article = $this->articleDAO->getArticle($articleId);
        $comments = $this->commentDAO->getCommentsFromArticle($articleId);
        return $this->view->render('single', [
            'article' => $article,
            'comments' => $comments
        ]);
    }

    public function displayBlog() {
        $articles = $this->articleDAO->getArticles();
        return $this->view->render('blog', [
            'articles' => $articles
        ]);
    }

    /*  Afficher la page d'inscription */
    public function inscription() {
        return $this->view->render('registration', [

        ]);
    }

    /* Afficher la page de connexion */
    public function connection() {
        return $this->view->render('connection', [
        ]);
    }

}