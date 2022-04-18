<!DOCTYPE html>
<html lang="en">
	<head>
		<!-- Title -->
		<title>About Me</title>

		<!-- Meta -->
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="description" content="Responsive Photography HTML5 Website Template">
		<meta name="author" content="themetorium.net">

		<!-- Mobile Meta -->
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
		<link rel="icon" href="favicon.ico" type="image/x-icon">

		<!-- Paste your Google Analytics code here. Go to http://www.google.com/analytics/ for more information. -->

		<!-- Google fonts (https://www.google.com/fonts) -->
		<link href="https://fonts.googleapis.com/css?family=Inconsolata" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Galada" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Bilbo+Swash+Caps" rel="stylesheet">

		<link rel="stylesheet" href="<?= SITE_ASSETS; ?>vendor/bootstrap/css/bootstrap.min.css">

		<!-- Libs and Plugins CSS -->
		<link rel="stylesheet" href="<?= SITE_ASSETS; ?>vendor/animsition/css/animsition.min.css"> 
		<link rel="stylesheet" href="<?= SITE_ASSETS; ?>vendor/font-awesome/css/font-awesome.min.css"> 
		<link rel="stylesheet" href="<?= SITE_ASSETS; ?>vendor/lightgallery/css/lightgallery.min.css"> 
		<link rel="stylesheet" href="<?= SITE_ASSETS; ?>vendor/owl-carousel/css/owl.carousel.min.css">
		<link rel="stylesheet" href="<?= SITE_ASSETS; ?>vendor/owl-carousel/css/owl.theme.default.min.css">
		<link rel="stylesheet" href="<?= SITE_ASSETS; ?>vendor/ytplayer/css/jquery.mb.YTPlayer.min.css">
		<link rel="stylesheet" href="<?= SITE_ASSETS; ?>vendor/animate.min.css">

		<!-- Template master CSS -->
		<link rel="stylesheet" href="<?= SITE_ASSETS; ?>css/helper.css">
		<link rel="stylesheet" href="<?= SITE_ASSETS; ?>css/theme.css">
		<link rel="stylesheet" href="<?= SITE_ASSETS; ?>css/dark-style.css">

	</head>
	<body class="temp-uppercase temp-grayscale animsition">
		<span class="page-cover"></span>
		<?php $this->load->view('sidebar'); ?>
		<div id="body-content">
			<section id="about-me-section">
				<div class="split-box about-me">
					<div class="container-fluid">
						<div class="row">
							<div class="row-lg-height">
								<div class="col-lg-6 col-lg-height split-box-image no-padding bg-image" style="background-image: url(<?= SITE_ASSETS; ?>img/misc/me-1.jpg); background-position: 50% 50%;">
									<div class="sbi-height padding-height-100"></div>
								</div>
								<div class="col-lg-6 col-lg-height col-lg-middle no-padding">
									<div class="split-box-content shifted-left">
										<h1 class="about-me-title">Who I am?</h1>
										<div class="about-me-sub"><?= $about['designation']; ?></div>

										<div class="about-me-text">
											<p><?= $about['about']; ?></p>
										</div>
										<div class="follow-me-buttons margin-top-30">
											<ul>
												<li><a href="<?= $about['facebook']; ?>" title="Follow me on Facebook" target="_blank"><i class="fab fa-facebook-f"></i></a></li> 
												<li><a href="<?= $about['twitter']; ?>" title="Follow me on Twitter" target="_blank"><i class="fab fa-twitter"></i></a></li> 
												<li><a href="<?= $about['instagram']; ?>" title="Follow me on Instagram" target="_blank"><i class="fab fa-instagram"></i></a></li> 
												<li><a href="mailto:<?= $about['email']; ?>" title="Email Me" target="_blank"><i class="far fa-envelope"></i></a></li>
											</ul>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="split-box what-i-do">
					<div class="container-fluid">
						<div class="row">
							<div class="row-lg-height">
								<div class="col-lg-6 col-lg-push-6 col-lg-height split-box-image no-padding bg-image" style="background-image: url(<?= SITE_ASSETS; ?>img/misc/me-2.jpg); background-position: 50% 50%;">
									<div class="sbi-height padding-height-100"></div>
								</div>
								<div class="col-lg-6 col-lg-pull-6 col-lg-height col-lg-middle no-padding">
									<div class="split-box-content shifted-right">
										<h1 class="about-me-title">What I Do?</h1>
										<div class="about-me-sub">A little bit of my work</div>

										<div class="about-me-text">
											<p><?= $about['work']; ?></p>
										</div>
										<a href="<?= base_url('albums'); ?>" class="btn btn-primary margin-top-20">View My Work</a>
										<a href="<?= base_url('contact'); ?>" class="btn btn-dark-bordered margin-top-20">Contact Me</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="split-box happy-clients">
					<div class="container-fluid">
						<div class="row">
							<div class="row-lg-height">
								<div class="col-lg-6 col-lg-height col-lg-middle no-padding bg-dark-2">
									<div class="clients-carousel">
										<div class="owl-carousel owl-mousewheel" data-items="4" data-margin="30" data-dots="false" data-loop="true" data-autoplay="true" data-tablet-landscape="3" data-tablet-portrait="4" data-mobile-landscape="3" data-mobile-portrait="2">
											<a href="" class="client-image" title="Happy Client">
												<img src="<?= SITE_ASSETS; ?>img/clients/client-1-light.png" alt="image">
											</a>
											<a href="" class="client-image" title="Happy Client">
												<img src="<?= SITE_ASSETS; ?>img/clients/client-2-light.png" alt="image">
											</a>
											<a href="" class="client-image" title="Happy Client">
												<img src="<?= SITE_ASSETS; ?>img/clients/client-3-light.png" alt="image">
											</a>
											<a href="" class="client-image" title="Happy Client">
												<img src="<?= SITE_ASSETS; ?>img/clients/client-4-light.png" alt="image">
											</a>
											<a href="" class="client-image" title="Happy Client">
												<img src="<?= SITE_ASSETS; ?>img/clients/client-5-light.png" alt="image">
											</a>
											<a href="" class="client-image" title="Happy Client">
												<img src="<?= SITE_ASSETS; ?>img/clients/client-6-light.png" alt="image">
											</a>
											<a href="" class="client-image" title="Happy Client">
												<img src="<?= SITE_ASSETS; ?>img/clients/client-7-light.png" alt="image">
											</a>
										</div>
									</div>
								</div>
								<div class="col-lg-6 col-lg-height col-lg-middle no-padding">
									<div class="split-box-content text-center">
										<h1 class="about-me-title">Happy Clients</h1>
										<div class="about-me-text">
											<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Possimus inventore consectetur dolores eius, enim totam eligendi tempore cupiditate molestias eveniet suscipit quasi quas eaque mollitia velit sunt sed, adipisci optio. :)</p>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
		</div>
		<a href="#body-content" class="scrolltotop sm-scroll" title="Scroll to top"><i class="fas fa-chevron-up"></i></a>
		<script src="<?= SITE_ASSETS; ?>vendor/jquery/jquery.min.js"></script>
		<script src="<?= SITE_ASSETS; ?>vendor/bootstrap/js/bootstrap.min.js"></script>
		<script src="<?= SITE_ASSETS; ?>vendor/animsition/js/animsition.min.js"></script>
		<script src="<?= SITE_ASSETS; ?>vendor/jquery.easing.min.js"></script>
		<script src="<?= SITE_ASSETS; ?>vendor/isotope.pkgd.min.js"></script>
		<script src="<?= SITE_ASSETS; ?>vendor/imagesloaded.pkgd.min.js"></script>
		<script src="<?= SITE_ASSETS; ?>vendor/jquery.nicescroll.min.js"></script>
		<script src="<?= SITE_ASSETS; ?>vendor/owl-carousel/js/owl.carousel.min.js"></script>
		<script src="<?= SITE_ASSETS; ?>vendor/jquery.mousewheel.min.js"></script>
		<script src="<?= SITE_ASSETS; ?>vendor/ytplayer/js/jquery.mb.YTPlayer.min.js"></script>
		<script src="<?= SITE_ASSETS; ?>vendor/lightgallery/js/lightgallery.min.js"></script>
		<script src="<?= SITE_ASSETS; ?>vendor/lightgallery/js/lightgallery-plugins.js"></script>
		<script src="<?= SITE_ASSETS; ?>js/theme.js"></script>
	</body>
</html>