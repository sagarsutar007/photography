    <!-- Footer -->
    <footer class="clapat-footer hidden">        	
        <div id="footer-container">
            
            <div id="backtotop" class="button-wrap left">
                <div class="icon-wrap parallax-wrap">
                    <div class="button-icon parallax-element">
                        <i class="fa-solid fa-angle-up"></i>
                    </div>
                </div>
                <div class="button-text sticky left"><span data-hover="Back Top">Back Top</span></div> 
            </div>
            
            <div class="footer-middle">
                <div class="copyright"><?= date('Y'); ?> © <a class="link" target="_blank" href="<?= base_url(); ?>">Pratyush Katyar</a>. All rights reserved.</div>
            </div>
            
            <div class="socials-wrap">            	
                <div class="socials-icon"><i class="fa-solid fa-share-nodes"></i></div>
                <div class="socials-text">Follow Us</div>
                <ul class="socials">
                    <?php if (isset($admin['facebook']) && !empty($admin['facebook'])) { ?>
                    <li><span class="parallax-wrap"><a class="parallax-element" href="<?=$admin['facebook'];?>" target="_blank">Fb</a></span></li>
                    <?php } ?>
                    <?php if (isset($admin['twitter']) && !empty($admin['twitter'])) { ?>
                    <li><span class="parallax-wrap"><a class="parallax-element" href="<?=$admin['twitter'];?>" target="_blank">X</a></span></li>
                    <?php } ?>
                    <?php if (isset($admin['instagram']) && !empty($admin['instagram'])) { ?>
                    <li><span class="parallax-wrap"><a class="parallax-element" href="<?=$admin['instagram'];?>" target="_blank">Ig</a></span></li>
                    <?php } ?>
                    <?php if (isset($admin['dribble']) && !empty($admin['dribble'])) { ?>
                    <li><span class="parallax-wrap"><a class="parallax-element" href="<?=$admin['dribble'];?>" target="_blank">Db</a></span></li>
                    <?php } ?>
                    <?php if (isset($admin['behance']) && !empty($admin['behance'])) { ?>
                    <li><span class="parallax-wrap"><a class="parallax-element" href="<?=$admin['behance'];?>" target="_blank">Be</a></span></li>
                    <?php } ?>
                </ul>                
            </div>
            
        </div>
    </footer>
    <!--/Footer -->