    <section class="slider slider-5">

        <div class="col-md-10 col-md-offset-1 col-sm-12 col-xs-12 ">
            <?php $cat = get_option('mth_slidercat'); ?>
            <?php $sayac = 0; ?>
            <div class="carouselWrapper">


<?php $recent = new WP_Query("category_name=$cat&showposts=7");
 while($recent->have_posts()) : $recent->the_post();?>

                      <div class="well well-custom item" style="min-height:400px;">
                        <a href="<?php the_permalink('') ?>" style="overflow:hidden">
                            <?php if ( has_post_thumbnail() ) {
                                    $featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full'); ?>
                                    <div class="item-img" style="background-image:url('<?php echo $featured_img_url; ?>');"></div>
                            <?php } else {
                                    $featured_img_url = get_bloginfo('template_url')."/img/no-image.jpg";
                              ?>
                                    <div class="item-img" style="background-image:url('<?php echo $featured_img_url; ?>');"></div>
                            <?php } ?>
                            <div class="slider-item">
                                <h4><?php the_title(''); ?></h4>
                                <p><?php the_time('d-F') ?></p>
                            </div>
                        </a>
                      </div>

             <?php endwhile;?>
           </div>
        </div>

        <div class="col-md-1"></div>
    </section>
