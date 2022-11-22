<?php

namespace App\Controllers;

class AdminController extends Controller{

    public function index(){
        if($this->isLoggedIn()){
            $s =$this->getStudentProcessor();
            $student_count = $s->getCount($s->student->findAll());
            $not_registered_students = $s->getCount($s->student->findAwaitingInscriptions());
            $registered_students = $s->getCount($s->student->findRegisteredOnly());

            $p = $this->getPersonalProcess();
            $personal_count = $p->getCount($p->personal->findAll());
            $not_registered_personals = $p->getCount($p->personal->findAwaitingInscriptions());
            $registered_personals = $p->getCount($p->personal->findRegisteredOnly());

            $fac = $this->getFacultyProcessor();
            $faculties = $fac->getCount($fac->getAll());

            $dep = $this->getDepartmentProcessor();
            $departs = $dep->getCount($dep->getAll());
            
            $prom = $this->getPromotionProcessor();
            $promotions = $prom->getCount($prom->getAll());

            $func = $this->getFunctionProcessor();
            $funcs = $func->getCount($func->getAll());

            $fsd = $this->getFSDProcessor();
            $fsd_s = $fsd->getCount($fsd->getAll());

            $admin = $this->getAdminProcessor();
            $admins = $admin->getCount($admin->admin->findAll());

            $docs = $s->getCount($s->docs->findAll());

            $last4 = $s->loadData($s->student->findLast());
            $last4p = $p->loadData($p->personal->findLast());
            $docs = $p->getCount($p->docs->findAll());
            $p_docs = $p->getCount($p->docs->findByKeyValue('type_user', 'personal'));
            $s_docs = $p->getCount($p->docs->findByKeyValue('type_user', 'student'));
            

            return $this->view("admin.index", "layout_admin",['students_count' => $student_count, 'nrs' =>$not_registered_students, 'rs' =>$registered_students, 'fac' => $faculties, 'dep' => $departs, 'prom' => $promotions, 'funcs' => $funcs,'fsds' => $fsd_s, 'admins' => $admins, 'docs' => $docs, 'last4s' =>$last4, 'last4p' =>$last4p,'personals_count' =>$personal_count,'rp'=>$registered_personals, 'nrp' =>$not_registered_personals, 'docs' =>$docs, 'p_docs' =>$p_docs, 's_docs' => $s_docs]);
        }
        $this->askLogin();
    }
    public function login(){
        if($this->isLoggedIn()){
            $this->redirect("/admin");
        }
        return $this->view("admin.login", "layout");
    }
    public function profile(){
        if($this->isLoggedIn()){
            return $this->view("admin.profile", "layout_admin", ['user' => $_SESSION['admin']]);
        }
        $this->askLogin();
    }
    public function all(){
        if($this->isLoggedIn()){
            $processor = $this->getAdminProcessor();
            $admins = $processor->getAllAdmins();
            return $this->view("admin.all", "layout_admin", ['admins' => $admins]);
        }
        $this->askLogin();
        
    }
    public function register(){
        if ($this->isLoggedIn()) {
            return $this->view("admin.register", "layout_admin");
        } 
        $this->askLogin();
    }
    public function _register(){
        if($this->isPostMethod() && $this->isLoggedIn()){
            $processor = $this->getAdminProcessor();
            $processor->registerProcess();
            if($processor->hasErrors()){
                return $this->view("admin.register", "layout_admin",['errors' => $processor->getErrors()]);
            }
            $processor->admin->new($processor->getData());
            return $this->view("admin.register_success", "layout_admin", ['name' => $processor->getData()['name']]);
        }
    }
    public function updateProfile(){
        if($this->isPostMethod() && $this->isLoggedIn()){
            $processor = $this->getAdminProcessor();
            $processor->updateProcess();
            if($processor->hasErrors()){
                return $this->view("admin.profile", "layout_admin",['errors' => $processor->getErrors()]);
            }
            $processor->admin->updateData($processor);
            return $this->view("admin.update_success", "layout_admin", ['name' => $processor->name]);
        }
    }
    /**
     * Login data control
     */
    public function _login(){
        if($this->isPostMethod()){
            $processor = $this->getAdminProcessor();
            $processor->loginAdminProcess();
            if($processor->hasErrors()){
                $errors = $processor->getErrors();
                return $this->view("admin.login", "layout",["errors"=>$errors]);
            }else{
                $admin = $processor->user;
                $_SESSION['admin']["id"] = $admin->id;
                $_SESSION['admin']["email"] = $admin->email;
                $_SESSION['admin']["name"] = $admin->name;
                $_SESSION['admin']["phone"] = $admin->phone;
                $_SESSION['admin']["status"] = $admin->status;
                $_SESSION['admin']["password"] = $admin->password;

                $this->redirect("/admin");
            }
        }
    }
    public function logout(){
            unset($_SESSION["admin"]);
            session_destroy();
            $this->redirect('/admin/login');
    }
    public function update(){
        return $this->view("admin.update", 'layout_admin');
    }
}
