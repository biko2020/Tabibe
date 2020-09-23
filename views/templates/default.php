<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
   
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
 
   <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
   <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" >
 
   <script src="js/function.js"></script>
   <style><?php include 'css/style.css'; ?></style>
    
    <!-- Titre de notre page -->
    <title><?php echo $title ?></title>

</head> 
<body>

<!-- debut navbarre -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
    
        <a class="navbar-brand" href="#"><img src="<?php echo BASE_URL.SP."images/ecteur.jfif"?>" alt="Tbibe"><span class="ta">Ta</span><span class="bibe">bibe</span></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                <ul class="navbar-nav mr-auto ml-5 mt-2 mt-lg-1" >
                    <li class="nav-item active">
                        <a class="nav-link" href="<?php echo BASE_URL.SP."Accueil" ?>">Accueil <span class="sr-only">(current)</span></a>
                    </li>

                    <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle id="dropdownMenuButton data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="#">Rendez-Vous</a>
                      <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">   
                        <a class="dropdown-item" href="<?php echo BASE_URL.SP."Rendezvous" ?>">Prenez Rendez-Vous</a>
                        <a class="dropdown-item" href="<?php echo BASE_URL.SP."Fileattente"?>">File d'attente</a>
                      </div>                  
                    </li>

                    <li class="nav-item">
                      <?php if(!isset($_SESSION["user"])): # si user n'est pas connecte ?>
                        <a class="nav-link" href="<?php echo BASE_URL.SP."Administration" ?>">Espace Médecin</a>
                      <?php     
                        elseif(isset($_SESSION["user"])): # si user est connecte ?>
                        <a class="nav-link" href="<?php echo BASE_URL.SP."GestionFileAttente" ?>">Gestion File d'attente</a>
                      <?php endif ?>  
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo BASE_URL.SP."Contact" ?>">Contact</a>  
                    </li>
                    <li class="nav-item">
                      <?php  if(isset($_SESSION["user"])): # si user est connecte ?>
                        <a href="<?php echo BASE_URL.SP."Actiondeconnexion" ?>" class="btn btn-outline-danger" type="submit">Déconnexion</a> 
                        <?php endif ?>
                    </li>
                </ul>
                <form class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2" type="search" placeholder="....">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                </form>
        </div>
    </nav>
<!-- Fin navbarre -->
<div class="barre"> 
	</div>
<!-- contenu de notre page -->
<div class="container">

    <?php echo $content ?>

</div>


<!-- Debut Footer -->
<footer class="mainfooter" role="contentinfo">
  <div class="footer-middle">
  <div class="container">
    <div class="row">
      <div class="col-md-3 col-sm-6">
        <!--Column1-->
        <div class="footer-pad">
          <h4>Cliniques</h4>
          <ul class="list-unstyled">
            <li><a href="#"></a></li>
            <li><a href="#">Adresse Cliniques</a></li>
            <li><a href="#">Spécialistes Médical</a></li>
            <li><a href="#">Matériels Médical</a></li>
            <li><a href="#">SOS Médical</a></li>
            <li><a href="#">Conseils Médical</a></li>
          </ul>
        </div>
      </div>
      <div class="col-md-3 col-sm-6">
        <!--Column1-->
        <div class="footer-pad">
          <h4>Pharmacies de Garde</h4>
          <ul class="list-unstyled">
            <li><a href="#">pharmacie garde </a></li>
            <li><a href="#">Annuaires des pharmacies</a></li>
            <li><a href="#">site web pharmacie</a></li>
          </ul>
        </div>
      </div>
      <div class="col-md-3 col-sm-6">
        <!--Column1-->
        <div class="footer-pad">
          <h4>Service Ambulances</h4>
          <ul class="list-unstyled">
            <li><a href="#">Annuaires des ambulances</a></li>
            <li><a href="#">Service ambulance</a></li>
            <li><a href="#">Conseils</a></li>
            <li><a href="#">site web ambulance</a></li>
            <li>
              <a href="#"></a>
            </li>
          </ul>
        </div>
      </div>
    	<div class="col-md-3">
    		<h4>Contact S.M </h4>
            <ul class="social-network social-circle">
             <li><a href="#" class="icoFacebook" title="Facebook"><i class="fa fa-facebook"></i></a></li>
             <li><a href="#" class="icotwitter" title="twitter"><i class="fa fa-twitter"></i></a></li>
             <li><a href="#" class="icowhatsapp" title="whatsapp"><i class="fa fa-whatsapp"></i></a></li>
             <li><a href="#" class="icoLinkedin" title="Linkedin"><i class="fa fa-linkedin"></i></a></li>
             
            </ul>				
		</div>
    </div>
	<div class="row">
		<div class="col-md-12 copy">
			<p class="text-center">&copy; Copyright 2020 - ENSET.</p>
		</div>
	</div>
  </div>
  </div>
</footer>
    <!-- Fin Footer -->

  </body>
</html>