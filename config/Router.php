<?php

namespace App\config;
use App\src\controller\BackController;
use App\src\controller\ErrorController;
use App\src\controller\FrontController;
use App\src\controller\ConnexionController;
use App\src\controller\MailController;
use Exception;

class Router
{
    private $frontController;
    private $errorController;
    private $backController;
    private $connexionController;
    private $mailController ;
    private $request;

    public function __construct()
    {
        $this->request = new Request();
        $this->frontController = new FrontController();
        $this->backController = new BackController();
        $this->errorController = new ErrorController();
        $this->connexionController = new ConnexionController();
        $this->mailController = new MailController() ;
    }

    public function run()
    {
        $route = $this->request->getGet()->get('route');
        try{
            if(isset($route))
            {
                // Route pour afficher un article ( single )
                if($route === 'article'){
                    $this->frontController->article($this->request->getGet()->get('articleId'));
                }
                // route pour gerer l'affichage home
                elseif ($route === 'home'){
                    $this->frontController->home();
                }
                // Route pour afficher la liste de blog
                elseif ($route === 'displayBlog'){
                    $this->frontController->displayBlog();
                }
                // DownloadCv
                else if($_GET['route'] === 'cv') {
                    $this->frontController->downloadCv();
                }
                /*
                Connexion et inscription
                ***************************
                 */
                // Route pour afficher la page de connexion et inscription
                elseif ($route === 'connection'){
                    $this->frontController->connection();
                }
                // Route pour gerer la connexion suite au formulaire
                elseif ($route === 'connect'){
                   // var_dump($_POST);
                    $this->connexionController->connect($this->request->getPost());
                }
                // Route pour gerer l'inscription suite au formulaire
                elseif ($route === 'registration'){
                   // var_dump($_POST);
                    $this->connexionController->registration($this->request->getPost());
                }
                // Route pour se deconnecter
                elseif ($route === 'Déconnexion'){
                    $this->frontController->Déconnexion();
                }

                // Mail
                elseif ($route === 'sendMail'){
                    $this->mailController->transport($this->request->getPost() );
                }

                // ADMIN ROUTER
                // Afficher la gestion d'article
                elseif ($route === 'addArticle'){
                    $this->backController->addArticle($this->request->getPost());
                }
                // Ajouter un commentaire
                else if($_GET['route'] === 'addComment') {
                    $this->backController->addComment($this->request->getPost() );
                }
                // Modification d'article avec le parametre de L'url
                elseif ($route === 'removeArticle'){
                    $this->backController->removeArticle($this->request->getGet()->get('articleId'));
                }
                elseif ($route === 'mooveArticle'){
                    $this->backController->mooveArticle($this->request->getPost());
                }
                // Suppression d'article avec le parametre de L'url
                elseif ($route === 'deleteArticle'){
                    $this->backController->deleteArticle($this->request->getGet()->get('articleId'));
                }
                // Gestion des commentaires
                elseif ($route === 'comment'){
                    $this->backController->comment($this->request->getPost());
                }
                //  Vérifier un commentaire
                elseif ($route === 'verifiedComment'){
                    $this->backController->verifiedComment($this->request->getGet()->get('commentId'));
                }
                // Supprimer un commentaire
                elseif ($route === 'deleteComment'){
                    $this->backController->deleteComment($this->request->getGet()->get('commentId'));
                }
                // Gestion des droits
                elseif ($route === 'rights'){
                    $this->backController->rights($this->request->getPost());
                }
                //  Declassement d'un administrateur
                elseif ($route === 'adminChangeUser'){
                    $this->backController->adminChangeUser($this->request->getGet()->get('userId'));
                }
                //  Mise a niveau d'un membre
                elseif ($route === 'userChangeAdmin') {
                    $this->backController->userChangeAdmin($this->request->getGet()->get('userId'));
                }
                // Route pour Afficher la page admin
                elseif ($route === 'displayAdmin'){
                    $this->backController->displayAdmin();
                }
            }
            else{
                $this->frontController->home();
            }
        }
        catch (Exception $e)
        {
            $this->errorController->errorServer();
        }
    }


}