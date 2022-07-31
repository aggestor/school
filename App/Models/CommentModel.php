<?php

namespace Root\App\Models;

class CommentModel extends Model{
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
    public static function add($post,$name, $email, $content) {
        $schema = new Schema;
        $create_user_feedback = parent::create($schema->table_schema['comments'],"{$schema->comments['postId']},{$schema->comments['name']},{$schema->comments['email']},{$schema->comments['content']},{$schema->comments['recordDate']},{$schema->comments['recordTime']}","?,?,?,?,NOW(),NOW()" ,[$post,$name, $email, $content]);
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
    public static function findComment($fields, $where, $attr){
        $schema = new Schema;
        $find_user_feedback = parent::find($schema->table_schema['comments'], $fields, $where, $attr);
        return $find_user_feedback;
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
        $feedback = self::findComment($fields, "{$schema->comments[$key]} = ?", [$value]);
        return $feedback;
    }
    /**
     * This function just returns all the admins
     * 
     * @return \PDOStatement|false PDOStatement if the query is successfully executed false if not. an array of all the admins
     */
    public static function findAllByPost($post) {
        $schema = new Schema;
        $feedback = self::findComment("*","{$schema->comments['postId']} = ?",[$post]);
        return $feedback;
    }
}