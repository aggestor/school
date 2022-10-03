<?php
 
namespace App\Controllers;

use App\Controllers\Controller;

 class TestController extends Controller{
    public function std(){
        $processor = $this->getStudentProcessor();
        $processor->findLastId();
        return $this->view('static.reset-password-mail-sent','layout', ['mail' =>'aggeer.aa@gmail.com']);
    }
 }