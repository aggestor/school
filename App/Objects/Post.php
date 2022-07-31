<?php

namespace Root\Objects;

use Root\App\Models\PostModel;

class Post extends PostModel{
    public $model = null ;
    public $id = "";
    public function __construct(string $id = ""){
        if($this->model === null){
            $this->model = new parent;
        }
        if(!empty($id)){
            $this->id = $id;
        }
    }

    public function getAll(){

    }
    public function count(){
        $count = $this->model->countPosts()->fetch()['count'];
        return $count;
    }
    private function mainGetter(){

    }
}