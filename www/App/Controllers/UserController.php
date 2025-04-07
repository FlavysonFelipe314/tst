<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Services\AuthService;
use App\Services\UserService;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class UserController extends Controller{

    private $AuthService;
    private $UserService;
    private $userInfo;
    private $token;

    public function __construct()
    {
        $this->AuthService = new AuthService;
        $this->UserService = new UserService;
    }

    public function index(){        

        $this->loadView("login");
    
    }

    public function cadastro(){        
        $_SESSION["active"] = "cadastrar";

        $this->loadTemplate("cadastro");    
    }

    public function actionCadastro(){        
        $_SESSION["active"] = "cadastrar";

        if($_SERVER["REQUEST_METHOD"] === "POST"){
            $name = filter_input(INPUT_POST, "name");
            $email = filter_input(INPUT_POST, "email");
            $password = filter_input(INPUT_POST, "password");
            $access = filter_input(INPUT_POST, "access");

            try{
                $this->AuthService->registerUser($name, $password, $email, $access);
                header("Location: ".BASE_DIR);
            } catch(Exception $err){
                echo "Ago deu Errado: $err";
            }
        }
    }

    public function actionLogin(){
        if($_SERVER["REQUEST_METHOD"] === "POST"){
            $email = filter_input(INPUT_POST, "email");
            $password = filter_input(INPUT_POST, "password");

            if($this->AuthService->validateLogin($email, $password)){
                header("Location: ".BASE_DIR);
            } else {
                header("Location: ".BASE_DIR) ."/login";

            }
        }
    }
    
    public function logout(){
        $this->AuthService->logout();
    }


    public function recuperarSenha(){

        if($_SERVER["REQUEST_METHOD"] === "POST"){
            $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_FULL_SPECIAL_CHARS);

            $_SESSION["emailUser"] = $email;

            $UserService = new UserService;

            if($UserService->findBy("email", $email)){
                echo "<script>alert('um email foi enviado para $email, siga as instruções para recuperar sua senha')</script>";

                $mail = new PHPMailer(true);
                $timeCookie = md5(time().rand(0, 9999));
                setcookie("tokenRecovery", $timeCookie, time() + 10 * 60, "/");

                try {
                    $mail->isSMTP();                                            
                    $mail->Host       = 'smtp.gmail.com';                     
                    $mail->SMTPAuth   = true;                                   
                    $mail->Username   = 'flavysonfelipe314@gmail.com';                     
                    $mail->Password   = 'bafi gago ckrh sszi';            
                    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            
                    $mail->Port       = 465;                                    
    
                    $mail->addAddress($email);               
                    
                    $mail->isHTML(true);                                  
                    $mail->Subject = 'Recuperar Senha';
                    $mail->Body    = "
                    <a href='".BASE_DIR."/novaSenha?token=".$timeCookie."'>
                        <button>Clique aqui</button>
                    </a>

                    <p>ou clique aqui caso o botão não funciona: <a href='".BASE_DIR."/novaSenha?token=".$timeCookie."'>".BASE_DIR."/recuperar?token=".$timeCookie."</a></p>
                    ";
    
                    $mail->send();
                } catch (Exception $e) {
                    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                }
            } else{
                echo "<script>alert('O email $email, não existe na base de dados')</script>";
            }
        }

        $this->loadView("recuperar");
    }


    public function novaSenha(){

        if($_SERVER["REQUEST_METHOD"] === "GET"){
            $token = filter_input(INPUT_GET, "token");

            if($_COOKIE['tokenRecovery'] != $token){
                header("Location: ".BASE_DIR."/recuperar");
            }
        }

        if($_SERVER["REQUEST_METHOD"] === "POST"){

            $senha = filter_input(INPUT_POST, "senha", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $confirmarSenha = filter_input(INPUT_POST, "confirmarSenha", FILTER_SANITIZE_FULL_SPECIAL_CHARS);

            if($senha != $confirmarSenha){
                echo "As senhas não batem";
            } else{
                $User = $this->UserService->findBy("email", $_SESSION["emailUser"]);

                $hash = password_hash($senha, PASSWORD_BCRYPT);
                
                $User->setPassword($hash);

                $this->AuthService->updateUser($User);

                header("Location: ".BASE_DIR);
                
            }
        }


        $this->loadView("newPass");
    }

    public function listar()
    {        
        $UserService = new UserService;
        $usuarios = $UserService->findAll();

        $_SESSION["active"] = "listar";

        $data = [
            "user" => $this->userInfo,
            "usuarios" => $usuarios,
        ];

        $this->loadTemplate("listar", $data);
    }


    public function delete($id)
    {        
        $UserService = new UserService;
        $UserService->delete($id);

        header("Location: ".BASE_DIR."/listar");
    }


    public function edit($id)
    {        
        $UserService = new UserService;
        $usuario = $UserService->findBy("id", $id);

        $data = [
            "user" => $this->userInfo,
            "usuario" => $usuario,
        ];

        $this->loadTemplate("editarUsuario", $data);
    }


    public function editarAction()
    {   
        if($_SERVER["REQUEST_METHOD"] === "POST"){
            $name = filter_input(INPUT_POST, "name");
            $email = filter_input(INPUT_POST, "email");
            $password = filter_input(INPUT_POST, "password");
            $access = filter_input(INPUT_POST, "access");
            $id = filter_input(INPUT_POST, "action");
            
            $UserService = new UserService;
            $UserService->update($name, $email, $password, $access, $id);

            header("Location: ".BASE_DIR."/listar");

        }
    }

    public function perfil(){

        $this->userInfo = $this->AuthService->checkToken();
         
        $data = [
            "user" => $this->userInfo,
        ];

        $this->loadTemplate("perfil", $data);
    }

}

