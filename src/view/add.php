<?php
session_start();
class AddView
{
    public function __construct(AddController $controller)
    {
        $this->controller = $controller;
        $this->template = DIR_TEMPLATES . "homeChange.php";
        $this->templateAdd = DIR_TEMPLATES . "add.php";
        $this->templateDelete = DIR_TEMPLATES . "delete.php";
        $this->templateUpdate = DIR_TEMPLATES . "update.php";
    }
    public function render()
    {
        if (isset($_GET["section"])) {
            $error = [];
            switch ($this->controller->model->section) {
                case 'add':
                    if (!empty($_POST)) {
                        if (empty($this->controller->model->name)) {
                            $error["name"] = "le nom ne doit pas etre vide";
                        }
                        if (empty($this->controller->model->size)) {
                            $error["size"] = "la taille ne doit pas etre vide";
                        }
                        if (empty($this->controller->model->price) || $this->controller->model->price <= 1) {
                            $error["price"] = "le prix ne doit pas etre vide ou negatif";
                        }
                        if (empty($this->controller->model->promotion) || $this->controller->model->promotion <= 0 || $this->controller->model->promotion > 100) {
                            $error["promotion"] = "la promotion doit etre compris entre 0 et 100";
                        }
                        if (empty($this->controller->model->image) ||  !filter_var($this->controller->model->image, FILTER_VALIDATE_URL)) {
                            $error["image"] = "l'url n'est pas valide";
                        }

                        if (empty($error)) {
                            $this->controller->addCatalogue($this->controller->model->name, $this->controller->model->size, $this->controller->model->image, $this->controller->model->price, $this->controller->model->promotion);
                            header("Location: ./index.php?page=add");
                        };
                    }

                    require($this->templateAdd);
                    break;
                case "delete":

                    $data = $this->controller->getAll();
                    if(isset($_GET["id"])){
                    $this->controller->deleteOne($_GET["id"]);
                    header("Location: ./index.php?page=add");
                    }
                    require($this->templateDelete);
                    case "update":
                        $data = $this->controller->getAll();
                        
                        if(isset($_POST["select"])){
                            $_SESSION["id"]=$_POST["select"];

                            if(isset($_POST["name"])){
                                $error = [];
                                
                                if (empty($this->controller->model->name)) {
                                    $error["name"] = "le nom ne doit pas etre vide";
                                }
                                if (empty($this->controller->model->size)) {
                                    $error["size"] = "la taille ne doit pas etre vide";
                                }
                                if (empty($this->controller->model->price) || $this->controller->model->price <= 1) {
                                    $error["price"] = "le prix ne doit pas etre vide ou negatif";
                                }
                                if (empty($this->controller->model->promotion) || $this->controller->model->promotion <= 0 || $this->controller->model->promotion > 100) {
                                    $error["promotion"] = "la promotion doit etre compris entre 0 et 100";
                                }
                                if (empty($this->controller->model->image) ||  !filter_var($this->controller->model->image, FILTER_VALIDATE_URL)) {
                                    $error["image"] = "l'url n'est pas valide";
                                }
        
                                if (empty($error)) {
                                    $this->controller->modify($this->controller->model->name, $this->controller->model->size, $this->controller->model->image, $this->controller->model->price, $this->controller->model->promotion,$_SESSION["id"]);
                                    header("Location: ./index.php?page=add");
                                };
                                
                                }
                            }
                        
                        require($this->templateUpdate);
                default:
                    # code...
                    break;
            }
        } else {

            require($this->template);
        }
    }
}
