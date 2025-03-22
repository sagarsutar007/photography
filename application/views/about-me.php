<!DOCTYPE html>
<html lang="en">
<head>    
    <title>About Me</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="I’m Pratyush Katyar, a photographer from Odisha, India, now crafting visuals with a global perspective." />
    <meta name="author" content="Pratyush Katyar">
    <meta charset="UTF-8" />    
    <link rel="icon" type="image/ico" href="favicon.ico" />
    <link href="<?= base_url('assets/dist/css/style.css'); ?>" rel="stylesheet" />
    <link href="<?= base_url('assets/dist/css/all.min.css'); ?>" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
    <style>
        .pinned-lists li { font-size: calc(1rem + 3vw); line-height: calc(1rem + 3vw); }
    </style>
</head>

<body class="hidden hidden-ball smooth-scroll" data-primary-color="#999999">

	<main>		
        <?php include_once('includes/preloader.php'); ?>   
        
        <div class="cd-index cd-main-content">
    
        <!-- Page Content -->
        <div id="clapat-page-content" class="dark-content" data-bgcolor="#fff" data-modify-color="#ff3227">
            
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
                                    <h1 class="hero-title caption-timeline"><span>CREATIVE</span> <span>PHOTOGRAPHY FREELANCER</span></h1>
                                    <div class="hero-subtitle caption-timeline">
                                        <span>I focus on creating images that are <br class="destroy"> striking, intentional, and timeless.</span>
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
                    				<div id="info-text"><?= $admin['email']; ?></div>
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
                            <div class="content-row light-section" data-bgcolor="#fff">
                            
                            	<div class="clipped-image-wrapper">
                                
                                	<div class="clipped-image-pin">                                    	
                                        <div class="clipped-image">
                                            <img src="<?= base_url('assets/dist/images/about.jpg'); ?>" alt="Image Title">
                                            <div class="content-video-wrapper">
                                                <video loop muted playsinline class="bgvid">
                                                    <source src="<?= base_url('assets/dist/images/about.mp4'); ?>" type="video/mp4">
                                                </video>
                                            </div>
                                            <div class="clipped-image-gradient"></div>
                                        </div>
                                    </div>
                                    
                                    <div class="clipped-image-content"><hr><hr><hr><hr><hr><hr><hr><hr><hr><hr><hr></div>
                                
                                </div>
                                
                            </div> 
                            <!--/Row -->
                            
                            
                            <!-- Row -->
                            <div class="content-row row_padding_top text-align-center light-section" data-bgcolor="#fff">
                                <div class="pinned-lists-wrapper brick-mode" data-duration="5x">                                
                                    <p class="smaller">[ QUALITIES WE BOUGHT ] </p> 
                                    <ul class="pinned-lists">
                                        <li>CREATIVE VISION</li>
                                        <li>ATTENTION TO DETAIL</li>
                                        <li>PATIENCE & PERSEVERANCE</li>
                                        <li>SUPERB COMPOSITION SKILLS</li>
                                        <li>ADAPTABILITY & FLEXIBILITY</li>
                                        <li>PASSION FOR STORYTELLING</li>
                                    </ul>
                                </div>
                            </div> 
                            <!--/Row -->

                            <!-- Row -->
                            <div class="content-row full row_padding_left row_padding_right row_padding_bottom text-align-center light-section" data-bgcolor="#fff">
                                <hr>
                                <!-- Flex Lists --> 
                                <ul class="flex-lists-wrapper">                                                            
                                    <li class="flex-list link has-animation">
                                        <span class="flex-list-left">Composition Mastery</span>
                                        <span class="flex-list-center">Expert in framing and visual storytelling</span>
                                        <span class="flex-list-right">10+ Years Experience</span>
                                    </li>
                                    <li class="flex-list link has-animation">
                                        <span class="flex-list-left">Lighting Techniques</span>
                                        <span class="flex-list-center">Natural & artificial lighting expertise</span>
                                        <span class="flex-list-right">Studio & Outdoor</span>
                                    </li>
                                    <li class="flex-list link has-animation">
                                        <span class="flex-list-left">Photo Editing</span>
                                        <span class="flex-list-center">Proficiency in Photoshop & Lightroom</span>
                                        <span class="flex-list-right">Advanced Retouching</span>
                                    </li>
                                    <li class="flex-list link has-animation">
                                        <span class="flex-list-left">Client Collaboration</span>
                                        <span class="flex-list-center">Understanding & delivering client vision</span>
                                        <span class="flex-list-right">500+ Projects</span>
                                    </li>
                                    <li class="flex-list link has-animation">
                                        <span class="flex-list-left">Event Coverage</span>
                                        <span class="flex-list-center">Weddings, corporate events, and more</span>
                                        <span class="flex-list-right">50+ Events</span>
                                    </li>
                                    <li class="flex-list link has-animation">
                                        <span class="flex-list-left">Drone Photography</span>
                                        <span class="flex-list-center">Aerial shots with professional drones</span>
                                        <span class="flex-list-right">4K Quality</span>
                                    </li>
                                    <li class="flex-list link has-animation">
                                        <span class="flex-list-left">Portrait & Fashion</span>
                                        <span class="flex-list-center">Specializing in model & lifestyle shoots</span>
                                        <span class="flex-list-right">Published Work</span>
                                    </li>
                                </ul>
                                <hr class="destroy">
                            </div> 
                            <!--/Row -->
                        </div>
                        <!--/Main Page Content -->
                        
                        <!-- Page Navigation --> 
                        <div id="page-nav" class="">
                            <div class="page-nav-wrap">
                                <div class="page-nav-caption content-full-width text-align-center">                                 
                                    <div class="inner">                                     
                                        <a class="next-ajax-link-page" data-type="page-transition" data-centerline="VIEW PORTFOLIO" href="/portfolio">
                                            <div class="next-hero-title caption-timeline">
                                                <span>CAPTURE MOMENTS</span> <span>CREATE MEMORIES</span> <span>TELL YOUR STORY</span>
                                            </div>
                                        </a>
                                        <div class="next-hero-subtitle caption-timeline">
                                            <span>Explore my lens, where every shot speaks a thousand words</span>
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
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCpK1sWi3J3EbUOkF_K4-UHzi285HyFX5M&sensor=false"></script>
    <script src="<?= base_url('assets/dist/js/clapat.js'); ?>"></script>
    <script src="<?= base_url('assets/dist/js/plugins.js'); ?>"></script>
    <script src="<?= base_url('assets/dist/js/common.js'); ?>"></script>
    <script src="<?= base_url('assets/dist/js/contact.js'); ?>"></script>
    <script src="<?= base_url('assets/dist/js/scripts.js'); ?>"></script>



</body>

</html>