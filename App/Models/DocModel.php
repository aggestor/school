<?php

namespace App\Models;

class DocModel extends Model {
    private $table = 'docs';
    public function __construct(){}
    public function new($object){
        $id = '';
        if(isset($_SESSION['admin'])){
            $id = $object->id;
            parent::create($this->table,'doc_name,type,type_user,id_user','?,?,?,?',[$object->document_file, $object->type,$object->type_user,$id]);
        }else{
            $id = isset($_SESSION['student']) ? $_SESSION['student']['id'] : $_SESSION['personal']['id'] ;
            parent::create($this->table,'doc_name,type,type_user,id_user','?,?,?,?',[$object->document_file, $object->type,$_SESSION['user']['type'],$id]);
        }
    }
    public function findAll(){
        return parent::find($this->table,"*", "id != ?", ['0']);
    }
    public function findOne($id, $key = 'type', $field = '*'){
        return parent::find($this->table, $field, "$key = ?", [$id]);
    }
    public function findByKeyValue($key,$value, $fields = "*"){
        return $this->find($this->table,$fields, "$key = ?",[$value]);
    }
    public function findExactOneDoc($type,$user_type, $user ){
        return parent::find($this->table, "*", "type = ? AND type_user = ? AND id_user = ?", [$type,$user_type, $user])->fetch();
    }
    public function findForStudent($id=null){
        $id = $id == null ? $_SESSION['student']['id'] : $id;
        return parent::find($this->table, "*", "id_user = ? AND type_user = ?", [$id, 'student']);
        
    }
    public function findForPersonal($id = null){
        $id = $id == null ? $_SESSION['personal']['id'] : $id;
        return parent::find($this->table, "*", "id_user = ? AND type_user = ?", [$id, 'personal']);
    }
    public function deleteOne($data){
        return parent::delete($this->table,"id = ?", [$data]);
    }
    public function updateOne($object, $id, $with_file = true){
        if($with_file){
            parent::update($this->table,"doc_name = ?,type = ?,last_update=NOW()","id=?",[$object->document_file,$object->type ,$id]);
        }else{
            parent::update($this->table,"type = ?,last_update=NOW()","id=?",[$object->type,$id]);

        }
    }
    public function findDoctype($type = 'student'){
        return $this->find('documents', "*", "type  = ?",[$type]);
    }
}