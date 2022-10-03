<?php
 
namespace App\Controllers;

use App\Controllers\Controller;

 class TestController extends Controller{
    public function std(){
        $processor = $this->getStudentProcessor();
        $processor->findLastId();
        return $this->view('static.student-register-success','layout');
    }
 }