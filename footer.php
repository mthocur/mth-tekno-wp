<div class="clearfix"></div>
<div class="col-md-12 container-fluid footer">
        <div class="col-md-6">
            <div class="footer-left">
                <ul class="footer-left-list">
                   <?php wp_nav_menu( array(
                        'menu_class' =>'footer-left-list',
                        'container'=>'ul',
                        'container_class' =>'footer-left',
                        'items_wrap' => '%3$s',
                        'theme_location' => 'menu-3' ) ); ?>
                </ul>
            </div>
        </div>
        <div class="col-md-6">
            <div class="footer-right">
                &copy; <?php echo date("Y"); ?> <?php echo get_option('mth_copyright'); ?>
                <a href="<?php echo get_option('mth_firmaurl'); ?> ">
                    <span class="span-sari"><?php echo get_option('mth_firmaadi'); ?> </span>
                    <?php if(get_option('mth_altlogo')){ ?>
                        <img src="<?php echo get_option('mth_altlogo'); ?> " alt="<?php echo get_option('mth_firmaadi'); ?> ">
                    <?php } ?>

                </a>
            </div>
        </div>
    </div>


    <!-- jQuery -->
    <script src="<?php bloginfo('template_url'); ?>/js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php bloginfo('template_url'); ?>/js/bootstrap.min.js"></script>

    <!-- Scrolling Nav JavaScript -->
    <script src="<?php bloginfo('template_url'); ?>/js/jquery.easing.min.js"></script>
    <script src="<?php bloginfo('template_url'); ?>/js/scrolling-nav/scrolling-nav.js"></script>

    <!-- Mega Dropdown Menu -->
    <script src="<?php bloginfo('template_url'); ?>/js/scrolling-nav/jquery.menu-aim.js"></script> <!-- menu aim -->
    <script src="<?php bloginfo('template_url'); ?>/js/mega-dropdown.js"></script> <!-- Resource jQuery -->

    <script src="<?php bloginfo('template_url'); ?>/js/owl-carousel/owl.carousel.min.js"></script>

    <!-- Material Scripts -->
    <script src="<?php bloginfo('template_url'); ?>/js/bootstrap-material/material.js"></script>
    <script src="<?php bloginfo('template_url'); ?>/js/ripples/ripples.min.js"></script>
    <script>

        function aramaJs() {
            document.getElementById("navbarJs").style.display = "none"
            document.getElementById("arama").style.display = "none"
            document.getElementById("arama2").style.display = "block"
            document.getElementById("arama2").focus();

        }

        $('#arama').click(function(){
            document.getElementById("navbarJs").style.display = "none"
            document.getElementById("arama").style.display = "none"
            document.getElementById("arama2").style.display = "block"
            document.getElementById("arama2").focus();
        });

        function arama2JsBlur() {
            document.getElementById("navbarJs").style.display = "block"
            document.getElementById("arama").style.display = "block"
            document.getElementById("arama2").style.display = "none"
            document.getElementById("arama2").blur();

        }

        function aramakapa() {
            document.getElementById("navbarJs").style.display = "block"
            document.getElementById("arama").style.display = "block"
            document.getElementById("arama2").style.display = "none"
            document.getElementById("arama2").blur();
            $( "#navbarJs" ).fadeIn( "slow", function() {
                $( "#arama2" ).fadeOut( "slow" );
            });
        }

        <?php
        if(get_option('mth_slidernum') == 7){ ?>
            $( document ).ready(function() {
              var carousel = $(".slider-5 .carouselWrapper");

              carousel.owlCarousel({
                navigation : false,
                pagination : false,
                slideSpeed : 300,
                singleItem:true,
                autoPlay:true,
                addClassActive:true,
              });
            });
        <?php } ?>

        <?php
        if(get_option('mth_slidernum') == 8){ ?>
          $( document ).ready(function() {
            var carousel = $(".slider-5 .carouselWrapper");

            carousel.owlCarousel({
              navigation : false,
              pagination : true,
              slideSpeed : 300,
              singleItem:true,
              autoPlay:true,
              addClassActive:true,
            });
          });
        <?php } ?>
        $( document ).ready(function() {
          var carousel = $(".slider-5 .carouselWrapper");

          carousel.owlCarousel({
            navigation : false,
            pagination : true,
            slideSpeed : 300,
            singleItem:true,
            autoPlay:true,
            addClassActive:true,
          });
        });


    </script>

    <?php echo get_option('mth_customfooter'); ?>
<?php wp_footer(); ?>
</body>

</html>
