<?php

namespace App\Models;

class ConfigModel extends Model
{
    private $table = 'config';
    public function __construct()
    {}
    public function findAll()
    {
        return parent::find($this->table, "*", "name != ?", ['0']);
    }
    public function findOne($id, $field = '*')
    {
        return parent::find($this->table, $field, "id = ?", [$id]);
    }
    public function deleteOne($data)
    {
        return parent::delete($this->table, "id = ?", [$data]);
    }
    public function updateOne($object, $id)
    {
        parent::update($this->table, "name=?,acronym=?,last_update=?", "", [$object->name, $object->acronym, "NOW()", $id]);
    }
}
