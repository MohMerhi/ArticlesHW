<?php
require_once("Model.php");
class Category extends Model{
    protected static string $table = "Categories";

    protected static string $primary_key = "id";

    private int $id;    
    private string $name;
    public function __construct(array $data){
        $this->id = $data["id"];
        $this->name = $data["name"];
    }
    public function getId(){
        return $this->id;
    }
    public function getName(){
        return $this->name;
    }

    public function setName($name){
        $this->name = $name;
    }
    
    public function toArray(){
        return [$this->id, $this->name];
    }

}