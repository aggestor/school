<?php

namespace App\Controllers;

use App\Controllers\Controller;

class StudentsController extends Controller
{
    public function registration()
    {
        $fac = $this->getFacultyProcessor();
        $dep = $this->getDepartmentProcessor();
        $prom = $this->getPromotionProcessor();
        $departments = $dep->getAll();
        $faculties = $fac->getAll();
        $promotions = $prom->getAll();
        return $this->view("students.registration", "layout", ['faculties' => $faculties, "departments" => $departments, 'promotions' => $promotions]);
    }
    public function __registration()
    {
        $process = $this->getStudentProcessor();
        $process->identifyStudentProcess();
        if ($process->hasErrors()) {
            $errors = $process->getErrors();
            return $this->view("students.registration", "layout", ["errors" => $errors]);
        } else {
            $process->student->new($process);
            $this->uploadFile($process->user_profile['tmp_name'], FILES . "users" . DIRECTORY_SEPARATOR . $process->profile_file);
            return $this->view("static.student-register-success", "layout", ['mail' => $process->user_email]);
        }
    }
    public function getStudent()
    {
        $mat = $_GET['mat'];
        $process = $this->getStudentProcessor();
        $student = $process->student->findStudentData("registration_number", $mat)->fetch();
        if ($student) {
            return $this->view("students.profile", "layout_simple", ["student" => $student]);
        }
        return $this->view("static.404", "layouts", ['message' => "L'étudiant que vous rechercher est introuvable."]);
    }
    public function updateData()
    {
        return $this->view("students.update-data", "layout_simple", ['message' => "L'étudiant que vous rechercher est introuvable."]);
    }
    // public function updatePassword()
    // {
    //     // $mat = $_GET['mat'];
    //     // $process = $this->getStudentProcessor();
    //     // $student = $process->student->findStudentData("registration_number",$mat)->fetch();
    //     // if($student){
    //     //    return $this->view("students.profile", "layout_simple",["student" => $student]);
    //     // }
    //     // return $this->view("static.404","layouts",['message' => "L'étudiant que vous rechercher est introuvable."]);
    //     return $this->view("students.update-password", "layout_simple", ['message' => "L'étudiant que vous rechercher est introuvable."]);
    // }
    /**
     * Render the login page from get REQUEST
     */
    public function login(){
        return $this->view("auth.login", 'layout');
    }
    /**
     * Login data control
     */
    public function _login(){
        if($this->isPostMethod()){
            $processor = $this->getStudentProcessor();
            $processor->loginStudentProcess();
            if($processor->hasErrors()){
                $errors = $processor->getErrors();
                return $this->view("auth.login", "layout",["errors"=>$errors]);
            }else{
                $student = $processor->student_data;
                $_SESSION['student']["id"] = $student->id;
                $_SESSION['student']["email"] = $student->email;
                $_SESSION['student']["mat"] = $student->registration_number;
                $this->redirect("/my-profile");
            }
        }
    }
    public function logout(){
        if($this->isLoggedIn()){
            unset($_SESSION["student"]);
            session_destroy();
            $this->askLogin();
        }
    }
    public function profile(){
        if($this->isLoggedIn('student')){
            $process = $this->getStudentProcessor();
            $student = $process->student->findStudentData("registration_number", $_SESSION['student']['mat'])->fetch();
            return $this->view("students.profile", "layout_simple", ["student" => $student]);
        }
        $this->askLogin(true);
    }
}
