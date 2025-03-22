    <!-- Header -->
    <header class="clapat-header fullscreen-menu invert-header" data-menucolor="#0c0c0c">
        <div id="header-container">
        
            <!-- Logo -->
            <div id="clapat-logo" class="hide-ball">
                <a class="ajax-link" data-type="page-transition" href="<?= base_url(); ?>">
                    <img class="black-logo" src="<?= base_url('assets/dist/images/logo.png');?>" alt="Logo">
                    <img class="white-logo" src="<?= base_url('assets/dist/images/logo-white.png');?>" alt="Logo">
                </a>
            </div>
            <!--/Logo -->
                        
            
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