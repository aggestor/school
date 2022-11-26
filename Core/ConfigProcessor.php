<?php

namespace Core;

use App\Models\ConfigModel;

class ConfigProcessor extends Processor{
    public $config  = null;
    public function __construct(){
        !$this->config && $this->config = new ConfigModel;
    }
    public function getAll(){
        return $this->loadData($this->config->findAll())[0];
    }
    private function initProcess(){
        $this->name = $this->sanitize('name');
        $this->acronym = $this->sanitize('acronym');
    }
    public function updateProcess(){
        $this->initProcess();
        if(!$this->hasMoreCharsThen($this->name,6)){
            $this->errors['name'] = "Le nom de la faculté est obligatoire !";
        }
        if(!$this->hasMoreCharsThen($this->acronym,2)){
            $this->errors['acronym'] = "L'acronyme de la faculté est obligatoire !";
        }
    }
}