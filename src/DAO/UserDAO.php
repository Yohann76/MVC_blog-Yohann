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


    /**
     * @param $post
     * @return mdp -> Mail
     */
    public function getHash($post){
        $sql = 'SELECT password FROM users WHERE mail = ?';
        //  $result = $this->createQuery($sql,[$post->get('mail') ]); // Fait une erreur
        $result = $this->createQuery($sql, [$post]);
        $hash = $result->fetch();
        return $hash;  // On a bien le hash de la database
    }

    // Return la liste d'utilisateur admin

    /**
     * @return array admin
     */
    public function getListUsersAdmin(){
        $sql = 'SELECT * FROM users WHERE role = "admin" ';
        $result = $this->createQuery($sql);
        $admin = [];
        foreach ($result as $row){
            $adminId = $row['id'];
            $admin[$adminId] = $this->buildObject($row);
        }
        $result->closeCursor();
        return $admin;
    }

    /**
     * @return array members
     */
    public function getListUsersMembers(){
        $sql = 'SELECT * FROM users WHERE role = "membre" ';
        $result = $this->createQuery($sql);
        $members = [];
        foreach ($result as $row){
            $membersId = $row['id'];
            $members[$membersId] = $this->buildObject($row);
        }
        $result->closeCursor();
        return $members;
    }

    // declassement de l'administrateur
    public function downgradeadmin($post){
        $sql = 'UPDATE users SET role = "membre"  WHERE id=?;';
        $this->createQuery($sql, [$post]   );
    }

    //  Mise a niveau d'un membre
    public function upGradeMember($post){
        $sql = 'UPDATE users SET role = "admin"  WHERE id=?;';
        $this->createQuery($sql, [$post]   );
    }
    ////////////////////////////////////////////////////////
    /* Stats Back office */
    public function nbrArticle(){
        $sql = 'SELECT COUNT(*) FROM article';
        $result = $this->createQuery($sql);
        $nbrArticle = $result->fetch() ;
        return $nbrArticle ;
    }


    public function nbrCommentVerified(){
        $sql = 'SELECT COUNT(*) FROM comment WHERE verified = "true" ';
        $result = $this->createQuery($sql);
        $nbrCommentVerified = $result->fetch() ;
        return $nbrCommentVerified ;
    }

    public function nbrCommentNotVerified(){
        $sql = 'SELECT COUNT(*) FROM comment WHERE verified = "false" ';
        $result = $this->createQuery($sql);
        $nbrCommentNotVerified = $result->fetch() ;
        return $nbrCommentNotVerified ;
    }

    public function nbrMembers(){
        $sql = 'SELECT COUNT(*) FROM users WHERE role = "membre" ';
        $result = $this->createQuery($sql);
        $nbrMembers = $result->fetch() ;
        return $nbrMembers;
    }

    public function nbrAdmin(){
        $sql = 'SELECT COUNT(*) FROM users WHERE role = "admin" ';
        $result = $this->createQuery($sql);
        $nbrAdmin = $result->fetch() ;
        return $nbrAdmin ;
    }



}
