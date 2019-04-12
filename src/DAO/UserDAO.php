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
        $user->setFirstName($row['firstName']);
        $user->setLastName($row['lastName']);
        $user->setPassword($row['password']);
        $user->setRole($row['role']);
        return $user;
    }

    public function addUser(Parameter $post)
    {
        $sql = 'INSERT INTO users (first_name,last_name,mail,password) VALUES (?,?,?,?)';
        $this->createQuery($sql, [$post->get('firstName'), $post->get('lastName'), $post->get('mail'), $post->get('password')]);
    }

    public function checkBDD(Parameter $post) {
        $sql = 'SELECT * FROM users WHERE mail = ? AND password = ?';
        $result = $this->createQuery($sql,[$post->get('mail'),$post->get('password')]);
        $user = $result->fetch();
        $result->closeCursor();
        // return $this->buildObject($user);
        return $user ;
    }

    public function checkRole($post) {
        $sql = 'SELECT role FROM users WHERE mail = ?';
        $result = $this->createQuery($sql,[$post->get('mail')]);
        $role = $result->fetch();
        return $role;
    }

}
