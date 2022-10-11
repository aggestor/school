<?php

namespace App\Controllers;

class FunctionsController extends Controller
{
    function new () {
        return $this->view("functions.new", "layout_admin");
    }
    function _new () {
        if($this->isPostMethod()){
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
        $func = $this->getFunctionProcessor();
        $functions = $func->getAll();
        return $this->view("functions.all", "layout_admin", ['functions' => $functions]);
    }

}
