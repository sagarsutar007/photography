<!DOCTYPE html>
<html lang="en">
	<head>
		<!-- Title -->
		<title>Pratyush Katyar | Official Website | Photographer, Blogger</title>

		<!-- Meta -->
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="description" content="">
		<meta name="author" content="">

		<!-- Mobile Meta -->
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<!-- Favicon (http://www.favicon-generator.org/) -->
		<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
		<link rel="icon" href="favicon.ico" type="image/x-icon">

		<!-- Paste your Google Analytics code here. Go to http://www.google.com/analytics/ for more information. -->

		<!-- Google fonts (https://www.google.com/fonts) -->
		<link href="https://fonts.googleapis.com/css?family=Inconsolata" rel="stylesheet"> <!-- Global font -->
		<link href="https://fonts.googleapis.com/css?family=Galada" rel="stylesheet"> <!-- Alter font 1 -->
		<link href="https://fonts.googleapis.com/css?family=Bilbo+Swash+Caps" rel="stylesheet"> <!-- Alter font 2 -->

		<!-- Bootstrap CSS (http://getbootstrap.com) -->
		<link rel="stylesheet" href="<?= SITE_ASSETS; ?>vendor/bootstrap/css/bootstrap.min.css"> <!-- bootstrap CSS (http://getbootstrap.com) -->

		<!-- Libs and Plugins CSS -->
		<link rel="stylesheet" href="<?= SITE_ASSETS; ?>vendor/animsition/css/animsition.min.css"> <!-- Animsition CSS (http://git.blivesta.com/animsition/) -->
		<link rel="stylesheet" href="<?= SITE_ASSETS; ?>vendor/font-awesome/css/font-awesome.min.css"> <!-- Font Icons CSS (http://fortawesome.github.io/Font-Awesome) -->
		<link rel="stylesheet" href="<?= SITE_ASSETS; ?>vendor/lightgallery/css/lightgallery.min.css"> <!-- lightGallery CSS (http://sachinchoolur.github.io/lightGallery) -->
		<link rel="stylesheet" href="<?= SITE_ASSETS; ?>vendor/owl-carousel/css/owl.carousel.min.css"> <!-- Owl Carousel CSS (http://www.owlcarousel.owlgraphic.com) -->
		<link rel="stylesheet" href="<?= SITE_ASSETS; ?>vendor/owl-carousel/css/owl.theme.default.min.css"> <!-- Owl Carousel CSS (http://www.owlcarousel.owlgraphic.com) -->
		<link rel="stylesheet" href="<?= SITE_ASSETS; ?>vendor/ytplayer/css/jquery.mb.YTPlayer.min.css"> <!-- YTPlayer CSS (more info: https://github.com/pupunzi/jquery.mb.YTPlayer) -->
		<link rel="stylesheet" href="<?= SITE_ASSETS; ?>vendor/animate.min.css"> <!-- Animate libs CSS (http://daneden.me/animate) -->

		<link rel="stylesheet" href="<?= SITE_ASSETS; ?>css/helper.css">
		<link rel="stylesheet" href="<?= SITE_ASSETS; ?>css/theme.css">
		<link rel="stylesheet" href="<?= SITE_ASSETS; ?>css/dark-style.css">
	</head>

	<body class="temp-uppercase temp-grayscale animsition">
		
		<span class="page-cover"></span>

		<?php $this->load->view('sidebar'); ?>

		<div id="mobile-header m-header-dark">

			<!-- Begin logo small -->
			<div class="logo-mobile">
				<a href="<?= base_url(); ?>"><img src="<?= SITE_ASSETS; ?>img/logo-small.png" alt="logo"></a>
			</div>
			<div class="mobile-menu-trigger"><span></span></div>
		</div>
		<div id="body-content">
			<section id="gallery-list-section" class="gallery-list-slideshow">
				<div class="container-fluid no-padding bg-dark">
					<div class="owl-carousel cc-height-full cursor-grab nav-bottom-right" data-items="1" data-loop="true" data-autoplay="true" data-autoplay-timeout="10000" data-dots="false" data-nav="true" data-animate-in="fadeIn" data-animate-out="fadeOut">
						<?php  foreach ($slider as $key => $obj) { ?>
						<div class="cc-item bg-image" style="background-image: url(<?= SITE_ASSETS."images/".$obj['background']; ?>); background-position: 50% 30%;">
							<span class="cover bg-transparent-2-dark"></span>
							<div class="cc-caption cc-caption-xlg center caption-animate max-width-600">
								<h2 class="cc-title font-alter-1"><?= $obj['name']; ?></h2>
								<p class="cc-description">
									
								</p>
								<div class="margin-top-30">
									<a href="#" class="btn btn-primary margin-top-5">View Project</a>
									<a href="<?= base_url('contact'); ?>" class="btn btn-white-bordered margin-top-5">Contact Me</a>
								</div>
							</div>
						</div>
						<?php	} ?>
					</div>
				</div>
			</section>
		</div>

		<!-- Core JS -->
		<script src="<?= SITE_ASSETS; ?>vendor/jquery/jquery.min.js"></script> <!-- jquery JS (https://jquery.com) -->
		<script src="<?= SITE_ASSETS; ?>vendor/bootstrap/js/bootstrap.min.js"></script> <!-- bootstrap JS (http://getbootstrap.com) -->

		<!-- Libs and Plugins JS -->
		<script src="<?= SITE_ASSETS; ?>vendor/animsition/js/animsition.min.js"></script> <!-- Animsition JS (http://git.blivesta.com/animsition/) -->
		<script src="<?= SITE_ASSETS; ?>vendor/jquery.easing.min.js"></script> <!-- Easing JS (http://gsgd.co.uk/sandbox/jquery/easing/) -->
		<script src="<?= SITE_ASSETS; ?>vendor/isotope.pkgd.min.js"></script> <!-- Isotope JS (http://isotope.metafizzy.co) -->
		<script src="<?= SITE_ASSETS; ?>vendor/imagesloaded.pkgd.min.js"></script> <!-- ImagesLoaded JS (https://github.com/desandro/imagesloaded) -->
		<script src="<?= SITE_ASSETS; ?>vendor/jquery.nicescroll.min.js"></script> <!-- Nicescroll JS (http://areaaperta.com/nicescroll/) -->
		<script src="<?= SITE_ASSETS; ?>vendor/owl-carousel/js/owl.carousel.min.js"></script> <!-- Owl Carousel JS (http://www.owlcarousel.owlgraphic.com) -->
		<script src="<?= SITE_ASSETS; ?>vendor/jquery.mousewheel.min.js"></script> <!-- A jQuery plugin that adds cross browser mouse wheel support (https://github.com/jquery/jquery-mousewheel) -->
		<script src="<?= SITE_ASSETS; ?>vendor/ytplayer/js/jquery.mb.YTPlayer.min.js"></script> <!-- YTPlayer JS (more info: https://github.com/pupunzi/jquery.mb.YTPlayer) -->

		<script src="<?= SITE_ASSETS; ?>vendor/lightgallery/js/lightgallery.min.js"></script> <!-- lightGallery JS (http://sachinchoolur.github.io/lightGallery) -->
		<script src="<?= SITE_ASSETS; ?>vendor/lightgallery/js/lightgallery-plugins.js"></script> <!-- lightGallery Plugins JS (http://sachinchoolur.github.io/lightGallery) -->
		
		<!-- Theme master JS -->
		<script src="<?= SITE_ASSETS; ?>js/theme.js"></script>
	</body>
</html>