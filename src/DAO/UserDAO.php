<?php

namespace App\src\DAO;

use App\src\model\User;
use App\config\Parameter;


class UserDAO extends DAO
{

    private function buildObject($row)
    {
        $user = new User();
        $user->setId($row['id']);
        $user->setEmail($row['mail']) ;
        $user->setFirstName($row['first_name']);
        $user->setLastName($row['last_name']);
        $user->setPassword($row['password']);
        $user->setRole($row['role']);
        return $user;
    }

    public function addUser(Parameter $post)
    {
        $sql = 'INSERT INTO users (first_name,last_name,mail,password) VALUES (?,?,?,?)';
        //  $this->createQuery($sql, [$post->get('firstName'), $post->get('lastName'), $post->get('mail'), $post->get('password')]);
        $mdpHash =  password_hash($post->get('password'),PASSWORD_BCRYPT);
        $this->createQuery($sql, [$post->get('first_name'), $post->get('last_name'), $post->get('mail'), $mdpHash ] );
    }


    public function checkUser(Parameter $post) {
        $sql = 'SELECT * FROM users WHERE mail = ? AND password = ?';
        $hashUser =  $this->getHash($post->get('mail')); // Récupére le hash de la BDD
        $resultHash = password_verify($post->get('password'),$hashUser[0]);

        if ($resultHash == true ){
            $result = $this->createQuery($sql,[$post->get('mail'),  $hashUser[0] ]); // il faut que $hash soit égal a la BDD
            $user = $result->fetch();
            $result->closeCursor();
            return $this->buildObject($user); // Return un object au lieu d'un tableau
            // var_dump($this->buildObject($user) ) ;
        }
    }

    public function checkRole($post) {
        $sql = 'SELECT role FROM users WHERE mail = ?';
        $result = $this->createQuery($sql,[$post->get('mail')]);
        $role = $result->fetch();
        return $role;
    }

    // recup le hash en fonction du mail

    public function getHash($post){
        $sql = 'SELECT password FROM users WHERE mail = ?';
        //  $result = $this->createQuery($sql,[$post->get('mail') ]); // Fait une erreur
        $result = $this->createQuery($sql, [$post]);
        $hash = $result->fetch();
        return $hash;  // On a bien le hash de la database


    }


}
