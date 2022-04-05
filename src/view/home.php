<?php
    class HomeView{
        public function __construct(HomeController $controller)
        {
            $this->controller=$controller;
            $this->template=DIR_TEMPLATES."home.php";
        }
        public function render()
        {
            // recuperation de tous les fromages dans la abase de données via la methode getAll de notre controller
            $data=$this->controller->getAll();
            require($this->template);
        }
    }
?>