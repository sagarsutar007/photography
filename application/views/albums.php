<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Albums</title>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="description" content="">
		<meta name="author" content="">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
		<link rel="icon" href="favicon.ico" type="image/x-icon">
		<link href="https://fonts.googleapis.com/css?family=Inconsolata" rel="stylesheet"> 
		<link href="https://fonts.googleapis.com/css?family=Galada" rel="stylesheet"> 
		<link href="https://fonts.googleapis.com/css?family=Bilbo+Swash+Caps" rel="stylesheet"> 
		<link rel="stylesheet" href="<?= SITE_ASSETS; ?>vendor/bootstrap/css/bootstrap.min.css"> 
		<link rel="stylesheet" href="<?= SITE_ASSETS; ?>vendor/animsition/css/animsition.min.css"> 
		<link rel="stylesheet" href="<?= SITE_ASSETS; ?>vendor/font-awesome/css/font-awesome.min.css"> 
		<link rel="stylesheet" href="<?= SITE_ASSETS; ?>vendor/lightgallery/css/lightgallery.min.css"> 
		<link rel="stylesheet" href="<?= SITE_ASSETS; ?>vendor/owl-carousel/css/owl.carousel.min.css"> 
		<link rel="stylesheet" href="<?= SITE_ASSETS; ?>vendor/owl-carousel/css/owl.theme.default.min.css"> 
		<link rel="stylesheet" href="<?= SITE_ASSETS; ?>vendor/ytplayer/css/jquery.mb.YTPlayer.min.css"> 
		<link rel="stylesheet" href="<?= SITE_ASSETS; ?>vendor/animate.min.css"> 
		<link rel="stylesheet" href="<?= SITE_ASSETS; ?>css/helper.css">
		<link rel="stylesheet" href="<?= SITE_ASSETS; ?>css/theme.css">
		<link rel="stylesheet" href="<?= SITE_ASSETS; ?>css/dark-style.css">
	</head>
	<body class="temp-uppercase temp-grayscale animsition">
		<span class="page-cover"></span>
		<?php $this->load->view('sidebar'); ?>
		<div id="body-content">
			<section id="gallery-list-section" class="gallery-list-slider no-padding">
				<div class="container-fluid no-padding">
					<div class="owl-carousel cc-height-full owl-mousewheel nav-bottom-right cc-hover-2" data-items="4" data-loop="true" data-dots="false" data-nav="true" data-tablet-landscape="3" data-tablet-portrait="3" data-mobile-landscape="2" data-mobile-portrait="1">
						<?php foreach ($albums as $key => $obj) { ?>
						<a href="<?= base_url('albums/view/'.$obj['id']); ?>" class="cc-item bg-image" style="background-image: url(<?= SITE_ASSETS . "images/" . $obj['background']; ?>); background-position: 50% 50%;">
							<span class="cover"></span>
							<div class="cc-caption bottom-left max-width-200"> 
								<h2 class="cc-title"><?= $obj['name']; ?></h2>
								<div class="cc-category"><?= $obj['category']; ?></div>
							</div>
						</a>
						<?php	} ?>
					</div>
				</div> 
			</section>
		</div>
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