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
        Category::update($mysqli,$values, $_POST["id"]);
    }

    public static function deleteAllCategories(){
        global $mysqli;
        if(!isset($_GET["id"])){
            Category::deleteAll($mysqli);
            echo ResponseService::no_response();
            return;
        }
        $category = Category::find($mysqli, $_GET["id"]);
        if($category == null){
            echo ResponseService::not_found($_GET["id"]);
            return;
        }
        Category::delete($mysqli, $_GET["id"]);
        echo ResponseService::no_response();
    }

    public static function createCategory(){
        global $mysqli;
        $values = [];
        $colNames = ["name"];
        foreach($colNames as $value){
            if(!in_array($value, $_POST)){
                echo ResponseService::error_message("not enough values to create object");
                return;
            }
        }
        if(isset($_POST["id"])){
            if(Category::find($mysqli, $_POST["id"]) != null){
                echo ResponseService::error_message("id already exists");
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
        echo ResponseService::created($values);

    }
}