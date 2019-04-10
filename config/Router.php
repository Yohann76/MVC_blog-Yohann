<?php

namespace App\config;
use App\src\controller\BackController;
use App\src\controller\ErrorController;
use App\src\controller\FrontController;
use App\src\controller\ConnexionController;
use Exception;

class Router
{
    private $frontController;
    private $errorController;
    private $backController;
    private $connexionController;
    private $request;

    public function __construct()
    {
        $this->request = new Request();
        $this->frontController = new FrontController();
        $this->backController = new BackController();
        $this->errorController = new ErrorController();
        $this->connexionController = new ConnexionController();
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

                /*
                Connexion et inscription
                ***************************
                 */
                // Route pour afficher la page de connexion
                elseif ($route === 'connection'){
                    $this->connexionController->connection();
                }
                // Route pour gerer la connexion suite au formulaire
                elseif ($route === 'connect'){
                    $this->connexionController->connect();
                }

                // Route pour afficher la page d'inscription
                elseif ($route === 'inscription'){
                    $this->connexionController->inscription();
                }
                // Route pour gerer l'inscription suite au formulaire
                elseif ($route === 'registration'){
                    $this->connexionController->registration($this->request->getPost());
                }
                // ADMIN ROUTER

                // Route pour Afficher la page admin ( add article )
                elseif ($route === 'addArticle'){
                    $this->backController->addArticle($this->request->getPost());
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