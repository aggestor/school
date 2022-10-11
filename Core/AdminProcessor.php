<?php
namespace Core;

use App\Models\AdminModel;
use App\Models\Schema;

//will work on this later
class AdminProcessor extends Processor
{
    public $admin = null;
    public $data = [];
    public function __construct()
    {
        !$this->admin && $this->admin = new AdminModel;
    }
    /**
     * Processing the admin login, making sure the admin, the real one with real data is logged in
     */
    public function loginAdminProcess()
    {
        if (!$this->isEmail($_POST['email'])) {
            $this->errors["email"] = "Addresse email invalide !";
        } else if (!$this->AdminKeyExist('email',htmlspecialchars($_POST['email']))) {
            $this->errors[parent::USER_EMAIL] = "Cette addresse email n'existe pas !";
        }
        if ($this->valuesMatch(hash("SHA256", $_POST[parent::USER_PASSWORD]), $this->admin['_password'])) {
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
    public function registerProcess()
    {   
        $name = htmlspecialchars($_POST['name']);
        $email = htmlspecialchars($_POST['email']);
        $phone = htmlspecialchars($_POST['phone']);
        $password = $_POST['password'];

        if(!$this->hasMoreCharsThen($name,3)){
            $this->setError("name", "Le nom est trop court !");
        }
        if(!$this->hasMoreCharsThen($password,6)){
            $this->setError("password", "Le mot de passe est trop court !");
        }
        if(!$this->isEmail($email)){
            $this->setError("email", "Email invalide !");
        }
        if(!$this->AdminKeyExist("email",$email)){
            $this->setError("email", "Email déjà utilisée !");
        }        
        if(!$this->isPhoneNumber($phone)){
            $this->setError("phone", "Numéro de téléphone invalide !");
        }
        if(!$this->AdminKeyExist("phone",$phone)){
            $this->setError("phone", "Numéro de téléphone déjà utilisée !");
        }
        $this->setData([
            'name' => $name,
            'email' =>$email,
            'phone' => $phone,
            'password' => hash("sha256", $password)
        ]);

    }
    /**
     * Searches a mail address into the database and tells whether it exists in the database or not
     * 
     * @return boolean TRUE if the mail is found, else it returns FALSE.
     */
    public function AdminKeyExist($key, $value){
        $result = $this->admin->findOne($key, $value);
        return $result === false;
    }
    /**
     * This function returns  the admin id.
     * @return string admin's id.
     */
    public function getAdmin($email){
        $data = $this->admin->findMany("email", $email);
        return $this->loadData($data);
    }
    /**
     * Fetch all admins from the database
     * @return array containing all the admins
     */
    public function getAllAdmins(){
        $admins = $this->admin->findAll();
       return $this->loadData($admins);
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
