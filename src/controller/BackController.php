<?php

namespace App\src\controller;

use App\config\Parameter;


class BackController extends Controller
{
    /**
     * Sécurité administration
     */
    public function checkAdmin()
    {
          $adminSession = $this->session->get('user');
          // Si la session existe et n'est pas égal a "admin"
          if (!isset($adminSession) &&  !$adminSession == 'admin' )
         {
             header('Location: ../public/index.php?route=connection');
         }
    }
    /**
     * @param Parameter $post
     */
    public function addArticle(Parameter $post)
    {
        $this->checkAdmin() ;

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
    /**
     * @param $articleId Display
     */
    public function removeArticle($articleId)
    {
        $this->checkAdmin() ;
        $article = $this->articleDAO->getArticle($articleId);
        return $this->view->render('removeArticle', [
            'article' => $article,
        ]);
    }
    // Action du formulaire
    public function mooveArticle($post)
    {
        $this->checkAdmin() ;
        // Si le formulaire est envoyer
        if($post->get('submit')) {
            $this->articleDAO->mooveArticle($post);
        }

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
        $this->checkAdmin() ;
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
        $this->checkAdmin() ;
        $listCommentNotVerified = $this->commentDAO->getListCommentNotVerified();
        $listCommentVerified = $this->commentDAO->getListCommentVerified();


        return $this->view->render('comment', [
            'listCommentNotVerified' => $listCommentNotVerified,
            'listCommentVerified' => $listCommentVerified
        ]);
    }
    // bouton verifié un commentaire
    public function verifiedComment($commentId)
    {
        $this->checkAdmin() ;
        $this->commentDAO->verifiedComment($commentId);
        header('Location: ../public/index.php?route=comment');
    }

    // bouton supprimer un commentaire
    public function deleteComment($commentId)
    {
        $this->checkAdmin() ;
        $this->commentDAO->deleteComment($commentId);
        header('Location: ../public/index.php?route=comment');
    }
    public function rights()
    {
        $this->checkAdmin() ;
        $admin =$this->userDAO->getListUsersAdmin();
        $members =$this->userDAO->getListUsersMembers();

        return $this->view->render('rights', [
            'admin' => $admin,
            'members' => $members
        ]);
    }

    //  Déclassement d'un administrateur
    public function adminChangeUser($userId)
    {
        $this->checkAdmin() ;
        $this->userDAO->downgradeadmin($userId);
        header('Location: ../public/index.php?route=rights');
    }

    //  Mise a niveau d'un membre
    public function userChangeAdmin($userId)
    {
        $this->checkAdmin() ;
        $this->userDAO->upGradeMember($userId);
        header('Location: ../public/index.php?route=rights');
    }

    // Add Comment
    public function addComment(Parameter $post)
    {
        $this->commentDAO->addComment($post);
        header('Location: ../public/index.php?route=displayBlog&page=1');
    }

    // Display page Admin
    public function displayAdmin()
    {
        $this->checkAdmin() ;

        $nbrArticle = $this->userDAO->nbrArticle();
        $numberArticle = $nbrArticle[0] ;

        $nbrCommentVerified = $this->userDAO->nbrCommentVerified();
        $numberCommentVerified = $nbrCommentVerified[0] ;

        $nbrCommentNotVerified = $this->userDAO->nbrCommentNotVerified();
        $numberCommentNotVerified = $nbrCommentNotVerified[0] ;

        $nbrMembers =  $this->userDAO->nbrMembers();
        $numberMembers = $nbrMembers[0] ;

        $nbrAdmin = $this->userDAO->nbrAdmin();
        $numberAdmin = $nbrAdmin[0] ;

        return $this->view->render('backoffice', [
            'numberArticle' => $numberArticle,
            'numberCommentVerified' => $numberCommentVerified,
            'numberCommentNotVerified' => $numberCommentNotVerified,
            'numberMembers' => $numberMembers,
            'numberAdmin' => $numberAdmin
        ]);
    }

    public function displayMembers() {
        return $this->view->render('members', [
        ]);
    }
}