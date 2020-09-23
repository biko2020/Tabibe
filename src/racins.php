<?php
// definire le chemain vers les racins des repertoires

define("SRC", dirname(__FILE__)); 
define("ROOT", dirname(SRC));
define("SP", DIRECTORY_SEPARATOR); // notre separateur '/'
define("VIEWS", ROOT.SP."views");
define("MODEL", ROOT.SP."model");
define("CALENDRIER", ROOT.SP."Month");
define("BASE_URL", dirname(dirname($_SERVER['SCRIPT_NAME'])));// eviter la repetition de l'url 


require MODEL.SP."model.php";
require MODEL.SP."Parametre.php";

//require CALENDRIER.SP."Month.php";

$obj_Data = new Parametre(); //instance la class Parametre
$User_Session = new Parametre;

require "Controleur.php";

?>