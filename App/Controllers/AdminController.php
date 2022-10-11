<?php

namespace App\Controllers;

use App\Models\AdminModel;
use App\Models\Schema;
use Core\AdminProcessor;
use Core\PostProcessor;

class AdminController extends Controller{

    public function index(){
        return $this->view("admin.index", "layout_admin");
    }
    public function login(){
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
        $processor = $this->getAdminProcessor();

        $admins = $processor->getAllAdmins();
        //if ($this->isLoggedIn()) {
            //$this->redirect("/dashboard");
        //} else {
            return $this->view("admin.all", "layout_admin", ['admins' => $admins]);
        //}
    }
    public function register(){
        //if ($this->isLoggedIn()) {
            //$this->redirect("/dashboard");
        //} else {
            return $this->view("admin.register", "layout_admin");
        //}
    }
    public function _register(){
        if($this->isPostMethod()){
            $processor = $this->getAdminProcessor();
            $processor->registerProcess();
            if($processor->hasErrors()){
                return $this->view("admin.register", "layout_admin",['errors' => $processor->getErrors()]);
            }
            $result = $processor->admin->new($processor->getData());
            return $this->view("admin.register_success", "layout_admin", ['name' => $processor->getData()['name']]);

        }
    }
    /**
     * Login data control
     */
    public function __login(){
        if($this->isPostMethod()){
            $processor = new AdminProcessor;
            $processor->loginAdminProcess();
            if($processor->hasErrors() || !$processor->isAuth){
                $errors = $processor->getErrors();
                return $this->view("admin.login", "layout",["errors"=>$errors]);
            }else{
                $schema = new Schema;
                $admin = $processor->admin;
                $_SESSION[parent::SESSION_ADMIN]["id"] = $admin[$schema->admin['id']];
                $_SESSION[parent::SESSION_ADMIN]["email"] = $admin[$schema->admin['email']];
                $_SESSION[parent::SESSION_ADMIN]["name"] = $admin[$schema->admin['name']];
                $_SESSION[parent::SESSION_ADMIN]["status"] = $admin[$schema->admin['status']];
                $_SESSION[parent::SESSION_ADMIN]["record_date"] = $admin[$schema->admin['recordDate']];
                $_SESSION[parent::SESSION_ADMIN]["record_time"] = $admin[$schema->admin['recordTime']];

                $this->redirect("/dashboard");
            }
        }
    }
    /**
     * Controls everyone trying to access the addUser page and the session is needed here !!!,
     */
    // public function dashboard(){
    //     if($this->isGetMethod()){
    //         if(!$this->isLoggedIn()){
    //             $processor = new PostProcessor;
    //             $posts = $processor->getPostBy("*");
    //             return $this->view("admin.admin", "layout_admin", ['users' => $this->findUsers(), 'posts'=> $posts[0]]);
    //         }
    //         else $this->redirect("/auth/connexion");
    //     }
    // }
    /**
     * Logs out the  user then redirect him to the home page
     */
    public function logout(){
        unset($_SESSION[parent::SESSION_ADMIN]);
        session_destroy();
        $this->redirect("/admin/login");
    }
}
