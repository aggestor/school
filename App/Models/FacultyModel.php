<?php

namespace App\Models;

class FacultyModel extends Model {
    private $table = 'faculties';
    public function __construct(){}
    public function new($object){
        parent::create($this->table,'name,acronym,created_at,last_update','?,?,NOW(), NOW()',[$object->name, $object->acronym]);
    }
    public function findAll(){
        return parent::find($this->table,"*", "id != ?", ['0']);
    }
    public function findOne($id, $field = '*'){
        return parent::find($this->table, $field, "id = ?", [$id]);
    }
    public function deleteOne($data){
        return parent::delete($this->table,"id = ?", [$data]);
    }
    public function deleteMany($ids){
        foreach($ids as $id){
            //parent::delete($this);
        }
        //delete many logic goes here
    }
}