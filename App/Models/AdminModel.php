<?php

namespace App\Models;

class AdminModel extends Model{
    public function __construct(){}
    /**
     * Adds an new admin in the database and tells what happened after the insertion.
     * 
     * @param string $id user'id
     * @param string $name user'name
     * @param string $email user'email
     * @param string $password user'password
     * 
     * @return \PDOStatement|false PDOStatement if the query is successfully executed false if not. $create_user_feedback feedback
     */
    public static function new($data) {
        $schema = new Schema;
        $create_user_feedback = parent::create('admins',"name,email,phone,password","?,?,?,?" ,[$data['name'], $data['email'], $data['phone'], $data['password']]);
        return $create_user_feedback->fetch();
    }
    public static function updateData($data) {
        $schema = new Schema;
        $create_user_feedback = parent::update('admins',"name = ?,email = ?,phone = ?,password = ?, last_update = NOW()",'id = ?' ,[$data->name, $data->email, $data->phone, $data->password, $_SESSION['admin']['id']]);
        return $create_user_feedback->fetch();
    }
    
    public static function findAdmin($fields, $where, $value){
        return parent::find('admins', $fields, "$where", $value);
    }
    public function findOne($key, $value){
        return self::findAdmin($key, "$key = ?", [$value])->fetch();
    }
    public function findAll(){
        return self::findAdmin("*", "id != ?", ['0']);
    }
    public function findMany($key, $value, $data = "*"){
        return self::findAdmin($data, "$key", $value);
    }
    public static function remove($id){
        return parent::delete("admins","id = ?", [$id])->fetch();
    }
}