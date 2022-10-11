<?php

namespace App\Controllers;

class FacultiesController extends Controller
{
    public function new()
    {
        return $this->view("faculties.new", "layout_admin");
    }
    public function _new()
    {
        $process = $this->getFacultyProcessor();
        $process->createFacultyProcess();
        if($process->hasErrors()){
            return $this->view("faculties.new", "layout_admin", ["errors" => $process->getErrors()]);
        }else{
            $process->faculty->new($process);
            return $this->view("faculties.new_success", "layout_admin");
        }
    }
    public function all()
    {
        $fac = $this->getFacultyProcessor();
        $faculties = $fac->getAll();
        return $this->view("faculties.all", "layout_admin",['fac' =>$faculties]);
    }
   
}
