<?php

namespace Root\App\Controllers;

use Root\App\Exceptions\NotFoundException;
use Root\App\Models\CommentModel;
use Root\App\Models\PostModel;
use Root\Core\CommentProcessor;
use Root\Core\PostProcessor;

class PostController extends Controller
{
public function new_post(){
    if($this->isLoggedIn()){
        return $this->view("posts.new_post", "layout_posts");
    }else{
        $this->redirect("/login");
    }
}
  public function blog(){
      $processor = new PostProcessor;
      $posts = $processor->getPostBy("*");
      return $this->view("posts.all", "layouts",["posts"=> $posts[0], "total"=>$posts[1], "limit"=>3]);
  }
  public function _new_post()
    {
      if($this->isLoggedIn()){

        if($this->isPostMethod()){
            $processor = new PostProcessor;
            $processor->writePostProcess();
            
            if($processor->hasErrors()){
                $errors = $processor->getErrors();
                return $this->view("posts.new_post", "layout_posts", ['errors' => $errors]);
            }else{

                $type = htmlspecialchars($_POST[parent::POST_TYPE]);
                $path = "images";
                 
                $this->uploadFile($_FILES[parent::POST_FILE]['tmp_name'][0], FILES.DIRECTORY_SEPARATOR.$path.DIRECTORY_SEPARATOR.$processor->file);
                $processor->post_file != null && $this->uploadFile($_FILES[parent::POST_FILE_ATTACHED]['tmp_name'], FILES.DIRECTORY_SEPARATOR."attached".DIRECTORY_SEPARATOR.$processor->post_file);
                PostModel::add($processor->getPostId(), htmlspecialchars($_POST[parent::POST_TITLE]), $_SESSION[parent::SESSION_ADMIN]['id'], htmlspecialchars($_POST[parent::POST_CONTENT]), htmlspecialchars($_POST[parent::POST_TYPE]), $processor->file, $processor->post_file);
                return $this->view("posts.new_post", "layout_posts", ['success']);
            }
        }
      }else{
        $this->redirect("/login");
      }
    }
  public function uniqPost(){
        if(isset($_GET['id']) AND !empty($_GET['id'])){
            $id = htmlspecialchars($_GET['id']);
            $post = PostModel::findByKeyValue("id",$id);
            $post = $post->fetch();
            if(!empty($post)){
                $processor = new CommentProcessor;
                return $this->view("posts.unique","layouts",["post"=>$post, "comments" => $processor->findComments($id)]);
            }
            else throw new NotFoundException("La page demandée n'a pas été trouvée !");
        }else{
            return $this->view("static.404");
        }
    }
  public function uniqOffer(){
        if(isset($_GET['id']) AND !empty($_GET['id'])){
            $id = htmlspecialchars($_GET['id']);
            $post = PostModel::findByKeyValue("id",$id);
            $post = $post->fetch();
            if(!empty($post)){
                $processor = new CommentProcessor;
                return $this->view("posts.unique_offer","layouts",["post"=>$post, "comments" => $processor->findComments($id)]);
            }
            else throw new NotFoundException("La page demandée n'a pas été trouvée !");
        }else{
            return $this->view("static.404");
        }
    }
    public function makeComment(){
        if (isset($_GET['id']) and !empty($_GET['id'])) {
            if($this->isPostMethod()){
                $id = htmlspecialchars($_GET['id']);
                $post = PostModel::findByKeyValue("id", $id);
                $post = $post->fetch();
                if (!empty($post)) {
                    $processor = new CommentProcessor;
                    $processor->isValidComment();
                    
                    $comments = $processor->findComments($id);
                    
                    if ($processor->hasErrors()) {
                        $errors = $processor->getErrors();
                        return $this->view("posts.unique", "layouts", ["errors" => $errors, "post" => $post, "comments"=>$comments]);
                    } else {
                        CommentModel::add($id, htmlspecialchars($_POST[parent::USER_NAMES]), htmlspecialchars($_POST[parent::USER_EMAIL]), htmlspecialchars($_POST[parent::POST_CONTENT]));
                        return $this->view("posts.unique", "layouts", ['type' => 'success', "post" => $post,"comments"=>$comments]);
                    }
                } else {
                    throw new NotFoundException("La page demandée n'a pas été trouvée !");
                }
            }
        } else {
            return $this->view("static.404");
        }

    }
    public function makeCommentForOffer(){
        if (isset($_GET['id']) and !empty($_GET['id'])) {
            if($this->isPostMethod()){
                $id = htmlspecialchars($_GET['id']);
                $post = PostModel::findByKeyValue("id", $id);
                $post = $post->fetch();
                if (!empty($post)) {
                    $processor = new CommentProcessor;
                    $processor->isValidComment();
                    
                    $comments = $processor->findComments($id);
                    
                    if ($processor->hasErrors()) {
                        $errors = $processor->getErrors();
                        return $this->view("posts.unique_offer", "layouts", ["errors" => $errors, "post" => $post, "comments"=>$comments]);
                    } else {
                        CommentModel::add($id, htmlspecialchars($_POST[parent::USER_NAMES]), htmlspecialchars($_POST[parent::USER_EMAIL]), htmlspecialchars($_POST[parent::POST_CONTENT]));
                        return $this->view("posts.unique_offer", "layouts", ['type' => 'success', "post" => $post,"comments"=>$comments]);
                    }
                } else {
                    throw new NotFoundException("La page demandée n'a pas été trouvée !");
                }
            }
        } else {
            return $this->view("static.404");
        }

    }
    public function postsList(){
        if (isset($_GET['index']) and !empty($_GET['index'])) {
            $index = (int)htmlspecialchars($_GET['index']);
            $processor = new PostProcessor;
            $posts = $processor->getPostBy("*",(int)$index - 1);
            if (!empty($posts)) {
                return $this->view("posts.all_with_page", "layouts", ["posts" => $posts[0], "total" => $posts[1], "limit" => 3]);
            } else {
                throw new NotFoundException("La page demandée n'a pas été trouvée !");
            }

        } else {
            return $this->view("static.404");
        }
    }
    public function offersList(){
        if (isset($_GET['index']) and !empty($_GET['index'])) {
            $index = (int)htmlspecialchars($_GET['index']);
            $processor = new PostProcessor;
            $posts = $processor->getPostBy("offre",(int)$index - 1);
            if (!empty($posts)) {
                return $this->view("posts.all_with_page", "layouts", ["posts" => $posts[0], "total" => $posts[1]["count"], "limit" => 3]);
            } else {
                throw new NotFoundException("La page demandée n'a pas été trouvée !");
            }

        } else {
            return $this->view("static.404");
        }
    }
    public function posts(){
        $processor = new PostProcessor;
        $posts = $processor->getPostBy("*",0);
        if (!empty($posts)) {
            return $this->view("posts.posts", "layout_admin", ["posts" => $posts[0], "total" => $posts[1], "limit" => 3]);
        } else {
            throw new NotFoundException("La page demandée n'a pas été trouvée !");
        }
    }
    public function allOffers(){
        $processor = new PostProcessor;
        $posts = $processor->getPostBy("offre",0);
        if (!empty($posts)) {
            return $this->view("posts.all_offers_admin", "layout_admin", ["posts" => $posts[0], "total" => $posts[1], "limit" => 3]);
        } else {
            throw new NotFoundException("La page demandée n'a pas été trouvée !");
        }
    }
    public function delete(){
        if($this->isGetMethod()){
            if($this->isLoggedIn()){
                PostModel::remove(htmlspecialchars($_GET['id']));
                $post = PostModel::findPostById($_GET['id']);
                $post = $post->fetch();
                $this->redirect($_SERVER['HTTP_REFERER']);
            }else{
                $this->redirect("/login");
            }
        }
    }
}
