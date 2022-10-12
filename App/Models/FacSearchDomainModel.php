<?php

namespace App\Models;

class FacSearchDomainModel extends Model {
    private $table = 'faculty_search_domain';
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
    public function updateOne($object, $id){
        parent::update($this->table,"name=?,acronym=?,last_update=?","id=?",[$object->name, $object->acronym,"NOW()" ,$id]);
    }
}