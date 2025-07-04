<?php 

require(__DIR__ . "/../models/Category.php");
require(__DIR__ . "/../connection/connection.php");
require(__DIR__ . "/../services/CategoryService.php");
require(__DIR__ . "/../services/ResponseService.php");

class CategoryController{
    
    public function getAllCategories(){
        global $mysqli;

        if(!isset($_GET["id"])){
            $categories = Article::all($mysqli);
            $categories_array = CategoryService::categoriesToArray($categories); 
            echo ResponseService::success_response($categories_array);
            return;
        }

        $id = $_GET["id"];
        $article = Article::find($mysqli, $id)->toArray();
        echo ResponseService::success_response($article);
        return;
    }

    

    public function updateCategories(){
        global $mysqli;
        $colNames = ["name"];
        if(!isset($_POST["id"])){
            //error
        }
        $values = [];
        foreach($_POST as $key => $value){
            if(in_array($key,$colNames) && $key != "id"){
                $values[$key] = $value; 

            }
        }
        if(sizeof($values) == 0){
            //error
        }
        Category::update($mysqli,$values, $_POST["id"]);
    }

    public static function deleteAllCategories(){
        global $mysqli;
        if(!isset($_GET["id"])){
            Category::deleteAll($mysqli);
        }
        Category::delete($mysqli, $_GET["id"]);
    }

    public static function createCategory(){
        global $mysqli;
        $values = [];
        $colNames = ["name"];
        foreach($colNames as $value){
            if(!in_array($value, $_POST)){
                //error
                return;
            }
        }
        if(isset($_POST["id"])){
            if(Category::find($mysqli, $_POST["id"]) != null){
                //error
                return;
            }
            else{
                $values["id"] = $_POST["id"];
            }
        }
        
        
        foreach($_POST as $key=>$value){
            if(in_array($key, $colNames) ){
                $values[$key] = $value;
            }
        }
        Category::create($mysqli, $values);

    }
}