
<?php get_header(); ?>

    <!-- Ads -->
    <?php get_template_part('inc/reklam-buyuk'); ?>
    <!-- Ads -->
    
    <!-- Content -->
    <div id="content" class="col-md-7 col-md-offset-1">
        <?php while ( have_posts() ) : the_post(); ?>
        <div class="single-post col-md-12">
    
            <div class="single-post-headtext">
                <h1><?php the_title(''); ?></h1>
                    <div class="widget-hr">
                        <div class="sari-cizgi-2"></div><div class="siyah-cizgi-2"></div>
                    </div>
            </div>

            <div class="single-post-img col-md-12">
                <?php if ( has_post_thumbnail() ) {
                    the_post_thumbnail( array(725, 450), array( 'class' => 'img-responsive', 'style'=>'max-width:100%;height:auto' ) );
                } ?>
            </div>

            <div class="clearfix"></div>
            <div class="single-post-text row">
                <p><?php the_content(''); ?></p>
            </div>

            <div class="clearfix"></div>

        </div>    

        <div class="clearfix"></div>
    <?php endwhile;?> 
    </div>
    <!-- Content -->
    
    <!-- Sidebar -->
    <?php get_sidebar(); ?>
    <!-- Sidebar -->

    <!-- Footer -->
     <?php get_footer(); ?>
    <!-- Footer -->