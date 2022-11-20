<?php

namespace App\Controllers;

class InscriptionsController extends Controller {
    public function inscriptions(){
        if($this->isGetMethod()){
            if($this->isLoggedIn()){
                $s = $this->getStudentProcessor();
                $p = $this->getPersonalProcess();

                $personals = $p->loadData($p->personal->findLastNotRegistered(5));

                $students =$s->loadData($s->student->findLastNotRegistered(5));
                return $this->view("inscriptions.index", 'layout_admin', ['students' => $students, 'personals' => $personals]);
            }
            $this->askLogin();
        }
    }
}