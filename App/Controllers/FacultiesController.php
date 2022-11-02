<?php

namespace App\Controllers;

class FacultiesController extends Controller
{
    public function new()
    {
        if($this->isLoggedIn()){
            return $this->view("faculties.new", "layout_admin");
        }
        $this->askLogin();
    }
    public function _new()
    {
        if($this->isPostMethod() && $this->isLoggedIn()){
            $process = $this->getFacultyProcessor();
            $process->createFacultyProcess();
            if($process->hasErrors()){
                return $this->view("faculties.new", "layout_admin", ["errors" => $process->getErrors()]);
            }else{
                $process->faculty->new($process);
                return $this->view("faculties.new_success", "layout_admin");
            }
        }
    }
    public function update(){
        if($this->isLoggedIn()){
            $id = htmlspecialchars($_GET['id']);
            $process = $this->getFacultyProcessor();
            $data = $process->faculty->findOne($id);
            $fac = $process->loadData($data)[0];
            return $this->view("faculties.update", "layout_admin",['fac' =>$fac]);
        }
        $this->askLogin();
    }
    public function _update(){
        if($this->isPostMethod() && $this->isLoggedIn()){
            $process = $this->getFacultyProcessor();
            $id = htmlspecialchars($_GET['id']);

            $process->createFacultyProcess();
            if($process->hasErrors()){
                return $this->view("faculties.update", "layout_admin", ['errors' => $process->getErrors()]);
            }else{
                $process->faculty->updateOne($process, $id);
                return $this->view("faculties.update_success", "layout_admin");
            }
        }
    }
    public function all()
    {
        if($this->isLoggedIn()){
            $fac = $this->getFacultyProcessor();
            $faculties = $fac->getAll();
            return $this->view("faculties.all", "layout_admin",['fac' =>$faculties]);
        }
        $this->askLogin();
    }
     public function delete(){
        if($this->isLoggedIn()){
            $id = htmlspecialchars($_GET['id']);
            $process = $this->getFacultyProcessor();
            $process->delete($id);
            $this->redirect("/admin/faculties");
        }
        $this->askLogin();
    }
   
}
