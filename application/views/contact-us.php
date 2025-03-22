<!DOCTYPE html>
<html lang="en">
<head>    
    <title>Contact</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="Pratyush Katyar is a passionate photographer capturing stunning moments with creativity and precision. Specializing in portrait, landscape, and event photography, he brings stories to life through his lens. Explore his portfolio for breathtaking visuals!" />
    <meta name="author" content="Pratyush Katyar">
    <meta charset="UTF-8" />    
    <link rel="icon" type="image/ico" href="favicon.ico" />
    <link href="<?= base_url('assets/dist/css/style.css'); ?>" rel="stylesheet" />
    <link href="<?= base_url('assets/dist/css/all.min.css'); ?>" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
</head>
<body class="hidden hidden-ball smooth-scroll" data-primary-color="#999999">

    <main>      
        <?php include_once('includes/preloader.php'); ?>   
        
        <div class="cd-index cd-main-content">
    
        <!-- Page Content -->
        <div id="clapat-page-content" class="light-content" data-bgcolor="#222222" data-modify-color="#ff7e00">
            
            <?php include_once('includes/header.php'); ?>

            <!-- Content Scroll -->
            <div id="content-scroll">

                <!-- Main -->
                <div id="main">
                
                    <!-- Hero Section -->
                    <div id="hero">
                        <div id="hero-styles">
                            <div id="hero-caption" class="content-full-width parallax-scroll-caption text-align-center hero-full-caption">
                                <div class="inner">                                    
                                    <h1 class="hero-title caption-timeline"><span>LET'S CAPTURE</span> <span>SOMETHING GREAT</span> <span>TOGETHER</span></h1>
                                    <div class="hero-subtitle caption-timeline">
                                        <span>It's time to create and capture best memories</span>
                                    </div>                                   
                                </div>
                            </div>
                            <div id="hero-footer" class="has-border parallax-footer">
                                <div class="hero-footer-left">
                                    <div class="button-wrap left scroll-down">
                                        <div class="icon-wrap parallax-wrap">
                                            <div class="button-icon parallax-element">
                                                <i class="fa-solid fa-arrow-down"></i>
                                            </div>
                                        </div>
                                        <div class="button-text sticky left"><span data-hover="SCROLL TO EXPLORE">SCROLL TO EXPLORE</span></div> 
                                    </div>
                                </div>
                                <div class="hero-footer-right">
                                    <div id="info-text"><?= $email??'info@pratyushkatyar.com'; ?></div>
                                </div>
                            </div>                                  
                        </div>
                    </div>                      
                    <!--/Hero Section -->  
                         
                    
                    <!-- Main Content -->
                    <div id="main-content">
                        <!-- Main Page Content -->
                        <div id="main-page-content" class="content-max-width">
                        
                            
                            <!-- Row -->
                            <!-- <div class="content-row dark-section" data-bgcolor="#222222">
                                <div class="clipped-image-wrapper">
                                    <div class="clipped-image-pin">                                     
                                        <div class="clipped-image">
                                            <div id="map_canvas"></div>
                                            <div class="clipped-image-gradient"></div>
                                        </div>
                                    </div>
                                    <div class="clipped-image-content"><hr><hr><hr><hr><hr><hr><hr><hr><hr><hr><hr></div>
                                </div>
                            </div>  -->
                            <!--/Row -->
                            
                            
                            <!-- Row -->
                            <div class="content-row row_padding_top row_padding_bottom dark-section text-align-center" data-bgcolor="#222222">
                                
                                <h2 class="has-mask-fill">LET'S TALK</h2>
                                
                                <hr><hr> 
                                
                                <!-- Contact Formular -->
                                <div id="contact-formular">
                                
                                    <div id="message"></div>
                                
                                    <form method="post" action="/web/sendEMail" name="contactform" id="contactform"> 
                                        <input type="hidden" name="project_name" value="pratyushkatyar.com"> 
                                        <input type="hidden" name="admin_email" value="<?= $admin['email']; ?>"> 
                                        <input type="hidden" name="form_subject" value="Message from pratyushkatyar.com">                             
                                        <div class="name-box">        
                                            <input name="name" type="text" id="name" size="30" value="" placeholder="What's Your Name"><label class="input_label"></label>
                                        </div>                                                        
                                        <div class="email-box">
                                            <input name="email" type="text" id="email" size="30" value="" placeholder="Your Email"><label class="input_label"></label>
                                        </div>                            
                                        <div class="message-box">
                                            <textarea name="message" cols="40" rows="4" id="comments" placeholder="Tell Us About Your Project" ></textarea><label class="input_label slow"></label>
                                        </div>
                                                                     
                                        <div class="button-box has-animation" data-delay="100">             
                                            <div class="clapat-button-wrap parallax-wrap hide-ball">
                                                <div class="clapat-button parallax-element">
                                                    <div class="button-border rounded outline "><input type="submit" class="send_message" id="submit" value="Send Message" /></div>
                                                </div>
                                            </div> 
                                        </div>
                                    </form>                        
                                                            
                                </div>
                                <!--/Contact Formular -->
                            </div> 
                            <!--/Row -->
                            
                            
                            <!-- Row -->
                            <div class="content-row dark-section text-align-center" data-bgcolor="#222222">
                           
                                <div class="one_third has-animation" data-delay="100">
                                    
                                    <div class="box-icon-wrapper block-boxes">
                                        <div class="box-icon">
                                            <i class="fa fa-paper-plane fa-2x" aria-hidden="true"></i>
                                        </div>
                                        <div class="box-icon-content">
                                            <h6 class="no-margins"><a href="mailto:office@bruner.com" class="link"><span><?= $admin['email']??'info@pratyushkatyar.com'; ?></span></a></h6>
                                            <p>Email</p>
                                        </div>
                                    </div> 
                                                           
                                </div>
                                
                                <div class="one_third has-animation"  data-delay="200">
                                    
                                    <div class="box-icon-wrapper block-boxes">
                                        <div class="box-icon">
                                            <i class="fa fa-map-marker fa-2x" aria-hidden="true"></i>
                                        </div>
                                        <div class="box-icon-content">
                                            <h6 class="no-margins"><?= $admin['address']??''; ?></h6>
                                            <p>Address</p>
                                        </div>
                                    </div>
                                                            
                                </div>
                                
                                <div class=" one_third last has-animation"  data-delay="300">
                                    
                                    <div class="box-icon-wrapper block-boxes">
                                        <div class="box-icon">
                                            <i class="fa fa-phone fa-2x" aria-hidden="true"></i>
                                        </div>
                                        <div class="box-icon-content">
                                            <h6 class="no-margins"><?= $admin['phone']??''; ?></h6>
                                            <p>Phone</p>
                                        </div>
                                    </div>
                                    
                                </div> 
                                                       
                           </div> 
                           <!--/Row -->
                        </div>
                        <!--/Main Page Content -->
                        <!-- Page Navigation --> 
                        <div id="page-nav" class="">
                            <div class="page-nav-wrap">
                                <div class="page-nav-caption content-full-width text-align-center">                                 
                                    <div class="inner">                                     
                                        <a class="next-ajax-link-page" data-type="page-transition" data-centerline="GO TO" href="<?= base_url('/projects'); ?>">
                                            <div class="next-hero-title caption-timeline"><span>PORTFOLIO</span></div>
                                        </a>
                                        <div class="next-hero-subtitle caption-timeline">
                                            <span>Explore our World of Visual Design</span>
                                        </div>                                        
                                    </div>               
                                </div>
                            </div>
                        </div>      
                        <!--/Page Navigation -->
                        
                                
                    </div>
                    <!--/Main Content --> 
                
                </div>
                <!--/Main -->
                
                <?php include_once('includes/footer.php'); ?>
            
            </div>
            <!--/Content Scroll -->
            
            <div id="app"></div>
            
        </div>    
        <!--/Page Content -->
    
        </div>
    </main>

    <div class="cd-cover-layer"></div>
    <div id="magic-cursor">
        <div id="ball">
            <div id="ball-drag-x"></div>
            <div id="ball-drag-y"></div>
            <div id="ball-loader"></div>
        </div>
    </div>
    <div id="clone-image">
        <div class="hero-translate"></div>
    </div>
    <div id="rotate-device"></div>

    <script src="<?= base_url('assets/dist/js/jquery.min.js'); ?>"></script>       
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.4/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.4/ScrollTrigger.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.4/Flip.min.js"></script>    
    <script src='https://cdnjs.cloudflare.com/ajax/libs/three.js/r128/three.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery.imagesloaded/5.0.0/imagesloaded.pkgd.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/smooth-scrollbar/8.4.0/smooth-scrollbar.js'></script>
    <!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCpK1sWi3J3EbUOkF_K4-UHzi285HyFX5M&sensor=false"></script> -->
    <script src="<?= base_url('assets/dist/js/clapat.js'); ?>"></script>
    <script src="<?= base_url('assets/dist/js/plugins.js'); ?>"></script>
    <script src="<?= base_url('assets/dist/js/common.js'); ?>"></script>
    <script src="<?= base_url('assets/dist/js/contact.js'); ?>"></script>
    <script src="<?= base_url('assets/dist/js/scripts.js'); ?>"></script>
</body>

</html>