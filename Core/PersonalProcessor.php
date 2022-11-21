<?php
namespace Core;

use App\Models\DocModel;
use App\Models\PersonalModel;

class PersonalProcessor extends Processor
{
    public $personal = null;
    public $docs = null;
    public function __construct()
    {
        $this->personal = new PersonalModel;
        $this->docs = new DocModel;
        $this->states = ["Bas-Uele", "Équateur", "Haut-Katanga", "Haut-Lomami", "Haut-Uele", "Ituri", "Kasaï", "Kasaï central", "Kasaï oriental", "Kinshasa", "Kongo-Centra", "Kwango", "Kwilu", "Lomami", "Lualaba", "Mai-Ndombe", "Maniema", "Mongala", "Nord-Kivu", "Nord-Ubangi", "Sankuru", "Sud-Kivu", "Sud-Ubangi", "Tanganyika", "Tshopo", "Tshuapa"];
    }
    public function resetPasswordProcess()
    {
        $this->email = $this->sanitize('email');

        if (!$this->isEmail($this->email)) {
            $this->setError('email', "Addresse email invalide !");
        } else {
            if ($this->personalKeyExist("mail_address", $this->email)) {
                $this->setError('email', "Addresse n'existe pas !");
            }
        }
    }
    public function checkPasswordUpdate()
    {
        $this->initPasswordUpdate();
        if ($this->old_password !== '') {
            if ($this->encrypt($this->old_password) != $_SESSION['student']['password']) {
                $this->setError('old_password', "Ancien mot de passe incorrect ");
            } else {
                if (!$this->hasMoreCharsThen($this->new_password, 6)) {
                    $this->setError('new_password', "Mot de passe trop court, minimum 6 Caractètes !");
                }
                if (!$this->valuesMatch($this->new_password, $this->password)) {
                    $this->setError('repeat_password', "Le mot de passe ne correspond pas ");
                }
            }
            $this->password = $this->encrypt($this->password);
        } else {
            $this->password = $_SESSION['student']['password'];
        }
    }
    private function initLogin()
    {
        $this->email = $this->sanitize('email');
        $this->password = $this->sanitize('password');
    }
    /**
     * Processing the student login, making sure the student, the real one with real data is logged in
     */
    public function loginPersonalProcess()
    {
        $this->initLogin();

        if (!$this->isEmail($this->email)) {
            $this->setError('email', "Addresse email invalide !");
        } else {
            if ($this->personalKeyExist("mail_address", $this->email)) {
                $this->setError('email', "Addresse n'existe pas !");
            }
        }
        if (!$this->hasMoreCharsThen($this->password, 6)) {
            $this->setError('password', "Mot de passe trop court !");
        }
        $result = $this->personal->findMany("mail_address = ?", [$this->email], "registration_number,id,mail_address, password,picture")->fetch();
        if ($result) {
            if ($this->valuesMatch(hash("SHA256", $this->password), $result->password)) {
                $this->personal_data = $result;
                return;
            } else {
                $this->setError("password", "Mot de passe incorrect ");
            }
        }

    }
    public function identifyPersonalProcess()
    {
        $this->checkIdentity();
        $this->checkAddress();
        $this->checkOrigin();
        $this->checkOrientation();
        $this->checkHealth();
        $this->checkUserProfile();
        $this->setBooleans();
        $this->checkPayment();
    }
    public function updatePersonalProcess()
    {
        $this->checkIdentityForUpdate();
        $this->checkAddress();
        $this->checkOrigin();
        $this->checkOrientation();
        $this->checkHealth();
        $this->checkUserProfileUpdate();
        $this->checkPasswordUpdate();
        $this->checkPayment();

    }
    public function initFiles()
    {
        $this->user_profile = $_FILES['user_profile'];
    }
    public function setBooleans()
    {
        $this->is_registered = 0;
        $this->is_verified = 0;
        $this->is_active = 1;
    }
    public function checkUserProfile()
    {
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
            $this->profile_file = $this->user_email . $extension;
        } else {
            $this->profile_file = null;
            $this->errors['user_profile'] = "La photo de profil est obligatoire !";

        }

    }
    public function checkUserProfileUpdate()
    {
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
            $this->profile_file = $this->user_email . $extension;
            $this->photo_updated = true;
        } else {
            $this->photo_updated = false;
            $this->profile_file = $_SESSION['student']['picture'];

        }

    }
    public function initIdentity()
    {
        if (isset($_POST['save'])) {
            $this->user_first_name = $this->sanitize('user_first_name');
            $this->user_second_name = $this->sanitize('user_second_name');
            $this->user_last_name = $this->sanitize('user_last_name');
            $this->user_phone_number = $this->sanitize('user_phone_number');
            $this->user_email = $this->sanitize('user_email');
            $this->birth_place = $this->sanitize('birth_place');
            $this->birth_date = $this->sanitize('birth_date');
            $this->civilian_status = $this->sanitize('civilian_status');
            $this->registration_number = $this->sanitize('registration_number');
            $this->sex = $this->sanitize('sex');
            $this->initFiles();
        }
    }
    public function initPasswordUpdate()
    {
        if (isset($_POST['save'])) {
            $this->old_password = $this->sanitize('old_password');
            $this->new_password = $this->sanitize('new_password');
            $this->password = $this->sanitize('repeat_password');
        }
    }
    public function initIdentityUpdate()
    {
        if (isset($_POST['save'])) {
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
    public function initAddress()
    {
        if (isset($_POST['save'])) {
            $this->id_type = $this->sanitize('id_type');
            $this->id_number = $this->sanitize('id_number');
            $this->physical_address = $this->sanitize('physical_address');
            $this->neighborhood = $this->sanitize('neighborhood');
            $this->municipality = $this->sanitize('municipality');
            $this->town = $this->sanitize('town');
            $this->state = $this->sanitize('state');
            $this->nationality = $this->sanitize('nationality');
        }
    }
    public function initOrientation()
    {
        if (isset($_POST['save'])) {
            $this->function = $this->sanitize('function');
            $this->academical_status = $this->sanitize('academical_status');
            $this->personal_type = $this->sanitize('personal_type');
            $this->academical_level = $this->sanitize('academical_level');
            $this->academical_grade = $this->sanitize('academical_grade');
            $this->fac = $this->sanitize('fac');
            $this->fac_search_domain = $this->sanitize('fac_search_domain');
            $this->search_domain_speciality = $this->sanitize('search_domain_speciality');
            $this->engagment_date = $this->sanitize('engagment_date');
        }
    }
    public function initPayment(){
        if(isset($_POST['save'])){
            $this->base_salary = $this->sanitize('base_salary');
            $this->prime = $this->sanitize("prime");
        }
    }
    public function initOrigin()
    {
        if (isset($_POST['save'])) {
            $this->neighborhood_origin = $this->sanitize('neighborhood_origin');
            $this->municipality_origin = $this->sanitize('municipality_origin');
            $this->town_origin = $this->sanitize('town_origin');
            $this->state_origin = $this->sanitize('state_origin');
        }
    }
    public function initHealth()
    {
        if (isset($_POST['save'])) {
            $this->handicap = $this->sanitize('handicap');
            $this->allergies = $this->sanitize('allergies');
            $this->height = $this->sanitize('height');
            $this->blood_type = $this->sanitize('blood_type');
        }
    }
    public function checkHealth()
    {
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
    public function checkPayment()
    {
        $this->initPayment();
        if (!$this->hasMoreCharsThen($this->base_salary, 2)) {
            $this->errors['base_salary'] = "Le salaire de base  mentionné est incorrect !";
        }
        if (!$this->hasMoreCharsThen($this->prime, 2)) {
            $this->errors['prime'] = "La prime mentionnée est incorrecte !";
        }
        if (!$this->hasMoreCharsThen($this->blood_type, 2)) {
            $this->errors['blood_type'] = "Le groupe sanguiin mentionné est incorrect !";
        }
    }
    public function checkOrigin()
    {
        $this->initOrigin();

        if (!in_array($this->state_origin, $this->states)) {
            $this->errors['state_origin'] = "Province/Etat choisie invalide !";
        }
        if (!$this->hasMoreCharsThen($this->town_origin, 2)) {
            $this->errors['town_origin'] = "Territoire/Ville  invalide !";
        }
        if (!$this->hasMoreCharsThen($this->municipality_origin, 2)) {
            $this->errors['municipality_origin'] = "Collectivité/Communie/Secteur invalide !";
        }
        if (!$this->hasMoreCharsThen($this->neighborhood_origin, 2)) {
            $this->errors['neighborhood_origin'] = "Groupement/Quartier invalide !";
        }

    }
    public function checkOrientation()
    {
        $this->initOrientation();
        if (!$this->has2NumbersOnly($this->fac)) {
            $this->setError('fac',"Faculté choisie invalide !");
        }
        if (!$this->has2NumbersOnly($this->fac_search_domain)) {
            $this->setError('fac_search_domain',"Faculté choisie invalide !");
        }
        if (!$this->has2NumbersOnly($this->function)) {
            $this->setError('function',"Fonction choisie invalide !");
        }
        if (!$this->hasMoreCharsThen($this->academical_grade, 1)) {
            $this->errors['academical_grade'] = "Grade invalide !";
        }
        if (!$this->hasMoreCharsThen($this->academical_status, 5)) {
            $this->errors['academical_status'] = "Status invalide !";
        }
        if (!$this->hasMoreCharsThen($this->search_domain_speciality, 5)) {
            $this->errors['search_domain_speciality'] = "Spécialité de recherche invalide !";
        }
        if (!$this->hasMoreCharsThen($this->academical_level, 5)) {
            $this->errors['academical_level'] = "Niveau academique invalide !";
        }
        if (!$this->hasMoreCharsThen($this->personal_type, 5)) {
            $this->errors['personal_type'] = "Type personnel invalide !";
        }
        if($this->isNull($this->engagment_date)){
            $this->setError("engagment_date", "La date est invalide ");
        }

    }
    public function checkIdentity()
    {
        $this->initIdentity();

        if (!$this->hasMoreCharsThen($this->registration_number, 2)) {
            $this->errors['registration_number'] = 'Le matricule doit avoir au minium 2 caractères !';
        }
        if (!$this->hasMoreCharsThen($this->user_first_name, 2)) {
            $this->errors['user_first_name'] = 'Le prenom doit avoir au minium 2 caractères !';
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
        if ($this->mailExist($this->user_email)) {
            $this->errors['user_email'] = 'Addresse Mail déjà utilisée !';
        }
        if (!$this->hasMoreCharsThen($this->birth_place, 4)) {
            $this->errors['birth_place'] = 'Lieu de naissance invalide !';
        }
        if (!$this->isNullThenBreak($this->birth_date)) {
            $this->errors['birth_date'] = 'Date de naissance incorrecte !';
        }
        $this->password = $this->encrypt($this->user_phone_number);
    }
    public function checkIdentityForUpdate()
    {
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
        if ($_SESSION['student']['email'] != $this->user_email) {
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
    public function checkAddress()
    {
        $this->initAddress();

        if (!$this->hasMoreCharsThen($this->id_type, 9)) {
            $this->errors['id_type'] = 'Type de carte invalide !';
        }
        if (!$this->hasMoreCharsThen($this->id_number, 4)) {
            $this->errors['id_number'] = 'Numéro de carte douteux !';
        }
        if (!$this->hasMoreCharsThen($this->physical_address, 2)) {
            $this->errors['physical_address'] = 'Addresse physique incorrecte';
        }
        if (!$this->hasMoreCharsThen($this->neighborhood, 2)) {
            $this->errors['neighborhood'] = 'Groupement/Quartier incorrect !';
        }
        if (!$this->hasMoreCharsThen($this->municipality, 2)) {
            $this->errors['municipality'] = "Collectivité/Secteur/Commune invalide !";
        }
        if (!$this->hasMoreCharsThen($this->town, 2)) {
            $this->errors['town'] = 'Territoire/Ville invalide !';
        }
        if (!$this->hasMoreCharsThen($this->state, 2)) {
            $this->errors['state'] = 'Province/Etat invalide !';
        }
        if (!$this->hasMoreCharsThen($this->nationality, 2)) {
            $this->errors['nationality'] = 'Nationalité incorrecte';
        }
    }
    public function mailExist($email = null)
    {
        $data = $this->personal->findPersonalByKey('mail_address', $email ?? $this->user_email);
        $count = $this->getCount($data);
        if ($count == 0) {
            return false;
        }

        return true;
    }
    /**
     * Searches a student specific data into the database and tells whether it exists in the database or not
     *
     * @return boolean TRUE if the data is found, else it returns FALSE.
     */
    public function personalKeyExist($key, $value)
    {
        $result = $this->personal->findOne($key, $value);
        return $result === false;
    }
    /**
     * Searches a student specific data into the database and tells whether it exists in the database or not
     *
     * @return boolean TRUE if the data is found, else it returns FALSE.
     */
    public function docExist($value, $student = true)
    {
        if($student === true){
            $result = $this->docs->findExactOneDoc($value, 'student', $_SESSION['student']['id']);
            return $result === false;
        }else{
            $result = $this->docs->findExactOneDoc($value, 'personal', $_SESSION['personal']['id']);
            return $result === false;
        }
    }
    public function initAddDocs()
    {
        $this->type = $this->sanitize('type');
        $this->doc = $_FILES['document'];
    }
    public function addDocsProcess()
    {
        $this->initAddDocs();
        if (!$this->hasMoreCharsThen($this->type, 10)) {
            $this->setError("type", "Ce type semble invalide");
        }
        if (!$this->docExist($this->type, false)) {
            $this->setError("type", "Vous avez déjà uploader ce type de document ($this->type)");
        }
        $this->checkUserDoc();
    }
    public function updateDocsProcess()
    {
        $this->initAddDocs();
        if (!$this->hasMoreCharsThen($this->type, 10)) {
            $this->setError("type", "Ce type semble invalide");
        }
        $this->checkUserDocUpdate();
    }
    public function checkUserDoc()
    {
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
            $mat = isset($_SESSION['student']) ? $_SESSION['student']['mat'] : $_SESSION['personal']['mat'];
            $this->document_file = time() . "_" . $mat . "_" . $extension;
        } else {
            $this->document_file = null;
            $this->errors['document'] = "Le fichier est obligatoire !";
        }

    }
    public function checkUserDocUpdate()
    {
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
            $mat = isset($_SESSION['student']) ? $_SESSION['student']['mat'] : $_SESSION['personal']['mat'];
            $this->document_file = time() . "_" . $mat . "_" . $extension;
        } else {
            $this->document_file = null;
        }

    }

}
