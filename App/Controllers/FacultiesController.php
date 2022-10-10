<?php

namespace App\Controllers;

class FacultiesController extends Controller
{
    public function new()
    {
        return $this->view("faculties.new", "layout_admin");
    }
    public function all()
    {
        $fac = $this->getFacultyProcessor();

        $faculties = $fac->getAll();
        return $this->view("faculties.all", "layout_admin",['fac' =>$faculties]);
    }
   
}
