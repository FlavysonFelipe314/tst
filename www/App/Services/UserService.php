<?php

namespace App\Services;

use App\Models\User;
use App\Repository\UserRepository;
use Exception;

class UserService{
    
    private $UserRepository;

    public function __construct()
    {
        $this->UserRepository = new UserRepository;
    }

    public function addUser(){
    }

    public function findAll(){
        $data = $this->UserRepository->findAll();
        return $data;
    }

    public function findBy($key, $value){
        $data = $this->UserRepository->findBy($key, $value);
        return $data;
    }

    public function findAllBy($key, $value){
        $data = $this->UserRepository->findAllBy($key, $value);
        return $data;
    }

    public function update($name, $email, $password, $access, $id){
        $User = $this->UserRepository->findBy("id", $id);
        if($User){
            try{
                $hash = password_hash($password, PASSWORD_BCRYPT);

                $User->setName($name);
                $User->setEmail($email);
                $User->setPassword($hash);
                $User->setAccess($access);

                $this->UserRepository->update($User);
            } catch(Exception $err){
                echo "Algo deu Errado: $err";
            }
        }  else{
            return false;
        }
    }
    
    public function delete($id){
        $this->UserRepository->delete($id);
        return true;
    }

}