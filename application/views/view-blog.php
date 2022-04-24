<!DOCTYPE html>
<html lang="en" class="overflow-y-scroll">
   <head>
      <title><?= $blog['title']; ?></title>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="description" content="<?= $blog['exercept']; ?>">
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
      -->
   </head>
   <body class="temp-uppercase temp-grayscale animsition">
      <span class="page-cover"></span>
      <?php $this->load->view('sidebar'); ?>
      <div id="body-content">
         <section id="blog-single-cection">
            <div class="container-fluid max-width-1200">
               <div class="blog-single-wrap">
                  <div class="row">
                     <div class="col-md-12">
                        <article class="blog-single-post">
                           <div class="blog-single-image bg-image" style="background-image: url(<?= SITE_ASSETS."images/".$blog['picture']; ?>);"></div>
                           <div class="blog-single-post-heading">
                              <h1 class="blog-single-post-title"><?= $blog['title']; ?></h1>
                              <div class="blog-single-post-category"><a href="#!"><?= $blog['categoryName']; ?></a></div>
                           </div>
                           <div class="blog-single-post-inner">
                              <div class="blog-single-attributes">
                                 <div class="row">
                                    <div class="col-sm-8">
                                       <div class="blog-single-meta-wrap">
                                          <?php
                                             if(empty($admin['photo'])){
                                                $image = "https://via.placeholder.com/1280x720?text=preview";
                                             }else{
                                                if (file_exists('assets/site/images/' . $admin['photo'])) {
                                                   $image = base_url('assets/site/images/' . $admin['photo']);
                                                } else {
                                                   $image = "https://via.placeholder.com/1280x720?text=preview";
                                                }
                                             }
                                          ?>
                                          <a href="#!" class="author-avatar pull-left bg-image" style="background-image: url(<?= $image; ?>);"></a>
                                          <div class="blog-single-meta">
                                             <div class="article-author">by: <a href="#"><?= $admin['name'] ?></a></div>
                                             <div class="article-time-cat">
                                                <span class="article-time"><?= date('d.M.Y',strtotime($blog['createdAt'])); ?></span>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="col-sm-4">
                                       <ul class="blog-single-links list-unstyled list-inline">
                                          <li>
                                             <a href="#blog-post-comments" class="blog-single-comment-count sm-scroll" title="Read the comments"><i class="far fa-comment"></i> <?= count($comments); ?></a>
                                          </li>
                                       </ul>
                                    </div>
                                 </div>
                              </div>
                              <div class="post-content lightgallery">
                                 <?= html_entity_decode($blog['text']); ?>
                              </div>
                           </div>
                        </article>
                        <div class="blog-single-nav">
                           <?php 
                              if(empty($prevBlog)){
                                 $pburl = "#!";
                                 $pbTitle = "";
                              } else{
                                 $pburl = $prevBlog['url'];
                                 $pbTitle = $prevBlog['title'];
                              }


                              if(empty($nextBlog)){
                                 $nburl = "#!";
                                 $nbTitle = "";
                              } else{
                                 $nburl = $nextBlog['url'];
                                 $nbTitle = $nextBlog['title'];
                              }
                           ?>
                           <div class="bs-nav-col bs-nav-left">
                              <div class="bs-nav-text"><i class="fas fa-long-arrow-alt-left"></i> Prev Post</div>
                              <a href="<?= $pburl; ?>" class="bs-nav-title">
                                 <h4><?= $pbTitle; ?></h4>
                              </a>
                           </div>
                           <div class="bs-nav-col bs-nav-right">
                              <div class="bs-nav-text">Next Post <i class="fa fa-long-arrow-right"></i></div>
                              <a href="<?= $nburl; ?>" class="bs-nav-title">
                                 <h4><?= $nbTitle; ?></h4>
                              </a>
                           </div>
                        </div>
                        <div id="blog-post-comments">
                           <h4 class="comments-heading"><span><?= count($comments); ?></span> comments:</h4>
                           <?php if(count($comments) > 0){ ?>
                           <ul class="media-list">
                              <?php foreach ($comments as $key => $obj) { ?>
                              <li class="media">
                                 <a href="#!" class="media-object pull-left bg-image" style="background-image: url(<?= SITE_ASSETS; ?>img/blog/small/avatar/avatar-1.jpg);"></a>
                                 <div class="media-body">
                                    <h4 class="media-heading">
                                       <a href="#!"><?= $obj['name']; ?></a>
                                    </h4>
                                    <span class="article-time pull-left">
                                       <?= date('d.M.Y', strtotime($obj['createdAt']));?>
                                    </span>
                                    <!-- <span class="media-reply pull-right"><a href="#">Reply</a></span> -->
                                    <p class="media-text">
                                       <?= $obj['text']; ?>
                                    </p>
                                 </div>
                              </li>
                              <?php } ?>
                           </ul>   
                           <?php } ?>
                           <form id="post-comment-form">
                              <h4>Leave a Comment:</h4>
                              <p>We hate spam message as much as you do!</p>
                              <input type="hidden" name="blogid" value="<?= $blog['id']; ?>">
                              <div class="row">
                                 <div class="col-lg-6">
                                    <div class="form-group">
                                       <input type="text" class="form-control" name="name" placeholder="Your Name*" required>
                                    </div>
                                 </div>
                                 <div class="col-lg-6">
                                    <div class="form-group">
                                       <input type="email" class="form-control" name="email" placeholder="Your Email*" required>
                                    </div>
                                 </div>
                              </div>
                              <div class="row">
                                 <div class="col-lg-12">
                                    <div class="form-group">
                                       <textarea class="form-control" name="message" rows="5" placeholder="Your Comment*" required></textarea>
                                    </div>
                                 </div>
                              </div>
                              <div class="row">
                                 <div class="col-lg-12">
                                    <button type="submit" class="btn btn-primary">Submit Comment</button>
                                 </div>
                              </div>
                           </form>
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
      <script>
         $(document).ready(function() {
            $('#post-comment-form').on('submit', function(event) {
               event.preventDefault();
               _formdata = $('form').serialize();
               $.ajax({
                  url: '<?= base_url('Web/addComment'); ?>',
                  type: 'POST',
                  data: _formdata,
               })
               .done(function(msg) {
                  if(msg == "TRUE"){
                     alert('Your comment is pending approval!');
                     $('[name="name"]').val('');
                     $('[name="message"]').val('');
                     $('[name="email"]').val('');
                  }else{
                     alert('Something went wrong! Please try again after sometime.');
                  }
               });
            });
         });
      </script>
   </body>
</html>