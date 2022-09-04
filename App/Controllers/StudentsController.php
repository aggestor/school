<?php
 
namespace App\Controllers;

use App\Controllers\Controller;

 class StudentsController extends Controller{
   public function registration(){
         $fac = $this->getFacultyProcessor();
         $dep = $this->getDepartmentProcessor();
         $departments = $dep->getAll();
         $faculties = $fac->getAll();
         return $this->view("students.registration", "layout", ['faculties' => $faculties, "departments" => $departments]);
   }
   public function __registration(){
      $process = $this->getStudentProcessor();
            $process->identifyStudentProcess();
            if($process->hasErrors()){
               $errors = $process->getErrors();
               return $this->view("students.registration", "layout", ["errors" => $errors]);
            }else{
               $process->student->new($process);
               $this->uploadFile($process->user_profile['tmp_name'],FILES."users".DIRECTORY_SEPARATOR.$process->profile_file);
               $this->uploadFile($process->document['tmp_name'],FILES  . "docs" . DIRECTORY_SEPARATOR . $process->document_file);
               return $this->view("students.registration", "layout", ['success']);
            }
    }
 }