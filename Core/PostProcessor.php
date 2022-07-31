<?php
namespace Root\Core;

use Root\App\Models\PostModel;

//will work on this later
class PostProcessor extends Processor{
    /**
     * Generates an id and makes sure it doesn't exists into the database.
     * 
     * @return boolean result of the rules tests.
     */
    public function postIdExist(){
        $generator = new GenerateId();
        $id = $generator::generate();
        $admin = PostModel::findPostById($id);
        if($admin->rowCount() == 0){
            $this->postId = $id;
            return false;
        }else{
            $this->postIdExist();
        }
    }public function getPostId(){
        return $this->postId;
    }
    /**
     * Process of writing a new post is into this function. The function tells if data are correct or not
     * 
     *@return boolean telling if the post is correct.
     */
    public function writePostProcess(){
        if ($this->isNull($_POST[parent::POST_TITLE]) || !$this->hasMoreCharsThen($_POST[parent::POST_TITLE], 5)) {
            $this->errors[parent::POST_TITLE] = "Le titre d'un post doit avoir plus de 5 caractères !";
        }
        if ($this->isNull($_POST[parent::POST_CONTENT])) {
            $this->errors[parent::POST_CONTENT] = "Le conténu d'un article ne doit pas etre vide !";
        }
        $this->postIdExist();
        $this->checkThumbnail();
        $this->checkAttachedFile();

    }
    public function writeOfferOrReport(){
        if ($this->isNull($_POST[parent::POST_TITLE]) || !$this->hasMoreCharsThen($_POST[parent::POST_TITLE], 5)) {
            $this->errors[parent::POST_TITLE] = "Le titre d'une offre  doit avoir plus de 5 caractères !";
        }
        if ($this->isNull($_POST[parent::POST_CONTENT])) {
            $this->errors[parent::POST_CONTENT] = "Le conténu d'une offre  ne doit pas etre vide !";
        }
        $this->postIdExist();
        $this->checkFile();

    }
    /**
     * Makes sure the thumbnail of our post follow the below rules.
     * 
     * @return boolean telling if the thumbnail can be uploaded or not
     */
    public function checkThumbnail(){
        $accepted_size = 5242880;
        $accepted_extensions = [".jpeg", ".jpg", ".png"];
        if (empty($_FILES[parent::POST_FILE]['name'][0])) {
            $this->errors[parent::POST_FILE] = "La baniere de l'article est obligatoire !";
        }else{
            $extension = strrchr($_FILES[parent::POST_FILE]['name'][0], ".");
            if($_FILES[parent::POST_FILE]['size'][0] > $accepted_size){
                $this->errors[parent::POST_FILE] = "La taille baniere ne doit pas depasser 5 Mo !";
            }
            if(!in_array(strtolower($extension), $accepted_extensions)){
                $this->errors[parent::POST_FILE] = "Le fortmat de la baniere doit etre soit jpg, jpeg, ou png ";
            }
            $this->file = $this->getPostId().$extension;
        }  
    }
    /**
     * Makes sure the file containing the offer or the report follows the below rules.
     *
     * @return boolean telling if the file can be uploaded or not
     */

    public function checkFile(){
        $accepted_size = 41943040;
        $accepted_extensions = [".docx", ".pdf"];
        if (empty($_FILES[parent::POST_FILE]['name'][0])) {
            $this->errors[parent::POST_FILE] = "Le fichier lié à l'offre  est manquant.";
        } else {
            $extension = strrchr($_FILES[parent::POST_FILE]['name'][0], ".");
            if ($_FILES[parent::POST_FILE]['size'][0] > $accepted_size) {
                $this->errors[parent::POST_FILE] = "La taille du fichier ne doit pas depasser 20 Mo !";
            }
            if (!in_array(strtolower($extension), $accepted_extensions)) {
                $this->errors[parent::POST_FILE] = "Le fortmat du fichier doit etre soit docx, soit pdf ";
            }
            $this->file = $this->getPostId() . $extension;
        }

    }
    /**
     * Makes sure the file containing the offer or the report follows the below rules.
     *
     * @return boolean telling if the file can be uploaded or not
     */

    public function checkAttachedFile(){
        $accepted_size = 41943040;
        $accepted_extensions = [".docx", ".pdf"];
        if(!empty($_FILES[parent::POST_FILE_ATTACHED]['name'])) {
            $extension = strrchr($_FILES[parent::POST_FILE_ATTACHED]['name'], ".");
            if ($_FILES[parent::POST_FILE_ATTACHED]['size'] > $accepted_size) {
                $this->errors[parent::POST_FILE_ATTACHED] = "La taille du fichier lié au post ne doit pas depasser 20 Mo !";
            }
            if (!in_array(strtolower($extension), $accepted_extensions)) {
                $this->errors[parent::POST_FILE_ATTACHED] = "Le fortmat du fichier lié au post doit etre soit docx, soit pdf ";
            }
            $this->post_file = $this->getPostId() . $extension;
        }else $this->post_file = null;
    }
    /**
     * This method helps to add images to the website's gallery
     * This is not working for now but will work tomorrow morning
     */
    public function addImagesToGalleryProcess(){

        if(!empty($_FILES[parent::POST_FILE])){
            $files  = $_FILES[parent::POST_FILE];
            $length = $this->getImageCount();
            $accepted_size = 5242880;
            $accepted_extensions = [".jpeg", ".jpg", ".png"];
            $files_names = [];
            
            if($length  == 1 ){
                var_dump($_FILES[parent::POST_FILE]['name'][0]);
                $extension = $this->checkSizeAndExtension();
                $this->postIdExist();
                $this->file = $this->getPostId().$extension;
            }else{
                for($index = 0; $length > $index; $index++){
                    
                    $extension = strrchr($files['name'][$index], ".");
                    if ($files['size'][$index] > $accepted_size) {
                        $this->errors[parent::POST_FILE] = "Toutes les images doivent avoit une taille  5 Mo ou moins !";
                    }
                    if (!in_array(strtolower($extension), $accepted_extensions)) {
                        $this->errors[parent::POST_FILE] = "Toutes les images doivent etre du type png, jpg ou jpeg ";
                    }
                    $this->postIdExist();
                    array_push($files_names, $this->getPostId().$extension);
                }
                $this->files = $files_names;

            }
        }else{
            $this->errors[parent::POST_FILE] = "Aucune une image fournie !";
        }
    }
    public function getImageCount(){
        return count($_FILES[parent::POST_FILE]['name']);
    }
    public function checkSizeAndExtension($accepted_size = 5242880, $accepted_extensions = [".jpeg", ".jpg", ".png"]){
        $extension = strrchr($_FILES[parent::POST_FILE]['name'][0], ".");
        if ($_FILES[parent::POST_FILE]['size'][0] > $accepted_size) {
            $this->errors[parent::POST_FILE] = "La taille baniere ne doit pas depasser 5 Mo !";
        }
        if (!in_array(strtolower($extension), $accepted_extensions)) {
            $this->errors[parent::POST_FILE] = "Le fortmat de la baniere doit etre soit jpg, jpeg, ou png ";
        }
        return $extension;
    }
    /**
     * This function whether the incoming data are for a annual report or a offer, otherwise it's a
     * simple post/news so we could exactly know what to  checkup with.
     */
    public function isReportOrOffer($type){
        $feedback = false;

        if($type === "offre" OR $type === "rapport"){
            $feedback = true;
        }
        return $feedback;

    }
    /**
     * Makes sure the current.
     */
    public function isBlogPost($type = "article"){
        $feedback = false;

        if($type === "article"){
            $feedback = true;
        }
        return $feedback;

    } 
    /**
     * Makes sure the current.
     */
    public function areImagesForGallery($type){
        $feedback = false;

        if($type === "image"){
            $feedback = true;
        }
        return $feedback;

    }
    /**
     * Makes sure the user sent a type of what he want to post.
     * @param mixed $type type to check
     */
    public function hasType($type){
        $valid_types = ['offre', 'rapport', 'article', 'image'];
        $feedback = false;

        if(!$this->isNull($type)){
            if(in_array($type, $valid_types)){
                $feedback = true;
            }else $this->errors[parent::POST_TYPE] = "Type de post inconnu !";

        }else $this->errors[parent::POST_TYPE] = "Aucun type de post fornie !";

        return $feedback;
    }
    /**
     * *Checks if the given data for a new post are `correct`.*
     * ------------------------------------------------------
     * This the main post for making a post.
     * It contains all all the methods above.
     * 
     * This the method to call for making sure you are posting a post following our post roules.
     * 
     */
    public function makePost(){
        if(!$this->isNull(htmlspecialchars($_POST[parent::SAVE_POST]))){
            $type = htmlspecialchars($_POST[parent::POST_TYPE]);
            if($this->hasType($type)){
                if($this->isReportOrOffer($type)){
                    $this->writeOfferOrReport();
                }elseif($this->isBlogPost($type)){
                    $this->writePostProcess();
                }else if($this->areImagesForGallery($type)){
                    $this->addImagesToGalleryProcess();
                }
            }
        }
    }
    /**
     * Finds posts  by pages based on post types
     * @param string $type the type
     * @param string $offset the offset to find
     * @return array $posts posts
     */
    public function getPostBy($type,$offset = 0){
        $posts = null;
        $posts_ = [];
        $posts_count = 0;
        if($type === "*"){
            $posts = PostModel::findPostsByOffsetAndLimit($offset);
            $posts_count  = PostModel::countPosts();
            $posts_count = $posts_count->fetch();
        }else{
            $posts = PostModel::findPostTypeByOffsetAndLimit($type,$offset);
            $posts_count = PostModel::findPostCountByType($type);
            $posts_count = $posts_count->fetch();
        }
        

        while($post = $posts->fetch()){
            array_push($posts_,$post);
        }
        return [$posts_,$posts_count['count']];
    }
    /**
     * Finds a specific post by its id
     * @param string $id the id of the post to find
     * @return array $post the array containing post details
     */
    public function getPost($id){
        $post = PostModel::findPostById($id);
        $post = $post->fetch();
        return $post;
    }
    /**
     * Just gets all the offers from the database
     */
    public function findOffersAndReports(){
        $posts = PostModel::findPost("*","_type = ? OR _type = ? ORDER BY _record_date DESC", ['rapport', 'offre']);
        $_posts = [];

        while($post = $posts->fetch()){
            array_push($_posts, $post);
        }
        return $_posts;
    }
    public function findUsersLastPosts($user, $count){
        $posts = PostModel::findByKeyValueAndCount('author', $user,$count);
        $_posts = [];

        while ($post = $posts->fetch()) {
            array_push($_posts, $post);
        }
        return $_posts;
    }

}