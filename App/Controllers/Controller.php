<?php

namespace App\Controllers;

use Core\AdminProcessor;
use Core\DepartmentProcessor;
use Core\FacSearchDomainProcessor;
use Core\FacultyProcessor;
use Core\FunctionProcessor;
use Core\StudentProcessor;
use Core\PromotionProcessor;

class Controller
{
    public function getStudentProcessor(){
        return new StudentProcessor;
    }
    public function getFacultyProcessor(){
        return new FacultyProcessor;
    }
    public function getDepartmentProcessor(){
        return new DepartmentProcessor;
    }
    public function getPromotionProcessor(){
        return new PromotionProcessor;
    }
    public function getAdminProcessor(){
        return new AdminProcessor;
    }
    public function getFunctionProcessor(){
        return new FunctionProcessor;
    }
    public function getFSDProcessor(){
        return new FacSearchDomainProcessor;
    }
    
    /**
     * This function renders the view into a specific template, by default we user layouts.php
     * @param  string $path  is the path to the file to render.
     * _Example :_
     * 
     * ```php
     *     #suppose we have home file into Views/pages/static/home.php
     *      #So to tell the controller to render this file use
     *        $this->view('pages.static.home',$template, $params)
     * ```
     * 
     * @param string $template string is the template into what the file will be rendered
     * @param array|null $params  This takes data and make it accessible into the file we are rendering
     */
    public function view(string $path, string $template = 'layouts', array $params = null)
    {
        ob_start();
        $path = str_replace('.', DIRECTORY_SEPARATOR, "pages".DIRECTORY_SEPARATOR.$path);
        require VIEWS . $path . '.php';
        if ($params) {
            $params = extract($params);
        }
        $content = ob_get_clean();
        require VIEWS . $template . '.php';
    }
    public function head(string $html){
        ob_start();
        echo $html;
        $header = ob_get_clean();
    }
    /**
     * Redirects a user to a specific file
     * @param  string $path is the path on what the controller will redirect you
     */
    public static function redirect($path)
    {
        header('Location:' . $path);
    }
    /**
     * This function just checks whether there's an admin|personal|student connected or not.
     */
    public function isLoggedIn($name = 'admin') : bool{
        $is_logged_in = isset($_SESSION[$name]) ? true : false;
        return $is_logged_in;
    }
    /**
     * Checks whether the coming request is POST or not.
     */
    public function isPostMethod(){
        $is_post  = $_SERVER['REQUEST_METHOD'] == "POST" ? true : false;
        return $is_post;
    }
    /**
     * Checks whether the coming request is GET or not.
     */
    public function isGetMethod(){
        $is_get  = $_SERVER['REQUEST_METHOD'] == "GET" ? true : false;
        return $is_get;
    }
    /**
     * Uploads a specific file to a specific folder on the server.
     * @param string $temp the temporary path where the file is located.
     * @param string $path  the the actual path to move the file from the temp location.
     * 
     * @return boolean|null the boolean should be truthy or if something is wrong it will
     */
    public function uploadFile($temp, $path){
        $uploaded = move_uploaded_file($temp, $path);
        return $uploaded;
    }
    public function askLogin($simple = false){
        if($simple) $this->redirect("/login");
        $this->redirect("/admin/login");
    }
}
