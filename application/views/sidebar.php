<div id="header" class="header-hover">
	<div class="header-close" title="Close">×</div>
	<div class="logo-small">
		<a href="<?= base_url(); ?>" ><img src="<?= SITE_ASSETS; ?>img/logo-small.png" title="Home" alt="logo"></a>
	</div>
	<span class="header-menu-icon" title="Open Menu"><i class="fas fa-bars"></i></span>
	<a href="" class="header-contact-icon" title="Contact Me"><i class="far fa-envelope"></i></a>
	<div class="header-inner">
		<div class="header-top">
			<div class="logo-big">
				<a href="<?= base_url(); ?>"><img src="<?= SITE_ASSETS; ?>img/logo-big.png" title="Home" alt="logo"></a>
			</div>					
		</div>
		<div class="header-middle">
			<div id="menu">
				<ul class="menu-list">
					<li>
						<a href="<?= base_url(); ?>">Home</a>
					</li>
					<li>
						<a href="<?= base_url('about'); ?>">About Me</a>
					</li>
					<li>
						<a href="<?= base_url('albums'); ?>">Albums</a> 
					</li>
					<li>
						<a href="<?= base_url('blog'); ?>">Blog</a>
					</li>
					<li>
						<a href="<?= base_url('contact'); ?>">Contact</a> 
					</li>
				</ul>
			</div>
		</div>
		<div class="header-bottom">
			<div class="follow-me-buttons">
				<ul>
					<li><a href="#" title="Follow me on Facebook" target="_blank"><i class="fab fa-facebook-f"></i></a></li> 
					<li><a href="#" title="Follow me on Dribbble" target="_blank"><i class="fab fa-dribbble"></i></a></li> 
					<li><a href="#" title="Follow me on Behance" target="_blank"><i class="fab fa-behance"></i></a></li> 
					<li><a href="#" title="Email Me" target="_blank"><i class="far fa-envelope"></i></a></li>
				</ul>
			</div>
			<div class="copyright">
				Copyright © <?= date('Y'); ?> <br>
				<a target="_blank" href="https://systemdice.com/">System Dice</a>
			</div>
		</div>
	</div>
</div>