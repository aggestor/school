<?php

namespace App\Objects;

use Root\App\Models\AdminModel;
use Root\App\Models\Schema;

class Admin extends AdminModel{
    public $model = null ;
    public $id = "";
    public function __construct(string $id = ""){
        if($this->model === null){
            $this->model = new parent;
        }
        if(!empty($id)){
            $this->id = $id;
        }
    }
    public  function getCount(){
      $count =  $this->countAdmins()->fetch()['count'];
      $this->count = $count;
      return $count;
    }
    private function mainGetter(string $subject_){
        $schema = new Schema;
        $subject = $this->model->findByKeyValue('id', $this->id, $schema->admin[$subject_])->fetch();
        return $subject[$schema->admin[$subject_]];
    }
    public function getAdmin(string $key, string $value){
        $person = $this->model->findByKeyValue($key, $value)->fetch();
        return $person;
    }
    public function getName(){
        return $this->mainGetter('name');
    }
    public function getEmail(){
        return $this->mainGetter('email');
    }
    public function getStatus(){
        return $this->mainGetter('status');
    }
    public function getId(){
        return $this->id;
    }
    public function getAll(){
        $all = $this->model->findAll();
        $admins = [];

        while($ad = $all->fetch()){
            array_push($admins,$ad);
        }
        return $admins;
    }
    
    
}