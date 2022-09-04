<?php

namespace App\Controllers;

class AuthController extends Controller{
    public function login(){
        return $this->view("auth.login", "layout");
    }
}