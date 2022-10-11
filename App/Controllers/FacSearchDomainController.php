<?php

namespace App\Controllers;

class FacSearchDomainController extends Controller
{
    function new () {
        return $this->view("search_domains.new", "layout_admin");
    }
    function _new () {
        if($this->isPostMethod()){
            $processor = $this->getFSDProcessor();
            $processor->createFSDProcess();
            if($processor->hasErrors()){
                return $this->view("search_domains.new", "layout_admin",['errors'=>$processor->getErrors()]);
            }else{
                $processor->fsd->new($processor);
                return $this->view("search_domains.new_success", "layout_admin");
            }
        }
    }
    public function all()
    {
        $func = $this->getFSDProcessor();
        $fsd = $func->getAll();
        return $this->view("search_domains.all", "layout_admin", ['fsd' => $fsd]);
    }

}
