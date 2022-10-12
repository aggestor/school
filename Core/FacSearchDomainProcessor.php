<?php

namespace Core;

use App\Models\FacSearchDomainModel;

class FacSearchDomainProcessor extends Processor{
    public $fsd  = null;
    public string $name = '';
    public function __construct(){
        !$this->fsd && $this->fsd = new FacSearchDomainModel;
    }
    public function getAll(){
        return $this->loadData($this->fsd->findAll());
    }
    private function initProcess(){
        $this->name = htmlspecialchars($_POST['name']);
        $this->acronym = htmlspecialchars($_POST['acronym']);
    }
    public function createFSDProcess(){
        $this->initProcess();
        if(!$this->hasMoreCharsThen($this->name,6)){
            $this->errors['name'] = "Le nom du domaine de recherche est obligatoire !";
        }
    }
    public function delete($id){
        return $this->fsd->deleteOne($id)->fetch();
    }
}