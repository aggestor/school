<?php

namespace App\Models;

class AdminModel extends Model{
    public function __construct()
    {
        
    }
    
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
    public static function add($id, $name, $email, $password) {
        $schema = new Schema;
        $create_user_feedback = parent::create($schema->table_schema['admin'],"{$schema->admin['id']},{$schema->admin['name']},{$schema->admin['email']},{$schema->admin['password']},{$schema->admin['recordDate']},{$schema->admin['recordTime']}, {$schema->admin['status']}","?,?,?,?,NOW(),NOW(),?" ,[$id, $name, $email, $password, 1]);
        return $create_user_feedback;
    }
    /**
     * This function finds an admin by nominating fields you want to explore.
     * @param string $fields fields you need.
     * @param string $where exactly the where close. The filter.
     * @param array $attr is the attributes array of your query
     * 
     * @return \PDOStatement|false PDOStatement if the query is successfully executed false if not.the array of the element or false or null
     */
    public static function findAdmin($fields, $where, $attr){
        $schema = new Schema;
        $find_user_feedback = parent::find($schema->table_schema['admin'], $fields, $where, $attr);
        return $find_user_feedback;
    }
    /**
     * Finds an admin by his id
     * @param string $id is the admin id
     * 
     * @return \PDOStatement|false PDOStatement if the query is successfully executed false if not. the array of the element or false or null
     */
    public static function findAdminId($id){
        $schema = new Schema;
        $feedback = self::findAdmin($schema->admin['id'], "{$schema->admin['id']} = ?",[$id]);
        return $feedback;
    }
    /**
     * Finds everything from admin table based on a key value pair meaning a field and a value to filter with
     * @param string $key is the field into the table
     * @param string $value is the value to filter with.
     *
     * @return \PDOStatement|false PDOStatement if the query is successfully executed false if not. the array of the element or false or null
     */

    public static function findByKeyValue(string $key = "", $value = "",$fields = "*"){
        $schema = new Schema;
        $feedback = self::findAdmin($fields, "{$schema->admin[$key]} = ?", [$value]);
        return $feedback;
    }
    /**
     * This function just returns all the admins
     * 
     * @return \PDOStatement|false PDOStatement if the query is successfully executed false if not. an array of all the admins
     */
    public static function findAll() {
        $schema = new Schema;
        $feedback = self::findAdmin("*","{$schema->admin['id']} != ?",[0]);
        return $feedback;
    }
    /**
     * Removes a user by its id
     * @param string $id the id of the user to remove
     * 
     * @return \PDOStatement|false PDOStatement if the query is successfully executed false if not. to tell how the query has been.
     */
    public static function remove($id){
        $schema = new Schema;
        $feedback = self::delete($schema->table_schema['admin'], $schema->admin['id'], [$id]);
        return $feedback;
    }
    /**
     * This just returns the count of the posts from the post table
     * @return \PDOStatement|false PDOStatement if the query is successfully executed false if not. of the posts in the post table
     */
    public static function countAdmins(){
        $schema = new Schema;
        $feedback = self::findAdmin("count(*) as count", "{$schema->posts['id']} != ?", [0]);
        return $feedback;

    }
}