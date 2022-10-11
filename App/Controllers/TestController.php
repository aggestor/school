<?php
 
namespace App\Controllers;

use App\Controllers\Controller;

 class TestController extends Controller{
    public function std(){
        $processor = $this->getStudentProcessor();
        $processor->findLastId();
        return $this->view('admin.register_success','layout_admin', ['mail' =>'aggeer.aa@gmail.com']);
    }
 }