<?php

namespace App\Repository;

use App\Core\Repository;
use App\Interfaces\TaskInterface;
use App\Models\Task;
use PDOException;

class TaskRepository extends Repository implements TaskInterface{

    public function create(Task $task)
    {
        try{
            $sql = $this->pdo->prepare("INSERT INTO tasks 
            (title, description) VALUES 
            (:title, :description)");

            $sql->bindValue(":title", $task->getTitle());
            $sql->bindValue(":description", $task->getDescription());
            $sql->execute();

            return true;
        } catch(PDOException){
            return false;
        }
    }
    
    public function update(Task $task)
    {
        try{
            $sql = $this->pdo->prepare("UPDATE tasks SET 
            title = :title,
            description = :description 
            WHERE id = :id");
            $sql->bindValue(":title", $task->getTitle());
            $sql->bindValue(":description", $task->getDescription());
            $sql->bindValue(":id", $task->getId());
            $sql->execute();
            
            return true;

        } catch(PDOException){
            return false;
        }
    }
    
    public function delete($id)
    {
        try{
            $sql = $this->pdo->prepare("DELETE FROM tasks WHERE id = :id");
            $sql->bindValue(":id", $id);
            $sql->execute();
            
            return true;
        } catch(PDOException){
            return false;
        }
    }
    
    public function findAll()
    {
        try{
            $sql = $this->pdo->prepare("SELECT * FROM tasks
            ORDER BY id DESC");
            $sql->execute();
    
            if($sql->rowCount() > 0){
                $data = $sql->fetchAll(\PDO::FETCH_ASSOC);
                $array = [];
                foreach($data as $item){
                    $array[] = $this->_generateTask($item);
                }
                
                return $array;
            }
        } catch(PDOException $e){
            return false;
        }
    }

    public function findBy($key, $value)
    {
        try{
            $sql = $this->pdo->prepare("SELECT * FROM tasks WHERE $key = :$key");
            $sql->bindValue(":$key", $value);
            $sql->execute();

            if($sql->rowCount() > 0){
                $data = $sql->fetch(\PDO::FETCH_ASSOC);
                return $this->_generateTask($data);
            }
        } catch(PDOException $e){
            return false;
        }
    }

    public function search($query)
    {
        try{
            $sql = $this->pdo->prepare("SELECT * FROM tasks WHERE
            title LIKE :query OR
            description LIKE :query
            ORDER BY id DESC");
            $sql->bindValue(":query", "%$query%");
            $sql->execute();

            if($sql->rowCount() > 0){
                $data = $sql->fetchAll(\PDO::FETCH_ASSOC);
                $array = [];
                foreach($data as $item){
                    $array[] = $this->_generateTask($item);
                }

                return $array;
                exit;
            }

        } catch(PDOException $e){
            return false;
        }

    }
    
    private function _generateTask($data)
    {
        $task = new Task();
        $task->setId($data['id']);
        $task->setTitle($data['title']);
        $task->setDescription($data['description']);
        $task->setCreatedAt($data['created_at']);
        $task->setUpdatedAt($data['updated_at']);
        return $task;
    }
}