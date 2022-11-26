<?php

namespace App\Models;

class PersonalModel extends Model
{
    public function __construct()
    {
        $this->table = "personals";
    }
    /**
     * @param
     * Creates a new student
     */
    function new ($process) {

        return parent::create($this->table, 'first_name,second_name,last_name,phone_number,mail_address,picture,place_of_birth,date_of_birth,civilian_status,
        sex,id_type,id_number,nationality,state,town,municipality,neighborhood,physical_address,
        function_id,personal_type,academical_level,academical_status,academical_grade,faculty_id,faculty_search_domain,search_domain,engagement_date,base_salary,prime,state_origin,town_origin,municipality_origin,neighborhood_origin,blood_type,height,allergies,handicaps,registration_number,is_registered,is_verified,is_active,academical_year,created_at,last_update,password', '?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,now(),now(),?',
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
                $process->function,
                $process->personal_type,
                $process->academical_level,
                $process->academical_status,
                $process->academical_grade,
                $process->fac,
                $process->fac_search_domain,
                $process->search_domain_speciality,
                $process->engagment_date,
                $process->base_salary,
                $process->prime,
                $process->state_origin,
                $process->town_origin,
                $process->municipality_origin,
                $process->neighborhood_origin,
                $process->blood_type,
                $process->height,
                $process->allergies,
                $process->handicap,
                $process->registration_number,
                $process->is_registered,
                $process->is_verified,
                $process->is_active,
                date('Y'),
                $process->password]);
    }
    /**
     * @param
     * Creates a new student
     */
    function updateData ($process) {

        return parent::update($this->table, 'first_name = ?,second_name = ?,last_name = ?,phone_number = ?,mail_address = ?,picture = ?,place_of_birth = ?,date_of_birth = ?,civilian_status = ?,
        sex = ?,id_type = ?,id_number = ?,nationality = ?,state = ?,town = ?,municipality = ?,neighborhood = ?,physical_address = ?,
        function_id = ?,personal_type = ?,academical_level = ?,academical_status = ?,academical_grade = ?,faculty_id = ?,faculty_search_domain = ?,search_domain = ?,engagement_date = ?,base_salary = ?,prime = ?,state_origin = ?,town_origin = ?,municipality_origin = ?,neighborhood_origin = ?,blood_type = ?,height = ?,allergies = ?,handicaps = ?,registration_number = ?,last_update = NOW(),password = ?', ' id = ?',
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
                $process->function,
                $process->personal_type,
                $process->academical_level,
                $process->academical_status,
                $process->academical_grade,
                $process->fac,
                $process->fac_search_domain,
                $process->search_domain_speciality,
                $process->engagment_date,
                $process->base_salary,
                $process->prime,
                $process->state_origin,
                $process->town_origin,
                $process->municipality_origin,
                $process->neighborhood_origin,
                $process->blood_type,
                $process->height,
                $process->allergies,
                $process->handicap,
                $process->registration_number,
                $process->password, $_SESSION['personal']['id']]);
    }

    public function findLastId()
    {
        return $this->find($this->table, "MAX(id) as id", 'id > ?', [0]);
    }
    public function findPersonalByKey($key, $value)
    {
        return $this->find($this->table, $key, "$key = ?", [$value]);
    }
    public function findPersonalData($key, $value)
    {
        return $this->find($this->table . " INNER JOIN faculty_search_domain ON faculty_search_domain.id =  personals.faculty_search_domain INNER JOIN faculties ON  faculties.id = personals.faculty_id INNER JOIN functions ON functions.id = personals.function_id", "personals.id, personals.first_name, personals.second_name, personals.last_name, personals.phone_number, personals.mail_address, personals.picture, personals.place_of_birth, personals.date_of_birth, personals.civilian_status, personals.sex, personals.id_type, personals.id_number, personals.is_registered, personals.is_verified, personals.is_active, personals.nationality, personals.state, personals.town, personals.municipality, personals.neighborhood, personals.physical_address, personals.state_origin, personals.town_origin, personals.municipality_origin, personals.neighborhood_origin, personals.height, personals.allergies, personals.handicaps, personals.academical_year, personals.academical_status,personals.personal_type,personals.academical_status,academical_level,academical_grade,search_domain,engagement_date, personals.registration_number, personals.academical_year, personals.created_at, personals.last_update, personals.blood_type, personals.base_salary, personals.prime, faculties.name AS f_name,faculties.id AS f_id, faculties.acronym AS f_acronym, functions.name AS fn_name,functions.id AS fn_id, faculty_search_domain.name AS fsd_name,faculty_search_domain.id AS fsd_id, faculty_search_domain.acronym AS fsd_acronym", "$key = ?", [$value]);
    }
    public function findAll()
    {
        return $this->find($this->table . " INNER JOIN faculty_search_domain ON faculty_search_domain.id =  personals.faculty_search_domain INNER JOIN faculties ON  faculties.id = personals.faculty_id INNER JOIN functions ON functions.id = personals.function_id", "personals.id, personals.first_name, personals.second_name, personals.last_name, personals.phone_number, personals.mail_address, personals.picture, personals.place_of_birth, personals.date_of_birth, personals.civilian_status, personals.sex, personals.id_type, personals.id_number, personals.is_registered, personals.is_verified, personals.is_active, personals.nationality, personals.state, personals.town, personals.municipality, personals.neighborhood, personals.physical_address, personals.state_origin, personals.town_origin, personals.municipality_origin, personals.neighborhood_origin, personals.height, personals.allergies, personals.handicaps, personals.academical_year, personals.academical_status,personals.personal_type,personals.academical_status,academical_level,academical_grade,search_domain,engagement_date, personals.registration_number, personals.academical_year, personals.created_at, personals.last_update, personals.blood_type, personals.base_salary, personals.prime, faculties.name AS f_name,faculties.id AS f_id, faculties.acronym AS f_acronym, functions.name AS fn_name,functions.id AS fn_id, faculty_search_domain.name AS fsd_name,faculty_search_domain.id AS fsd_id, faculty_search_domain.acronym AS fsd_acronym", "personals.id != ? ORDER BY personals.id DESC", ['0']);
    }
    public function findOne($key, $value)
    {
        return self::findPersonal($key, "$key = ?", [$value])->fetch();
    }
    public function findAwaitingInscriptions()
    {
        return $this->find($this->table." INNER JOIN functions ON functions.id = personals.function_id", 'first_name, last_name,second_name, personals.id as p_id,registration_number, picture, functions.name as f_name, personal_type, academical_status, is_registered, is_active, is_verified', 'is_registered = ?', ['0']);
    }
    public function findRegisteredOnly()
    {
        return $this->find($this->table."  INNER JOIN functions ON functions.id = personals.function_id", 'first_name, last_name,second_name, personals.id as p_id,registration_number, picture, functions.name as f_name, personal_type, is_registered, is_active, is_verified', 'is_registered = ?', ['1']);
    }
    public function findPersonal($fields, $where, $value)
    {
        return $this->find($this->table, $fields, "$where", $value);
    }
    public function findLast($limit = 4)
    {
        return $this->find($this->table, 'first_name, second_name, last_name,picture,id, registration_number, is_registered, is_verified, is_active', "id != ? ORDER BY id DESC LIMIT $limit", ['0']);
    }
    public function findLastNotRegistered($limit = 4)
    {
        return $this->find($this->table, 'first_name, second_name, last_name,picture,id, registration_number, is_registered, is_verified, is_active', "id != ? AND is_registered = ? ORDER BY id DESC LIMIT $limit", ['0', '0']);
    }
    public function findMany($key, $value, $data = "*")
    {
        return self::findPersonal($data, "$key", $value);
    }
    public function confirmData($id)
    {
        return $this->updateOne('is_registered', '1', $id);
    }
    public function updateOne($key, $value, $data, $k = 'registration_number')
    {
        return $this->update($this->table, "$key = ?", "$k = ?", [$value, $data]);

    }
    public function findRegisteredOnlyBy($id){
        return $this->find($this->table . "  INNER JOIN functions ON functions.id = personals.function_id", 'first_name, last_name,second_name, personals.id as p_id,registration_number, picture, functions.name as f_name, personal_type, is_registered, is_active, is_verified', 'function_id = ?', [$id]);

    }
}
