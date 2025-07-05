<?php

class Categorization extends Model{
    protected static string $table = "categorization";

    protected static string $primary_key = "article_id";

    private string $article_id;
    private string $category_id;

    public function __construct(array $data){
        $this->article_id = $data["article_id"];
        $this->category_id = $data["category_id"];
    }

    public static function switchPrimary(int $mod){
        if($mod == 1){
            static::$primary_key = "article_id";
        }
        else if($mod == 2){
            static::$primary_key = "category_id";
        }
    }

    public function toArray(){
        return [$this->article_id, $this->category_id];
    }

    


    
}