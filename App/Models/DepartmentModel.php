<?php

namespace App\Models;

class DepartmentModel extends Model {
    private $table = 'departments';
    private $lin = ' INNER JOIN faculties ON faculties.id = departments.faculty_id ';
    public function __construct(){}
    public function new($object){
        parent::create($this->table,'name,acronym,faculty_id,created_at,last_update','?,?,?,NOW(),NOW()',[$object->name, $object->acronym, $object->faculty]);
    }
    public function findAll(){
        return parent::find($this->table.$this->lin,"faculties.id f_id, faculties.name as f_name,faculties.acronym f_acronym, departments.id, departments.name, departments.acronym, departments.created_at, departments.last_update", "departments.id != ?", ['p']);
    }
    public function findAllByFaculty($fac_id,$fields = "*"){
        return parent::find($this->table,$fields, "faculty_id != ?", [$fac_id]);
    }
    public function findOne($id, $field = '*'){
        return parent::find($this->table, $field, "id = ?", [$id]);
    }
    public function deleteOne($data){
        return parent::delete($this->table,"id = ?", [$data]);
    }
}