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
    public function all()
    {
        $dep = $this->getDepartmentProcessor();

        $departments = $dep->getAll();
        return $this->view("departments.all", "layout_admin", ['dep' =>$departments]);
    }
   
}
