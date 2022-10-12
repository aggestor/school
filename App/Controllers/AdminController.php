<?php

namespace App\Controllers;

use App\Models\AdminModel;
use App\Models\Schema;
use Core\AdminProcessor;
use Core\PostProcessor;

class AdminController extends Controller{

    public function index(){
        if($this->isLoggedIn()){
            return $this->view("admin.index", "layout_admin");
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
        if(!$this->isLoggedIn()){
            $processor = new PostProcessor;
            $posts = $processor->findUsersLastPosts($_SESSION[parent::SESSION_ADMIN]['id'],3);
            return $this->view("admin.profile", "layout_admin", ['user' => $_SESSION['admin'], 'posts'=>$posts]);
        }else{
            $this->redirect("/auth/connexion");
        }
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
                $_SESSION['admin']["status"] = $admin->status;
                $_SESSION['admin']["record_date"] = $admin->recordDate;
                $_SESSION['admin']["record_time"] = $admin->recordTime;

                $this->redirect("/admin");
            }
        }
    }
    public function logout(){
        if($this->isLoggedIn()){
            unset($_SESSION["admin"]);
            session_destroy();
            $this->askLogin();
        }
    }
    public function update(){
        return $this->view("admin.update", 'layout_admin');
    }
}
