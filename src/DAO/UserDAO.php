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
        $user->setEmail($row['email']) ;
        $user->setFirstName($row['firstName']);
        $user->setLastName($row['lastName']);
        $user->setPassword($row['password']);
        $user->setRole($row['role']);
        return $user;
    }

    public function addUser(Parameter $post)
    {
        $sql = 'INSERT INTO users (first_name,last_name,mail,password) VALUES (?,?,?,?)';
        $this->createQuery($sql, [$post->get('firstName'), $post->get('lastName'), $post->get('email'), $post->get('password')]);

    }

    public function checkBDD() {
        $sql = 'SELECT * FROM users WHERE email = ? AND password = ?';
        $result = $this->sql($sql,[$email,$password]);
        $row = $result->fetch();
        return $row;
    }

    public function checkRole() {
        $sql = 'SELECT role FROM users WHERE email = ?';
        $result = $this->sql($sql,[$email]);
        $role = $result->fetch();
        return $role;
    }
}
