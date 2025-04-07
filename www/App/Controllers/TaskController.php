<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Services\AuthService;
use App\Services\TaskService;
use Exception;

class TaskController extends Controller{

    // private $userInfo;
    private $TaskService;

    public function __construct()
    {
        $this->TaskService = new TaskService;
        // $AuthService = new AuthService();
        // $this->userInfo = $AuthService->checkToken();    
    }

    public function create()
    {        
        $this->_validateRequestMethod("POST");

        try{
            $input = json_decode(file_get_contents("php://input"), true);

            $title = $input["title"];
            $description = $input["description"];

            if($this->TaskService->createTask($title, $description)){
            
                $data = [
                    "status" => "Sucesso",
                    "message" => "Tarefa Criada com Sucesso",
                ];
    
                echo json_encode($data);
                exit;
            }
        } catch(Exception $e){
            $data = [
                "status" => "error",
                "message" => $e->getMessage(),
            ];
            
            echo json_encode($data);
            exit;
        }
    }

    public function update($id){
        $this->_validateRequestMethod("PUT");

        try{
            $input = json_decode(file_get_contents("php://input"), true);
            $title = $input["title"];
            $description = $input["description"];

            if($this->TaskService->updateTask($id, $title, $description)){
                $data = [
                    "status" => "Sucesso",
                    "message" => "Tarefa Atualizada com Sucesso",
                ];

                echo json_encode($data);
                exit;
            }

        } catch(Exception $e){
            $data = [
                "status" => "error",
                "message" => $e->getMessage(),
            ];
        }
    }

    public function delete($id){
        $this->_validateRequestMethod("DELETE");
        try{
            if($this->TaskService->deleteTask($id)){
                $data = [
                    "status" => "Sucesso",
                    "message" => "Tarefa Deletada com Sucesso",
                ];
                echo json_encode($data);
                exit;
            }
        } catch (Exception $e){
            $data = [
                "status" => "error",
                "message" => $e->getMessage(),
            ];
        }
        
    }


    public function findAll()
    {        
        $this->_validateRequestMethod("GET");

        try{
            $tasks = $this->TaskService->findAll();

            if($tasks){
                
                $data = [];

                foreach($tasks as $task){
                    $data[] = [
                        "id" => $task->getId(),
                        "title" => $task->getTitle(),
                        "description" => $task->getDescription(),
                    ];
                }

                echo json_encode($data);
                exit;
            }

            $data = [
                "status" => "info",
                "message" => "Nenhum registro encontrado",
            ];
    
            echo json_encode($data);
            exit;
        } catch(Exception $e){
            $data = [
                "status" => "error",
                "message" => $e->getMessage(),
            ];

            echo json_encode($data);
            exit;
        }
    }

    public function findBy($id){
        $this->_validateRequestMethod("GET");
        try{
            $task = $this->TaskService->findBy("id", $id);
            if($task){
                $data = [
                    "id" => $task->getId(),
                    "title" => $task->getTitle(),
                    "description" => $task->getDescription(),
                ];
                echo json_encode($data);
                exit;
            }
            
            $data = [
                "status" => "info",
                "message" => "Nenhum registro encontrado",
            ];
            echo json_encode($data);
            exit;

        } catch(Exception $e){
            $data = [
                "status" => "error",
                "message" => $e->getMessage(),
            ];

            echo json_encode($data);
            exit;
        }
       
    }

    public function search(){
        $this->_validateRequestMethod("GET");
        try{
            $query = filter_input(INPUT_GET, "query", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $tasks = $this->TaskService->search($query);
            if($tasks){
                $data = [];
                foreach($tasks as $task){
                    $data[] = [
                        "id" => $task->getId(),
                        "title" => $task->getTitle(),
                        "description" => $task->getDescription(),
                    ];
                }
                echo json_encode($data);
                exit;
            }
            
            $data = [
                "status" => "info",
                "message" => "Nenhum registro encontrado",
            ];
            
            echo json_encode($data);
            exit;

        } catch(Exception $e){
            $data = [
                "status" => "error",
                "message" => $e->getMessage(),
            ];
            echo json_encode($data);
            exit;
        }
      
    }

    private function _validateRequestMethod($request){
        if($_SERVER["REQUEST_METHOD"] != $request){
            $data = [
                "status" => "error",
                "message" => "Metodo De requisição não permitido, apenas: $request",
            ];
    
            echo json_encode($data);
            exit;
        }
    }

}

