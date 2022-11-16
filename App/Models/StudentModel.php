<?php

namespace App\Models;

class StudentModel extends Model{
    public function __construct(){
        $this->table = "students";
    }
    /**
     * @param 
     * Creates a new student
     */
    public function new($process){
        	
        return parent::create($this->table,'first_name,second_name,last_name,phone_number,mail_address,picture,place_of_birth,date_of_birth,civilian_status,
        sex,id_type,id_number,nationality,state,town,municipality,neighborhood,physical_address,student_status,faculty_id,department_id,orientation,promotion_id,state_origin,town_origin,municipality_origin,neighborhood_origin,clg_name,clg_state,clg_town,clg_section_studied,clg_l_e_center,clg_l_e_year,clg_l_e_percentage,clg_diploma_number,ps_father,ps_mother,ps_sponsor,ps_phone_number,ps_type_sponsor,blood_type,height,allergies,handicaps,registration_number,is_registered,is_verified,is_active,student_since,created_at,last_update,password','?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,now(),now(),?',
        [$process->user_first_name, 
        $process->user_second_name,
        $process->user_last_name,
        $process->user_phone_number, 
        $process->user_email, 
        $process->profile_file, 
        $process->birth_place, 
        $process->birth_date, 
        $process->civilian_status, 
        $process->sex, 
        $process->id_type, 
        $process->id_number, 
        $process->nationality, 
        $process->state, 
        $process->town, 
        $process->municipality, 
        $process->neighborhood, 
        $process->physical_address, 
        $process->student_status, 
        $process->fac_to_study,
        $process->department_to_study, 
        $process->orientation_to_study, 
        $process->promotion_to_study, 
        $process->state_origin, 
        $process->town_origin, 
        $process->municipality_origin,
        $process->neighborhood_origin, 
        $process->name_ss,
        $process->state_ss,
        $process->town_ss,
        $process->section_ss,
        $process->exetat_center,
        $process->diploma_year,
        $process->exetat_pourcentage, 
        $process->diploma_number, 
        $process->father_name, 
        $process->mother_name, 
        $process->sponsor_name, 
        $process->sponsor_phone_number, 
        $process->sponsoring_type, 
        $process->blood_type, 
        $process->height,
        $process->allergies,
        $process->handicap,
        $process->registration_number,
        $process->is_registered,
        $process->is_verified,
        $process->is_active,
        $process->student_since,
        $process->password]);
    }
    public function findLastId(){
        return $this->find($this->table,"MAX(id) as id",'id > ?',[0]);
    }
    public function findStudentByKey($key, $value){
        return $this->find($this->table,$key,"$key = ?", [$value]);
    }
    public function findStudentData($key, $value){
        return $this->find($this->table. " INNER JOIN departments ON departments.id =  students.department_id INNER JOIN faculties ON  faculties.id = students.faculty_id INNER JOIN promotions ON promotions.id = students.promotion_id","students.id, students.first_name, students.second_name, students.last_name, students.phone_number, students.mail_address, students.picture, students.place_of_birth, students.date_of_birth, students.civilian_status, students.sex, students.id_type, students.id_number, students.is_registered, students.is_verified, students.is_active, students.nationality, students.state, students.town, students.municipality, students.neighborhood, students.neighborhood, students.physical_address, students.student_status,students.orientation, students.state_origin, students.town_origin, students.municipality_origin, students.neighborhood_origin, students.clg_name, students.clg_state, students.clg_town, students.clg_section_studied, students.clg_l_e_center, students.clg_l_e_year, students.clg_l_e_percentage, students.clg_diploma_number, students.ps_father, students.ps_mother, students.ps_sponsor, students.ps_phone_number, students.ps_type_sponsor,students.blood_type, students.height, students.allergies, students.handicaps, students.document, students.registration_number, students.student_since, students.created_at, students.last_update, faculties.name AS f_name, faculties.acronym AS f_acronym, departments.name AS d_name, departments.acronym AS d_acronym, promotions.name AS p_name, promotions.acronym AS p_acronym","$key = ?", [$value]);
    }
    public function findOne($key, $value){
        return self::findStudent($key, "$key = ?", [$value])->fetch();
    }
     public static function findStudent($fields, $where, $value){
        return parent::find('students', $fields, "$where", $value);
    }
    public function findMany($key, $value, $data = "*"){
        return self::findStudent($data, "$key", $value);
    }
}