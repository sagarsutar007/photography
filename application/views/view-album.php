<!DOCTYPE html>
<html lang="en" class="overflow-y-scroll">
   <head>
      <title><?= $album['name']; ?></title>
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
	  <style>
	  	@media (min-width: 1200px){
		  	.gs-sidebar.gs-sidebar-fixed {
			    position: fixed;
			    width: 30%;
			    margin-bottom: 0;
			}
		}
	  </style>
   </head>
   <body class="temp-uppercase temp-grayscale animsition">
      <span class="page-cover"></span>
      <?php $this->load->view('sidebar'); ?>
      <div id="body-content">
         <section id="gallery-single-section" class="gallery-single-with-sidebar gs-sidebar-left">
            <div class="container-fluid no-padding">
               <div class="row">
                  <div class="col-lg-4">
                     <div class="gs-sidebar gs-sidebar-fixed gs-sidebar-fh">
                        <div class="gs-sidebar-inner">
                           <div class="gs-sidebar-info">
                              	<h3 class="font-alter-1"><?= $album['name']; ?></h3>
                              	<p class="text-muted"><?= "Published on " . date('d.m.y', strtotime($album['createdAt'])); ?></p>
                              	<div class="gs-sidebar-description">
                                	<p>
                                		<?= html_entity_decode(stripslashes($album['about'])); ?>
                                	</p>
                              	</div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-lg-8">
                     <div class="isotope-wrap">
                        <div class="isotope col-3 gutter-3">
                           <div id="gallery" class="isotope-items-wrap lightgallery cover-color cover-boxed">
                              <div class="grid-sizer"></div>
                              <?php foreach ($photos as $key => $obj) { ?>
                              <div class="isotope-item">
                                 <a href="<?= SITE_ASSETS . 'images/' . $obj['picture']; ?>" class="gallery-single-item lg-trigger" data-exthumbnail="<?= SITE_ASSETS . 'images/' . $obj['picture']; ?>" data-sub-html="<h4><?= $obj['title']; ?></h4><p><?= $obj['about']; ?></p>">
                                    <img class="gs-item-image" src="<?= SITE_ASSETS . 'images/' . $obj['picture']; ?>" alt="">
                                    <div class="gs-item-cover">
                                       <div class="gs-item-info">
                                          <span class="s-icon"><i class="fas fa-search"></i></span>
                                       </div>
                                    </div>
                                 </a>
                              </div>   
                              <?php } ?>
                              
                           </div>
                        </div>
                     </div>
                  </div>
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