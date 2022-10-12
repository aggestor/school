<?php

namespace Core;
use App\Models\FunctionModel;

class FunctionProcessor extends Processor{
    public $function  = null;
    public string $name = '';
    public function __construct(){
        !$this->function && $this->function = new FunctionModel;
    }
    public function getAll(){
        return $this->loadData($this->function->findAll());
    }
    private function initProcess(){
        $this->name = htmlspecialchars($_POST['name']);
    }
    public function createFunctionProcess(){
        $this->initProcess();
        if(!$this->hasMoreCharsThen($this->name,6)){
            $this->errors['name'] = "Le nom de la fonction est obligatoire !";
        }
    }
    public function delete($id){
        return $this->function->deleteOne($id)->fetch();
    }
}