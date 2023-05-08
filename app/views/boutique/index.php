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

<link rel="stylesheet" type="text/css" href="<?=ASSETS ?>plugins/OwlCarousel2-2.2.1/owl.carousel.css">
<link rel="stylesheet" type="text/css" href="<?=ASSETS ?>plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
<link rel="stylesheet" type="text/css" href="<?=ASSETS ?>plugins/OwlCarousel2-2.2.1/animate.css">


<link rel="stylesheet" type="text/css" href="<?=ASSETS ?>styles/main_styles.css">
<link rel="stylesheet" type="text/css" href="<?=ASSETS ?>styles/responsive.css"> 


<link rel="stylesheet" href="<?= ASSETS?>styles/bootstrap.min.css">


<script src="<?= ASSETS?>js/bootstrap.bundle.min.js" defer></script>
<script src="<?= ASSETS?>js/jquery-3.6.4.min.js" defer></script>

</head>


<body>

<div class="super_container">
	<!-- Header -->

		<?php $this->view("boutique/header_boutique") ?>

	<!-- Slider -->

	<div class="main_slider" style="background-image:url(<?= ASSETS ?>images/slide_3_classv.jpg)">
		<div class="container fill_height">
			<div class="row align-items-center fill_height">
				<div class="col">
					<div class="main_slider_content d-none d-sm-block">
						<h6 class="text-white">Spring / Collection Été 2023</h6>
						<h1 class="text-white">Obtenez jusqu'à 30% de remise</h1>
						<div class="red_button shop_now_button" style="width:80%"><a href="#debut_boutique" >Visitez votre boutique dès maintenant !</a></div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Banner -->

	<div class="banner">
		<div class="container">
			<div class="row" id ="debut_boutique">
				<div class="col-md-3">
					<div class="banner_item align-items-center" style="background-image:url(<?= ASSETS ?>images/categories_robes.jpg)">
						<div class="banner_category">
							<a href="categories.html">Robes et Pyjamas</a>
						</div>
					</div>
				</div>
				
				<div class="col-md-3">
					<div class="banner_item align-items-center" style="background-image:url(<?= ASSETS ?>images/categories_jupes_pantalons.jpg)">
						<div class="banner_category">
							<a href="categories.html">Jupes et Pantalons</a>
						</div>
					</div>
				</div>
				<div class="col-md-3">
					<div class="banner_item align-items-center" style="background-image:url(<?= ASSETS ?>images/categories_chandails.jpg)">
						<div class="banner_category">
							<a href="categories.html">Vestes et Chandails</a>
						</div>
					</div>
				</div>
				<div class="col-md-3">
					<div class="banner_item align-items-center" style="background-image:url(<?= ASSETS ?>images/banner_2.jpg)">
						<div class="banner_category">
							<a href="categories.html">autres accessoires</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Nos produits -->

	<div class="new_arrivals" >
		<div class="container">
			<div class="row">
				<div class="col text-center">
					<div class="section_title new_arrivals_title">
						<h2>Nos produits</h2>
					</div>
				</div>
			</div>
			<div class="row align-items-center">
				<div class="col text-center">
					<div class="new_arrivals_sorting">
						
						</div>
					</div>
				</div>
			</div>

		<!-- Selection de produits -->		
					
			<div class="container row mx-auto d-flex">
				
					<a class="col btn btn-outline-danger me-1 mb-1">TOUS</a>
					<a class="col btn btn-outline-danger me-1 mb-1">SOLDES</a>
					<a class="col btn btn-outline-danger me-1 mb-1">NOUVEAUTES</a>
					<a class="col btn btn-outline-danger me-1 mb-1">ROBES</a>
					<a class="col btn btn-outline-danger me-1 mb-1">BAS</a>
					<a class="col btn btn-outline-danger me-1 mb-1">HAUTS</a>
					<a class="col btn btn-outline-danger me-1 mb-1">ACCESSOIRES</a>
				
				
			</div>
					
				
			<div class="container mx-auto row">
				<div class="col">
					<div class="product-grid" data-isotope='{ "itemSelector": ".product-item", "layoutMode": "fitRows" }'>

						<!-- Product 1 -->

						<div class="product-item men mb-3 mt-2">
							<div class="product discount product_filter">
							
								<div class="product_image">
									<img src="<?= ASSETS ?>images/product_1.png" style="height:95%;width:95%"alt="">
								</div>
								
								<div class="favorite"></div>
								<div class="favorite favorite_left"></div>
							
					
								<div class="product_bubble product_bubble_right product_bubble_red d-flex flex-column align-items-center"><span>-$20</span></div>								
								<div class="product_bubble d-flex flex-column align-items-center w-25" style="margin-left: 38%; color: white;text-shadow: 1px 1px 2px black, 0 0 25px blue, 0 0 5px darkblue;"><span class="fs-5">Vendu</span></div>								
								<div class="product_bubble product_bubble_left product_bubble_green d-flex flex-column align-items-center"><span>new</span></div>
								
								
								<div class="product_info">
									<h6 class="product_name"><a href="single.html">Fujifilm X100T 16 MP Digital Camera (Silver)</a><span class="text-info">  Ref:01</span></h6>
									<div class="product_price">$520.00<span>$590.00</span></div>
								</div>
							</div>

							<div class="d-flex justify-content-between row mx-auto w-100">
								<div class="col-10 red_button add_to_cart_button">
									<a href="#">add to cart</a>
								</div>
								<div class="col-2 btn-secondary add_to_cart_button d-flex justify-content-center" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Voir Détails">
									<a  href="<?=ROOT?>details"><svg class="mx-auto" xmlns="http://www.w3.org/2000/svg" width="2rem" height="2rem" viewBox="0 0 24 24"><path fill="white" d="M12 20q-.825 0-1.413-.588T10 18q0-.825.588-1.413T12 16q.825 0 1.413.588T14 18q0 .825-.588 1.413T12 20Zm0-6q-.825 0-1.413-.588T10 12q0-.825.588-1.413T12 10q.825 0 1.413.588T14 12q0 .825-.588 1.413T12 14Zm0-6q-.825 0-1.413-.588T10 6q0-.825.588-1.413T12 4q.825 0 1.413.588T14 6q0 .825-.588 1.413T12 8Z"/></svg></a>
								</div>
							</div>
						</div>

						<!-- Product 2 -->

						<div class="product-item women mb-2 mt-2">
							<div class="product product_filter">
							
								<div class="product_image">
									<img src="<?= ASSETS ?>images/product_2.png" alt="">
								</div>
								<div class="favorite"></div>
								<div class="product_bubble product_bubble_left product_bubble_green d-flex flex-column align-items-center"><span>new</span></div>
								<div class="product_info">
									<h6 class="product_name"><a href="single.html">Samsung CF591 Series Curved 27-Inch FHD Monitor</a></h6>
									<div class="product_price">$610.00</div>
								</div>
							</div>
							<div class="red_button add_to_cart_button"><a href="#">add to cart</a></div>
						</div>

						<!-- Product 3 -->

						<div class="product-item women mb-2 mt-2">
							<div class="product product_filter">
								<div class="product_image">
									<img src="<?= ASSETS ?>images/product_3.png" alt="">
								</div>
								<div class="favorite"></div>
								<div class="product_info">
									<h6 class="product_name"><a href="single.html">Blue Yeti USB Microphone Blackout Edition</a></h6>
									<div class="product_price">$120.00</div>
								</div>
							</div>
							<div class="red_button add_to_cart_button"><a href="#">add to cart</a></div>
						</div>

						<!-- Product 4 -->

						<div class="product-item accessories mb-2 mt-2">
							<div class="product product_filter">
								<div class="product_image">
									<img src="<?= ASSETS ?>images/product_4.png" alt="">
								</div>
								<div class="product_bubble product_bubble_right product_bubble_red d-flex flex-column align-items-center"><span>sale</span></div>
								<div class="favorite favorite_left"></div>
								<div class="product_info">
									<h6 class="product_name"><a href="single.html">DYMO LabelWriter 450 Turbo Thermal Label Printer</a></h6>
									<div class="product_price">$410.00</div>
								</div>
							</div>
							<div class="red_button add_to_cart_button"><a href="#">add to cart</a></div>
						</div>

						<!-- Product 5 -->

						<div class="product-item women men mb-2 mt-2">
							<div class="product product_filter">
								<div class="product_image">
									<img src="<?= ASSETS ?>images/product_5.png" alt="">
								</div>
								<div class="favorite"></div>
								<div class="product_info">
									<h6 class="product_name"><a href="single.html">Pryma Headphones, Rose Gold & Grey</a></h6>
									<div class="product_price">$180.00</div>
								</div>
							</div>
							<div class="red_button add_to_cart_button"><a href="#">add to cart</a></div>
						</div>

						<!-- Product 6 -->

						<div class="product-item accessories mb-2 mt-2">
							<div class="product discount product_filter">
								<div class="product_image">
									<img src="<?= ASSETS ?>images/product_6.png" alt="">
								</div>
								<div class="favorite favorite_left"></div>
								<div class="product_bubble product_bubble_right product_bubble_red d-flex flex-column align-items-center"><span>-$20</span></div>
								<div class="product_info">
									<h6 class="product_name"><a href="#single.html">Fujifilm X100T 16 MP Digital Camera (Silver)</a></h6>
									<div class="product_price">$520.00<span>$590.00</span></div>
								</div>
							</div>
							<div class="red_button add_to_cart_button"><a href="#">add to cart</a></div>
						</div>

						<!-- Product 7 -->

						<div class="product-item women mb-2 mt-2">
							<div class="product product_filter">
								<div class="product_image">
									<img src="<?= ASSETS ?>images/product_7.png" alt="">
								</div>
								<div class="favorite"></div>
								<div class="product_info">
									<h6 class="product_name"><a href="single.html">Samsung CF591 Series Curved 27-Inch FHD Monitor</a></h6>
									<div class="product_price">$610.00</div>
								</div>
							</div>
							<div class="red_button add_to_cart_button"><a href="#">add to cart</a></div>
						</div>

						<!-- Product 8 -->

						<div class="product-item accessories mb-2 mt-2">
							<div class="product product_filter">
								<div class="product_image">
									<img src="<?= ASSETS ?>images/product_8.png" alt="">
								</div>
								<div class="favorite"></div>
								<div class="product_info">
									<h6 class="product_name"><a href="single.html">Blue Yeti USB Microphone Blackout Edition</a></h6>
									<div class="product_price">$120.00</div>
								</div>
							</div>
							<div class="red_button add_to_cart_button"><a href="#">add to cart</a></div>
						</div>

						<!-- Product 9 -->

						<div class="product-item men mb-2 mt-2">
							<div class="product product_filter">
								<div class="product_image">
									<img src="<?= ASSETS ?>images/product_9.png" alt="">
								</div>
								<div class="product_bubble product_bubble_right product_bubble_red d-flex flex-column align-items-center"><span>sale</span></div>
								<div class="favorite favorite_left"></div>
								<div class="product_info">
									<h6 class="product_name"><a href="single.html">DYMO LabelWriter 450 Turbo Thermal Label Printer</a></h6>
									<div class="product_price">$410.00</div>
								</div>
							</div>
							<div class="red_button add_to_cart_button"><a href="#">add to cart</a></div>
						</div>

						<!-- Product 10 -->

						<div class="product-item men mb-2 mt-2">
							<div class="product product_filter">
								<div class="product_image">
									<img src="<?= ASSETS ?>images/product_10.png" alt="">
								</div>
								<div class="favorite"></div>
								<div class="product_info">
									<h6 class="product_name"><a href="single.html">Pryma Headphones, Rose Gold & Grey</a></h6>
									<div class="product_price">$180.00</div>
								</div>
							</div>
							<div class="red_button add_to_cart_button"><a href="#">add to cart</a></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>



	<!-- Benefit -->

	<div class="benefit">
		<div class="container">
			<div class="row benefit_row">
				<div class="col-lg-3 benefit_col">
					<div class="benefit_item d-flex flex-row align-items-center">
						<div class="benefit_icon"><i class="fa fa-truck" aria-hidden="true"></i></div>
						<div class="benefit_content">
							<h6>Livraison Gratuite</h6>
							<p>Sur Saint Hubert, pour $2000 et plus</p>
						</div>
					</div>
				</div>
				<div class="col-lg-3 benefit_col">
					<div class="benefit_item d-flex flex-row align-items-center">
						<div class="benefit_icon"><i class="fa fa-money" aria-hidden="true"></i></div>
						<div class="benefit_content">
							<h6>Avance flexible</h6>
							<p>Le reste à la cueillette de la commande</p>
						</div>
					</div>
				</div>
				<div class="col-lg-3 benefit_col">
					<div class="benefit_item d-flex flex-row align-items-center">
						<div class="benefit_icon"><i class="fa fa-undo" aria-hidden="true"></i></div>
						<div class="benefit_content">
							<h6>Service aprés vente</h6>
							<p>flexible et personalisé</p>
						</div>
					</div>
				</div>
				<div class="col-lg-3 benefit_col">
					<div class="benefit_item d-flex flex-row align-items-center">
						<div class="benefit_icon"><i class="fa fa-clock-o" aria-hidden="true"></i></div>
						<div class="benefit_content">
							<h6>Ouvert sur Rendez vous</h6>
							<p>Du Lundi au Jeudi</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Newsletter -->

	<div class="newsletter">
		<div class="container">
			<div class="row">
				<div class="col-lg-6">
					<div class="newsletter_text d-flex flex-column justify-content-center align-items-lg-start align-items-md-center text-center">
						<h4>Newsletter</h4>
						<p>Souscrire à notre newsletter</p>
					</div>
				</div>
				<div class="col-lg-6">
					<form action="post">
						<div class="newsletter_form d-flex flex-md-row flex-column flex-xs-column align-items-center justify-content-lg-end justify-content-center">
							<input id="newsletter_email" type="email" placeholder="Votre email" required="required" data-error="Valid email is required.">
							<button id="newsletter_submit" type="submit" class="newsletter_submit_btn trans_300" value="Submit">Souscrire</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>

	<?php $this->view("boutique/footer") ?>
	