<?php

  class UserCrud{
    public $baseCrud;

    public function __construct($crud){
      $this -> baseCrud = $crud;
    }

    public function createUser($name, $email, $password){
      return $this -> baseCrud -> createRow('INSERT INTO users (name, email, password) VALUES 
        (:name, :email, :password)', array(':name' => $name, 
        ':email' => $email, ':password' => $password));
    }

    public function readUserByEmail($email){
      return $this -> baseCrud -> readOneRow('SELECT * FROM users WHERE email = :email', array(':email' => $email));
    }

    public function readAllUsers(){
      return $this -> baseCrud -> readManyRows('SELECT * FROM users', array());
    }

    public function updateUser($userArray, $email){
      $this -> baseCrud -> updateRow('UPDATE users SET name = :name, email = :email, password = :password WHERE email = :email2', 
      array(':name' => $userArray['name'], ':email' => $userArray['email'], 
      ':password' => $userArray['password'], ':email2' => $email));
    }

    public function deleteUser($email){
      $this -> baseCrud -> deleteRow('DELETE FROM users * WHERE email = :email', array(':email', $email));
    }
  }


?>