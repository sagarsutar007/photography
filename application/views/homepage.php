<!DOCTYPE html>
<html lang="en">
<head>    
    <title>Pratysh Katyar Photography</title>
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
        <div id="clapat-page-content" class="dark-content" data-bgcolor="#fff">
            
            <!-- Header -->
            <header class="clapat-header fullscreen-menu invert-header" data-menucolor="#0c0c0c">
                <div id="header-container">
                
                    <!-- Logo -->
                    <div id="clapat-logo" class="hide-ball">
                        <a class="ajax-link" data-type="page-transition" href="/">
                            <img class="black-logo" src="assets/dist/images/logo.png" alt="Logo">
                            <img class="white-logo" src="assets/dist/images/logo-white.png" alt="Logo">
                        </a>
                    </div>
                    <!--/Logo -->

                    <div class="header-middle modify-color fadeout-element">
                        <div><span>[ SELECTED WORKS ]</span></div>
                    </div>

                    <!-- Navigation -->
                    <nav class="clapat-nav-wrapper"> 
                        <div class="nav-height">           
                            <ul data-breakpoint="10025" class="flexnav">
                                <li class="link menu-timeline">
                                    <a class="ajax-link" data-type="page-transition" href="<?= base_url('projects'); ?>">
                                        <div class="before-span">
                                            <span data-hover="PROJECTS">PROJECTS</span>
                                        </div>
                                    </a>
                                </li>
                                <li class="link menu-timeline">
                                    <a class="ajax-link" data-type="page-transition" href="<?= base_url('about'); ?>">
                                        <div class="before-span">
                                            <span data-hover="ABOUT">ABOUT</span>
                                        </div>
                                    </a>
                                </li>
                                <li class="link menu-timeline">
                                    <a class="ajax-link" data-type="page-transition" href="<?= base_url('contact'); ?>">
                                        <div class="before-span">
                                            <span data-hover="CONTACT">CONTACT</span>
                                        </div>
                                    </a>
                                </li>
                                <li class="link menu-timeline">
                                    <a class="" href="#">
                                        <div class="before-span">
                                            <span data-hover="MORE">MORE</span>
                                        </div>
                                    </a>
                                    <ul>
                                        <li><a class="ajax-link" href="<?= base_url('locked-projects'); ?>" data-type="page-transition">Shared Clientale</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>          
                    </nav>
                    <!--/Navigation -->
                    
                    
                    <!-- Menu Burger -->
                    <div class="button-wrap right menu burger-lines">
                        <div class="icon-wrap parallax-wrap">
                            <div class="button-icon parallax-element">
                                <div id="burger-wrapper">
                                    <div id="menu-burger">
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="button-text sticky right"><span data-hover="MENU">MENU</span></div> 
                    </div>
                    <!--/Menu Burger -->
            
                </div>
            </header>
            <!--/Header -->
            
           
            
            <!-- Content Scroll -->
            <div id="content-scroll">
            
            
                <!-- Main -->
                <div id="main">                
                    
                    <!-- Main Content -->
                    <div id="main-content">
                    
                                                        
                        <!-- Showcase Slider Holder -->                                                          
                        <div id="itemsWrapperLinks">                               
                            <div id="itemsWrapper" class="webgl-fitthumbs fx-one">
                            
                            	<!-- Slider -->
                            	<div id="clapat-webgl-slider" class="clapat-slider-wrapper showcase-gallery preview-mode-enabled resize-mode-enabled">    
                                    
                                    <div id="trigger-slides" class="clapat-slider">
                                      	
                                        <!-- Main Slider -->
                                        <div class="clapat-slider-viewport">
                                            <?php 
                                            $classes = [
                                                "top-0 has-scale-medium",
                                                "top-100 speed-50 has-scale-small",
                                                "top-50 speed-50 has-scale-small",
                                                "top-100 has-scale-medium",
                                                "speed-50 top-25",
                                                "top-0 has-scale-small",
                                                "speed-50 top-100 has-scale-medium",
                                                "top-25"
                                            ];

                                            foreach ($slider as $key => $obj) {
                                                $class = $classes[$key % count($classes)];
                                            ?>
                                                <div class="clapat-slide">                                            
                                                    <div class="slide-effects <?= $class; ?>">                                            
                                                        <div class="slide-inner-height" data-centerLine="VIEW">
                                                            <div class="slide-moving">
                                                                <div class="trigger-item" data-centerLine="OPEN" data-projectbgcolor="<?= $obj['projectBgColor']; ?>" data-projectcolor="<?= $obj['projectColor']; ?>">
                                                                    <div class="img-mask">
                                                                        <a class="slide-link" data-type="page-transition" href="<?= base_url("/album/" . $obj['slug']); ?>"></a>
                                                                        <div class="section-image trigger-item-link">
                                                                            <img src="<?= SITE_ASSETS."images/".$obj['background']; ?>" class="item-image grid__item-img" alt="">
                                                                        </div>                                                
                                                                        <img src="<?= SITE_ASSETS."images/".$obj['background']; ?>" class="grid__item-img grid__item-img--large" alt="">                              
                                                                    </div>
                                                                </div>
                                                                <div class="slide-caption">
                                                                    <div class="slide-title"><span><?= $obj['name']; ?></span></div>
                                                                    <div class="slide-cat"><span><?= $obj['categoryName']; ?></span></div>
                                                                    <div class="slide-date"><span>[ <?= date('Y', strtotime($obj['createdAt'])); ?> ]</span></div>                                           
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php } ?>
                                      	</div>
                                        <!--/Main Slider -->
                                        
                                        
                                        <!-- Caption Wrapper -->
                                        <div class="clapat-caption-wrapper content-full-width fadeout-element">  
                                            
                                            <div class="clapat-counter-intro modify-color fade-slide-element"><span>PK.</span></div>
                                            
                                            <div class="spinning-plus">
                                            	<div class="spinning-plus-wrapper">
                                                    <span></span><span></span><span></span>
                                                </div>
                                            </div>
                                                                          
                                            <!-- Sync Slider Large Titles -->
                                            <div class="clapat-counter-slider modify-color fade-slide-element">
                                                <?php 
                                                    $i = 1;
                                                    foreach ($slider as $key => $obj) {
                                                        echo "<div class=\"clapat-counter-slide\"><div class=\"counter-title\"><span>$i</span></div></div>";
                                                        $i++;
                                                    }
                                                ?>
                                            </div>
                                            <!--/Sync Slider Large Titles -->
                                            
                                        </div>
                                        <!--/Caption Wrapper -->
                                        
                                        
                                    </div>
                                    <!-- Slider --> 
                                    
                                    <div class="slider-zoom-wrapper"></div>                                    
                                    <div class="slider-thumbs-wrapper"></div>
                                    <div class="slider-close-preview"></div>
                                                                       
                                </div>
                            	<!--/Slider Wrapper -->

                            </div>                                                           
                        </div>    
                        <!-- Showcase Slider Holder -->
                        
                    </div>
                    <!--/Main Content --> 
                
                </div>
                <!--/Main -->
                
                <!-- Footer -->
                <footer class="clapat-footer hidden">        	
                    <div id="footer-container">
                        
                        <!-- <div class="button-wrap left fade-slide-element">
                        	<a class="ajax-link" data-type="page-transition" href="index-showcase-lists.html">
                                <div class="icon-wrap parallax-wrap 1x" data-border-color="#000">
                                    <div class="button-icon parallax-element modify-color">
                                        <i class="list-view"> <span></span>  <span></span> <span></span> </i>
                                    </div>
                                </div>                            
                            	<div class="button-text sticky left modify-color"><span data-hover="LIST VIEW">LIST VIEW</span></div>
                            </a> 
                        </div> -->
                        
                        <div class="progress-info fadeout-element fade-slide-element">
                            <div class="progress-info-wrapper">
                                <div class="progress-info-fill">SCROLL OR DRAG</div>
                                <div class="progress-info-fill-2">SCROLL OR DRAG</div>
                            </div>
                        </div>
                        
                        <div class="external-caption"></div>
                        
                        <div class="cp-slider-nav fade-slide-element">
                        
                            <div class="cp-button-prev">
                                <div class="icon-wrap parallax-wrap 1x" data-border-color="#000">
                                    <div class="button-icon parallax-element modify-color">
                                        <i class="fa-solid fa-arrow-left"></i>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="cp-button-next">
                                <div class="icon-wrap parallax-wrap 1x" data-border-color="#000">
                                    <div class="button-icon parallax-element modify-color">
                                        <i class="fa-solid fa-arrow-right"></i>
                                    </div>
                                </div>
                            </div>
                        
                        </div>
                        
                    </div>
                </footer>
                <!--/Footer -->

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