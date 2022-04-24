<!DOCTYPE html>
<html lang="en" class="overflow-y-scroll">
   <head>
      <title>Blog</title>
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
         <section id="blog-list-section" class="blog-list-classic">
            <div class="container-fluid max-width-1400">
               <div class="row">
                  <div class="col-md-8">
                     <div class="isotope-wrap">
                        <div class="isotope col-1">
                           <div class="isotope-items-wrap">
                              <div class="grid-sizer"></div>
                              <?php 
                                 foreach ($blog as $key => $obj) { 
                                    if(empty($obj['picture'])){
                                       $image = "https://via.placeholder.com/1280x720?text=preview";
                                    }else{
                                       if (file_exists('assets/site/images/' . $obj['picture'])) {
                                          $image = base_url('assets/site/images/' . $obj['picture']);
                                       } else {
                                          $image = "https://via.placeholder.com/1280x720?text=preview";
                                       }
                                    }
                              ?>
                              <div class="isotope-item">
                                 <article class="blog-list-item">
                                    <a href="<?= base_url() . "article/" . $obj['url']; ?>" class="bl-item-image">
                                       <img src="<?= $image; ?>" alt="image">
                                    </a>
                                    <div class="bl-item-info">
                                       <div class="bl-item-category">
                                          <a href="<?= base_url() . "article/" . $obj['url']; ?>"><?= $obj['catName']; ?></a>
                                       </div>
                                       <a href="<?= base_url() . "article/" . $obj['url']; ?>" class="bl-item-title">
                                          <h2><?= $obj['title']; ?></h2>
                                       </a>
                                       <div class="bl-item-meta">
                                          <i class="far fa-clock"></i> 
                                          <span class="published">
                                             <?= date('d.m.Y',strtotime($obj['createdAt'])); ?>
                                          </span>
                                          <span class="posted-by">- by <a href="#"><?= $admin['name']; ?></a></span>
                                       </div>
                                       <div class="bl-item-desc">
                                          <?= stripslashes($obj['exercept']); ?>
                                       </div>
                                       <a href="<?= base_url() . "article/" . $obj['url']; ?>" class="bl-item-read-more" title="Read More"><span></span></a>
                                    </div>
                                 </article>
                              </div>
                              <?php } ?>
                           </div>
                        </div>
                     </div>
                     <nav class="pagination-wrap">
                        <!-- <ul class="pagination">
                           <li>
                              <a href="" aria-label="Previous">
                              <span aria-hidden="true">First</span>
                              </a>
                           </li>
                           <li><a href="">Prev</a></li>
                           <li class="active"><a href="#0">1</a></li>
                           <li><a href="">2</a></li>
                           <li><a href="">3</a></li>
                           <li>...</li>
                           <li><a href="">6</a></li>
                           <li><a href="">7</a></li>
                           <li><a href="">8</a></li>
                           <li><a href="">Next</a></li>
                           <li>
                              <a href="" aria-label="Next">
                              <span aria-hidden="true">Last</span>
                              </a>
                           </li>
                        </ul>
                        <div class="pagination-info">
                           <span>Showing page 1 of 8</span>
                           <span>Items 1 - 5 of 40</span>
                        </div> -->

                        <?= $links; ?>
                     </nav>
                  </div>
                  <div class="col-md-4">
                     <div class="sidebar sidebar-right">
                        <div class="row">
                           <div class="col-sm-12">
                              <div class="sidebar-widget blog-author no-margin-top">
                                 <h3 class="sidebar-heading">About Me</h3>
                                 <div class="blog-author-img"> 
                                 <?php
                                    if(empty($admin['photo'])){
                                       $image = SITE_ASSETS . "img/blog/small/avatar/avatar-1.jpg";
                                    }else{
                                       if (file_exists('assets/site/images/' . $admin['photo'])) {
                                          $image = base_url('assets/site/images/' . $admin['photo']);
                                       } else {
                                          $image = SITE_ASSETS . "img/blog/small/avatar/avatar-1.jpg";
                                       }
                                    }

                                 ?>
                                    <img src="<?= $image; ?>" alt="image">
                                 </div>
                                 <div class="blog-author-info">
                                    <h4 class="blog-author-name"><?= $admin['name']; ?></h4>
                                    <div class="blog-author-sub"><?= $admin['designation']; ?></div>
                                    <p class="blog-author-text"><?= $admin['about']; ?></p>
                                    <a href="<?= base_url('about'); ?>" class="blog-author-more" title="Read more about me">Read More</a>
                                 </div>
                              </div>
                           </div>
                           <!-- <div class="col-sm-12">
                              <div class="sidebar-widget sidebar-search">
                                 <form id="blog-search-form" class="form-btn-inside" method="get" action="search-results.html">
                                    <div class="form-group no-margin">
                                       <input type="text" class="form-control" id="blog-search" name="search" placeholder="Search...">
                                       <button type="submit"><i class="fas fa-search"></i></button>
                                    </div>
                                 </form>
                              </div>
                           </div> -->
                           <!-- <div class="col-md-12 col-sm-6">
                              <div class="sidebar-widget sidebar-categories">
                                 <h3 class="sidebar-heading">Categories</h3>
                                 <ul class="list-unstyled">
                                    <?php #foreach ($categories as $key => $obj) { ?>
                                    <li><a href="#"><?php #echo $obj['name']; ?> <span><?php #echo $obj['count']; ?></span></a></li>
                                    <?php #} ?>
                                 </ul>
                              </div>
                           </div> -->
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </section>
      </div>
      <a href="#body-content" class="scrolltotop sm-scroll" title="Scroll to top">
         <i class="fas fa-chevron-up"></i>
      </a>
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