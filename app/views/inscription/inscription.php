<!DOCTYPE html>
<html lang="fr">
<head>
<title><?= $data["title"]?></title>

<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="Class V">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="icon" type="image/x-icon" href="<?=ASSETS ?>images/classv_icon_original.ico" sizes="16x16">





<link rel="stylesheet" href="plugins/themify-icons/themify-icons.css">

<link rel="stylesheet" type="text/css" href="plugins/jquery-ui-1.12.1.custom/jquery-ui.css">




<link href="<?=ASSETS ?>plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">

<link rel="stylesheet" type="text/css" href="<?=ASSETS ?>plugins/OwlCarousel2-2.2.1/owl.carousel.css">
<link rel="stylesheet" type="text/css" href="<?=ASSETS ?>plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
<link rel="stylesheet" type="text/css" href="<?=ASSETS ?>plugins/OwlCarousel2-2.2.1/animate.css">


<link rel="stylesheet" type="text/css" href="<?=ASSETS ?>styles/contact_styles.css">
<link rel="stylesheet" type="text/css" href="<?=ASSETS ?>styles/responsive.css"> 


<link rel="stylesheet" href="<?= ASSETS?>styles/bootstrap.min.css">


<script src="<?= ASSETS?>js/bootstrap.bundle.min.js" defer></script>
<script src="<?= ASSETS?>js/jquery-3.6.4.min.js" defer></script>

</head>



</head>

<body>

<!-- <div class="super_container"> -->
<div class="container">

	<!-- Header -->

<!--<header class="header trans_300"> -->
<header class="container">
<!-- Top Navigation -->

<div class="top_nav">
    
	<div class="container-fluid">
        <div class="row">
			<div class="col-md-3">
				<div class="top_nav_left"><i class="fa fa-mobile" aria-hidden="true" style="font-size:25px;"></i> &nbsp; Mobile : +1 (514) 834-0244 </div>
			</div>
			<div class="col-md-3">
				<div class="top_nav_left"><i class="fa fa-globe" aria-hidden="true" style="font-size:25px"></i> &nbsp;Localisation : Saint Hubert, J3Y 5A2 </div>
			</div>
			
			<div class="col-md-6">
				<div class="top_nav_left"> <i class="fa fa-info" aria-hidden="true" style="font-size:25px"></i> Livraison gratuite sur Saint Hubert pour toute commande de plus de $ 2000, avant taxes </div>
			</div>
		</div>

 
	</div>
  
</div>
<div class="row">
            <div class="col"></div>
            <div class="mt-1 mb-1 col text-center">
                <a href="<?=ROOT ?>" type="button" class="me-3 red_button message_submit_btn trans_300 btn-danger">Retour</a>
            </div>
            
</div>


</header>

</div>



<section class="vh-100" style="background-color: #eee;">
 
  <div class="container w-100 h-100">
    
    <div class="row d-flex justify-content-center align-items-center h-100">
      
    <div class="col-lg-12 col-xl-11">
        <div class="card text-black" style="border-radius: 25px;">
          <div class="card-body">

            <div class="row justify-content-between">

            <span class="col-4 d-flex align-items-center d-none d-sm-none d-md-block">
                <img class="w-100" src="<?php  echo ASSETS ?>images/logoclassV_F.png" alt=""/>
            </span>


              <div class="col-8">

                <p class="text-center h1 fs-3 fw-bold mb-2 mx-1 mx-md-4 mt-1 d-none d-sm-block d-md-block">Inscription</p>


                  <?php 
                  
                  if($_SERVER["REQUEST_METHOD"]=="POST"){

                     if($_SESSION["register_error"]==""){ 
                     //Registration Alert Succes -->
                      $this->view("inscription/success_inscription");}

                  else{ 
                    //Registration Alert erreur
                    $this->view("inscription/error_inscription");}
                  }
                  ?>
                  

                <form class="mx-1 mx-md-4" method="post">

                  <div class="d-flex flex-row align-items-center mb-1">
                    <i class="fa fa-user fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input name="name" type="text" id="form3Example1c" class="form-control" placeholder="Nom" />                     
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-1">
                    <i class="fa fa-user fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input name="firstname" type="text" id="form3Example1c" class="form-control" placeholder="Prénom"/>                     
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-1">
                    <i class="fa fa-envelope fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input name="email" type="email" id="form3Example3c" class="form-control" placeholder="Entrez votre adresse Courriel"/>
                     
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-1">
                    <i class="fa fa-phone fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input name="phone" type="text" id="form3Example4cd" class="form-control" placeholder="Entrez votre numero de téléphone"/>
                    </div>
                  </div>


                  <div class="d-flex flex-row align-items-center mb-1">
                    <i class="fa fa-lock fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input name="password" type="password" id="form3Example4c" class="form-control" placeholder="Mot de passe"/>
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-1">
                    <i class="fa fa-key fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input name="repassword" type="password" id="form3Example4cd" class="form-control" placeholder="Confirmer votre mot de passe"/>
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-1">
                    <i class="fa fa-id-badge fa-lg me-3 fa-fw"></i>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="profil" id="inlineRadio1" value="client" checked >
                        <label class="form-check-label" for="inlineRadio1">Client</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="profil" id="inlineRadio2" value="administrateur" disabled>
                        <label class="form-check-label" for="inlineRadio2">Administrateur</label>
                    </div>
                  </div>

                  <div class="d-flex justify-content-center mx-4 mb-1 mb-lg-4">
                       <button type="submit" class="ms-3 red_button message_submit_btn trans_300">S'enregistrer</button>                    
                  </div>

                </form>

              </div>
               
            </div>
           
          </div>
          
        </div>
        
      </div>

 

    </div>
    
  </div>
  
</section>
	









<?php $this->view("boutique/footer") ?>
