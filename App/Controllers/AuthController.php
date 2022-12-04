<?php namespace App\Controllers;

class AuthController extends Controller
{
    public function _login()
    {
        if ($this->isPostMethod()) {
            $student = $this->getStudentProcessor();
            $personal = $this->getPersonalProcess();

            if(isset($_POST['personal'])){
                $personal->loginPersonalProcess();
                if ($personal->hasErrors()) {
                    $errors = $personal->getErrors();
                    if (isset($errors[403])) {
                        http_response_code(403);
                        return $this->view("static.403", "layouts", ['message' => "Votre compte est temporairement bloqué."]);
                    } else {
                        return $this->view("auth.login", "layout", ["errors" => $personal->getErrors()]);
                    }

                } else {
                    $personal = $personal->personal_data;
                    $_SESSION['personal']["id"] = $personal->id;
                    $_SESSION['personal']["email"] = $personal->mail_address;
                    $_SESSION['personal']["mat"] = $personal->registration_number;
                    $_SESSION['personal']["password"] = $personal->password;
                    $_SESSION['personal']["picture"] = $personal->picture;
                    $_SESSION['user']['type'] = 'personal';
                    $this->redirect("/profile");
                }

            }else{

                $student->loginStudentProcess();
                if ($student->hasErrors()) {
                    $errors = $student->getErrors();
                    if (isset($errors[403])) {
                        http_response_code(403);
                        return $this->view("static.403", "layouts", ['message' => "Votre compte est temporairement bloqué."]);
                    } else {
                        return $this->view("auth.login", "layout", ["errors" =>$errors]);
                    }

                } else {
                    $student = $student->student_data;
                    $_SESSION['student']["id"] = $student->id;
                    $_SESSION['student']["email"] = $student->mail_address;
                    $_SESSION['student']["mat"] = $student->registration_number;
                    $_SESSION['student']["password"] = $student->password;
                    $_SESSION['student']["picture"] = $student->picture;
                    $_SESSION['user']['type'] = 'student';
                    $this->redirect("/my-profile");
                }
            }
        }
    }
    /**
     * Render the login page from get REQUEST
     */
    public function login()
    {
        return $this->view("auth.login", 'layout');
    }
    public function logout()
    {
        unset($_SESSION["student"]);
        session_destroy();
        $this->redirect('/');
    }
}
