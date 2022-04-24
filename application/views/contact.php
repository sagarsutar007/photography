<!DOCTYPE html>
<html lang="en">
   <head>
      <title>Contact</title>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="description" content="Responsive Photography HTML5 Website Template">
      <meta name="author" content="themetorium.net">
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
         <section id="contact-section" class="split-box">
            <div class="container-fluid">
               <div class="row">
                  <div class="row-lg-height full-height-vh">
                     <div class="col-lg-6 col-lg-height col-lg-middle bg-image" style="background-image: url(assets/site/img/misc/misc-4.jpg); background-position: 50% 50%;">
                        <div class="cover"></div>
                        <div class="split-box-content text-left no-padding-left no-padding-right">
                           <div class="contact-info-wrap">
                              <div class="contact-info">
                                 <p>
                                    <i class="fas fa-home"></i> 
                                    Address: <?= $admin['address']; ?>
                                 </p>
                                 <p><i class="fas fa-phone-alt"></i> Phone: <?= $admin['phone']; ?></p>
                                 <p><i class="far fa-envelope"></i> Email: <a href="mailto:<?= $admin['email']; ?>" target="_blank"><?= $admin['email']; ?></a></p>
                              </div>
                              <div class="social-buttons margin-top-20">
                                 <ul>
                                    <li><a href="<?= $admin['facebook']; ?>" class="btn btn-social-min btn-dark-bordered btn-rounded-full" target="_blank" title="Follow me on facebook"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="<?= $admin['twitter']; ?>" class="btn btn-social-min btn-dark-bordered btn-rounded-full" target="_blank" title="Follow me on twitter"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="<?= $admin['dribble']; ?>" class="btn btn-social-min btn-dark-bordered btn-rounded-full" target="_blank" title="Follow me on dribbble"><i class="fab fa-dribbble"></i></a></li>
                                    <li><a href="<?= $admin['behance']; ?>" class="btn btn-social-min btn-dark-bordered btn-rounded-full" target="_blank" title="Follow me on behance"><i class="fab fa-behance"></i></a></li>
                                    <li><a href="<?= $admin['instagram']; ?>" class="btn btn-social-min btn-dark-bordered btn-rounded-full" target="_blank" title="Follow me on instagram"><i class="fab fa-instagram"></i></a></li>
                                 </ul>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-lg-6 col-lg-height col-lg-middle no-padding">
                        <div class="split-box-content">
                           <form id="contact-form" method="post">
                              <div class="contact-form-inner text-left">
                                 <div class="contact-form-info">
                                    <h1 class="contact-form-title font-alter-1">Get In Touch</h1>
                                    <p>I would love to hear from you! Please fillup this contact form with proper details so that I would be able to reply you :)</p>
                                 </div>
                                 <input type="hidden" name="project_name" value="pratyushkatyar.com"> 
                                 <input type="hidden" name="admin_email" value="<?= $admin['email']; ?>"> 
                                 <input type="hidden" name="form_subject" value="Message from pratyushkatyar.com"> 
                                 <div class="row">
                                    <div class="col-lg-6">
                                       <div class="form-group">
                                          <input type="text" class="form-control" name="name" placeholder="Your Name" required>
                                       </div>
                                    </div>
                                    <div class="col-lg-6">
                                       <div class="form-group">
                                          <input type="email" class="form-control" name="email" placeholder="Your Email" required>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="row">
                                    <div class="col-lg-12">
                                       <div class="form-group">
                                          <input type="text" class="form-control" name="subject" placeholder="Subject" required>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="row">
                                    <div class="col-lg-12">
                                       <div class="form-group">
                                          <select class="form-control" name="reason" required>
                                             <option value="" disabled selected>Select an option</option>
                                             <option value="say hello">Say hello</option>
                                             <option value="new project">New project</option>
                                             <option value="feedback">Feedback</option>
                                             <option value="other">Other</option>
                                          </select>
                                       </div>
                                    </div> 
                                 </div>
                              </div>
                              <div class="row">
                                 <div class="col-lg-12">
                                    <div class="form-group">
                                       <textarea class="form-control" name="message" rows="4" placeholder="Your Message" required></textarea>
                                    </div>
                                 </div>
                              </div>
                              <div class="small text-gray"><em>* All fields are required!</em></div>
                        </div>
                        <div class="row">
                           <div class="col-lg-12">
                              <button type="submit" class="btn btn-primary btn-lg btn-block margin-top-40">
                                 Send Message
                              </button>
                           </div>
                        </div>
                        </form>
                     </div>
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-lg-12 no-padding">
                  <div id="map"></div>
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
            $('#contact-form').on('submit', function(event) {
               event.preventDefault();
               _formdata = $('form').serialize();
               $.ajax({
                  url: '<?= base_url('Web/sendMail'); ?>',
                  type: 'POST',
                  data: _formdata,
               })
               .done(function(msg) {
                  alert('Mail sent! Thanks for contacting..');
                  window.location.reload();
               });
            });
         });
      </script>
   </body>
</html>