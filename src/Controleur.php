
<?php

require "calendrier/Month.php"; /* appel pour notre fichier Month.php */

// *** fonction affichage de la page d'acceuil ***
function afficher_Accueil() {
    $contenu ='<h1> Publication du jour 28/08/2020 </h1>';

    $contenu .='
    <div class="container">
        <div class="row">
            <div class="col=6">
                <div class="alert alert-success" role="alert">
                <h4 class="alert-heading">SPORT ET DIABÈTE</h4>
                <p>L’activité sportive est une aide précieuse pour lutter contre le diabète.

                Mais l’effet n’est pas le même selon le moment de la journée où la personne diabétique pratique le sport, et la durée de cette activité.</p>
                <hr>
                <p class="mb-0">L’exercice physique aide à contrôler la glycémie, c’est un fait établi.
                Des chercheurs japonais ont étudié l’impact de la façon dont le sport est pratiqué sur le taux de sucre dans le sang. Vaut-il mieux faire du sport le matin ? L’après-midi ? À jeun ? Pendant combien de temps ? …
                
                Plusieurs groupes ont été analysés :
                
                1) le groupe 1 ne faisait pas de sport du tout
                
                2) le groupe 2 avait une activité sportive avant ou après chaque repas (donc 3 fois par jour)
                
                3) le groupe 3 avait une activité sportive très brève (3 fois 1 mn de course suivie de 30 secondes de repos) toutes les ½ heures, 20 fois par jour.</p>
                </div>
                </div>
            </div>

            <div class="col=6">  
                <img src="'.BASE_URL.SP."images".SP."medecin.jfif".'" class="card-img" alt=""> 
            </div> 
        </div>

        <div class="card-group">
            <div class="card">
                <img src="'.BASE_URL.SP."images".SP."cliniques2.jfif".'" class="card-img-top" alt="Clinique">
                <div class="card-body">
                <h5 class="card-title">Clinique</h5>
                <p class="card-text">Clinique a Chifa a la ville de : mohammedia :adresse 8 rue elamal 05 23 15 46 78 :e-mail cliniqueachifa@tabibe.com.</p>
                <p class="card-text"><small class="text-muted">Pour plus...</small></p>
                </div>
            </div>
            <div class="card">
                <img src="'.BASE_URL.SP."images".SP."pharmacie.jfif".'" class="card-img-top" alt="Pharmacie">
                <div class="card-body">
                <h5 class="card-title">Pharmacie de Garde</h5>
                <p class="card-text">pharmacie de garde a la ville de : Mohammedia Phrmacie achifa :adresse 11 rue tamani N°12 :contact 05 23 45 69 28 E-mail pharmacieachifa@tabibe.com.</p>
                <p class="card-text"><small class="text-muted">Pour plus...</small></p>
                </div>
            </div>
            <div class="card">
                <img src="'.BASE_URL.SP."images".SP."ambulance.jfif".'" class="card-img-top" alt="...">
                <div class="card-body">
                <h5 class="card-title">Service Ambulance</h5>
                <p class="card-text">Service ambulance chez Rami sur la ville de :Mohammedia pour transporter les malade :contact 05 23 56 56 56 E-mail: ambulance@tabibe.com .</p>
                <p class="card-text"><small class="text-muted">Pour plus...</small></p>
                </div>
            </div>
        </div>

    </div> <!-- fin container-->   
  ';



    return $contenu;
}

# *** creation de l'interface  pour la page rendez-vous ***
function afficher_Rendezvous() {   
    global $Nday;
    $dt =  date('d/m/y');
    $Tm =  date("h:i:sa"); 
  
    $contenu='   
    <p><!-- Material form login --> </p>
    <div class="card bg-primary" style="color:white;" >

        <h5 class="card-header info-color white-text text-center py-4 ">
            <strong>Prenez Rendez-Vous</strong>
        </h5>

        <!--Card content-->
        <div class="card-body px-lg-5 pt-0">

        <!-- Form -->
        <form class="text-left" style="color: white;" action="InscriptionRendezVous" method="post">

            <div class="form-row">
                <!-- Nom -->
                <div class="form-group col-md-6">
                    <label for="Nom">Nom : </label>
                    <input type="text" name="nom" class="form-control " value="NOM" required="" placeholder="Entrer votre nom" aria-label="Entrer votre Nom">
                </div>
                <!-- Prenom -->
                <div class="form-group col-md-6">
                    <label for="Prenom">Prenom : </label>
                    <input type="text" name="prenom" class="form-control " value="PRENOM" required="" placeholder="Entrer votre prenom" aria-label="Entrer votre prenom">
                </div>
            </div>

            <div class="form-row">
                <!-- E-mail -->
                <div class="form-group col-md-6">
                    <label for="inputEmail">E-mail : </label>
                    <input type="email" name="email" class="form-control " value="votre_mail@tabibe.com" required="" placeholder="Entrer votre e-mail" aria-label="Entrer votre E-mail">
                </div>
                <!-- GSM -->
                <div class="form-group col-md-6">
                    <label for="tel">GSM : </label>
                    <input type="text" name="gsm" class="form-control " value="Téléphone" required="" placeholder="Entrer votre telephone" aria-label="Entrer votre telephone">
                </div>
            </div>

            <div class="form-row">
                <!-- Date -->
                <div class="form-group col-md-6">
                    <label for="date">Date Rendez-vous : </label>';
                    
                    $month = new tabibe\calendrier\Month($_GET['month'] ?? NULL, $_GET['year'] ?? NULL);
                    $FirstDay = $month->getFirstDay()->modify('today');

    
    $contenu.='  <input type="text" id="dte" name="dte" value="" ><input type="text" id="_toDay" name="_toDay" value="'.$month->toString().'" >';              
                 
    $contenu.='  <table class="Rvd_Calendar Rvd_Calendar_6semaine--'.$month->getWeeks().'6semaine">' . $month->tabHeader(). '</table>';
                  
    $contenu.='  <table id="T_table" class="Rvd_Calendar Rvd_Calendar_6semaine--'.$month->getWeeks().'6semaine">';
             
                        $month->getWeeks();
                        for($i = 0; $i < $month->getWeeks(); $i++):                         
                              
    $contenu.='         <tr>';
                                    
                                foreach($month->days as $jour => $day): 
                                    
                                     $ActivDate = (clone $FirstDay)->modify("+". ($jour +$i * 7) ."days");
                                    
    $contenu.='                            <td  onClick="get_TdValue(this);">'
                                
                                           
                                            .$ActivDate->format('j');
                                            
                                                                                 
                                           '</td>';   
                                           
                                                                             
                                endforeach;

    $contenu.='         </tr>';
                                               
                        endfor; 

    $contenu.='  </table> 

                </div>
                <!-- Heure -->
                <div class="form-group col-md-6">
                    <label for="heure">Heure Rendez-vous : </label>
                    <input type="Time" name="heure" class="form-control " value="Time" required="" placeholder="Heure Rendez-vous" aria-label="Heure Rendez-vous">
                </div>
            </div>
            </br>
            <button type="submit" class="btn btn-primary ">Envoyer</button>
        </form>
        <!-- Form -->

        </div>

    </div>
    <!-- Material form login -->
    ';
    return $contenu;
}

# creation d'un rendez-vous pour patients
function afficher_InscriptionRendezVous() {
// l'enregistrement  d'un rendez vous 
           global $obj_Data;

            $nom = $_REQUEST["nom"] ?? NULL ;
            $prenom = $_REQUEST["prenom"] ?? NULL;
            $email = $_REQUEST["email"] ??  NULL;
            $gsm =   $_REQUEST["gsm"] ??  NULL;
            $dte = $_REQUEST["dte"] ?? NULL;
            $_toDay = $_REQUEST["_toDay"] ?? NULL;
            $heure = $_REQUEST["heure"] ?? NULL;
  
            $_toDay = trim($_toDay);
            $dte = trim($dte);//enlever les espaces interieur avecla fonction (strtr)

            $dte = $dte.$_toDay;

            $obj_Data->getTableName("Patients"); // le nom de notre table Patients
            
            $obj_Data = $obj_Data->createPatient($nom,$prenom,$email,$gsm,$dte,$heure);

            if(!isset($obj_Data)==0){
                
                return '<br><br><h1>Votre Rendez-vous est confirmé: <br><br></h1><h4><a href="#">Consulte la liste des Rendez-vous </a></h4>';
            }else {
                return '<h1 style="color:red;">Error 404 ....</h1>'.afficher_Rendezvous();
            }

}

//** fonction affichage la file d'attente */
function afficher_Fileattente() {

    global $obj_Data;
  
        $obj_Data->getTableName("Patients"); // envoyer le nom de la table Patients a notre fonction getTableName  
        $obj_Data = $obj_Data->getFileAttente();
 
        $contenu= '<table class="table">                   
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">Date Rendez-vous</th>
                            <th scope="col">Heure</th>                     
                        <tr>
                    </thead>

                    <tbody>';

                if( is_array($obj_Data)) { // ca concerne un tableau d'objet
                
                    foreach($obj_Data as $key => $value) { //recupere les champs et leurs valeurs sur notre tableau
                       
        $contenu.='     <tr>
                            <td scope="row">'.$value["dte"].'</td>
                            <td scope="row">'.$value["heure"].'</td>    
                        </tr>';
                   
                    } 
                }   
        $contenu.=' </tbody>
                    
                </table>';

    return $contenu;
}


// *** fonction  qui crée l'interface d'iscription des Medecins  ***
function afficher_Administration(){
    $contenu ='<p><h1>Bienvenu a l\'espace Médecin</h1><br>';

    $contenu.='
                <div class="container">
                    <div class="row">
                        <div class="col-6">
                            <div class="bg-white shadow-sm rounded p-6">

                                <form action="Inscription" methode="post">

                                    <div class="mb-4"><h2 class="h4">INSCRIPTION</h2></div>
                                    <div class=" mb-3">
                                        <div class="input-group input-group form">
                                            <input type="text" name="pseudo" class="form-control " value="BRAHIM" required="" placeholder="Entrer votre Pseudo" aria-label="Entrer votre Pseudo">
                                        </div>
                                    </div>
                                    <div class=" mb-3">
                                        <div class="input-group input-group form">
                                            <input type="email" class="form-control " name="email" value="brahimlion38@gmail.com" required="" placeholder="Entrez votre adresse email" aria-label="Entrez votre adresse email">
                                        </div>
                                    </div>
                                    <div class=" mb-3">
                                        <div class="input-group input-group form">
                                            <input type="password" class="form-control " name="password" value="ok2020" required="" placeholder="Entrez votre mot de passe" aria-label="Entrez votre mot de passe">
                                        </div>
                                    </div>
                                    <div class=" mb-3">
                                        <div class="input-group input-group form">
                                            <input type="text" class="form-control " name="CodeConfi" value="AIT566-OUF208-KIR568" required="" placeholder="Entrez votre code" aria-label="Entrez votre code d\'identification">
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-block btn-primary">S\'inscrire</button>

                                </form>

                            </div>
                        </div>
                            <div class="bg-white shadow-sm rounded p-6">
                                
                                <div class="col-6">
                                    <div class="mb-4"><h2 class="h4">CONNEXION...</h2></div>
                                    
                                    <form class="form-inline my-2 my-lg-0" action="Actionconnexion" method="post">

                                        <div class="mb-3">
                                            <div class="input-group input-group form">
                                                <input class="form-control mr-sm-2" name="email" type="email" placeholder="votre e-mail" required>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <div class="input-group input-group form">
                                                <input class="form-control mr-sm-2" name="password" type="password" placeholder="votre mot de passe" required>
                                            </div>
                                        </div>
                                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Connexion</button>
                                        
                                    </form>

                                </div>
                            </div>
                    </div>                
                </div>';
               
     
    return $contenu; 

}

// *** fonction pour creer compte  des Medecins  ***
function afficher_Inscription() {

    global $User_Session;

        $nom        = $_REQUEST["pseudo"];
        $email      = $_REQUEST["email"];
        $password   = $_REQUEST["password"];
        $Code_Confi = "AIT566-OUF208-KIR568";

        if($_REQUEST["CodeConfi"] != $Code_Confi ) {# simulation de code unique livre au medecin qui lui permettre de s'inscrire
            
            return '<p class=" btn btn-danger btn-block">Code de Confiramtion Médecin Incorrect ! </p>';
            exit();

        }

        $User_Session->getTableName("medecin");// envoyer le nom de la table users a notre fonction getTableName
        $User_Session->CreatUsers($nom,$email,$password);
            
            if($User_Session){
             
                $_SessionUser = $User_Session->session($email,$password);
                         
                if($_SessionUser ){

                    $_SESSION["user"] = $_SessionUser ;
                    return '<p class="btn btn-success btn-block">Inscription réussie '.$nom.', Vous êtes bien connecté</p>';
                }

            } else {

                return '<p class=" btn btn-danger btn-block">inscription échouée</p>';

            }

}

# notre fonction qui gere les sessions users
function afficher_Actionconnexion() {

    global $User_Session;

    $email     = $_REQUEST["email"];
    $password  = $_REQUEST["password"];
    //$User_Session = $User_Session->session($email,$password);

        if($User_Session) {
            $User_Session->getTableName("medecin");// envoyer le nom de la table users a notre fonction getTableName
            $data_user = $User_Session->session($email,$password);   // on recuperer notre session sur notre var $data_user 
            
            if($data_user) { // cas compte valide
               
                $_SESSION["user"] = $data_user; // stocke notre session sur $_SESSION["user"] qui nous permet de suivre les traces user
                return '<p class="btn btn-success btn-block">Connexion réussie , Vous êtes bien connecté</p>';

            }

        } else { // cas compte non valide renvoyer a la page afficher_Administration

           return '<p class=" btn btn-danger btn-block">Connexion échouée</p>'.afficher_Administration();

        } 
   

}
// action de deconnexion session user
function afficher_Actiondeconnexion() {

    // detruire la variable de connexion actuelle par la fonction unset
       unset($_SESSION["user"]);
       return '<p class="btn btn-success btn-block">Deconnexion réussie'.afficher_Accueil();

}

function afficher_GestionFileAttente() {
    global $obj_Data;
  
        $obj_Data->getTableName("Patients"); // envoyer le nom de la table Patients a notre fonction getTableName  
        $obj_Data = $obj_Data->getFileAttente();
 
        $contenu= '<table class="table">                   
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">Nom</th>
                            <th scope="col">Prenom</th>
                            <th scope="col">Date Rendez-vous</th>
                            <th scope="col">Heure</th>
                            <th scope="col">E-mail</th>
                            <th scope="col">GSM</th>                        
                        <tr>
                    </thead>

                    <tbody>';

                if( is_array($obj_Data)) { // ca concerne un tableau d'objet
                
                    foreach($obj_Data as $key => $value) { //recupere les champs et leurs valeurs sur notre tableau
                       
        $contenu.='     <tr>
                            <td scope="row">'.$value["nom"].'</td>
                            <td scope="row">'.$value["prenom"].'</td>
                            <td scope="row">'.$value["dte"].'</td>
                            <td scope="row">'.$value["heure"].'</td>
                            <td scope="row">'.$value["email"].'</td>
                            <td scope="row">'.$value["gsm"].'</td>       
                        </tr>';
                   
                    } 
                }   
        $contenu.=' </tbody>
                    
                </table>';

    return $contenu;

}

// *** fonction controle page contact ***
function afficher_Contact() {
    return "<h1>Contact</h1>";
}

?>