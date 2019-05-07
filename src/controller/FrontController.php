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

    // Transmettre la session name
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

    /* Afficher la page de connexion */
    public function connection() {
        return $this->view->render('connection', [
        ]);
    }
    // Download CV
    public function downloadCv()
    {
        $file_name ="CV.pdf";
        header("Content-Disposition: attachment; filename=\"$file_name\"");
    }







}