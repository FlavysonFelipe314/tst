<?php

namespace App\Services;

use App\Models\Task;
use App\Repository\TaskRepository;
use Exception;

class TaskService{

    private $taskRepository;

    public function __construct(){
        $this->taskRepository = new TaskRepository();
    }

    public function createTask($title, $description){
        try{
            $task = new Task();
            $task->setTitle($title);
            $task->setDescription($description);

            $this->taskRepository->create($task);
            
            return true;
        } catch(Exception $e){
            return $e->getMessage();
        }
    }

    public function updateTask($id, $title, $description){
        try{
            $task = new Task();
            $task->setId($id);
            $task->setTitle($title);
            $task->setDescription($description);
            $this->taskRepository->update($task);

            return true;
        }catch(Exception $e){
            return $e->getMessage();
        }
    }

    public function deleteTask($id){
        try{
            $this->taskRepository->delete($id);
            return true;
        }catch(Exception $e){
            return $e->getMessage();
        }
    }

    public function findAll(){
        try{
            $data = $this->taskRepository->findAll();

            return $data;
        } catch(Exception $e){
            return $e->getMessage();
        }
    }

    public function findBy($key, $value){
        try{
            $data = $this->taskRepository->findBy($key, $value);
            return $data;
        }catch(Exception $e){
            return $e->getMessage();
        }
    }

    public function search($query){
        try{
            $data = $this->taskRepository->search($query);
            return $data;
        }catch(Exception $e){
            return $e->getMessage();
        }
    }

}