<?php

namespace App\Controllers;
use App\Controllers\Controller;

class ConfigController extends Controller{
    public function index(){
        if($this->isLoggedIn()){
            $process = $this->getConfigProcessor();
            $config = $process->getAll();
            return $this->view("config.index", 'layout_admin',['config' => $config]);
        }else $this->askLogin();
    }
    public function __update(){
        if($this->isLoggedIn()){
            $process = $this->getConfigProcessor();
            $process->updateProcess();
            $config = $process->getAll();
            if($process->hasErrors()){
                return $this->view("config.update", 'layout_admin', ['errors' => $process->getErrors(), 'config' =>$config]);
            }else{

            }
            return $this->view("config.update", 'layout_admin');
        }else $this->askLogin();
    }
    public function update(){
        if ($this->isLoggedIn()) {
            $process = $this->getConfigProcessor();
            $config = $process->getAll();
            return $this->view("config.update", 'layout_admin', ['config' => $config]);
        } else {
            $this->askLogin();
        }

    }
}