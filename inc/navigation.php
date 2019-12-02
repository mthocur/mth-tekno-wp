    <nav class="navbar navbar-default navbar-fixed-top navbar-custom" id="navbar-custom" role="navigation">
        <div class="container">
            <div class="navbar-header page-scroll">
                <a class="navbar-brand center-block" href="<?php bloginfo('url'); ?>">
                    <div class="navbar-logo">
                      <?php if(get_option('mth_logo')){ ?>
                          <img id="navbar-img" src="<?php echo get_option('mth_logo'); ?>" alt="<?php bloginfo('name'); ?> Logo">

                      <?php }elseif(has_custom_logo()){ ?>
                          <img id="navbar-img" src="<?php echo get_custom_wp_logo('mth_logo'); ?>" alt="<?php bloginfo('name'); ?> Logo">
                      <?php }else{
                          bloginfo('name');
                          echo '<div id="navbar-img" style="width:70%;height:1px;display:none;"></div>';
                       } ?>

                    </div>
                </a>

                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>

            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav" id="navbarJs">
                    <?php wp_nav_menu( array(
                        'menu_class' =>'nav navbar-nav',
                        'menu_id' =>'navbarJs',
                        'container'=>'ul',
                        'container_class' =>'collapse navbar-collapse navbar-ex1-collapse',
                        'link_before' =>'',
                        'items_wrap' => '%3$s',
                        'theme_location' => 'menu-1' ) );
                    ?>
                </ul>

                <div class="arama" id="arama">
                    <button class="btn btn-default"><i class="fa fa-search" aria-hidden="true"></i></button>
                </div>

                <div class="arama2" id="arama2">
                    <form role="search" method="get" id="searchform" class="searchform" action="<?php bloginfo("url");?>">
                        <input class="aramainput" type="text" value="" name="s" id="s" placeholder="Ara..." onblur="arama2JsBlur()" autofocus>
                        <a type="button" class="btn btn-default" onclick="aramakapa()"><i class="fa fa-times" aria-hidden="true"></i></a>
                    </form>
                </div>
            </div>


        </div>
    </nav>
