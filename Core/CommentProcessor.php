<?php
namespace Root\Core;

use Root\App\Models\CommentModel;

//will work on this later
class CommentProcessor extends Processor
{
    public function __construct()
    {
        new parent;
    }
    /**
     * Processing the admin login, making sure the admin, the real one with real data is logged in
     */
    public function isValidComment()
    {
        if (!$this->hasMoreCharsThen(trim($_POST[parent::POST_CONTENT]), 1)) {
            $this->errors[parent::POST_CONTENT] = "Commentaire invalide";
        }
        if (!$this->isEmail($_POST[parent::USER_EMAIL])) {
            $this->errors[parent::USER_EMAIL] = "Addresse email invalide !";
        }
        if (!$this->hasMoreCharsThen(trim($_POST[parent::USER_NAMES]), 3)) {
            $this->errors[parent::USER_NAMES] = "Le nom doit avoir plus de 3 caracteres !";
        }
    }
    /**
     * Just gets all the offers from the database
     */
    public function findComments($post){
        $posts = CommentModel::findAllByPost($post);
        $_posts = [];

        while($post = $posts->fetch()){
            array_push($_posts, $post);
        }
        return $_posts;
    }
    public function findLastUserComments($user, $count = 5){
        $comments = CommentModel::findByKeyValue('author',$user);
    }
}
