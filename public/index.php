<?php
// on cherche  a dev une page index.php qui nous permet de generer n'importe quelle page de notre site 
// si le parametre n'est pas present on genere la page d'accueil par defaut

$page = "home";
if (isset($_GET["page"])) {
    $page = $_GET["page"];
}


// on importe les constantes pour la connexion a la BDD
@require_once("../config/index.php");
$dsn = "mysql:host=" . DB_HOSTNAME . ";dbname=" . DB_DATABASE;;
$db = new PDO($dsn, DB_USERNAME, DB_PASSWORD);

//Tableau qui contient les different pages du site 
$pages = [
    "home"=> array(
        "model"=>"HomeModel",
        "controller"=>"HomeController",
        "view"=>"HomeView"
    ),
    "add"=> array(
        "model"=>"AddModel",
        "controller"=>"AddController",
        "view"=>"AddView"
    )

];

// on parcourt le tableau pour verifier si la page existe reelement 
$find=false;

foreach ($pages as $key => $value) {
    //key contient le nom de la pages et value contien le tableau associatif 
    //avec les infos sur le model le controller et la vue
    if($page===$key){
        //nous avons trouver la bonne page a generer
        $find=true;

        $model=$value["model"];
        $controller=$value["controller"];
        $view=$value["view"];
    }
}

//on importe les differentes classes (ex:HomeModel,HomeController et HomeView)
if($find){
require(DIR_MODEL . $page . ".php");
require(DIR_CONTROLLER .$page .".php");
require(DIR_VIEW .$page .".php");

//suite a l'import nous avons la possibilité d'instancier les classes 
$objModel = new $model($db);
$objController = new $controller($objModel);
$objView = new $view($objController);

$objView->render();
}