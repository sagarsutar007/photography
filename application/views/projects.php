<!DOCTYPE html>
<html lang="en">
<head>    
    <title>Projects</title>
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
            <div id="clapat-page-content" class="dark-content" data-bgcolor="#fff">
                <?php include_once('includes/header.php'); ?>

                <div id="content-scroll">

                    <!-- Main -->
                <div id="main">                
                    
                    <!-- Main Content -->
                    <div id="main-content">
                        
                                                        
                        <!-- Showcase Slider Holder -->                                                          
                        <div id="itemsWrapperLinks">                               
                            <div id="itemsWrapper" class="webgl-fitthumbs fx-one">
                            
                                <!-- ClaPat Slider -->
                                <div id="clapat-webgl-slider" class="clapat-slider-wrapper showcase-lists">    
                                    
                                    <div id="trigger-slides" class="clapat-slider">
                                        
                                        <!-- ClaPat Main Slider -->
                                        <div class="clapat-slider-viewport">
                                            <?php for ($i=0; $i < count($projects); $i++) { 
                                                echo '<div class="clapat-slide"></div>';
                                            } ?>
                                        </div>
                                        <!--/ClaPat Main Slider -->
                                        
                                        
                                        <!-- ClaPat Sync Slider -->
                                        <div class="clapat-sync-slider">      
                                            <div class="clapat-sync-slider-wrapper">
                                                <div class="clapat-sync-slider-viewport">                                            
                                                    
                                                    <?php foreach ($projects as $key => $obj) { ?>
                                                    <div class="clapat-sync-slide">                                                 
                                                        <div class="trigger-item" data-centerLine="OPEN" data-projectbgcolor="<?= $obj['projectBgColor']; ?>" data-projectcolor="<?= $obj['projectColor']; ?>">
                                                            <div class="hover-reveal">
                                                                <div class="hover-reveal__inner">
                                                                    <div class="hover-reveal__img">
                                                                        <img src="<?= SITE_ASSETS."images/".$obj['background']; ?>" class="item-image grid__item-img" alt="">                                             
                                                                        <img class="grid__item-img grid__item-img--large" src="<?= SITE_ASSETS."images/".$obj['background']; ?>" alt="" />
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            
                                                            <a class="slide-link" data-type="page-transition" href="<?= base_url("/album/" . $obj['slug']); ?>"></a>
                                                            <div class="slide-title trigger-item-link modify-color"><?= $obj['name']; ?></div>
                                                        </div>
                                                    </div>
                                                    <?php } ?>
                                                
                                                
                                                </div>
                                            </div>
                                        </div>
                                        <!-- ClaPat Sync Slider -->
                                        
                                        
                                        
                                        <!-- ClaPat Caption Wrapper -->
                                        <div class="clapat-caption-wrapper content-full-width fadeout-element">  
                                            
                                            <div class="clapat-counter-intro modify-color fade-slide-element"><span>PK.</span></div>
                                                                          
                                            <!-- ClaPat Sync Slider Counter -->
                                            <div class="clapat-counter-slider modify-color fade-slide-element">
                                                <?php for ($i=1; $i <= count($projects); $i++) { 
                                                    echo '<div class="clapat-counter-slide"><div class="counter-title"><span>'.$i.'</span></div></div>';
                                                } ?>
                                            </div>
                                            <!--/ClaPat Sync Slider Large Titles -->
                                            
                                        </div>
                                        <!--/ClaPat Caption Wrapper -->
                                        
                                        
                                    </div>
                                    <!-- ClaPat Slider -->
                                                                       
                                </div>
                                <!--/ClaPat Slider Wrapper -->
                                
                            </div>                                                           
                        </div>    
                        <!-- Showcase Slider Holder -->
                                         
                                
                    </div>
                    <!--/Main Content --> 
                
                </div>
                <!--/Main -->

                    <?php include_once('includes/footer.php'); ?>
                </div>
                <div id="app"></div>
            </div> 
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