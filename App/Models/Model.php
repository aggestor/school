<?php

namespace App\Models;

class Model extends Database
{
    /**
     * Makes sure we are using prepared query for each query
     * @param string $sql is actually the SQL query
     * @param array $attributes is the attributes to pass to our query
     * 
     * @return \PDOStatement|false PDOStatement if the query is successfully executed false if not.
     */
    public static function makeQuery($sql, $attributes)
    {
        $db = parent::getInstance();
        $query = $db->prepare($sql);
        $query->execute($attributes);
        return $query;
    }
    /**
     * Inserts data into the database using given parameters
     * 
     * @param string $table  the table in what we put the data
     * @param string $fields the fields in which we'll fill the data
     * @param string $values temporary values usually question marks
     * @param array $attributes the real values that will replace question marks
     * 
     * @return \PDOStatement|false PDOStatement if the query is successfully executed false if not.
     */
    public static function create($table, $fields, $values, $attributes)
    {
        $query = self::makeQuery("INSERT INTO $table($fields) VALUES($values);",$attributes);
        return $query;
    }

    /**
     * Helps to find every from the database based on some parameters
     * 
     * @param string $table the table in which we'll fetch data
     * @param string $fields fields you need from the given table
     * @param string $where the clause, to filter the data you just need only
     * @param array $attr the value to use in the filter
     * 
     * @return \PDOStatement|false PDOStatement if the query is successfully executed false if not.
     */
    public static function find($table,$fields,$where, $attr)
    {
        $query = self::makeQuery("SELECT $fields FROM $table WHERE $where;", $attr);
        return $query;

    }
    /**
     * This is finds data from the database but using many new parameters
     * 
     * @param string $table the table in which we'll fetch data
     * @param string $fields fields you need from the given table
     * @param string $where the clause, to filter the data you just need only
     * @param array $attr the value to use in the filter
     * 
     * @param number $offset the offset of the result of the query
     * @param number $limit the limit of the data per offset of the result of your query
     * @param string $order the order in what you want the data to be
     * 
     * @return \PDOStatement|false PDOStatement if the query is successfully executed false if not. feedback of the fetching, meaning the result of your query
     */
    public static function specialFind($table,$fields,$where, $attr, $order, $offset, $limit)

    {
        $_offset = (int)$offset * (int)$limit;
        $query = self::makeQuery("SELECT $fields FROM $table WHERE $where   ORDER BY $order  LIMIT $limit OFFSET $_offset;", $attr);
        return $query;
    }
    /**
     * Removes specific fields from a specific table
     * 
     * @param string $table the `table/entity` in which we delete data
     * @param string $where the filter of the request, so we delete just what we need to delete. 
     * **NOTE :** If this is empty, everything in the table will be removed
     * 
     * @param array $attr the value to use in the filter
     * 
     * @return \PDOStatement|false PDOStatement if the query is successfully executed false if not. feedback of the removal
     */
    public static function delete($table, $where, $attr)
    {
        $query = self::makeQuery("DELETE FROM $table WHERE $where;", $attr);
        return $query;
    }
    /**
     * Updates specific data into a specific table
     * 
     * @param string $table the table in which we update data
     * @param string $fields fields to update
     * @param string $where the filter
     * @param array $attr the value to use in the filter
     * 
     * @return \PDOStatement|false PDOStatement if the query is successfully executed false if not. feedback of the update
     */
    public static function update($table, $fields,$where, $attr)
    {
        $query = self::makeQuery("UPDATE $table SET $fields WHERE $where;", $attr);
        return $query;
    }

}
