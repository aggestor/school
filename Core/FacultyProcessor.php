<?php

namespace Core;

use App\Models\FacultyModel;

class FacultyProcessor extends Processor{
    private $faculty  = null;
    public function __construct(){
        !$this->faculty && $this->faculty = new FacultyModel;
    }
    public function getAll(){
        return $this->loadData($this->faculty->findAll());
    }
    private function initProcess(){
        $this->name = htmlspecialchars($_POST['name']);
        $this->acronym = htmlspecialchars($_POST['acronym']);
    }
    public function createFacultyProcess(){
        $this->initProcess();
        if(!$this->hasMoreCharsThen(2,$this->name)){
            $this->errors['name'] = "Le nom de la faculté est obligatoire !";
        }
        if(!$this->hasMoreCharsThen(2,$this->acronym)){
            $this->errors['acronym'] = "L'acronyme de la faculté est obligatoire !";
        }
    }
    


}