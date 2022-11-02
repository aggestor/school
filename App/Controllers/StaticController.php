<?php
namespace App\Controllers;

class StaticController extends Controller {
    public function index(){
        return $this->view("static.home");
    }
}