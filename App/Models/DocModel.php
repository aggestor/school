<?php

namespace App\Models;

class DocModel extends Model {
    private $table = 'docs';
    public function __construct(){}
    public function new($object){
        $id = isset($_SESSION['student']) ? $_SESSION['student']['id'] : $_SESSION['personal']['id'] ;
        parent::create($this->table,'doc_name,type,type_user,id_user','?,?,?,?',[$object->document_file, $object->type,$_SESSION['user']['type'],$id]);
    }
    public function findAll(){
        return parent::find($this->table,"*", "id != ?", ['0']);
    }
    public function findOne($id, $key = 'type', $field = '*'){
        return parent::find($this->table, $field, "$key = ?", [$id]);
    }
    public function deleteOne($data){
        return parent::delete($this->table,"id = ?", [$data]);
    }
    // public function updateOne($object, $id){
    //     parent::update($this->table,"name=?,acronym=?,last_update=?","id=?",[$object->name, $object->acronym,"NOW()" ,$id]);
    // }
}