<!-- Header -->

<header class="header trans_300">

<!-- Top Navigation -->

<div class="top_nav">
	<div class="container">
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

<!-- Main Navigation -->
	
<nav class="navbar navbar-expand-lg navbar-light bg-light">
<div class="container-fluid">
<a class="navbar-brand" href="#"><img class="w-25 h-25" src="<?php  echo ASSETS ?>images/logoclassV_F.png" alt=""></a>
<button class="navbar-toggler bg-white" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
<span class="navbar-toggler-icon"></span>
</button>
<div class="collapse navbar-collapse text-white" id="navbarSupportedContent">
<ul class="navbar-nav me-auto mb-2 mb-lg-0">
<li class="nav-item">
<a class="nav-link" aria-current="page" href="<?=ROOT ?>" >ACCUEUIL</a>
</li>
<li class="nav-item">
<a class="nav-link" href="<?=ROOT ?>home/#debut_boutique" >BOUTIQUE</a>
</li>

<!-- ADMIN if the connected user is an Admin -->
<?php if(isset($_SESSION["connectedUser"]) && $_SESSION["connectedUser"][0]["profil"]==="administrateur") : ?>                    
<li class="nav-item">
<a class="nav-link" href="<?=ROOT ?>login/" aria-disabled="true">ADMIN</a>
</li>
<?php endif; ?>
<!--End ADMIN if the connected user is an Admin -->


<li class="nav-item">
<a class="nav-link" href="<?=ROOT ?>contact/" aria-disabled="true">CONTACTS</a>
</li>
<li class="d-flex">
	<a class="btn btn-secondaire" href="#"><i class="fa fa-user-circle-o fa-lg" aria-hidden="true"></i>
	</a>
	<div class="dropdown">
		<button class="btn btn-secondary-outline dropdown-toggle fs-6" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
			<?php if(isset($_SESSION["connectedUser"])){echo $_SESSION["connectedUser"][0]["prenom"];} else { echo "&nbsp &nbsp &nbsp &nbsp";}?>                    
		</button>
		<ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
			<li><a class="dropdown-item" <?php if(isset($_SESSION["connectedUser"])){echo "href=". ROOT."logout/";}else{echo "href=". ROOT."login/";}?>><i class="fa fa-sign-in fa-lg" aria-hidden="true"></i> <?php if(isset($_SESSION["connectedUser"])){echo "Déconnexion";} else { echo "Connexion";}?></a></li>
			<li><hr class="dropdown-divider"></li>
			<li><a class="dropdown-item" href="<?=ROOT ?>inscription/"><i class="fa fa-user-plus fa-lg" aria-hidden="true"></i> &nbsp Inscription</a></li>
		</ul>
	</div>
</li>

<!-- Profile if a user is connected -->
<?php if(isset($_SESSION["connectedUser"])) : ?>                    
<li class="nav-item">
<a class="nav-link" href="<?=ROOT ?>profile/" aria-disabled="true">Profil</a>
</li>
<?php endif; ?>
<!--End ADMIN if a user is connected -->





<li class="">
	<a class="btn btn-secondaire position-relative" href="#"><i class="fa fa-shopping-cart fa-lg" aria-hidden="true"></i>
	<span id="" class="checkout_items">
		0
	</span>
	</a>
</li>
</ul>
</div>
</div>
</nav>


</header>
