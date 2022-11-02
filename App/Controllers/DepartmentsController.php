<?php

namespace App\Controllers;

class DepartmentsController extends Controller
{
    public function new()
    {
        if($this->isLoggedIn()){
            $fac = $this->getFacultyProcessor();
            $faculties = $fac->getAll();
            return $this->view("departments.new", "layout_admin",['fac' => $faculties]);
        }
        $this->askLogin();
    }
    public function update()
    {
        if($this->isLoggedIn()){
            $id = htmlspecialchars($_GET['id']);
            $fac = $this->getFacultyProcessor();
            $faculties = $fac->getAll();
            $process = $this->getDepartmentProcessor();
            $data = $process->department->findOne($id)->fetch();
            return $this->view("departments.update", "layout_admin",['fac' => $faculties, 'data' =>$data]);
        }
        $this->askLogin();
    }
    public function _update()
    {
        if($this->isLoggedIn()){
            $id = htmlspecialchars($_GET['id']);
            if($this->isPostMethod()){
                $fac = $this->getFacultyProcessor();
                $faculties = $fac->getAll();
    
                $dep = $this->getDepartmentProcessor();
                $dep->createDepProcess();
    
                if($dep->hasErrors()){
                    return $this->view("departments.update", "layout_admin",['errors' => $dep->getErrors() ,'fac' => $faculties]);
                }else{
                    $dep->department->updateOne($dep, $id);
                    return $this->view("departments.update_success", "layout_admin",['fac' => $faculties]);
                }
        
            }
        }
    }
    public function _new()
    {
        if($this->isPostMethod() && $this->isLoggedIn()){
            $fac = $this->getFacultyProcessor();
            $faculties = $fac->getAll();

            $dep = $this->getDepartmentProcessor();
            $dep->createDepProcess();

            if($dep->hasErrors()){
                return $this->view("departments.new", "layout_admin",['errors' => $dep->getErrors() ,'fac' => $faculties]);
            }else{
                $dep->department->new($dep);
                return $this->view("departments.new_success", "layout_admin",['fac' => $faculties]);
            }
        }
    }
    public function all()
    {
        if($this->isLoggedIn()){
            $dep = $this->getDepartmentProcessor();
            $departments = $dep->getAll();
            return $this->view("departments.all", "layout_admin", ['dep' =>$departments]);
        }
        $this->askLogin();
    }
    public function delete(){
        if($this->isLoggedIn()){
            $id = htmlspecialchars($_GET['id']);
            $process = $this->getDepartmentProcessor();
            $process->delete($id);
            $this->redirect("/admin/departments");
        }
    }
   
}
