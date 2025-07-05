<?php 

require(__DIR__ . "/../models/Article.php");
require(__DIR__ . "/../connection/connection.php");
require(__DIR__ . "/../services/ArticleService.php");
require(__DIR__ . "/../services/ResponseService.php");
require(__DIR__."/BaseController.php");

class ArticleController{
    
    public function getAllArticles(){
        global $mysqli;

        if(!isset($_GET["id"])){
            $articles = Article::all($mysqli);
            $articles_array = ArticleService::articlesToArray($articles); 
            echo ResponseService::success_response($articles_array);
            return;
        }

        $id = $_GET["id"];
        $article = Article::find($mysqli, $id);
        if($article == null){
            echo ResponseService::not_found($id);
            return;
        }
        echo ResponseService::success_response($article);
        return;
    }

    public function deleteAllArticles(){
        global $mysqli;
        if(!isset($_GET["id"])){
            Article::deleteAll($mysqli);
            echo ResponseService::no_response();
            return;
        }
        $article = Article::find($mysqli, $_GET["id"]);
        if($article == null){
            echo ResponseService::not_found($_GET["id"]);
            return;
        }
        Article::delete($mysqli, $_GET["id"]);
        echo ResponseService::no_response();
        
    }



    public function updateArticles(){
        global $mysqli;
        $colNames = ["name", "author", "description"];
        if(!isset($_POST["id"])){
            echo ResponseService::not_found($_GET["id"]);
            return;
        }
        $values = [];
        foreach($_POST as $key => $value){
            if(in_array($key,$colNames) && $key != "id"){
                $values[$key] = $value; 

            }
        }
        if(sizeof($values) == 0){
            echo ResponseService::error_message("no values to update");
        }
        Article::update($mysqli,$values, $_POST["id"]);
        echo ResponseService::OK();
    }


    public static function createArticle(){
        global $mysqli;
        $values = [];
        $colNames = ["name", "author", "description"];
        foreach($colNames as $value){
            if(!in_array($value, $_POST)){
                echo ResponseService::error_message("not enough values to create object");
                return;
            }
        }
        if(isset($_POST["id"])){
            if(Article::find($mysqli, $_POST["id"]) != null){
                echo ResponseService::error_message("id already exists");
                return;
            }
            else{
                $values["id"] = $_POST["id"];
            }
        }
        
        foreach($_POST as $key=>$value){
            if(in_array($key, $colNames) && $key != "id"){
                $values[$key] = $value;
            }
        }
        Article::create($mysqli, $values);
        echo ResponseService::created($values);

    }
}

//To-Do:

//1- Try/Catch in controllers ONLY!!! 
//2- Find a way to remove the hard coded response code (from ResponseService.php)
//3- Include the routes file (api.php) in the (index.php) -- In other words, seperate the routing from the index (which is the engine)
//4- Create a BaseController and clean some imports 