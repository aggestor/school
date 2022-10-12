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
    public function _new(){
        if($this->isPostMethod()){

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
        $prom = $this->getPromotionProcessor();
        $promotions = $prom->getAll();
        return $this->view("promotions.all", "layout_admin", ['prom' =>$promotions]);
    }
    public function update(){
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
    public function _update(){
        if ($this->isPostMethod()) {
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
        $id = htmlspecialchars($_GET['id']);
        $process = $this->getPromotionProcessor();
        $process->delete($id);
        $fsd = $process->getAll();
        $this->redirect("/admin/promotions");
    }
   
}
