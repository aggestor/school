<?php

namespace App\Controllers;

class PromotionsController extends Controller
{
    public function new()
    {
        if($this->isLoggedIn()){
            $dep = $this->getDepartmentProcessor();
            $departments = $dep->getAll();
            $fac = $this->getFacultyProcessor();
            $faculties = $fac->getAll();
            return $this->view("promotions.new", "layout_admin",['fac' => $faculties, 'dep' => $departments]);
        }
        $this->askLogin();
    }
    public function _new(){
        if($this->isPostMethod() && $this->isLoggedIn()){
            $dep = $this->getDepartmentProcessor();
            $departments = $dep->getAll();
            $fac = $this->getFacultyProcessor();
            $faculties = $fac->getAll();
    
            $prom = $this->getPromotionProcessor();
            $prom->createPromotionProcess();
            if($prom->hasErrors()){
                return $this->view("promotions.new", "layout_admin", ['fac' => $faculties, 'dep' => $departments, 'errors' => $prom->getErrors()]);
            }else{
                $prom->promotion->new($prom);
                return $this->view("promotions.new_success", "layout_admin", ['fac' => $faculties, 'dep' => $departments, 'errors' => $prom->getErrors()]);
            }
        }

    }
    public function all()
    {
        if($this->isLoggedIn()){
            $prom = $this->getPromotionProcessor();
            $promotions = $prom->getAll();
            return $this->view("promotions.all", "layout_admin", ['prom' =>$promotions]);
        }
        $this->askLogin();
    }
    public function update(){
        if($this->isLoggedIn()){
            $id = htmlspecialchars($_GET['id']);
            $dep = $this->getDepartmentProcessor();
            $departments = $dep->getAll();
            $fac = $this->getFacultyProcessor();
            $faculties = $fac->getAll();
            $prom = $this->getPromotionProcessor();
            $result = $prom->promotion->findOne($id);
            if($result !== false){
                $data = $prom->loadData($result)[0];
                return $this->view("promotions.update", "layout_admin", ['fac' => $faculties, 'dep' => $departments, 'data' => $data]);
            }
        }
        $this->askLogin();
    }
    public function _update(){
        if ($this->isPostMethod() && $this->isLoggedIn()) {
            $id = htmlspecialchars($_GET['id']);
            $dep = $this->getDepartmentProcessor();
            $departments = $dep->getAll();
            $fac = $this->getFacultyProcessor();
            $faculties = $fac->getAll();

            $prom = $this->getPromotionProcessor();
            $prom->createPromotionProcess();

            if ($prom->hasErrors()) {
                return $this->view("promotions.update", "layout_admin", ['fac' => $faculties, 'dep' => $departments, 'errors' => $prom->getErrors()]);
            } else {
                $prom->promotion->updateOne($prom, $id);
                return $this->view("promotions.update_success", "layout_admin");
            }
        }

    }
     public function delete(){
        if($this->isLoggedIn()){
            $id = htmlspecialchars($_GET['id']);
            $process = $this->getPromotionProcessor();
            $process->delete($id);
            $this->redirect("/admin/promotions");
        }
        $this->askLogin();
    }
   
}
