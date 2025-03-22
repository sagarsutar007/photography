<!DOCTYPE html>
<html lang="en">
<head>    
    <title>View Album</title>
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
        <div id="clapat-page-content" class="dark-content" data-bgcolor="<?= $album['projectBgColor']; ?>" data-modify-color="#ffffff">
            
            <?php include_once('includes/header.php'); ?>
            
            <!-- Content Scroll -->
            <div id="content-scroll">
            
            
                <!-- Main -->
                <div id="main">
                
                    <!-- Hero Section -->
                    <div id="hero" class="has-image autoscroll">
                        <div id="hero-styles">
                            <div id="hero-caption" class="content-full-width hero-full-caption">
                                
                                <div class="inner">   
                                    <h1 class="hero-title caption-timeline"><span><?= strtoupper($album['name']); ?></span></h1>
                                    <div class="hero-subtitle caption-timeline"><span><?= strtoupper($album['category']); ?></span></div>
                                    <div class="hero-date caption-timeline"><span>[<?= date("F Y", strtotime($album['createdAt'])); ?>]</span></div>
                                </div>
                                
                                <div id="hero-footer" class="">
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
                                        <div id="share" class="page-action-content" data-text="SHARE:"></div>
                                    </div>
                                </div>
                                
                            </div>
                            
                            <div id="hero-description" class="content-full-width">
                                <div class="inner">
                                    <p class="bigger has-opacity"><?= html_entity_decode($album['about']); ?></p>
                                    <!-- <hr> -->
                                    <!-- <div class="button-box has-animation" data-delay="100">             
                                        <div class="clapat-button-wrap parallax-wrap hide-ball">
                                            <div class="clapat-button parallax-element">
                                                <div class="button-border outline rounded parallax-element-second">
                                                    <a target="_blank" href="https://themeforest.net/user/clapat/portfolio">
                                                        <span data-hover="View Website">View Website</span>
                                                     </a>
                                                 </div>
                                            </div>
                                        </div> 
                                    </div> -->
                                </div>
                            </div>
                            
                            <div class="hero-gradient"></div>
                                                                                            
                        </div>
                    </div>
                    <div id="hero-image-wrapper">
                        <div id="hero-background-layer" class="parallax-scroll-image">
                            <div id="hero-bg-image" style="background-image:url(<?= SITE_ASSETS."images/".$album['background']; ?>)"></div>
                        </div>
                    </div>                        
                    <!--/Hero Section -->  
                    <?php if (isset($require_password)) { ?>
                    <div id="main-content">
                        <div id="main-page-content">
                            <div class="content-row row_padding_bottom light-section" data-bgcolor="<?= $album['projectBgColor']; ?>">
                                <h2 class="has-mask-fill">ENTER PASSWORD</h2>

                                <hr><hr>
                                <div id="contact-formular">
                                
                                    <div id="message"><?= $error?? ''; ?></div>

                                    <form method="post" action="" id="passwordform">
                                        <div class="name-box">        
                                            <input name="password" type="password" id="name" size="16" placeholder="Enter passw*rd">
                                            <label class="input_label"></label>
                                        </div> 

                                        <div class="button-box has-animation" data-delay="100">             
                                            <div class="clapat-button-wrap parallax-wrap hide-ball">
                                                <div class="clapat-button parallax-element">
                                                    <div class="button-border rounded outline">
                                                        <input type="submit" class="send_message" id="submit" value="Unlock Album"/>
                                                    </div>
                                                </div>
                                            </div> 
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php } else { ?> 
                    <!-- Main Content -->
                    <div id="main-content">
                        <div id="main-page-content">
                            <div class="content-row row_padding_bottom light-section" data-bgcolor="<?= $album['projectBgColor']; ?>">

                                <hr class="destroy"><hr class="destroy">
                                
                                <?php if (!empty($pictures)): ?>
                                    <?php 
                                        $total_pics = count($pictures);
                                        $first_four = array_slice($pictures, 0, 4); // Get first 4 images
                                        $remaining = array_slice($pictures, 4); // Get remaining images
                                    ?>

                                    <!-- Top Four Images -->
                                    <div class="row">
                                        <?php foreach ($first_four as $index => $pic): ?>
                                            <div class="one_half <?= ($index % 2 == 1) ? 'last' : ''; ?>">
                                                <figure class="has-animation" data-delay="200">
                                                    <a href="<?= SITE_ASSETS."images/".$pic['picture']; ?>" class="image-link">
                                                        <img src="<?= SITE_ASSETS."images/".$pic['picture']; ?>" alt="<?= htmlspecialchars($pic['title']); ?>">
                                                    </a>
                                                    <?php if (!empty($album['password'])) { ?>
                                                    <figcaption><a href="<?= SITE_ASSETS."images/".$pic['picture']; ?>" target="_blank">Download</a></figcaption>
                                                    <?php } else { ?>
                                                    <figcaption><?= htmlspecialchars($pic['title']); ?></figcaption>
                                                    <?php } ?>
                                                </figure>
                                            </div>

                                            <?php if ($index % 2 == 1): ?>
                                                <div class="clearfix"></div>
                                                <hr><br><br>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    </div>

                                <?php else: ?>
                                    <p>No pictures available for this album.</p>
                                <?php endif; ?>

                                <hr class="destroy"><hr class="destroy">  
                            </div>
                            <!--/Row -->
                            <?php if (!empty($album['exercept'])) { ?>
                            <div class="content-row full dark-section" data-bgcolor="<?= $album['projectBgColor']; ?>">
                                
                                <figure class="has-parallax has-parallax-content" data-delay="100">
                                    <img src="<?= SITE_ASSETS."images/".$album['background']; ?>" alt="Image Title">
                                    <div class="parallax-image-content content-full-width">
                                        <div class="outer">
                                            <div class="inner"> 
                                                <div class="one_half"></div>                                                
                                                <div class="one_half last">                                                
                                                    <h2 class="has-mask-fill big-title"><?= strtoupper($album['exercept']); ?></h2>               
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </figure>
                            </div> 
                            <?php } ?>
                            <!-- Row -->
                            <!-- Remaining Images -->
                            <?php if (!empty($remaining)): ?>
                                <div class="content-row row_padding_top light-section" data-bgcolor="<?= $album['projectBgColor']; ?>">
                                    <?php foreach ($remaining as $index => $pic): ?>
                                        <div class="one_half <?= ($index % 2 == 1) ? 'last' : ''; ?>">
                                            <figure class="has-animation" data-delay="200">
                                                <a href="<?= SITE_ASSETS."images/".$pic['picture']; ?>" class="image-link">
                                                    <img src="<?= SITE_ASSETS."images/".$pic['picture']; ?>" alt="<?= htmlspecialchars($pic['title']); ?>">
                                                </a>

                                                <?php if (!empty($album['password'])) { ?>
                                                <figcaption><a href="<?= SITE_ASSETS."images/".$pic['picture']; ?>" target="_blank">Download</a></figcaption>
                                                <?php } else { ?>
                                                <figcaption><?= htmlspecialchars($pic['title']); ?></figcaption>
                                                <?php } ?>
                                            </figure>
                                        </div>

                                        <?php if ($index % 2 == 1): ?>
                                            <div class="clearfix"></div>
                                            <hr><br><br>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </div>
                            <?php endif; ?>
                            <!--/Row -->
                        </div>
                        <!--/Main Page Content -->      
                    </div>
                    <!--/Main Content --> 
                    <?php } ?>
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