<?php

namespace App\Services;

use App\Models\User;
use App\Repository\UserRepository;

class AuthService{

    private $userRepository;

    public function __construct()
    {
        $this->userRepository = new UserRepository();
    }

    public function checkToken(){
        if(!empty($_SESSION["token"])){
            $token = $_SESSION["token"];

            $user = $this->userRepository->findBy("token", $token);

            if(!empty($user)){
                return $user;
                exit;
            }
        }

        header("Location:".BASE_DIR."/login");
    }

    public function registerUser($name, $password, $email, $access){
        $token = bin2hex(random_bytes(32));
        $hash = password_hash($password, PASSWORD_BCRYPT);
        $avatar = "default_avatar.png";

        $user = new User;
        $user->setName($name);
        $user->setPassword($hash);
        $user->setEmail($email);
        $user->setAccess($access);
        $user->setToken($token);
        $user->setAvatar($avatar);

        $this->userRepository->create($user);
    }


    public function updateUser(User $u){
        $this->userRepository->update($u);
        return true;
    }

    public function validateLogin($email, $password){
        $user = $this->userRepository->findBy("email", $email);

        if(!empty($user) && password_verify($password, $user->getPassword())){
            $token = bin2hex(random_bytes(32));

            $_SESSION["token"] = $token;
            $user->setToken($token);

            $this->userRepository->update($user);

            $_SESSION["cargo"] = $user->getAccess();


            return true;
            exit;
        }

        return false;
    }

    public function logout(){
        session_unset();
        unset($_SESSION["token"]);
        unset($_SESSION["cargo"]);
        session_destroy();
        header("Location: ". BASE_DIR);
    }

}