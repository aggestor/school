<?php

namespace Root\App\Models;

class PostModel extends Model
{
     public function __construct()
    {
        
    }

    /**
     * Adds an new post in the database
     * @param string $id post's id
     * @param string $title post's title
     * @param string $author post's author
     * @param string $content post's content
     * @param string $type post's type
     * 
     * @return mixed $feedback feedback
     */
    public static function add($id, $title, $author, $content,$type,$thumbnail,$file)
    {
        $schema = new Schema;
        $feedback = parent::create($schema->table_schema['posts'], "{$schema->posts['id']},{$schema->posts['title']},{$schema->posts['author']},{$schema->posts['content']},{$schema->posts['type']},{$schema->posts['recordDate']},{$schema->posts['recordTime']}, {$schema->posts['status']},{$schema->posts['thumbnail']}, {$schema->posts['file']}", "?,?,?,?,?,NOW(),NOW(),?,?,?", [$id, $title, $author, $content,$type, 1, $thumbnail, $file]);
        return $feedback;
    }
    /**
     * Every sing find method in this object uses this function
     * @param string $fields the you need from post table
     * @param string $where  the where clause of your request
     * @param array $attr the attributes for your post query
     * 
     * @return \PDOStatement|false PDOStatement if the query is successfully executed false if not. containing a post
     */
    public static function findPost($fields, $where, $attr)
    {
        $schema = new Schema;
        $find_user_feedback = parent::find($schema->table_schema['posts'], $fields, $where, $attr);
        return $find_user_feedback;
    }
    /**
     * Removes a post by its id
     * @param string $id the id of the post to remove
     * 
     * @return \PDOStatement|false PDOStatement if the query is successfully executed false if not. to tell how the query has been.
     */
    public static function remove($id){
        $schema = new Schema;
        $feedback = self::delete($schema->table_schema['posts'], $schema->posts['id'], [$id]);
        return $feedback;
    }
    /**
     * Finds some post based on a offset and a limit and order by the data
     * 
     * @param number|null the offset of the result
     * @param number|null the limit of the result per offset
     * 
     * @return \PDOStatement|false PDOStatement if the query is successfully executed false if not. an array of posts
     */
    public static function findPostByOffsetAndLimit($offset, $limit){
        $schema = new Schema;
        $feedback = parent::specialFind($schema->table_schema['posts'], "*","{$schema->posts['id']} != ?",[1],$schema->posts['recordDate'], $offset,$limit);
        return $feedback;
    }
    /**
     * Finds some post based on a offset and a limit and order by the data
     * 
     * @param number|null $offset the offset of the result
     * @param number|null $limit the limit of the result per offset
     * @param string $type the type of data to find,
     * 
     * @return \PDOStatement|false PDOStatement if the query is successfully executed false if not. an array of posts
     */
    public static function findPostTypeByOffsetAndLimit($type,$offset = 0, $limit = 3){
        $schema = new Schema;
        $feedback = parent::specialFind($schema->table_schema['posts'], "{$schema->posts['id']},{$schema->posts['title']},{$schema->posts['thumbnail']},{$schema->posts['type']},{$schema->posts['recordDate']},{$schema->posts['recordTime']}","{$schema->posts['type']} = ?",[$type],"{$schema->posts['recordDate']} DESC", $offset,$limit);
        return $feedback;
    }
    /**
     * Finds some post based on a offset and a limit and order by the data
     * 
     * @param number|null $offset the offset of the result
     * @param number|null $limit the limit of the result per offset
     * 
     * @return \PDOStatement|false PDOStatement if the query is successfully executed false if not. an array of posts
     */
    public static function findPostsByOffsetAndLimit($offset=0, $limit = 3){
        $schema = new Schema;
        $feedback = parent::specialFind($schema->table_schema['posts'], "{$schema->posts['id']},{$schema->posts['content']},{$schema->posts['title']},{$schema->posts['thumbnail']},{$schema->posts['type']},{$schema->posts['recordDate']},{$schema->posts['recordTime']}","{$schema->posts['id']} != ?",['0'],"{$schema->posts['recordDate']} DESC", $offset,$limit);
        return $feedback;
    }
    /**
     * Gets the count of posts based on their type
     * @param string $type Type of the post to count
     * 
     * @return \PDOStatement|false PDOStatement if the query is successfully executed false if not. an array of posts
     */
    public static function findPostCountByType($type){
        $schema = new Schema;
        $feedback = parent::find($schema->table_schema['posts'], "COUNT(*) AS count", "{$schema->posts['type']} = ?", [$type]);
        return $feedback;
    }
    /**
     * Finds a specific post based on its id
     * @param string $id the id of the post to find
     * 
     * @return \PDOStatement|false PDOStatement if the query is successfully executed false if not.  the feedback of the query of founding a post by id
     */
    public static function findPostById($value){
        $schema = new Schema;
        $query = self::findPost("*","{$schema->posts['id']} = ?" ,[$value]);
        return $query;
    }
    /**
     * Finds a specific post based on its id
     * @param string $id the id of the post to find
     * 
     * @return \PDOStatement|false PDOStatement if the query is successfully executed false if not.  the feedback of the query of founding a post by id
     */
    public static function getMostRecentPost(){
        $schema = new Schema;
        $query = self::findPost("*","{$schema->posts['id']} != ? ORDER BY _record_date DESC LIMIT 1" ,[0]);
        return $query->fetch();
    }
    /**
     * Finds everything from posts table based on a key value pair meaning a field and a value to filter with
     * @param string $key is the field into the table
     * @param string $value is the value to filter with.
     *
     * @return \PDOStatement|false PDOStatement if the query is successfully executed false if not. the array of the posts or false or null
     */

    public static function findByKeyValue(string $key = "", $value = "",$fields = "*"){
        $schema = new Schema;
        $feedback = self::findPost($fields, "{$schema->posts[$key]} = ?", [$value]);
        return $feedback;
    }
    /**
     * Finds everything from posts table based on a key value pair meaning a field and a value to filter with
     * @param string $key is the field into the table
     * @param string $value is the value to filter with.
     *
     * @return \PDOStatement|false PDOStatement if the query is successfully executed false if not. the array of the posts or false or null
     */

    public static function findByKeyValueAndCount(string $key = "", $value = "",$count = 3,$fields = "*"){
        $schema = new Schema;
        $feedback = self::findPost($fields, "{$schema->posts[$key]} = ? ORDER BY {$schema->posts['recordDate']} LIMIT $count", [$value]);
        return $feedback;
    }
    /**
     * This just returns the count of the posts from the post table
     * @return \PDOStatement|false PDOStatement if the query is successfully executed false if not. of the posts in the post table
     */
    public static function countPosts(){
        $schema = new Schema;
        $feedback = self::findPost("count(*) as count", "{$schema->posts['id']} != ?", [0]);
        return $feedback;

    }
}
