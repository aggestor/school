<?php

namespace Core;

use App\Controllers\Controller;
use App\Models\AdminModel;
use App\Models\PostModel;
use App\Models\Schema;
use stdClass;

//this class is kinda busy and un documented but ill do some changes here SOOOOOONNNNNNNNN !!!
// this will be some kind of abstract class and jus the processors parent
class Processor extends Controller{

    const RGX_TELEPHONE = "/^(((\+)|0)([1-9]{1,3})([0-9]{6,15}))$/";

    public $errors = [];
    public $id = "";
    public $postId = "";
    public $isAuth ;
    public $thumbnail;

    public function getErrors(){
        return $this->errors;
    }
    public function hasErrors(){
        if(count($this->errors) == 0) return false;
        else return true;
    }

    /**
     * Makes sure the data entered is a real mail address
     * 
     * @param string $email the data to verify mail address
     * 
     * @return boolean TRUE if it's a real email address else FALSE
     */
    public function isEmail($email) : bool{
        $this->isNullThenBreak($email);
        $is_email = !filter_var($email, FILTER_VALIDATE_EMAIL) ? false : true;
        return $is_email;
    }
    /**
     * Makes sure the data entered is a real phone number based on the above REGEX
     *
     * @param string $number the data to verify as phone number
     *
     * @return boolean TRUE if it's a real phone number else FALSE
     */
    public function isPhoneNumber($number){
        $this->isNullThenBreak($number);
        $is_number = !preg_match(self::RGX_TELEPHONE, $number) ? false : true;
        return $is_number;

    }
    /**
     * Makes sure two given data match by type and value. We use strict equality to do so.
     * @param mixed $param1 is the first one
     * @param mixed $param2 is the second one
     * 
     * @return boolean TRUE if they match else FALSE
     */
    public function valuesMatch( $param1, $param2){
        $this->isNullThenBreak($param1);
        $this->isNullThenBreak($param2);
        if($param1 === $param2) return true;
    }
    /**
     * Test a string and makes sure the given string has more characters than the given length
     * @param string $str the string to test
     * @param number $length the length to compare with
     * 
     * @return boolean TRUE if the the string has more chars than the given length else FALSE
     */
    public function hasMoreCharsThen($str, $length){
        $this->isNullThenBreak($str);
        $condition = false;
        if(strlen($str) >= $length){
            $condition = true;
        }
        return $condition;
    }
    /**
     * Test whether the given data is not null then return the result as boolean
     * 
     * @param mixed $data is the actual data to test
     * 
     * @return boolean TRUE if the data is null else FALSE
     */
    public function isNull($data){
        $is_null = !isset($data) || empty($data) ? true : false;
        return $is_null;
    }
    /**
     * Makes sure the given data is not null and then continue the program, else it will directly end
     * @param mixed $data is the data to test
     * 
     * @return boolean saying if the data is not null
     */
    public function isNullThenBreak($data){
        return !$this->isNull($data);
    }
    /**
     * Makes sure the given data is numeric
     * @param mixed $data is the data to test
     * 
     * @return boolean saying if the data is a numeric/numeric string or not
     */
    public function isNumeric($data){
        $this->isNullThenBreak($data);

        return is_numeric($data);
    }
    /**
     * Makes sure all the data into the given array are not not null else it will return false.
     * 
     * @param array $fields  the data to verify
     * 
     * @return boolean  TRUE if all the array'is item are not null
     */
    public function everythingIsNull( $fields = []) : bool{
        $result = true;
        foreach($fields as  $field){
            if($this->isNull($field)){
                $result = false;
                break;
            }else continue;
        }
        return $result;
    }
    /**
     * Tests if the given string doesn't contain spaces
     * @param string $str the string to test
     * 
     * @return boolean TRUE if  there's no space else FALSE
     */
    public function hasNoSpaces($str){
        $this->isNullThenBreak($str);
        $condition = true;
        if(!empty($str) || $str !== ""){
            if(!preg_match('/^\s*$/',$str)){
                $condition = true;
            }
        }
        return $condition;
    }
    /**
     * Fetch pdo data and returns it into an array
     * @param  \PDOStatement $data the data to count
     */
    public function loadData($data){
        $accumulator = [];
        while($item  = $data->fetch()){
            array_push($accumulator, $item);
        }
        return $accumulator;
    }
    /**
     * Gets the count of data
     * @param \PDOStatement $data the data to count
     */
    public function getCount($data){
        if(is_array($data)) return count($data);
        return $data->rowCount();
    }
    /**
     * Makes sure given humber is within the given interval
     * @param number $data the number to check
     * @param number $number1 the beginning of the interval
     * @param number $number2 the end of the interval
     */
    public function withinInterval($data,$number1, $number2){
      if($data >= $number1 AND $data <=$number2 ) return true;
      return false;
    }
    /**
     * Sets an error using a given key-value pair
     * @param string $key the key of the error
     * @param string $value the value of the error
     */
    public function setError($key, $value){
        $this->errors[$key] = $value;
    }
    /**
     * Fills an array
     * @param array $data array
     */
    public function setData($data){
        $this->data = $data;
    }
    /**
     * Returns propriety data
     */
    public function getData(){
        return $this->data;
    }
    /**
     * Returns a sanitized version of the post coming data
     * @return mixed
     */
    public function sanitize($param){
        return htmlspecialchars($_POST[$param]);
    }
    /**
     * Returns hashed string
     * @return string
     */
    public function encrypt(string $plain_text){
        return hash("SHA256",$plain_text);
    }
    public function has2NumbersOnly($data){
        if(strlen($data) <= 2 AND  is_numeric($data)) return true;
        return false;
    }
}