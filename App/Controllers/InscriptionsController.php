<?php

namespace App\Controllers;

class InscriptionsController extends Controller {
    public function inscriptions(){
        if($this->isGetMethod()){

            if($this->isLoggedIn()){
                return $this->view("inscriptions.index", 'layout_admin');
            }
            $this->askLogin();
        }
    }
}