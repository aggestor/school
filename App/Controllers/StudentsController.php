<?php

namespace App\Controllers;

use App\Controllers\Controller;
use App\Models\DocModel;

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
        if($this->isLoggedIn()){

            $process = $this->getStudentProcessor();
            $mat = $_GET['mat'];
            $student = $process->student->findStudentData("registration_number", $mat)->fetch();
            if ($student) {
                return $this->view("students.profile", "layout_simple", ["student" => $student]);
            }
            return $this->view("static.404", "layouts", ['message' => "L'étudiant que vous rechercher est introuvable."]);
        }
        $this->askLogin();
    }
    public function updateData()
    {
        return $this->view("students.update-data", "layout_simple", ['message' => "L'étudiant que vous rechercher est introuvable."]);
    }
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
                $_SESSION['student']["email"] = $student->mail_address;
                $_SESSION['student']["mat"] = $student->registration_number;
                $_SESSION['student']["password"] = $student->password;
                $_SESSION['student']["picture"] = $student->picture;
                $_SESSION['user']['type'] = 'student';
                $this->redirect("/my-profile");
            }
        }
    }
    public function logout(){
            unset($_SESSION["student"]);
            session_destroy();
            $this->redirect('/');
    }
    public function profile(){
        if($this->isLoggedIn('student')){
            $process = $this->getStudentProcessor();
            $student = $process->student->findStudentData("registration_number", $_SESSION['student']['mat'])->fetch();
            return $this->view("students.profile", "layout_simple", ["student" => $student]);
        }
        $this->askLogin(true);
    }
    public function resetPassword(){
        return $this->view("auth.reset-password", 'layout');
    }
    public function getDocs(){
        if($this->isLoggedIn('student')){
            $process = $this->getStudentProcessor();
            $docs = $process->loadData($process->docs->findForStudent());
            return $this->view("students.docs", 'layout_simple', ['docs' => $docs]);
        }
        $this->askLogin(true);
    }
    public function modify(){
        if($this->isGetMethod()){
            if($this->isLoggedIn('student')){
                $process = $this->getStudentProcessor();
                $fac = $this->getFacultyProcessor();
                $dep = $this->getDepartmentProcessor();
                $prom = $this->getPromotionProcessor();
                $departments = $dep->getAll();
                $faculties = $fac->getAll();
                $promotions = $prom->getAll();
    
                $student = $process->student->findStudentData("registration_number", $_SESSION['student']['mat'])->fetch();
                return $this->view("students.modify", 'layout_simple',["student" => $student,'faculties' => $faculties, "departments" => $departments, 'promotions' => $promotions]);
            }
            $this->askLogin(true);
        }
    }
    public function _modify(){
        if($this->isLoggedIn('student')){
            $process = $this->getStudentProcessor();
            $fac = $this->getFacultyProcessor();
            $dep = $this->getDepartmentProcessor();
            $prom = $this->getPromotionProcessor();
            $departments = $dep->getAll();
            $faculties = $fac->getAll();
            $promotions = $prom->getAll();
            $process->updateStudentProcess();
            if($process->hasErrors()){
                $student = $process->student->findStudentData("registration_number", $_SESSION['student']['mat'])->fetch();
                return $this->view("students.modify", 'layout_simple',['errors' => $process->getErrors(),"student" => $student,'faculties' => $faculties, "departments" => $departments, 'promotions' => $promotions]);
            }else{
               $process->student->updateData($process);
               if($process->photo_updated){
                    unlink(FILES . "users" . DIRECTORY_SEPARATOR . $_SESSION['student']['picture']);
                    $this->uploadFile($process->user_profile['tmp_name'], FILES . "users" . DIRECTORY_SEPARATOR . $process->profile_file);
                }
                $this->redirect('/my-profile');
            }
        }
        else $this->askLogin(true);
    }
    public function modifyByAdmin(){
        if($this->isGetMethod()){
            if($this->isLoggedIn()){
                $process = $this->getStudentProcessor();
                $fac = $this->getFacultyProcessor();
                $dep = $this->getDepartmentProcessor();
                $prom = $this->getPromotionProcessor();
                $departments = $dep->getAll();
                $faculties = $fac->getAll();
                $promotions = $prom->getAll();
    
                $student = $process->student->findStudentData("registration_number", $_SESSION['student']['mat'])->fetch();
                return $this->view("admin.modify-student", 'layout_simple',["student" => $student,'faculties' => $faculties, "departments" => $departments, 'promotions' => $promotions]);
            }
            $this->askLogin();
        }
    }
    public function _modifyByAdmin(){
        if($this->isLoggedIn()){
            $mat = $_GET['mat'];
            $process = $this->getStudentProcessor();
            $fac = $this->getFacultyProcessor();
            $dep = $this->getDepartmentProcessor();
            $prom = $this->getPromotionProcessor();
            $departments = $dep->getAll();
            $faculties = $fac->getAll();
            $promotions = $prom->getAll();
            $process->updateStudentProcess();
            if($process->hasErrors()){
                $student = $process->student->findStudentData("registration_number", $_SESSION['student']['mat'])->fetch();
                return $this->view("students.modify-student", 'layout_simple',['errors' => $process->getErrors(),"student" => $student,'faculties' => $faculties, "departments" => $departments, 'promotions' => $promotions]);
            }else{
               $process->student->updateData($process);
               if($process->photo_updated){
                    unlink(FILES . "users" . DIRECTORY_SEPARATOR . $_SESSION['student']['picture']);
                    $this->uploadFile($process->user_profile['tmp_name'], FILES . "users" . DIRECTORY_SEPARATOR . $process->profile_file);
                }
                $this->redirect('/admin/students/'.$mat);
            }
        }
        else $this->askLogin(true);
    }
    public function _resetPassword(){
        $process = $this->getStudentProcessor();
    }
    public function addDocs(){
        if($this->isGetMethod()){
            if($this->isLoggedIn('student')){
                $process = $this->getStudentProcessor();
                $docs = $process->loadData($process->docs->findDoctype());
                return $this->view('students.add-docs', 'layout_simple', ['documents' => $docs]);
            }$this->askLogin(true);
        }
    }
    public function _addDocs(){
        if($this->isPostMethod()){
            if($this->isLoggedIn('student')){
                $process = $this->getStudentProcessor();
                
                $process->addDocsProcess();
                $docs = $process->loadData($process->docs->findDoctype());

                if($process->hasErrors()){
                    return $this->view('students.add-docs', 'layout_simple', ['errors' => $process->getErrors(), 'documents' =>$docs]);
                }else {
                    $process->docs->new($process);
                    $this->uploadFile($process->doc['tmp_name'], FILES . "docs" . DIRECTORY_SEPARATOR . $process->document_file);
                    return $this->view('students.add-docs-success', 'layout_simple');
                }
            }$this->askLogin(true);
        }
    }
    public function getDocsAdminStudent()
    {
        if ($this->isLoggedIn()) {
            $id = $_GET['id'];
            $process = $this->getStudentProcessor();
            $docs = $process->loadData($process->docs->findForStudent($id));
            return $this->view("students.docs", 'layout_simple', ['docs' => $docs]);
        }
        $this->askLogin();
    }
    public function findInscription(){
        if($this->isLoggedIn()){
            $process = $this->getStudentProcessor();
            $students = $process->loadData($process->student->findAwaitingInscriptions());
            return $this->view('students.inscriptions', 'layout_admin', ['students' => $students]);
        }
        $this->askLogin();
    }
    public function confirmStudent(){
        if ($this->isLoggedIn()) {
            $mat = $_GET['mat'];
            $process = $this->getStudentProcessor();
            $students = $process->loadData($process->student->confirmData($mat));
            $this->redirect('/admin/students/'.$mat);
        }
        $this->askLogin();
    }
    public function updateDocs(){
        if($this->isGetMethod()){
            if($this->isLoggedIn('student')){
                $id = $_GET['id'];
                $process = $this->getStudentProcessor();
                $data = $process->docs->findOne($id, "id")->fetch();
                return $this->view('students.update-docs', 'layout_simple', ['doc' => $data]);
            }$this->askLogin(true);
        }
    }
    public function _updateDocs(){
        if($this->isPostMethod()){
            if($this->isLoggedIn('student')){
                $process = $this->getStudentProcessor();
                $id = $_GET['id'];
                $process->updateDocsProcess();
                if($process->hasErrors()){
                    return $this->view('students.update-docs', 'layout_simple', ['errors' => $process->getErrors()]);
                }else {
                    if($process->document_file === null){
                        $process->docs->updateOne($process,$id,false);
                    }else{
                        $process->docs->updateOne($process,$id);
                        $this->uploadFile($process->doc['tmp_name'], FILES . "docs" . DIRECTORY_SEPARATOR . $process->document_file);
                    }
                    return $this->view('students.update-docs-success', 'layout_simple');
                }
            }$this->askLogin(true);
        }
    }
    public function getAll(){
        if($this->isLoggedIn()){
            $s = $this->getStudentProcessor();
            $student = $s->loadData($s->student->findRegisteredOnly());
            return $this->view('students.only-registered', 'layout_admin', ['students' => $student]);
        }else $this->askLogin();
    }
}
