<?php

namespace Core;

use App\Models\PromotionModel;

class PromotionProcessor extends Processor
{
    public $promotion = null;
    public function __construct()
    {
        !$this->promotion && $this->promotion = new PromotionModel;
    }
    public function getAll()
    {
        return $this->loadData($this->promotion->findAll());
    }
    public function delete($id){
        return $this->promotion->deleteOne($id)->fetch();
    }
    private function initProcess(){
        $this->name = htmlspecialchars($_POST['name']);
        $this->acronym = htmlspecialchars($_POST['acronym']);
        $this->department = htmlspecialchars($_POST['department']);
    }
    public function createPromotionProcess(){
        $this->initProcess();
        if (!$this->hasMoreCharsThen($this->name, 4)) {
            $this->errors['name'] = "Le nom de la promotion est obligatoire !";
        }
        if (!$this->hasMoreCharsThen($this->department, 1) || !$this->isNumeric($this->department)) {
            $this->errors['department'] = "Le département choisie est invalide !";
        }

    }

}
