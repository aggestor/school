<?php
namespace Core;

use App\Models\AdminModel;
use App\Models\Schema;

//will work on this later
class AdminProcessor extends Processor
{
    public function __construct()
    {
        new parent;
    }
    /**
     * Processing the admin login, making sure the admin, the real one with real data is logged in
     */
    public function loginAdminProcess()
    {
        if (!$this->isEmail($_POST[parent::USER_EMAIL])) {
            $this->errors[parent::USER_EMAIL] = "Addresse email invalide !";
        } else if (!$this->adminExist()) {
            $this->errors[parent::USER_EMAIL] = "Cette addresse email n'existe pas !";
        }
        if ($this->adminExist() && $this->valuesMatch(hash("SHA256", $_POST[parent::USER_PASSWORD]), $this->admin['_password'])) {
            $this->isAuth = true;
        } else {
            $this->errors[parent::USER_PASSWORD] = "Le mot de passe est incorrect !";
        }
    
    }
    /**
     * This whole process here is for adding a new user admin into the database, to add a user you need to pass all the conditions bellow.
     * 
     * @return boolean Feedback of the request
     */
    public function addUserProcess()
    {   if(!$this->isNull(parent::SAVE_USER)){
            if ($this->isNull($_POST[parent::USER_NAMES]) || !$this->hasMoreCharsThen($_POST[parent::USER_NAMES], 5)) {
                $this->errors[parent::USER_NAMES] = "Le nom de l'utilisateur doit avoir plus de 5 caractères !";
            }
            if (!$this->isEmail($_POST[parent::USER_EMAIL])) {
                $this->errors[parent::USER_EMAIL] = "Addresse email invalide !";
            }
            if ($this->isNull($_POST[parent::USER_PASSWORD]) || !$this->hasMoreCharsThen($_POST[parent::USER_PASSWORD], 8)) {
                $this->errors[parent::USER_PASSWORD] = "Le mot de passe doit avoir plus de 8 caractères !";
            } 
            // else if ($this->valuesMatch($_POST[parent::USER_PASSWORD], parent::USER_PASSWORD_2)) {
            //     $this->errors[parent::USER_PASSWORD] = "Le mot de passe ne correspond pas !";
            // }
            $this->adminIdExist();
        }

    }
    /**
     * Searches a mail address into the database and tells whether it exists in the database or not
     * 
     * @return boolean TRUE if the mail is found, else it returns FALSE.
     */
    public function adminExist(){
        $admin_exists = false;
        $admin = AdminModel::findByKeyValue("email", htmlspecialchars($_POST[parent::USER_EMAIL]));
        if($admin->rowCount() == 1){
            $this->admin = $admin->fetch();
            $admin_exists = true;
        }
        return $admin_exists;
    }
    /**
     * Makes sure the generated id for the new admin doesn't exist into  the database
     * @return boolean boolean to tell whether it exists or not.
     */
    public function adminIdExist(){
        $generator = new GenerateId();
        $id = $generator::generate();
        $admin = AdminModel::findAdminId($id);
        if($admin->rowCount() == 0){
            $this->id = $id;
            return false;
        }else{
            $this->adminIdExist();
        }
    }
    /**
     * This function returns  the admin id.
     * @return string admin's id.
     */
    public function getAdminId(){
        return $this->id;
    }
    /**
     * Fetch all admins from the database
     * @return array containing all the admins
     */
    public function getAllAdmins(){
        $admins = AdminModel::findAll();
        $allAdmins = [];
        while($all = $admins->fetch()){
            array_push($allAdmins, $all);
        }
        return $allAdmins;
    }
    /**
     * Finds a admin name using his id.
     * 
     * @param string $id the of the admin to find
     */
    public function findAdminNameById($id){
        $schema = new Schema;
        $admin = AdminModel::findAdmin($schema->admin['name'],"{$schema->admin['id']} = ?",[$id]);
        $admin_ = $admin->fetch();
        return $admin_[$schema->admin['name']];
    }
    /**
     * This function containing the whole process to update an admin.
     * It makes sure the data provided by the user are follows the rules below.
     * 
     * @return boolean telling whether the data is correct or not.
     */
    public function updateAdminProcess(){
        if ($this->isNull($_POST[parent::USER_NAMES]) || !$this->hasMoreCharsThen($_POST[parent::USER_NAMES], 5)) {
            $this->errors[parent::USER_NAMES] = "Le nom de l'utilisateur doit avoir plus de 5 caractères !";
        }
        if (!$this->isEmail($_POST[parent::USER_EMAIL])) {
            $this->errors[parent::USER_EMAIL] = "Addresse email invalide !";
        }
        if ($this->isNull($_POST[parent::USER_PASSWORD]) || !$this->hasMoreCharsThen($_POST[parent::USER_PASSWORD], 8)) {
            $this->errors[parent::USER_PASSWORD] = "Le mot de passe doit avoir plus de 8 caractères !";
        } else if ($this->valuesMatch($_POST[parent::USER_PASSWORD], parent::USER_PASSWORD_2)) {
            $this->errors[parent::USER_PASSWORD] = "Le mot de passe ne correspond pas !";
        }
    }
}
