<?php

namespace Root\App\Controllers;

use Root\App\Models\PostModel;
use Root\Core\PostProcessor;

class StaticPagesController extends Controller{

    public function home(){
        $processor = new PostProcessor;
        $posts = $processor->getPostBy("*");
        $post_ = PostModel::getMostRecentPost();
        return $this->view("static.home", "layouts", ["posts" => $posts[0], "total" => $posts[1], "limit" => 3, 'latest'=>$post_]);
    }
    public function about(){
        return $this->view("static.about");
    }
    public function autres(){
        return $this->view("static.autres");
    }
    public function offers(){
        return $this->view("static.offres");
    }
    public function resources(){
        return $this->view("static.resources");
    }
    public function activities(){
        return $this->view("static.activities");
    }
    public function contacts(){
        return $this->view("static.contacts");
    }
    public function projets(){
        return $this->view("static.projets");
    }
    public function switchLang(){
        $suggestion = htmlspecialchars(trim($_GET['lang']));
        $current_lang = $_SESSION['lang'];
        if($current_lang === $suggestion && $suggestion === "fr"){
            $_SESSION['lang'] = "fr";
            $this->redirect("/fr/");
        }
        if($current_lang === $suggestion && $suggestion === "en"){
            $_SESSION['lang'] = "en";
            $this->redirect("/");
        }
        if($current_lang !== $suggestion && $suggestion === "en"){
            $_SESSION['lang'] = "en";
            $this->redirect("/");
        }
        if($current_lang !== $suggestion && $suggestion === "fr"){
            $_SESSION['lang'] = "fr";
            $this->redirect("/fr/");
        }
    }
}