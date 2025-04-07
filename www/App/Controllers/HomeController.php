<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Services\AuthService;
use App\Services\PatientService;

class HomeController extends Controller{

    // private $userInfo;

    public function __construct()
    {
        // $AuthService = new AuthService();
        // $this->userInfo = $AuthService->checkToken();    
    }

    public function index()
    {        
        $data = [
            "status" => "ok",
            "message" => "Bem vindo ao sistema",
        ];

        echo json_encode($data);
        exit;
    }
}

