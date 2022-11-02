<?php

namespace App\Controllers;

class PersonalsController extends Controller
{
    public function login()
    {
        return $this->view("auth.login", "layout");
    }
    public function resetPassword()
    {
        return $this->view("auth.reset-password", "layout");
    }
    public function registration()
    {
        return $this->view("personals.registration", "layout");
    }
}
