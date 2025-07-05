<?php

require(__DIR__ . "/../models/Article.php");
require(__DIR__ . "/../connection/connection.php");
require(__DIR__ . "/../services/ArticleService.php");
require(__DIR__ . "/../services/ResponseService.php");
require(__DIR__ . "/../models/Category.php");
require(__DIR__ . "/../services/CategoryService.php");
require(__DIR__ . "/../models/Categorization.php");
require(__DIR__ . "/../services/CategorizationService.php");


class CategorizationController{
    public function getArticlesByCategory(){
        global $mysqli;
        Categorization::switchPrimary(2);
        if(!isset($_GET["id"]))
        {
            echo ResponseService::error_message("an id should be provided");
            return;
        }
        $categorization = Categorization::find($mysqli, $_GET["id"]);
        $ans = [];
        if(is_array($categorization)){
            $categorization = CategorizationService::CategorizationToArray($categorization);
            foreach($categorization as $c){
                $ans[] = Article::find($mysqli, (int) $c[0])->toArray();
            }
        }
        else{
            $categorization = $categorization->toArray();
            $ans[] = Article::find($mysqli, (int) $categorization[0])->toArray();

        }
        
        echo ResponseService::success_response($ans);
        return;
    }

    public function getCategoriesByArticle(){
        global $mysqli;
        Categorization::switchPrimary(1);
        if(!isset($_GET["id"]))
        {
            echo ResponseService::error_message("an id should be provided");
            return;
        }
        $categorization = Categorization::find($mysqli, $_GET["id"]);
        $ans = [];
        if(is_array($categorization)){
            $categorization = CategorizationService::CategorizationToArray($categorization);
            foreach($categorization as $c){
                $ans[] = Category::find($mysqli, (int) $c[1])->toArray();
            }
        }
        else{
            $categorization = $categorization->toArray();
            $ans[] = Category::find($mysqli, (int) $categorization[1])->toArray();

        }
        
        echo ResponseService::success_response($ans);
        return;
    }
}