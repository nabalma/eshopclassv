<!DOCTYPE html>
<html lang="fr">
<head>
<title><?= $data["title"]?></title>

<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="Class V">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="icon" type="image/x-icon" href="<?=ASSETS ?>images/classv_icon_original.ico" sizes="16x16">


<link href="<?=ASSETS ?>plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">


<link rel="stylesheet" type="text/css" href="<?=ASSETS ?>styles/contact_styles.css">
<link rel="stylesheet" type="text/css" href="<?=ASSETS ?>styles/responsive.css"> 


<link rel="stylesheet" href="<?= ASSETS?>styles/bootstrap.min.css">


<script src="<?= ASSETS?>js/bootstrap.bundle.min.js" defer></script>
<script src="<?= ASSETS?>js/jquery-3.6.4.min.js" defer></script>

</head>



</head>

<body>

<div class="super_container">

	<!-- Header -->

	<?php $this->view("boutique/header_boutique") ?>

	<div class="container contact_container">
		<div class="row">
			<div class="col">
				<!-- Breadcrumbs -->
			</div>
		</div>



		<!-- Contact Us -->

		<div class="row mt-1">

			<div class="col-lg-6 contact_col">
				<div class="contact_contents">
					<h1 class="fs-5">Contactez nous</h1>
					<p>Vous avez plusieurs possibilités de nous contacter. Vous pouvez nous passer un appel, nous envoyer un courriel ou nous saisir un message, Choisissez ce qui vous convient le mieux.</p>
					<div >
						<p class="fw-bold">+1 (514) 834-0244</p>
						<p class="fw-bold">contact@classevmode.com</p>
					</div>
					
					<div>
						<p>Heures d'ouverture : 8.00-16.00 Du Lundi au Jeudi</p>
						<p>Sur RDV uniquement</p>
					</div>
				</div>

				<!-- Follow Us -->

				<div class="follow_us_contents">
					<h1 class="fs-5">Suivez nous</h1>
					<ul class="social d-flex flex-row">
						<li><a href="#" style="background-color: #3a61c9"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
						<li><a href="#" style="background-color: #41a1f6"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
						<li><a href="#" style="background-color: #fb4343"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
						<li><a href="#" style="background-color: #8f6247"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
					</ul>
				</div>

			</div>

			<div class="col-lg-6 get_in_touch_col mb-5">
				<div class="get_in_touch_contents">


					<h1 class="fs-5">Formulaire de contact</h1>
					<p>Renseignez, puis envoyer ce formulaire,  et recevez un retour gratuit.</p>

					
					<?php if(isset($_SESSION["msg_error"]) && $_SESSION["msg_error"]==""){
						$this->view("contacts/success_sent_msg");
					}elseif(isset($_SESSION["msg_error"])){$this->view("contacts/failer_sent_msg");} ?>
					

					<form method="post">
						<div>
							<input id="input_name" class="form_input input_name input_ph" type="text" name="name" placeholder="Votre nom" required="required" data-error="Name is required.">
							<input id="input_email" class="form_input input_email input_ph" type="email" name="email" placeholder="Votre Email" required="required" data-error="Valid email is required.">
							<input id="input_phone" class="form_input input_website input_ph" type="text" name="phone" placeholder="Téléphone" required="required" data-error="Name is required."> 
							<input id="input_subject" class="form_input input_website input_ph" type="text" name="subject" placeholder="Objet" required="required" data-error="Subject is required.">
							<textarea id="input_message" class="input_ph input_message" name="message"  placeholder="Saisissez votre message" rows="3" required data-error="Please, write us a message."></textarea>
						</div>
						<div>
							<button id="review_submit" type="submit" class="red_button message_submit_btn trans_300" value="Submit">send message</button>
						</div>
					</form>
				</div>
			</div>

		</div>

				<!-- Map Container -->
		
				<div class="row w-75 mx-auto">
			<div class="col rounded-3">
				<div id="google_map">
					<div class="map_container">
						<div id="map"><iframe class="w-100 h-100" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2796.5239041210293!2d-73.41447778822192!3d45.499531270953845!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4cc9043120dcfa6f%3A0x21b85a2024deb3c!2s2300%20Rue%20Pilon%2C%20Saint-Hubert%2C%20QC%20J3Y%205A2!5e0!3m2!1sfr!2sca!4v1682091174784!5m2!1sfr!2sca" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
					</div>
					</div>
				</div>
			</div>
		</div>
	</div>


<?php $this->view("boutique/footer") ?>
