<?php

namespace App\src\controller;

use App\config\Parameter;

class BackController extends Controller
{

    /**
     * @param Parameter $post
     */
    public function addArticle(Parameter $post)
    {
        // Récupére les articles
        $articles = $this->articleDAO->getArticles();
        if($post->get('submit')) {
            $this->articleDAO->addArticle($post);
            header('Location: ../public/index.php?route=addArticle');
        }

        return $this->view->render('add_article', [
            'post' => $post,
            'articles' => $articles
        ]);

    }

    // Add Comment
    public function addComment(Parameter $post)
    {
        $this->commentDAO->addComment($post);
        header('Location: ../public/index.php?route=displayBlog');
    }

    /**
     * @param $articleId Display
     */
    public function removeArticle($articleId)
    {
       $article = $this->articleDAO->getArticle($articleId);
        return $this->view->render('removeArticle', [
            'article' => $article,
        ]);
    }
    // Action du formulaire
    public function mooveArticle($post)
    {
        // Si le formulaire est envoyer
        if($post->get('submit')) {
            $this->articleDAO->mooveArticle($post); // parametre bien passer
        }
        // Retourne a Article
        $articles = $this->articleDAO->getArticles();
        return $this->view->render('add_article', [
            'articles' => $articles
        ]);
    }
    /**
     * @param $articleId
     */
    public function deleteArticle($articleId)
    {
        $this->commentDAO->deleteCommentFromArticle($articleId);
        $this->articleDAO->deleteArticle($articleId);

        $articles = $this->articleDAO->getArticles();

       return $this->view->render('add_article', [
            'articles' => $articles
        ]);

    }
    // Afficher la liste des commentaires
    public function comment()
    {
        $listCommentNotVerified = $this->commentDAO->getListCommentNotVerified();
        $listCommentVerified = $this->commentDAO->getListCommentVerified();


        return $this->view->render('comment', [
            'listCommentNotVerified' => $listCommentNotVerified,
            'listCommentVerified' => $listCommentVerified
        ]);
    }
    // Au clic sur le bouton verifié un commentaire
    public function verifiedComment($commentId)
    {
        $this->commentDAO->verifiedComment($commentId);
        header('Location: ../public/index.php?route=comment');
    }

    // bouton supprimer un commentaire
    public function deleteComment($commentId)
    {

        $this->commentDAO->deleteComment($commentId);
        header('Location: ../public/index.php?route=comment');

    }
    public function rights()
    {
        $admin =$this->userDAO->getListUsersAdmin();
        $members =$this->userDAO->getListUsersMembers();

        return $this->view->render('rights', [
            'admin' => $admin,
            'members' => $members
        ]);
    }

    //  Declassement d'un administrateur
    public function adminChangeUser($userId)
    {
        $this->userDAO->downgradeadmin($userId);
        header('Location: ../public/index.php?route=rights');
    }

    //  Mise a niveau d'un membre
    public function userChangeAdmin($userId)
    {
        $this->userDAO->upGradeMember($userId);
        header('Location: ../public/index.php?route=rights');
    }


    public function Déconnexion()
    {
    $this->session->stop() ;
        header('Location: ../public/index.php?route=connection');
    }




}