<?php

namespace App\Controllers;

class FunctionsController extends Controller
{
    function new () {
        if($this->isLoggedIn()){
            return $this->view("functions.new", "layout_admin");
        }
        $this->askLogin();
    }
    function update () {
        if($this->isLoggedIn()){
            $id = htmlspecialchars($_GET['id']);
            $process = $this->getFunctionProcessor();
            $data = $process->function->findOne($id)->fetch();
            return $this->view("functions.update", "layout_admin", ['data' => $data]);
        }
        $this->askLogin();
    }
    function _update () {
        if($this->isPostMethod() && $this->isLoggedIn()){
            $id = htmlspecialchars($_GET['id']);
            $processor = $this->getFunctionProcessor();
            $processor->createFunctionProcess();
            if($processor->hasErrors()){
                return $this->view("functions.update", "layout_admin",['errors'=>$processor->getErrors()]);
            }else{
                $processor->function->updateOne($processor, $id);
                return $this->view("functions.update_success", "layout_admin");
            }
        }
    }
    function _new () {
        if($this->isPostMethod() && $this->isLoggedIn()){
            $processor = $this->getFunctionProcessor();
            $processor->createFunctionProcess();
            if($processor->hasErrors()){
                return $this->view("functions.new", "layout_admin",['errors'=>$processor->getErrors()]);
            }else{
                $processor->function->new($processor);
                return $this->view("functions.new_success", "layout_admin");
            }
        }
    }
    public function all()
    {
        if($this->isLoggedIn()){
            $func = $this->getFunctionProcessor();
            $functions = $func->getAll();
            return $this->view("functions.all", "layout_admin", ['functions' => $functions]);
        }
        $this->askLogin();
    }
     public function delete(){
        if($this->isLoggedIn()){
            $id = htmlspecialchars($_GET['id']);
            $process = $this->getFunctionProcessor();
            $process->delete($id);
            $this->redirect("/admin/functions");
        }
        $this->askLogin();
        //return $this->view("search_domains.all", "layout_admin", ['fsd' => $fsd]);
    }

}
