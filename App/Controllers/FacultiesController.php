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
    public function update(){
        $id = htmlspecialchars($_GET['id']);
        $process = $this->getFacultyProcessor();
        $data = $process->faculty->findOne($id);

        $fac = $process->loadData($data)[0];
        return $this->view("faculties.update", "layout_admin",['fac' =>$fac]);
    }
    public function _update(){
        if($this->isPostMethod()){
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
        $fac = $this->getFacultyProcessor();
        $faculties = $fac->getAll();
        return $this->view("faculties.all", "layout_admin",['fac' =>$faculties]);
    }
     public function delete(){
        $id = htmlspecialchars($_GET['id']);
        $process = $this->getFacultyProcessor();
        $process->delete($id);
        $this->redirect("/admin/faculties");
    }
   
}
