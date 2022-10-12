<?php

namespace App\Controllers;

class DepartmentsController extends Controller
{
    public function new()
    {
        $fac = $this->getFacultyProcessor();
        $faculties = $fac->getAll();

        return $this->view("departments.new", "layout_admin",['fac' => $faculties]);
    }
    public function _new()
    {
        if($this->isPostMethod()){
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
        $dep = $this->getDepartmentProcessor();

        $departments = $dep->getAll();
        return $this->view("departments.all", "layout_admin", ['dep' =>$departments]);
    }
    public function delete(){
        $id = htmlspecialchars($_GET['id']);
        $process = $this->getDepartmentProcessor();
        $process->delete($id);
        $dep = $process->getAll();
        $this->redirect("/admin/departments");
        // return $this->view("departments.all", "layout_admin", ['dep' => $dep]);
    }
   
}
