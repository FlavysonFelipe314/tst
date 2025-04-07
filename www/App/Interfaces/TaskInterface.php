<?php

namespace App\Interfaces;

use App\Models\Task;

interface TaskInterface{
    public function create(Task $task);
    public function update(Task $task);
    public function delete($id);
    public function findAll();
    public function findBy($key, $value);
    public function search($query);
}