<?php

namespace App\src\controller;

use App\config\Parameter;

class ConnexionController extends Controller
{
    /**
     * @param Parameter $post form connection
     */
    public function connect(Parameter $post)
    {
        // Si le formulaire de connection est envoyer :
        if($post->get('submit')) {
            $this->userDAO->getHash($post->get('mail'));
           // Check si le membre existe
            $result = $this->userDAO->checkUser($post);
            // Si un compte existe
            if ($result == true) {
                $role = $this->userDAO->checkRole($post);

                $this->session->set('userFirst_name', $result->getFirstName() ) ;
                $this->session->set('userLast_name', $result->getLastName() ) ;
                $this->session->set('userMail', $result->getEmail() ) ;
                $this->session->set('userId', $result->getId() ) ;

                // Si il est admin :
                if($role[0] == 'admin'){
                    $this->session->set('user', 'admin' ) ;
                    header('Location: ../public/index.php?route=displayAdmin'); /* a rediriger sur une page membre */

                }
                // Si il est membre :
                else if($role[0] == 'membre'){
                    $this->session->set('user', 'membre' ) ;
                    return $this->view->render('members', [
                    ]);
                }
            }
            // Si le comtpe existe pas
            else if ($result == false ){
                return $this->view->render('connection', [
                ]);
            }
        }
    }

    /**
     * @param Parameter $post Form inscription
     */
    public function registration(Parameter $post)
    {
        if($post->get('submit')) {
            $this->userDAO->addUser($post);
            header('Location: ../public/index.php');
        }
            return $this->view->render('connection', [
                'post' => $post
            ]);
    }



} // end class
