<?php
class AddModel{
    public function __construct(PDO $db)
    {
        $this->db=$db;

        if(isset($_GET["section"])){
            $this->section=trim(strip_tags($_GET["section"]));
        }

        if(!empty($_POST)){
            if($this->section==="add"){
                $this->name=trim(strip_tags($_POST["name"]));
                $this->size=trim(strip_tags($_POST["size"]));
                $this->image=trim(strip_tags($_POST["image"]));
                $this->price=trim(strip_tags($_POST["price"]));
                $this->promotion=trim(strip_tags($_POST["promotion"]));
            }else  if($this->section==="delete"){
                if(isset($_GET["id"])){
                $this->id=trim(strip_tags($_GET["id"]));
                }
            }else  if($this->section==="update"){
                if(isset($_POST["select"])){
                $this->select=trim(strip_tags($_POST["select"]));
                }
                if(isset($_POST["name"])){
                    $this->name=trim(strip_tags($_POST["name"]));
                    $this->size=trim(strip_tags($_POST["size"]));
                    $this->image=trim(strip_tags($_POST["image"]));
                    $this->price=trim(strip_tags($_POST["price"]));
                    $this->promotion=trim(strip_tags($_POST["promotion"]));
                   
                    }
                
            }
        }
    }
}
?>