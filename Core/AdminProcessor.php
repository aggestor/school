<?php
namespace Core;

use App\Models\AdminModel;
use App\Models\Schema;

//will work on this later
class AdminProcessor extends Processor
{
    public $admin = null;
    public $user = null;
    public $data = [];
    public function __construct()
    {
        !$this->admin && $this->admin = new AdminModel;
    }
    private function initLogin(){
        $this->email = htmlspecialchars($_POST['email']);
        $this->password = htmlspecialchars($_POST['password']);
    }
    /**
     * Processing the admin login, making sure the admin, the real one with real data is logged in
     */
    public function loginAdminProcess()
    {
        $this->initLogin();

        if(!$this->isEmail($this->email)){
            $this->setError('email', "Addresse email invalide !");
        }else{
            if ($this->AdminKeyExist("email", $this->email)) {
                $this->setError('email', "Addresse n'existe pas !");
            }
        }
        if(!$this->hasMoreCharsThen($this->password, 6)){
            $this->setError('password',"Mot de passe trop court !");
        }
        $result = $this->admin->findMany("email = ?", [$this->email])->fetch();
        if($result){
            if($this->valuesMatch(hash("SHA256", $this->password),$result->password)){
                $this->user = $result;
                return;
            }else{
                $this->setError("password", "Mot de passe incorrect ");
            }
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
            $this->setError("email", "Email d??j?? utilis??e !");
        }        
        if(!$this->isPhoneNumber($phone)){
            $this->setError("phone", "Num??ro de t??l??phone invalide !");
        }
        if(!$this->AdminKeyExist("phone",$phone)){
            $this->setError("phone", "Num??ro de t??l??phone d??j?? utilis??e !");
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
    public function updateProcess(){
       $this->checkAdminData();
       $this->checkPasswordUpdate();
    }
    public function initPasswordUpdate()
    {
        if (isset($_POST['update'])) {
            $this->old_password = $this->sanitize('old_password');
            $this->new_password = $this->sanitize('new_password');
            $this->password = $this->sanitize('repeat_password');
        }
    }
    public function initAdminData(){
        if(isset($_POST['update'])){
            $this->name = $this->sanitize('name');
            $this->email = $this->sanitize('email');
            $this->phone = $this->sanitize('phone');
        }
    }
    public function checkAdminData(){
        $this->initAdminData();
        if (!$this->hasMoreCharsThen($this->name, 4)) {
            $this->setError('name', " Le nom semble trop court !");
        }
        if (!$this->isPhoneNumber($this->phone)) {
            $this->setError('name', " Le num??ro est invalide !");
        }
        if (!$this->isEmail($this->email)) {
            $this->setError("email", "Email invalide !");
        }
        if ($_SESSION['admin']['email'] != $this->email) {
            if ($this->mailExist($this->email)) {
                $this->setError('email','Addresse Mail d??j?? utilis??e !');
            }
        }
    }
    public function checkPasswordUpdate()
    {
        $this->initPasswordUpdate();
        if ($this->old_password !== '') {
            if ($this->encrypt($this->old_password) != $_SESSION['admin']['password']) {
                $this->setError('old_password', "Ancien mot de passe incorrect ");
            } else {
                if (!$this->hasMoreCharsThen($this->new_password, 6)) {
                    $this->setError('new_password', "Mot de passe trop court, minimum 6 Caract??tes !");
                }
                if (!$this->valuesMatch($this->new_password, $this->password)) {
                    $this->setError('repeat_password', "Le mot de passe ne correspond pas ");
                }
            }
            $this->password = $this->encrypt($this->password);
        } else {
            $this->password = $_SESSION['admin']['password'];
        }
    }
    public function mailExist($email = null)
    {
        $data = $this->AdminKeyExist('email', $email ?? $this->phone);
        $count = $this->getCount($data);
        if ($count == 0) {
            return false;
        }
        return true;
    }
    public function phoneNumber($phone = null)
    {
        $data = $this->AdminKeyExist('phone', $phone ?? $this->phone);
        $count = $this->getCount($data);
        if ($count == 0) {
            return false;
        }
        return true;
    }
}
