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
        //if ($this->isLoggedIn()) {
            //$this->redirect("/dashboard");
        //} else {
            return $this->view("admin.all", "layout_admin");
        //}
    }
    public function register(){
        //if ($this->isLoggedIn()) {
            //$this->redirect("/dashboard");
        //} else {
            return $this->view("admin.register", "layout_admin");
        //}
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
     * Adds an new admin into the database.
     */
    public function _new_user(){
        if($this->isLoggedIn()){
            
            if($this->isPostMethod()){
                $processor = new AdminProcessor;
                $processor->addUserProcess();
    
                if($processor->hasErrors()){
                    $errors = $processor->getErrors();
                    return $this->view("admin.add_user", "layout_admin",["errors"=> $errors, "users" => $this->findUsers()]);
                }else{
                    $id = $processor->getAdminId();
                    AdminModel::add($id,htmlspecialchars($_POST[parent::USER_NAMES]), htmlspecialchars($_POST[parent::USER_EMAIL]), hash("SHA256", $_POST[parent::USER_PASSWORD]));
                    return $this->view("msg.user_saving_success", "layout_admin");
                }
            }
        }else{
            $this->redirect("/auth/connexion");
        }
    }
    /**
     * Controls everyone trying to access the addUser page and the session is needed here !!!,
     */
    public function dashboard(){
        if($this->isGetMethod()){
            if(!$this->isLoggedIn()){
                $processor = new PostProcessor;
                $posts = $processor->getPostBy("*");
                return $this->view("admin.admin", "layout_admin", ['users' => $this->findUsers(), 'posts'=> $posts[0]]);
            }
            else $this->redirect("/auth/connexion");
        }
    }
    /**
     * Controls everyone trying to access the addUser page and the session is needed here !!!,
     */
    public function users(){
        if($this->isGetMethod()){
            if($this->isLoggedIn())
            return $this->view("admin.users", "layout_admin", ['users' => $this->findUsers()]);
            else $this->redirect("/auth/connexion");
        }
    }
    /**
     * Controls everyone trying to access the addUser page and the session is needed here !!!,
     */
    public function new_user(){
        if($this->isGetMethod()){
            if($this->isLoggedIn())
            return $this->view("admin.add_user", "layout_admin", ['users' => $this->findUsers()]);
            else $this->redirect("/auth/connexion");
        }
    }
    /**
     * Logs out the  user then redirect him to the home page
     */
    public function logout(){
        unset($_SESSION[parent::SESSION_ADMIN]);
        session_destroy();
        $this->redirect("/auth/connexion");
    }
    public function findUsers() : array{
        $accumulator = [];
        if($this->isLoggedIn()){
            $admins = AdminModel::findAll();
           while($admin = $admins->fetch()){
               array_push($accumulator, $admin);
           }
        }
        return $accumulator;
    }
    public function delete_user(){
        if($this->isGetMethod()){
            if($this->isLoggedIn()){
                $post = AdminModel::remove(htmlspecialchars($_GET['user']));
                $this->redirect($_SERVER['HTTP_REFERER']);
            }else{
                $this->redirect("/auth/connexion");
            }
        }
    }
    

}
