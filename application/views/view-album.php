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
                              <div class="isotope-item">
                                 <a href="<?= SITE_ASSETS; ?>img/gallery/gallery-single/grid/big/gallery-single-big-1.jpg" class="gallery-single-item lg-trigger" data-exthumbnail="<?= SITE_ASSETS; ?>img/gallery/gallery-single/grid/thumb/gallery-single-thumb-1.jpg" data-sub-html="<h4>Image Description</h4><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>">
                                    <img class="gs-item-image" src="<?= SITE_ASSETS; ?>img/gallery/gallery-single/grid/gallery-single-1.jpg" alt="">
                                    <div class="gs-item-cover">
                                       <div class="gs-item-info">
                                          <span class="s-icon"><i class="fas fa-search"></i></span>
                                       </div>
                                    </div>
                                 </a>
                              </div>
                              <div class="isotope-item">
                                 <a href="<?= SITE_ASSETS; ?>img/gallery/gallery-single/grid/big/gallery-single-big-2.jpg" class="gallery-single-item lg-trigger" data-exthumbnail="<?= SITE_ASSETS; ?>img/gallery/gallery-single/grid/thumb/gallery-single-thumb-2.jpg">
                                    <img class="gs-item-image" src="<?= SITE_ASSETS; ?>img/gallery/gallery-single/grid/gallery-single-2.jpg" alt="">
                                    <div class="gs-item-cover">
                                       <div class="gs-item-info">
                                          <span class="s-icon"><i class="fas fa-search"></i></span>
                                       </div>
                                    </div>
                                 </a>
                              </div>
                              <div class="isotope-item">
                                 <a href="https://www.youtube.com/watch?v=meBbDqAXago" class="gallery-single-item lg-trigger">
                                    <img class="gs-item-image" src="<?= SITE_ASSETS; ?>img/gallery/gallery-single/grid/gallery-single-3.jpg" alt="">
                                    <div class="gs-item-cover">
                                       <div class="gs-item-info">
                                          <span class="s-icon"><i class="fas fa-play"></i></span>
                                       </div>
                                    </div>
                                 </a>
                              </div>
                              <div class="isotope-item">
                                 <a href="<?= SITE_ASSETS; ?>img/gallery/gallery-single/grid/big/gallery-single-big-4.jpg" class="gallery-single-item lg-trigger" data-exthumbnail="<?= SITE_ASSETS; ?>img/gallery/gallery-single/grid/thumb/gallery-single-thumb-4.jpg">
                                    <img class="gs-item-image" src="<?= SITE_ASSETS; ?>img/gallery/gallery-single/grid/gallery-single-4.jpg" alt="">
                                    <div class="gs-item-cover">
                                       <div class="gs-item-info">
                                          <span class="s-icon"><i class="fas fa-search"></i></span>
                                       </div>
                                    </div>
                                 </a>
                              </div>
                              <div class="isotope-item">
                                 <a href="https://vimeo.com/20047720" class="gallery-single-item lg-trigger">
                                    <img class="gs-item-image" src="<?= SITE_ASSETS; ?>img/gallery/gallery-single/grid/gallery-single-5.jpg" alt="">
                                    <div class="gs-item-cover">
                                       <div class="gs-item-info">
                                          <span class="s-icon"><i class="fas fa-play"></i></span>
                                       </div>
                                    </div>
                                 </a>
                              </div>
                              <div class="isotope-item">
                                 <a href="<?= SITE_ASSETS; ?>img/gallery/gallery-single/grid/big/gallery-single-big-6.jpg" class="gallery-single-item lg-trigger" data-exthumbnail="<?= SITE_ASSETS; ?>img/gallery/gallery-single/grid/thumb/gallery-single-thumb-6.jpg">
                                    <img class="gs-item-image" src="<?= SITE_ASSETS; ?>img/gallery/gallery-single/grid/gallery-single-6.jpg" alt="">
                                    <div class="gs-item-cover">
                                       <div class="gs-item-info">
                                          <span class="s-icon"><i class="fas fa-search"></i></span>
                                       </div>
                                    </div>
                                 </a>
                              </div>
                              <div class="isotope-item">
                                 <a href="<?= SITE_ASSETS; ?>img/gallery/gallery-single/grid/big/gallery-single-big-7.jpg" class="gallery-single-item lg-trigger" data-exthumbnail="<?= SITE_ASSETS; ?>img/gallery/gallery-single/grid/thumb/gallery-single-thumb-7.jpg">
                                    <img class="gs-item-image" src="<?= SITE_ASSETS; ?>img/gallery/gallery-single/grid/gallery-single-7.jpg" alt="">
                                    <div class="gs-item-cover">
                                       <div class="gs-item-info">
                                          <span class="s-icon"><i class="fas fa-search"></i></span>
                                       </div>
                                    </div>
                                 </a>
                              </div>
                              <div class="isotope-item">
                                 <a href="<?= SITE_ASSETS; ?>img/gallery/gallery-single/grid/big/gallery-single-big-8.jpg" class="gallery-single-item lg-trigger" data-exthumbnail="<?= SITE_ASSETS; ?>img/gallery/gallery-single/grid/thumb/gallery-single-thumb-8.jpg">
                                    <img class="gs-item-image" src="<?= SITE_ASSETS; ?>img/gallery/gallery-single/grid/gallery-single-8.jpg" alt="">
                                    <div class="gs-item-cover">
                                       <div class="gs-item-info">
                                          <span class="s-icon"><i class="fas fa-search"></i></span>
                                       </div>
                                    </div>
                                 </a>
                              </div>
                              <div class="isotope-item">
                                 <a href="<?= SITE_ASSETS; ?>img/gallery/gallery-single/grid/big/gallery-single-big-9.jpg" class="gallery-single-item lg-trigger" data-exthumbnail="<?= SITE_ASSETS; ?>img/gallery/gallery-single/grid/thumb/gallery-single-thumb-9.jpg">
                                    <img class="gs-item-image" src="<?= SITE_ASSETS; ?>img/gallery/gallery-single/grid/gallery-single-9.jpg" alt="">
                                    <div class="gs-item-cover">
                                       <div class="gs-item-info">
                                          <span class="s-icon"><i class="fas fa-search"></i></span>
                                       </div>
                                    </div>
                                 </a>
                              </div>
                              <div class="isotope-item">
                                 <a href="<?= SITE_ASSETS; ?>img/gallery/gallery-single/grid/big/gallery-single-big-10.jpg" class="gallery-single-item lg-trigger" data-exthumbnail="<?= SITE_ASSETS; ?>img/gallery/gallery-single/grid/thumb/gallery-single-thumb-10.jpg">
                                    <img class="gs-item-image" src="<?= SITE_ASSETS; ?>img/gallery/gallery-single/grid/gallery-single-10.jpg" alt="">
                                    <div class="gs-item-cover">
                                       <div class="gs-item-info">
                                          <span class="s-icon"><i class="fas fa-search"></i></span>
                                       </div>
                                    </div>
                                 </a>
                              </div>
                              <div class="isotope-item">
                                 <a href="<?= SITE_ASSETS; ?>img/gallery/gallery-single/grid/big/gallery-single-big-11.jpg" class="gallery-single-item lg-trigger" data-exthumbnail="<?= SITE_ASSETS; ?>img/gallery/gallery-single/grid/thumb/gallery-single-thumb-11.jpg">
                                    <img class="gs-item-image" src="<?= SITE_ASSETS; ?>img/gallery/gallery-single/grid/gallery-single-11.jpg" alt="">
                                    <div class="gs-item-cover">
                                       <div class="gs-item-info">
                                          <span class="s-icon"><i class="fas fa-search"></i></span>
                                       </div>
                                    </div>
                                 </a>
                              </div>
                              <div class="isotope-item">
                                 <a href="<?= SITE_ASSETS; ?>img/gallery/gallery-single/grid/big/gallery-single-big-12.jpg" class="gallery-single-item lg-trigger" data-exthumbnail="<?= SITE_ASSETS; ?>img/gallery/gallery-single/grid/thumb/gallery-single-thumb-12.jpg">
                                    <img class="gs-item-image" src="<?= SITE_ASSETS; ?>img/gallery/gallery-single/grid/gallery-single-12.jpg" alt="">
                                    <div class="gs-item-cover">
                                       <div class="gs-item-info">
                                          <span class="s-icon"><i class="fas fa-search"></i></span>
                                       </div>
                                    </div>
                                 </a>
                              </div>
                              <div class="isotope-item">
                                 <a href="<?= SITE_ASSETS; ?>img/gallery/gallery-single/grid/big/gallery-single-big-13.jpg" class="gallery-single-item lg-trigger" data-exthumbnail="<?= SITE_ASSETS; ?>img/gallery/gallery-single/grid/thumb/gallery-single-thumb-13.jpg">
                                    <img class="gs-item-image" src="<?= SITE_ASSETS; ?>img/gallery/gallery-single/grid/gallery-single-13.jpg" alt="">
                                    <div class="gs-item-cover">
                                       <div class="gs-item-info">
                                          <span class="s-icon"><i class="fas fa-search"></i></span>
                                       </div>
                                    </div>
                                 </a>
                              </div>
                              <div class="isotope-item">
                                 <a href="<?= SITE_ASSETS; ?>img/gallery/gallery-single/grid/big/gallery-single-big-14.jpg" class="gallery-single-item lg-trigger" data-exthumbnail="<?= SITE_ASSETS; ?>img/gallery/gallery-single/grid/thumb/gallery-single-thumb-14.jpg">
                                    <img class="gs-item-image" src="<?= SITE_ASSETS; ?>img/gallery/gallery-single/grid/gallery-single-14.jpg" alt="">
                                    <div class="gs-item-cover">
                                       <div class="gs-item-info">
                                          <span class="s-icon"><i class="fas fa-search"></i></span>
                                       </div>
                                    </div>
                                 </a>
                              </div>
                              <div class="isotope-item">
                                 <a href="<?= SITE_ASSETS; ?>img/gallery/gallery-single/grid/big/gallery-single-big-15.jpg" class="gallery-single-item lg-trigger" data-exthumbnail="<?= SITE_ASSETS; ?>img/gallery/gallery-single/grid/thumb/gallery-single-thumb-15.jpg">
                                    <img class="gs-item-image" src="<?= SITE_ASSETS; ?>img/gallery/gallery-single/grid/gallery-single-15.jpg" alt="">
                                    <div class="gs-item-cover">
                                       <div class="gs-item-info">
                                          <span class="s-icon"><i class="fas fa-search"></i></span>
                                       </div>
                                    </div>
                                 </a>
                              </div>
                              <div class="isotope-item">
                                 <a href="<?= SITE_ASSETS; ?>img/gallery/gallery-single/grid/big/gallery-single-big-16.jpg" class="gallery-single-item lg-trigger" data-exthumbnail="<?= SITE_ASSETS; ?>img/gallery/gallery-single/grid/thumb/gallery-single-thumb-16.jpg">
                                    <img class="gs-item-image" src="<?= SITE_ASSETS; ?>img/gallery/gallery-single/grid/gallery-single-16.jpg" alt="">
                                    <div class="gs-item-cover">
                                       <div class="gs-item-info">
                                          <span class="s-icon"><i class="fas fa-search"></i></span>
                                       </div>
                                    </div>
                                 </a>
                              </div>
                              <div class="isotope-item">
                                 <a href="<?= SITE_ASSETS; ?>img/gallery/gallery-single/grid/big/gallery-single-big-17.jpg" class="gallery-single-item lg-trigger" data-exthumbnail="<?= SITE_ASSETS; ?>img/gallery/gallery-single/grid/thumb/gallery-single-thumb-17.jpg">
                                    <img class="gs-item-image" src="<?= SITE_ASSETS; ?>img/gallery/gallery-single/grid/gallery-single-17.jpg" alt="">
                                    <div class="gs-item-cover">
                                       <div class="gs-item-info">
                                          <span class="s-icon"><i class="fas fa-search"></i></span>
                                       </div>
                                    </div>
                                 </a>
                              </div>
                              <div class="isotope-item">
                                 <a href="<?= SITE_ASSETS; ?>img/gallery/gallery-single/grid/big/gallery-single-big-18.jpg" class="gallery-single-item lg-trigger" data-exthumbnail="<?= SITE_ASSETS; ?>img/gallery/gallery-single/grid/thumb/gallery-single-thumb-18.jpg">
                                    <img class="gs-item-image" src="<?= SITE_ASSETS; ?>img/gallery/gallery-single/grid/gallery-single-18.jpg" alt="">
                                    <div class="gs-item-cover">
                                       <div class="gs-item-info">
                                          <span class="s-icon"><i class="fas fa-search"></i></span>
                                       </div>
                                    </div>
                                 </a>
                              </div>
                              <div class="isotope-item">
                                 <a href="<?= SITE_ASSETS; ?>img/gallery/gallery-single/grid/big/gallery-single-big-19.jpg" class="gallery-single-item lg-trigger" data-exthumbnail="<?= SITE_ASSETS; ?>img/gallery/gallery-single/grid/thumb/gallery-single-thumb-19.jpg">
                                    <img class="gs-item-image" src="<?= SITE_ASSETS; ?>img/gallery/gallery-single/grid/gallery-single-19.jpg" alt="">
                                    <div class="gs-item-cover">
                                       <div class="gs-item-info">
                                          <span class="s-icon"><i class="fas fa-search"></i></span>
                                       </div>
                                    </div>
                                 </a>
                              </div>
                              <div class="isotope-item">
                                 <a href="<?= SITE_ASSETS; ?>img/gallery/gallery-single/grid/big/gallery-single-big-20.jpg" class="gallery-single-item lg-trigger" data-exthumbnail="<?= SITE_ASSETS; ?>img/gallery/gallery-single/grid/thumb/gallery-single-thumb-20.jpg">
                                    <img class="gs-item-image" src="<?= SITE_ASSETS; ?>img/gallery/gallery-single/grid/gallery-single-20.jpg" alt="">
                                    <div class="gs-item-cover">
                                       <div class="gs-item-info">
                                          <span class="s-icon"><i class="fas fa-search"></i></span>
                                       </div>
                                    </div>
                                 </a>
                              </div>
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