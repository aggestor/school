<?php

namespace App\Models;

class PromotionModel extends Model
{
    private $table = 'promotions';
    private $lin = ' INNER JOIN departments ON departments.id = promotions.department_id INNER JOIN faculties on faculties.id = departments.faculty_id ';
    public function __construct()
    {}
    function new ($object) {
        parent::create($this->table, 'name,acronym,department_id', '?,?,?,?', [$object->name, $object->acronym, $object->department]);
    }
    public function findAll()
    {
        return parent::find($this->table . $this->lin, "departments.id as dep_id, departments.name as dep_name,departments.acronym as dep_acronym, faculties.id as fac_id, faculties.name as fac_name, faculties.acronym as fac_acronym, promotions.id ,promotions.name,promotions.acronym,promotions.created_at, promotions.last_update", "promotions.id != ?", ['p']);
    }
    public function findAllByDepartment($fac_id, $fields = "*")
    {
        return parent::find($this->table, $fields, "department_id != ?", [$fac_id]);
    }
    public function findOne($id, $field = '*')
    {
        return parent::find($this->table, $field, "id = ?", [$id]);
    }
}
