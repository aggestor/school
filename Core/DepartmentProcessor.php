<?php

namespace Core;

use App\Models\DepartmentModel;

class DepartmentProcessor extends Processor{
    public $department  = null;
    public function __construct(){
        !$this->department && $this->department = new DepartmentModel;
    }
    public function getAll(){
        return $this->loadData($this->department->findAll());
    }
    public function delete($id){
        return $this->department->deleteOne($id)->fetch();
    }
    public function initProcess(){
        $this->name = htmlspecialchars($_POST['name']);
        $this->acronym = htmlspecialchars($_POST['acronym']);
        $this->faculty = htmlspecialchars($_POST['faculty']);
    }
    public function createDepProcess(){
        $this->initProcess();
        if (!$this->hasMoreCharsThen($this->name, 4)) {
            $this->errors['name'] = "Le nom du départément est obligatoire !";
        }
        if (!$this->hasMoreCharsThen($this->faculty, 1) || !$this->isNumeric($this->faculty)) {
            $this->errors['faculty'] = "La faculté choisie est invalide !";
        }
    }
}