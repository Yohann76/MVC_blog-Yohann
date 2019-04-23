<?php

namespace App\src\controller;

use App\config\Parameter;

class BackController extends Controller
{
    public function addArticle(Parameter $post)
    {
        if($post->get('submit')) {
            $this->articleDAO->addArticle($post);
            header('Location: ../public/index.php?route=connect');
        }
        return $this->view->render('add_article', [
            'post' => $post
        ]);
    }

     /*  ***********************  */
    public function removeArticle(Parameter $post)
    {
        $articles = $this->articleDAO->getArticles();
        return $this->view->render('remove_article', [
            'articles' => $articles
        ]);
    }


    /* ************************** */
    public function Déconnexion()
    {
    $this->session->stop() ;
        header('Location: ../public/index.php?route=connection');
    }


}