<?php

namespace App\Controllers;

use App\Controllers\Controller;

class PersonalsController extends Controller
{
    public function registration()
    {
        $fac = $this->getFacultyProcessor();
        $faculties = $fac->getAll();
        $f = $this->getFSDProcessor();
        $fn =$this->getFunctionProcessor();
        $fnx = $fn->getAll();
        $fsd = $f->getAll();
        return $this->view("personals.registration", "layout", ['fnx' =>$fnx,'faculties' => $faculties, 'fsd' => $fsd]);
    }
    public function __registration()
    {
        $fac = $this->getFacultyProcessor();
        $faculties = $fac->getAll();
        $f = $this->getFSDProcessor();
        $fn = $this->getFunctionProcessor();
        $fnx = $fn->getAll();
        $fsd = $f->getAll();

        $process = $this->getPersonalProcess();
        $process->identifyPersonalProcess();
        if ($process->hasErrors()) {
            $errors = $process->getErrors();
            return $this->view("personals.registration", "layout", ["errors" => $errors, 'fnx' =>$fnx,'faculties' => $faculties, 'fsd' => $fsd]);
        } else {
            $process->personal->new($process);
            $this->uploadFile($process->user_profile['tmp_name'], FILES . "users" . DIRECTORY_SEPARATOR . $process->profile_file);
            return $this->view("static.student-register-success", "layout", ['mail' => $process->user_email]);
        }
    }
    public function getPersonal()
    {
        if ($this->isLoggedIn()) {

            $process = $this->getPersonalProcess();
            $mat = $_GET['mat'];
            $student = $process->personal->findPersonalData("registration_number", $mat)->fetch();
            if ($student) {
                return $this->view("personals.profile", "layout_simple", ["personal" => $student]);
            }
            return $this->view("static.404", "layouts", ['message' => "Le personel que vous rechercher est introuvable."]);
        }
        $this->askLogin();
    }
    public function updateData()
    {
        return $this->view("personals.update-data", "layout_admin", ['message' => "L'étudiant que vous rechercher est introuvable."]);
    }
    /**
     * Render the login page from get REQUEST
     */
    public function login()
    {
        return $this->view("auth.login", 'layout');
    }
    /**
     * Login data control
     */
    public function _login()
    {
        if ($this->isPostMethod()) {
            $processor = $this->getStudentProcessor();
            $processor->loginStudentProcess();
            if ($processor->hasErrors()) {
                $errors = $processor->getErrors();
                return $this->view("auth.login", "layout", ["errors" => $errors]);
            } else {
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
    public function logout()
    {
        unset($_SESSION["student"]);
        session_destroy();
        $this->redirect('/');
    }
    public function profile()
    {
        if ($this->isLoggedIn('student')) {
            $process = $this->getStudentProcessor();
            $student = $process->student->findStudentData("registration_number", $_SESSION['student']['mat'])->fetch();
            return $this->view("students.profile", "layout_simple", ["student" => $student]);
        }
        $this->askLogin(true);
    }
    public function resetPassword()
    {
        return $this->view("auth.reset-password", 'layout');
    }
    public function docs()
    {
        if ($this->isLoggedIn('student')) {
            $process = $this->getStudentProcessor();
            $docs = $process->loadData($process->docs->findAll());
            return $this->view("students.docs", 'layout_simple', ['docs' => $docs]);
        }
        $this->askLogin(true);
    }
    public function modify()
    {
        if ($this->isGetMethod()) {
            if ($this->isLoggedIn('student')) {
                $process = $this->getStudentProcessor();
                $fac = $this->getFacultyProcessor();
                $dep = $this->getDepartmentProcessor();
                $prom = $this->getPromotionProcessor();
                $departments = $dep->getAll();
                $faculties = $fac->getAll();
                $promotions = $prom->getAll();

                $student = $process->student->findStudentData("registration_number", $_SESSION['student']['mat'])->fetch();
                return $this->view("students.modify", 'layout_simple', ["student" => $student, 'faculties' => $faculties, "departments" => $departments, 'promotions' => $promotions]);
            }
            $this->askLogin(true);
        }
    }
    public function _modify()
    {
        if ($this->isLoggedIn('student')) {
            $process = $this->getStudentProcessor();
            $fac = $this->getFacultyProcessor();
            $dep = $this->getDepartmentProcessor();
            $prom = $this->getPromotionProcessor();
            $departments = $dep->getAll();
            $faculties = $fac->getAll();
            $promotions = $prom->getAll();
            $process->updateStudentProcess();
            if ($process->hasErrors()) {
                $student = $process->student->findStudentData("registration_number", $_SESSION['student']['mat'])->fetch();
                return $this->view("students.modify", 'layout_simple', ['errors' => $process->getErrors(), "student" => $student, 'faculties' => $faculties, "departments" => $departments, 'promotions' => $promotions]);
            } else {
                $process->student->updateData($process);
                if ($process->photo_updated) {
                    unlink(FILES . "users" . DIRECTORY_SEPARATOR . $_SESSION['student']['picture']);
                    $this->uploadFile($process->user_profile['tmp_name'], FILES . "users" . DIRECTORY_SEPARATOR . $process->profile_file);
                }
                $this->redirect('/my-profile');
            }
        } else {
            $this->askLogin(true);
        }

    }
    public function _resetPassword()
    {
        $process = $this->getStudentProcessor();
    }
    public function addDocs()
    {
        if ($this->isGetMethod()) {
            if ($this->isLoggedIn('student')) {
                return $this->view('students.add-docs', 'layout_simple');
            }$this->askLogin(true);
        }
    }
    public function _addDocs()
    {
        if ($this->isPostMethod()) {
            if ($this->isLoggedIn('student')) {
                $process = $this->getStudentProcessor();

                $process->addDocsProcess();
                if ($process->hasErrors()) {
                    return $this->view('students.add-docs', 'layout_simple', ['errors' => $process->getErrors()]);
                } else {
                    $process->docs->new($process);
                    $this->uploadFile($process->doc['tmp_name'], FILES . "docs" . DIRECTORY_SEPARATOR . $process->document_file);
                    return $this->view('students.add-docs-success', 'layout_simple');
                }
            }$this->askLogin(true);
        }
    }
    public function findInscription()
    {
        if ($this->isLoggedIn()) {
            $process = $this->getPersonalProcess();
            $personals = $process->loadData($process->personal->findAwaitingInscriptions());
            return $this->view('personals.inscriptions', 'layout_admin', ['personals' => $personals]);
        }
        $this->askLogin();
    }
    public function confirmPersonal()
    {
        if ($this->isLoggedIn()) {
            $mat = $_GET['mat'];
            $process = $this->getPersonalProcess();
            $process->personal->confirmData($mat);
            $this->redirect('/admin/personals/' . $mat);
        }
        $this->askLogin();
    }
    public function updateDocs()
    {
        if ($this->isGetMethod()) {
            if ($this->isLoggedIn('student')) {
                $id = $_GET['id'];
                $process = $this->getStudentProcessor();
                $data = $process->docs->findOne($id, "id")->fetch();
                return $this->view('students.update-docs', 'layout_simple', ['doc' => $data]);
            }$this->askLogin(true);
        }
    }
    public function _updateDocs()
    {
        if ($this->isPostMethod()) {
            if ($this->isLoggedIn('student')) {
                $process = $this->getStudentProcessor();
                $id = $_GET['id'];
                $process->updateDocsProcess();
                if ($process->hasErrors()) {
                    return $this->view('students.update-docs', 'layout_simple', ['errors' => $process->getErrors()]);
                } else {
                    if ($process->document_file === null) {
                        $process->docs->updateOne($process, $id, false);
                    } else {
                        $process->docs->updateOne($process, $id);
                        $this->uploadFile($process->doc['tmp_name'], FILES . "docs" . DIRECTORY_SEPARATOR . $process->document_file);
                    }
                    return $this->view('students.update-docs-success', 'layout_simple');
                }
            }$this->askLogin(true);
        }
    }
    public function getAll(){
        if($this->isLoggedIn()){
            $s = $this->getPersonalProcess();
            $personals = $s->loadData($s->personal->findRegisteredOnly());
            return $this->view('personals.only-registered', 'layout_admin', ['personals' => $personals]);
        }else $this->askLogin();
    }
}

