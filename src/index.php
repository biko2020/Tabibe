
<?php
session_start();
require "racins.php";
require_once(MODEL.SP."Parametre.php");

// recuperer l'url dans un tableau avec la methode explode

$url = ltrim($_SERVER['PATH_INFO'],'/');
$url = explode('/',$url); 


// notre route
$route = array("Accueil", "Rendezvous", "Fileattente", "InscriptionRendezVous","Administration", "Inscription", "Actionconnexion", "Actiondeconnexion", "GestionFileAttente", "modifier", "supprimer", "Updatepatient", "Contact");


$action = $url[0]; // notre action recupere le premier element de notre tableau

// **** le controleur ****

if (!in_array($action, $route)) {
// cas d'echec

    $title = "Page Erreur";
    $content = "Page non trouver !";

} else {
// sinon fait appel a l'action demander  

    $function = "afficher_".ucwords($action); // avec des caractere Maj

    $title = "Page ".$action; // envoyer le nom de l'action au titre de la page default.php
    $content = $function();   // envoyer le traitement de la fonction au contenu de la page default.php

}

require VIEWS.SP."templates".SP."default.php";




?>