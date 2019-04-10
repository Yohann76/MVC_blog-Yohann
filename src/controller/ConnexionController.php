<?php

namespace App\src\controller;

use App\config\Parameter;

class ConnexionController extends Controller
{

    /* Afficher la page de connexion */
    public function connection() {
        return $this->view->render('connection', [

        ]);
    }

    /* gérer la connexion */
    public function connect()
    {
        // Si un form est valide et envoyer :
        if (isset($_POST['email']) && ($_POST['password'])) {
            //verifier que le membre existe :
            $result = $this->userDAO->checkBDD($_POST['email'],$_POST['password']);
            // Si le résultat est vrai, on vérifie le role
            if ($result == true) {
                $role = $this->userDAO->checkRole($_POST['email']);
                // Si il est admin :
                if($role[0] == 'admin'){

                    $this->view->render('backOffice', [
                    ]);
                }
                // Si il est membre :
                else if($role[0] == 'membre'){

                }
            }
            // Si le membre n'existe pas dans la base :
            else{
                $this->view->render('connect', [
                    // envoyer message erreur
                ]);
            }
        }
        // Si le form n'est pas valide :
        else {
            $this->view->render('connect', [
            ]);
        }
    }


    /*  Afficher la page d'inscription */
    public function inscription() {
        return $this->view->render('registration', [

        ]);
    }

    /* Gérer l'inscription */
    public function registration(Parameter $post)
        {
            if($post->get('submit')) {
                $this->userDAO->addUser($post);
                header('Location: ../public/index.php'); /* a rediriger sur une page membre */
            }
            return $this->view->render('registration', [
                'post' => $post
            ]);
        }
}
