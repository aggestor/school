<?php
namespace Core;

use App\Exceptions\ForbiddenException;
use App\Models\DocModel;
use App\Models\StudentModel;

class StudentProcessor extends Processor
{   
    public $student = null;
    public $docs = null;
    public function __construct()
    {
        $this->student = new StudentModel;
        $this->docs = new DocModel;
        $this->states = ["Bas-Uele","Équateur","Haut-Katanga","Haut-Lomami","Haut-Uele","Ituri","Kasaï","Kasaï central","Kasaï oriental","Kinshasa","Kongo-Centra","Kwango","Kwilu","Lomami","Lualaba","Mai-Ndombe","Maniema","Mongala","Nord-Kivu","Nord-Ubangi","Sankuru","Sud-Kivu","Sud-Ubangi","Tanganyika","Tshopo","Tshuapa"];
    }
    public function resetPasswordProcess(){
        $this->email = $this->sanitize('email');

        if (!$this->isEmail($this->email)) {
            $this->setError('email', "Addresse email invalide !");
        } else {
            if ($this->StudentKeyExist("mail_address", $this->email)) {
                $this->setError('email', "Addresse n'existe pas !");
            }
        }
    }
    public function checkPasswordUpdate(){
        $this->initPasswordUpdate();
        if($this->old_password !== '' AND $this->old_password !== 'leave'){
            if($this->encrypt($this->old_password) != $_SESSION['student']['password']){
                $this->setError('old_password', "Ancien mot de passe incorrect ");
            }else{
                if(!$this->hasMoreCharsThen($this->new_password,6)){
                    $this->setError('new_password', "Mot de passe trop court, minimum 6 Caractètes !");
                }
                if(!$this->valuesMatch($this->new_password, $this->password)){
                    $this->setError('repeat_password', "Le mot de passe ne correspond pas ");
                }
            }
            $this->password = $this->encrypt($this->password);
        }else if($this->old_password == 'leave'){
            $this->password = 'leave';
        }
        else{
            $this->password = $_SESSION['student']['password'];
        }
    }
    private function initLogin(){
        $this->email = $this->sanitize('email');
        $this->password = $this->sanitize('password');
    }
    /**
     * Processing the student login, making sure the student, the real one with real data is logged in
     */
    public function loginStudentProcess()
    {
        $this->initLogin();

        if(!$this->isEmail($this->email)){
            $this->setError('email', "Addresse email invalide !");
        }else{
            if ($this->StudentKeyExist("mail_address", $this->email)) {
                $this->setError('email', "Addresse n'existe pas !");
            }
        }
        if(!$this->hasMoreCharsThen($this->password, 6)){
            $this->setError('password',"Mot de passe trop court !");
        }
        $result = $this->student->findMany("mail_address = ?", [$this->email],"registration_number,id,mail_address, password,picture, is_active")->fetch();
        if($result){
            if($result->is_active == '1'){
                
                if($this->valuesMatch(hash("SHA256", $this->password),$result->password)){
                    $this->student_data = $result;
                    return;
                }else{
                    $this->setError("password", "Mot de passe incorrect ");
                }
            }else {
                $this->setError('403', 'issue');
            };
        }
        
    }
    public function identifyStudentProcess()
    {
        $this->checkIdentity();
        $this->checkAddress();
        $this->checkOrigin();
        $this->checkOrientation();
        $this->checkSS();
        $this->checkParentSponsor();
        $this->checkHealth();
        $this->checkUserProfile();
        $this->setBooleans();
    }
    public function updateStudentProcess()
    {
        $this->checkIdentityForUpdate();
        $this->checkAddress();
        $this->checkOrigin();
        $this->checkOrientation();
        $this->checkSS();
        $this->checkParentSponsor();
        $this->checkHealth();
        $this->checkUserProfileUpdate();
        $this->checkPasswordUpdate();
    }
    public function initFiles(){
            $this->user_profile = $_FILES['user_profile'];
    }
    public function setBooleans(){
        $this->is_registered = 0;
        $this->is_verified = 0;
        $this->is_active = 1;
    }
    public function checkUserProfile(){
        $accepted_size = 41943040;
        $accepted_extensions = [".png", ".jpg", ".jpeg"];
        if (!empty($this->user_profile['name'])) {
            $extension = strrchr($this->user_profile['name'], ".");
            if ($this->user_profile['size'] > $accepted_size) {
                $this->errors['user_profile'] = "La taille de l'image ne doit pas depasser 4 Mo !";
            }
            if (!in_array(strtolower($extension), $accepted_extensions)) {
                $this->errors['user_profile'] = "Le 'image doit etre de format png jpg ou jpeg ";
            }
            $this->profile_file = $this->user_email. $extension;
        } else {
            $this->profile_file = null;
            $this->errors['user_profile'] = "La photo de profil est obligatoire !";

        }

    }
    public function checkUserProfileUpdate(){
        $accepted_size = 41943040;
        $accepted_extensions = [".png", ".jpg", ".jpeg"];
        if (!empty($this->user_profile['name'])) {
            $extension = strrchr($this->user_profile['name'], ".");
            if ($this->user_profile['size'] > $accepted_size) {
                $this->errors['user_profile'] = "La taille de l'image ne doit pas depasser 4 Mo !";
            }
            if (!in_array(strtolower($extension), $accepted_extensions)) {
                $this->errors['user_profile'] = "Le 'image doit etre de format png jpg ou jpeg ";
            }
            $this->profile_file = $this->user_email. $extension;
            $this->photo_updated = true;
        }else{
            $this->photo_updated = false;
            $this->profile_file = $_SESSION['mod-user']['picture'];

        }

    }
    public function initIdentity(){
        if(isset($_POST['register_student'])){
            $this->user_first_name = htmlspecialchars($_POST['user_first_name']);
            $this->user_second_name = htmlspecialchars($_POST['user_second_name']);
            $this->user_last_name = htmlentities($_POST['user_last_name']);
            $this->user_phone_number = htmlspecialchars($_POST['user_phone_number']);
            $this->user_email = htmlspecialchars($_POST['user_email']);
            $this->birth_place = htmlspecialchars($_POST['birth_place']);
            $this->birth_date = htmlspecialchars($_POST['birth_date']);
            $this->civilian_status = htmlspecialchars($_POST['civilian_status']);
            $this->sex = htmlspecialchars($_POST['sex']);
            $this->initFiles();
        }
    }
    public function initPasswordUpdate(){
        if(isset($_POST['register_student'])){
            $this->old_password = $this->sanitize('old_password');
            $this->new_password = $this->sanitize('new_password');
            $this->password = $this->sanitize('repeat_password');

            if (isset($_SESSION['admin'])) {
                $this->old_password = 'leave';
            }

        }
    }
    public function initIdentityUpdate(){
        if(isset($_POST['register_student'])){
            $this->user_first_name = htmlspecialchars($_POST['user_first_name']);
            $this->user_second_name = htmlspecialchars($_POST['user_second_name']);
            $this->user_last_name = htmlentities($_POST['user_last_name']);
            $this->user_phone_number = htmlspecialchars($_POST['user_phone_number']);
            $this->user_email = htmlspecialchars($_POST['user_email']);
            $this->birth_place = htmlspecialchars($_POST['birth_place']);
            $this->birth_date = htmlspecialchars($_POST['birth_date']);
            $this->civilian_status = htmlspecialchars($_POST['civilian_status']);
            $this->sex = htmlspecialchars($_POST['sex']);
        }
    }
    public function initAddress(){
        if(isset($_POST['register_student'])){
            $this->id_type = htmlspecialchars($_POST['id_type']);
            $this->id_number = htmlspecialchars($_POST['id_number']);
            $this->physical_address = htmlspecialchars($_POST['physical_address']);
            $this->neighborhood = htmlspecialchars($_POST['neighborhood']);
            $this->municipality = htmlspecialchars($_POST['municipality']);
            $this->town = htmlspecialchars($_POST['town']);
            $this->state = htmlspecialchars($_POST['state']);
            $this->nationality = htmlspecialchars($_POST['nationality']);
            $this->student_status = htmlspecialchars($_POST['student_status']);
        }
    }
    public function initOrientation(){
        if(isset($_POST['register_student'])){
            $this->fac_to_study = $this->sanitize('fac_to_study');
            $this->department_to_study = $this->sanitize('department_to_study');
            $this->orientation_to_study = $this->sanitize('orientation_to_study');
            $this->promotion_to_study = $this->sanitize('promotion_to_study');
        }
    }
    public function initOrigin(){
        if(isset($_POST['register_student'])){
            $this->neighborhood_origin = htmlspecialchars($_POST['neighborhood_origin']);
            $this->municipality_origin = htmlspecialchars($_POST['municipality_origin']);
            $this->town_origin = htmlspecialchars($_POST['town_origin']);
            $this->state_origin = htmlspecialchars($_POST['state_origin']);
        }
    }
    public function initParentSponsor(){
        if(isset($_POST['register_student'])){
            $this->father_name = htmlspecialchars($_POST['father_name']);
            $this->mother_name = htmlspecialchars($_POST['mother_name']);
            $this->sponsoring_type = htmlspecialchars($_POST['sponsoring_type']);
            $this->sponsor_name = htmlspecialchars($_POST['sponsor_name']);
            $this->sponsor_phone_number = htmlspecialchars($_POST['sponsor_phone_number']);
        }
    }
    public function initHealth(){
        if(isset($_POST['register_student'])){
            $this->handicap = htmlspecialchars($_POST['handicap']);
            $this->allergies = htmlspecialchars($_POST['allergies']);
            $this->height = htmlspecialchars($_POST['height']);
            $this->blood_type = htmlspecialchars($_POST['blood_type']);
        }
    }
    public function initSS(){
        if(isset($_POST['register_student'])){ 
            $this->diploma_number = htmlspecialchars($_POST['diploma_number']);
            $this->exetat_pourcentage = htmlspecialchars($_POST['exetat_pourcentage']);
            $this->diploma_year = htmlspecialchars($_POST['diploma_year']);
            $this->exetat_center = htmlspecialchars($_POST['exetat_center']);
            $this->town_ss = htmlspecialchars($_POST['town_ss']);
            $this->state_ss = htmlspecialchars($_POST['state_ss']);
            $this->name_ss = htmlspecialchars($_POST['name_ss']);
            $this->section_ss = htmlspecialchars($_POST['section_ss']);
        }
    }
    public function checkHealth(){
        $this->initHealth();
        if (!$this->hasMoreCharsThen($this->height, 2)) {
            $this->errors['height'] = "La taille mentionnée est incorrecte !";
        }
        if (!$this->hasMoreCharsThen($this->height, 2)) {
            $this->errors['height'] = "La taille mentionnée est incorrecte !";
        }
        if (!$this->hasMoreCharsThen($this->blood_type, 2)) {
            $this->errors['blood_type'] = "Le groupe sanguiin mentionné est incorrect !";
        }
    }
    public function checkParentSponsor(){
        $this->initParentSponsor();
        if (!$this->hasMoreCharsThen($this->father_name, 2)) {
            $this->errors['father_name'] = "Le nom du père est invalide !";
        }
        if (!$this->hasMoreCharsThen($this->mother_name, 2)) {
            $this->errors['mother_name'] = "Le nom de la mère est invalide !";
        }
        if (!$this->hasMoreCharsThen($this->sponsor_name, 2)) {
            $this->errors['sponsor_name'] = "Le nom du sponsor invalide !";
        }
        if (!$this->isPhoneNumber($this->sponsor_phone_number)) {
            $this->errors['sponsor_phone_number'] = "Numéro du sponsor invalide !";
        }
        if (!in_array($this->sponsoring_type, ['1','2'])) {
            $this->errors['sponsoring_type'] = "Type de bourse choisi invalide !";
        }
    }
    public function checkSS(){
        $this->initSS();
        if(!in_array($this->state_ss,$this->states)){
            $this->errors['state_ss'] = "Province/Etat choisie invalide !";
        }
        if (!$this->isNumeric($this->diploma_number)) {
            $this->errors['diploma_number'] = "Numéro du diplome invalide !";
        }
        if (!$this->isNumeric($this->exetat_pourcentage) OR ($this->exetat_pourcentage < 50  OR $this->exetat_pourcentage > 99 )) {
            $this->errors['exetat_pourcentage'] = "Pourcentage exetat invalide !";
        }
        if (!$this->hasMoreCharsThen($this->town_ss, 2)) {
            $this->errors['town_ss'] = "Territoire/Ville  invalide !";
        }
        if (!$this->hasMoreCharsThen($this->section_ss, 2)) {
            $this->errors['section_ss'] = "Section / Option  invalide !";
        }
        if (!$this->hasMoreCharsThen($this->name_ss, 2)) {
            $this->errors['name_ss'] = "Nom de l'institution trop court";
        }
        if (!$this->hasMoreCharsThen($this->diploma_year, 4)) {
            $this->errors['diploma_year'] = "Année incorrect !";
        }
        if (!$this->hasMoreCharsThen($this->exetat_center, 2)) {
            $this->errors['exetat_center'] = "Centre d'exetat invalide !";
        }

    }
    public function checkOrigin(){
        $this->initOrigin();
        
        if(!in_array($this->state_origin,$this->states)){
            $this->setError('state_origin', "Province/Etat choisie invalide !");
        }
        if (!$this->hasMoreCharsThen($this->town_origin, 2)) {
            $this->setError('town_origin', "Territoire/Ville  invalide !");
        }
        if (!$this->hasMoreCharsThen($this->municipality_origin, 2)) {
            $this->setError('municipality_origin', "Collectivité/Communie/Secteur invalide !");
        }
        if (!$this->hasMoreCharsThen($this->neighborhood_origin, 2)) {
            $this->setError('neighborhood_origin', "Groupement/Quartier invalide !");
        }

    }
    public function checkOrientation(){
        $this->initOrientation();
        if(!$this->has2NumbersOnly($this->fac_to_study)){
            $this->setError('fac_to_study', "Faculté choisie invalide !");
        }
        if(!$this->has2NumbersOnly($this->department_to_study)){
            $this->setError('department_to_study', "Faculté choisie invalide !");
        }
        if (!$this->hasMoreCharsThen($this->orientation_to_study, 5)) {
            $this->setError('orientation_to_study', "L'orientation est invalide !");
        }
        if (!$this->has2NumbersOnly($this->promotion_to_study)) {
            $this->setError('promotion_to_study',"La promotion est invalide !");
        }

    }
    public function checkIdentity(){
        $this->initIdentity();
        $this->generateRegistrationNumber();

        if(!$this->hasMoreCharsThen($this->user_first_name,2)){
            $this->errors['user_first_name'] = 'Le nom doit avoir au minium 2 caractères !';
        }
        if(!$this->hasMoreCharsThen($this->user_second_name,2)){
            $this->errors['user_second_name'] = 'Le Post-nom doit avoir au minium 2 caractères !';
        }
        if(!$this->hasMoreCharsThen($this->user_last_name,2)){
            $this->errors['user_last_name'] = 'Le Prénom doit avoir au minium 2 caractères !';
        }
        if(!$this->isPhoneNumber($this->user_phone_number)){
            $this->errors['user_phone_number'] = 'Numéro de téléphone incorrect !';
        }
        if(!$this->hasMoreCharsThen($this->civilian_status,9)){
            $this->errors['civilian_status'] = "Choix de l'état civil invalide !";
        }
        if(!$this->hasMoreCharsThen($this->sex,4)){
            $this->errors['sex'] = 'Choix du sexe invalide !';
        }
        if(!$this->isEmail($this->user_email)){
            $this->errors['user_email'] = 'Addresse Mail incorrect !';
        }
        if($this->mailExist($this->user_email)){
            $this->errors['user_email'] = 'Addresse Mail déjà utilisée !';
        }
        if(!$this->hasMoreCharsThen($this->birth_place, 4)){
            $this->errors['birth_place'] = 'Lieu de naissance invalide !';
        }
        if(!$this->isNullThenBreak($this->birth_date)){
            $this->errors['birth_date'] = 'Date de naissance incorrecte !';
        }
    }
    public function checkIdentityForUpdate(){
        $this->initFiles();
        $this->initIdentityUpdate();

        if (!$this->hasMoreCharsThen($this->user_first_name, 2)) {
            $this->errors['user_first_name'] = 'Le nom doit avoir au minium 2 caractères !';
        }
        if (!$this->hasMoreCharsThen($this->user_second_name, 2)) {
            $this->errors['user_second_name'] = 'Le Post-nom doit avoir au minium 2 caractères !';
        }
        if (!$this->hasMoreCharsThen($this->user_last_name, 2)) {
            $this->errors['user_last_name'] = 'Le Prénom doit avoir au minium 2 caractères !';
        }
        if (!$this->isPhoneNumber($this->user_phone_number)) {
            $this->errors['user_phone_number'] = 'Numéro de téléphone incorrect !';
        }
        if (!$this->hasMoreCharsThen($this->civilian_status, 9)) {
            $this->errors['civilian_status'] = "Choix de l'état civil invalide !";
        }
        if (!$this->hasMoreCharsThen($this->sex, 4)) {
            $this->errors['sex'] = 'Choix du sexe invalide !';
        }
        if (!$this->isEmail($this->user_email)) {
            $this->errors['user_email'] = 'Addresse Mail incorrect !';
        }
        if($_SESSION['mod-user']['email'] != $this->user_email){
            if ($this->mailExist($this->user_email)) {
                $this->errors['user_email'] = 'Addresse Mail déjà utilisée !';
            }
        }
        if (!$this->hasMoreCharsThen($this->birth_place, 4)) {
            $this->errors['birth_place'] = 'Lieu de naissance invalide !';
        }
        if (!$this->isNullThenBreak($this->birth_date)) {
            $this->errors['birth_date'] = 'Date de naissance incorrecte !';
        }
    }
    public function checkAddress(){
        $this->initAddress();

        if(!$this->hasMoreCharsThen($this->id_type,9)){
            $this->errors['id_type'] = 'Type de carte invalide !';
        }
        if(!$this->hasMoreCharsThen($this->id_number,4)){
            $this->errors['id_number'] = 'Numéro de carte douteux !';
        }
        if(!$this->hasMoreCharsThen($this->physical_address,2)){
            $this->errors['physical_address'] = 'Addresse physique incorrecte';
        }
        if(!$this->hasMoreCharsThen($this->neighborhood,2)){
            $this->errors['neighborhood'] = 'Groupement/Quartier incorrect !';
        }
        if(!$this->hasMoreCharsThen($this->municipality,2)){
            $this->errors['municipality'] = "Collectivité/Secteur/Commune invalide !";
        }
        if(!$this->hasMoreCharsThen($this->town,2)){
            $this->errors['town'] = 'Territoire/Ville invalide !';
        }
        if(!$this->hasMoreCharsThen($this->state,2)){
            $this->errors['state'] = 'Province/Etat invalide !';
        }
        if(!$this->hasMoreCharsThen($this->nationality, 2)){
            $this->errors['nationality'] = 'Nationalité incorrecte';
        }
        if(!$this->hasMoreCharsThen($this->student_status,6)){
            $this->errors['student_status'] = "Type d'étudiant choisi non valide!";
        }
    }
    public function generateRegistrationNumber(){
        $this->findRegistrationNumber();
    }
    public function findLastId(){
        $data = $this->student->findLastId()->fetch()->id;
        return $data = $data ? $data : 0;
    }
    public function mailExist($email = null){
        $data = $this->student->findStudentByKey('mail_address',$email ?? $this->user_email);
        $count = $this->getCount($data);
        if($count == 0) return false;
        return true;
    }
    public function findRegistrationNumber($number = null){
       $default_number = $this->getCalculateRegistrationNumber();
       $registrations = $this->student->findStudentByKey('registration_number',$number ?? $default_number );
       $count = $registrations->rowCount();
       if($count == 0){
         $this->registration_number = $default_number;
         $this->password = $this->encrypt($this->user_phone_number);
       }
    }
    public function getCalculateRegistrationNumber(){
      $id = $this->findLastId();
      $number  = '';
       if($id > 0){
           if($this->withinInterval($id,1,9)){
             $number = '000'.$id;
           }
           if($this->withinInterval($id,10,99)){
              $number = '00'.$id;
           }
           if($this->withinInterval($id,100,999)){
              $number = '0'.$id;
           }
           if($id > 1000){
              $number = $id;
           }
       }else{
        $number = '0001';
       }
       return $number;
    }
    /**
     * Searches a student specific data into the database and tells whether it exists in the database or not
     * 
     * @return boolean TRUE if the data is found, else it returns FALSE.
     */
    public function StudentKeyExist($key, $value){
        $result = $this->student->findOne($key, $value);
        return $result === false;
    }
    /**
     * Searches a student specific data into the database and tells whether it exists in the database or not
     * 
     * @return boolean TRUE if the data is found, else it returns FALSE.
     */
    public function docExist($value){
        $result = $this->docs->findExactOneDoc($value, 'student',$_SESSION['mod-user']['id']);
        return $result === false;
    }
    public function initAddDocs(){
        $this->type = $this->sanitize('type');
        $this->doc = $_FILES['document'];
        $this->type_user = 'student';
        if(isset($_SESSION['admin'])){
            $this->id = $_GET['id'];
        }
    }
    public function addDocsProcess(){
        $this->initAddDocs();
        if(!$this->hasMoreCharsThen($this->type,10)){
            $this->setError("type", "Ce type semble invalide");
        }
        if(!$this->docExist($this->type)){
            $this->setError("type", "Vous avez déjà uploader ce type de document ($this->type)");
        }
        $this->checkUserDoc();
    }
    public function updateDocsProcess(){
        $this->initAddDocs();
        if(!$this->hasMoreCharsThen($this->type,10)){
            $this->setError("type", "Ce type semble invalide");
        }
        $this->checkUserDocUpdate();
    }
    public function checkUserDoc(){
        $accepted_size = 41943040;
        $accepted_extensions = [".pdf"];
        if (!empty($this->doc['name'])) {
            $extension = strrchr($this->doc['name'], ".");
            
            if ($this->doc['size'] > $accepted_size) {
                $this->errors['document'] = "La taille du fichier ne doit pas depasser 4 Mo !";
            }
            if (!in_array(strtolower($extension), $accepted_extensions)) {
                $this->errors['document'] = "Le fichier doit etre en format PDF ";
            }
            $mat = $_SESSION['mod-user']['mat'] ;
            $this->document_file = time()."_".$mat."_". $extension;
        } else {
            $this->document_file = null;
            $this->errors['document'] = "Le fichier est obligatoire !";
        }

    }
    public function checkUserDocUpdate(){
        $accepted_size = 41943040;
        $accepted_extensions = [".pdf"];
        if (!empty($this->doc['name'])) {
            $extension = strrchr($this->doc['name'], ".");
            if ($this->doc['size'] > $accepted_size) {
                $this->errors['document'] = "La taille du fichier ne doit pas depasser 4 Mo !";
            }
            if (!in_array(strtolower($extension), $accepted_extensions)) {
                $this->errors['document'] = "Le fichier doit etre en format PDF ";
            }
            $mat = $_SESSION['mod-user']['mat'];
            $this->document_file = time()."_".$mat."_". $extension;
        } else {
            $this->document_file = null;
        }

    }
    
    
}
