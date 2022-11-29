<?php

namespace App\Controllers;

use App\Controllers\Controller;
use App\Exceptions\NotFoundException;

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
                $_SESSION['mod-user']['id'] = $student->id;
                $_SESSION['mod-user']['mat'] = $student->registration_number;
                $_SESSION['mod-user']['picture'] = $student->picture;
                return $this->view("personals.profile", "layout_admin", ["personal" => $student]);
            }
            return $this->view("static.404", "layouts", ['message' => "Le personel que vous rechercher est introuvable."]);
        }
        $this->askLogin();
    }
    public function updateData()
    {
        return $this->view("personals.update-data", "layout_admin", ['message' => "L'étudiant que vous rechercher est introuvable."]);
    }

    public function profile()
    {
        if ($this->isLoggedIn('personal')) {
            $process = $this->getPersonalProcess();
            $student = $process->personal->findPersonalData("registration_number", $_SESSION['personal']['mat'])->fetch();
            $_SESSION['mod-user']['id'] = $student->id;
            $_SESSION['mod-user']['mat'] = $student->registration_number;
            $_SESSION['mod-user']['picture'] = $student->picture;

            return $this->view("personals.profile", "layout_simple", ["personal" => $student]);
        }
        $this->askLogin(true);
    }
    public function resetPassword()
    {
        return $this->view("auth.reset-password", 'layout');
    }
    public function getDocs()
    {
        if ($this->isLoggedIn('personal')) {
            $process = $this->getStudentProcessor();
            $docs = $process->loadData($process->docs->findForPersonal());
            return $this->view("personals.docs", 'layout_simple', ['docs' => $docs]);
        }
        $this->askLogin(true);
    }
    public function getDocsAdminPersonal()
    {
        if ($this->isLoggedIn()) {
            $id = $_GET['id'];
            $process = $this->getStudentProcessor();
            $docs = $process->loadData($process->docs->findForPersonal($id));
            return $this->view("personals.docs", 'layout_admin', ['docs' => $docs]);
        }
        $this->askLogin();
    }
    
    public function modify()
    {
        if ($this->isGetMethod()) {
            if ($this->isLoggedIn('personal')) {
                $process = $this->getPersonalProcess();
                $fac = $this->getFacultyProcessor();
                $dep = $this->getDepartmentProcessor();
                $prom = $this->getPromotionProcessor();
                $departments = $dep->getAll();
                $faculties = $fac->getAll();
                $promotions = $prom->getAll();

                $student = $process->personal->findPersonalData("registration_number", $_SESSION['personal']['mat'])->fetch();
                return $this->view("personals.modify", 'layout_simple', ["personal" => $student, 'faculties' => $faculties, "departments" => $departments, 'promotions' => $promotions]);
            }
            $this->askLogin(true);
        }
    }
    public function _modify()
    {
        if ($this->isLoggedIn('personal')) {
            $process = $this->getPersonalProcess();
            $fac = $this->getFacultyProcessor();
            $dep = $this->getDepartmentProcessor();
            $prom = $this->getPromotionProcessor();
            $departments = $dep->getAll();
            $faculties = $fac->getAll();
            $promotions = $prom->getAll();
            $process->updatePersonalProcess();
            if ($process->hasErrors()) {
                $student = $process->personal->findPersonalData("registration_number", $_SESSION['personal']['mat'])->fetch();
                return $this->view("personals.modify", 'layout_simple', ['errors' => $process->getErrors(), "student" => $student, 'faculties' => $faculties, "departments" => $departments, 'promotions' => $promotions]);
            } else {
                $process->personal->updateData($process);
                if ($process->photo_updated) {
                    unlink(FILES . "users" . DIRECTORY_SEPARATOR . $_SESSION['personal']['picture']);
                    $this->uploadFile($process->user_profile['tmp_name'], FILES . "users" . DIRECTORY_SEPARATOR . $process->profile_file);
                }
                $this->redirect('/profile');
            }
        } else {
            $this->askLogin(true);
        }

    }
    public function modifyByAdmin()
    {
        if ($this->isGetMethod()) {
            if ($this->isLoggedIn()) {
                $mat = $_GET['mat'];
                $process = $this->getPersonalProcess();
                $fac = $this->getFacultyProcessor();
                $dep = $this->getDepartmentProcessor();
                $prom = $this->getPromotionProcessor();
                $departments = $dep->getAll();
                $faculties = $fac->getAll();
                $promotions = $prom->getAll();

                $student = $process->personal->findPersonalData("registration_number", $mat)->fetch();
                return $this->view("admin.modify-personal", 'layout_admin', ["personal" => $student, 'faculties' => $faculties, "departments" => $departments, 'promotions' => $promotions]);
            }
            $this->askLogin();
        }
    }
    public function _modifyByAdmin()
    {
        if ($this->isLoggedIn()) {
            $mat = $_GET['mat'];
            $process = $this->getPersonalProcess();
            $fac = $this->getFacultyProcessor();
            $dep = $this->getDepartmentProcessor();
            $prom = $this->getPromotionProcessor();
            $departments = $dep->getAll();
            $faculties = $fac->getAll();
            $promotions = $prom->getAll();
            $process->updatePersonalProcess();
            $student = $process->personal->findPersonalData("registration_number", $mat)->fetch(); 
            if ($process->hasErrors()) {
                return $this->view("admin.modify-personal", 'layout_admin', ['errors' => $process->getErrors(), "student" => $student, 'faculties' => $faculties, "departments" => $departments, 'promotions' => $promotions]);
            } else {
                $process->personal->updateData($process, $student->id);
                if ($process->photo_updated) {
                    unlink(FILES . "users" . DIRECTORY_SEPARATOR . $_SESSION['personal']['picture']);
                    $this->uploadFile($process->user_profile['tmp_name'], FILES . "users" . DIRECTORY_SEPARATOR . $process->profile_file);
                }
                $this->redirect('/admin/personals');
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
        if($this->isLoggedIn() OR $this->isLoggedIn('personal')){

            if ($this->isGetMethod()) {
                if ($this->isLoggedIn('personal')) {
                    $process = $this->getPersonalProcess();
                    $docs = $process->loadData($process->docs->findDoctype('personal'));
                    return $this->view('personals.add-docs', 'layout_simple', ['documents' => $docs]);
                }$this->askLogin(true);
            }
        }else $this->askLogin(true);
    }
    public function _addDocs()
    {
        if($this->isLoggedIn() OR $this->isLoggedIn('personal')){

            if ($this->isPostMethod()) {
                if ($this->isLoggedIn('personal')) {
                    $process = $this->getPersonalProcess();
    
                    $process->addDocsProcess();
                    $docs = $process->loadData($process->docs->findDoctype('personal'));

                    if ($process->hasErrors()) {
                        return $this->view('admin.add-docs', 'layout_simple', ['errors' => $process->getErrors(), 'documents' => $docs]);
                    } else {
                        $process->docs->new($process);
                        $this->uploadFile($process->doc['tmp_name'], FILES . "docs" . DIRECTORY_SEPARATOR . $process->document_file);
                        return $this->view('personals.add-docs-success', 'layout_simple');
                    }
                }$this->askLogin(true);
            }
        }else $this->askLogin(true);
    }
    public function addDocsByAdmin()
    {
        if($this->isLoggedIn()){

            if ($this->isGetMethod()) {
                $id = $_GET['id'];
                    $process = $this->getPersonalProcess();
                    $docs = $process->loadData($process->docs->findDoctype('personal'));
                    return $this->view('admin.add-docs-admin', 'layout_admin', ['documents' => $docs]);
            }
        }
        else $this->askLogin();
    }
    public function _addDocsByAdmin()
    {
        if($this->isLoggedIn()){

            if ($this->isPostMethod()) {
                
                    $process = $this->getPersonalProcess();
                    $id = $_GET['id'];
                    $process->addDocsProcess();
                    $docs = $process->loadData($process->docs->findDoctype('personal'));

                    if ($process->hasErrors()) {
                        return $this->view('admin.add-docs-admin', 'layout_admin', ['errors' => $process->getErrors(), 'documents' => $docs]);
                    } else {
                        $process->docs->new($process);
                        $this->uploadFile($process->doc['tmp_name'], FILES . "docs" . DIRECTORY_SEPARATOR . $process->document_file);
                        return $this->view('personals.add-docs-success', 'layout_simple');
                    }
            }
        }else $this->askLogin();
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
        }else $this->askLogin();
    }
    public function updateDocs()
    {
        if ($this->isGetMethod()) {
            if ($this->isLoggedIn('personal')) {
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
            if ($this->isLoggedIn('personal')) {
                $process = $this->getStudentProcessor();
                $id = $_GET['id'];
                $process->updateDocsProcess();
                if ($process->hasErrors()) {
                    return $this->view('personals.update-docs', 'layout_simple', ['errors' => $process->getErrors()]);
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
    public function updateDocsByAdmin()
    {
        if ($this->isGetMethod()) {
            if ($this->isLoggedIn()) {
                $id = $_GET['id'];
                $process = $this->getPersonalProcess();
                $data = $process->docs->findOne($id, "id")->fetch();
                return $this->view('students.update-docs', 'layout_simple', ['doc' => $data]);
            }$this->askLogin();
        }
    }
    public function _updateDocsByAdmin()
    {
        if ($this->isPostMethod()) {
            if ($this->isLoggedIn()) {
                $process = $this->getPersonalProcess();
                $id = $_GET['id'];
                $process->updateDocsProcess();
                if ($process->hasErrors()) {
                    return $this->view('personals.update-docs', 'layout_simple', ['errors' => $process->getErrors()]);
                } else {
                    if ($process->document_file === null) {
                        $process->docs->updateOne($process, $id, false);
                    } else {
                        $process->docs->updateOne($process, $id);
                        $this->uploadFile($process->doc['tmp_name'], FILES . "docs" . DIRECTORY_SEPARATOR . $process->document_file);
                    }
                    return $this->view('students.update-docs-success', 'layout_simple');
                }
            }$this->askLogin();
        }
    }
    public function getAll(){
        if($this->isLoggedIn()){
            $s = $this->getPersonalProcess();
            $personals = $s->loadData($s->personal->findRegisteredOnly());
            $fn = $this->getFunctionProcessor();
            $fnx = $fn->getAll();

            return $this->view('personals.only-registered', 'layout_admin', ['personals' => $personals, 'fnx' => $fnx]);
        }else $this->askLogin();
    }
    public function getByType(){
        if($this->isLoggedIn()){
            $id = explode("/",$_GET['url'])[4];
            $s = $this->getPersonalProcess();
            $personals = $s->loadData($s->personal->findRegisteredOnlyBy($id));
            $fn = $this->getFunctionProcessor();
            $fnx = $fn->getAll();

            if(count($personals) > 0)
            return $this->view('personals.only-registered-type', 'layout_admin', ['personals' => $personals, 'fnx' => $fnx]);
            else throw new NotFoundException("Ce type de personnel n'existe pas encore ou ne sont pas inscrits");
        }else $this->askLogin();
    }
}

