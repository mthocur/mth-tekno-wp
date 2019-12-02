    <?php get_header(); ?>

    <?php get_template_part('inc/abonelik'); ?>

    <!-- Slider -->
    <?php get_template_part('inc/slider'); ?>
    <!-- Slider -->
    <div class="clearfix"></div>
    <!-- Ads -->
    <?php get_template_part('inc/reklam-buyuk'); ?>
    <!-- Ads -->

    <!-- Content -->
    <div id="content" class="col-md-7 col-md-offset-1">

            <div class="col-md-12">
                <div class="col-md-3"><h1 class="section-headtext">SON YAZILAR</h1></div>
                <div class="col-md-9"><hr class="sari-cizgi" /></div>
            </div>

            <div class="col-md-12  col-sm-12 posts">

            <?php if(have_posts()) : ?>
                <?php while(have_posts()) : the_post(); ?>
                <div class="post row">
                    <div class="post-img col-md-4 col-sm-4">
                        <a href="<?php the_permalink(''); ?>">
                            <?php
                            if ( has_post_thumbnail() ) {
                                the_post_thumbnail( array(725, 450), array( 'class' => 'img-responsive', 'style'=>'max-width:100%;height:auto' ) );
                            } else { ?>
                                <img src="<?php bloginfo('template_url'); ?>/img/no-image.jpg" alt="" class="img-responsive">
                            <?php } ?>
                        </a>
                    </div>
                    <div class="post-content col-md-8 col-sm-8">
                        <div class="post-headtext">
                            <h1>
                              <a href="<?php the_permalink(''); ?>"><?php the_title(''); ?></a>
                            </h1>
                        </div>
                        <div class="post-text hidden-xs">
                            <p><?php the_excerpt(''); ?></p>
                        </div>

                        <div class="post-info">
                            <div class="post-time">
                                <i class="fa fa-clock-o" aria-hidden="true"></i><?php the_time('d-F') ?>
                            </div>
                            <div class="post-category">
                                <i class="fa fa-square" aria-hidden="true" style="color:#ffcc01;"></i>
                                <?php kategori_yazdir(); ?>
                            </div>
                        </div>
                    </div>
                </div>
                <hr class="siyah-cizgi">
                <?php endwhile; ?>
            <?php endif; ?>
            </div>

            <div class="col-md-12 col-md-offset-4">
               <?php echo sayfalama(); ?>
            </div>

    </div>
    <!-- Content -->

    <!-- Sidebar -->
    <?php get_sidebar("right-sidebar"); ?>
    <!-- Sidebar -->

    <!-- Footer -->
    <?php get_footer(); ?>
    <!-- Footer -->
