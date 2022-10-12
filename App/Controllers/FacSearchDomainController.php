<?php

namespace App\Controllers;

class FacSearchDomainController extends Controller
{
    function new () {
        return $this->view("search_domains.new", "layout_admin");
    }
    function update () {
        $id = htmlspecialchars($_GET['id']);
        $process = $this->getFSDProcessor();
        $data = $process->fsd->findOne($id)->fetch();
        return $this->view("search_domains.update", "layout_admin", ['data' => $data]);
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
    function _update () {
        if($this->isPostMethod()){
            $id = htmlspecialchars($_GET['id']);
            $processor = $this->getFSDProcessor();
            $processor->createFSDProcess();
            if($processor->hasErrors()){
                return $this->view("search_domains.update", "layout_admin",['errors'=>$processor->getErrors()]);
            }else{
                $processor->fsd->updateOne($processor, $id);
                return $this->view("search_domains.update_success", "layout_admin");
            }
        }
    }
    public function all()
    {
        $func = $this->getFSDProcessor();
        $fsd = $func->getAll();
        return $this->view("search_domains.all", "layout_admin", ['fsd' => $fsd]);
    }
    public function delete(){
        $id = htmlspecialchars($_GET['id']);
        $process = $this->getFSDProcessor();
        $process->delete($id);
        $this->redirect("/admin/domains");
    }

}
