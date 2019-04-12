<?php

namespace App\src\controller;

use App\config\Parameter;

class ConnexionController extends Controller
{
    /**
     * @param Parameter $post
     */
    public function connect(Parameter $post)
    {
        // Si le form est envoyer :
        if($post->get('submit')) {
            // check si le membre existe
            $result = $this->userDAO->checkBDD($post);
            // Si un compte existe
            if ($result == true) {
                $role = $this->userDAO->checkRole($post);
                // Si il est admin :
                if($role[0] == 'admin'){
                    $this->view->render('backOffice', [
                    ]);
                }
                // Si il est membre :
                else if($role[0] == 'membre'){

                }
            }
            // Si rien a été trouver
            else if ($result == false ){
                return $this->view->render('connection', [
                ]);
            }
        }

    }

    /**
     * @param Parameter $post
     */
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
} // end class
