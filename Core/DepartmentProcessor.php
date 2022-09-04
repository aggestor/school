<?php

namespace Core;

use App\Models\DepartmentModel;

class DepartmentProcessor extends Processor{
    private $department  = null;
    public function __construct(){
        !$this->department && $this->department = new DepartmentModel;
    }
    public function getAll(){
        return $this->loadData($this->department->findAll());
    }
    


}