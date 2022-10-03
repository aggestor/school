<?php
namespace App\Controllers;

class StaticController extends Controller {
    public function index(){
        $this->redirect("/auth/connexion");
    }
}