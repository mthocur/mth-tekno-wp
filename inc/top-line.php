    <div class="top-line">
        <div class="col-md-6">
            <ul class="top-line-list">
<?php wp_nav_menu( array( 
                        'menu_class' =>'top-line-list', 
                        'container'=>'ul',
                        'container_class' =>'col-md-6', 
                        'items_wrap' => '%3$s',
                        'theme_location' => 'menu-2' ) ); ?>
            </ul>
        </div>
        <div class="col-md-6">
            <ul class="social-icons">
                <li><a class="facebook" target="_blank" href="<?php echo get_option('mth_sosyalfacebook'); ?>"><i class="fa fa-facebook"></i></a></li>
                <li><a class="twitter" target="_blank" href="<?php echo get_option('mth_sosyaltwitter'); ?>"><i class="fa fa-twitter"></i></a></li>
                <li><a class="rss" target="_blank" href="<?php bloginfo('rss2_url'); ?>"><i class="fa fa-rss"></i></a></li>
                <li><a class="google" target="_blank" href="<?php echo get_option('mth_sosyalgplus'); ?>"><i class="fa fa-google-plus"></i></a></li>
                <li><a class="linkedin" target="_blank" href="<?php echo get_option('mth_sosyallinkedin'); ?>"><i class="fa fa-linkedin"></i></a></li>
                <li><a class="pinterest" target="_blank" href="<?php echo get_option('mth_sosyalpinterest'); ?>"><i class="fa fa-pinterest"></i></a></li>
            </ul>
        </div>
    </div>