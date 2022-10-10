<?php

namespace App\Controllers;

class PromotionsController extends Controller
{
    public function new()
    {
        $dep = $this->getDepartmentProcessor();
        $departments = $dep->getAll();
        $fac = $this->getFacultyProcessor();
        $faculties = $fac->getAll();
        return $this->view("promotions.new", "layout_admin",['fac' => $faculties, 'dep' => $departments]);
    }
    public function all()
    {
        $prom = $this->getPromotionProcessor();
        $promotions = $prom->getAll();
        return $this->view("promotions.all", "layout_admin", ['prom' =>$promotions]);
    }
    public function update(){

    }
    public function delete(){
        
    }
   
}
