    <section class="slider slider-5">

        <div class="col-md-10 col-md-offset-1 col-sm-12 col-xs-12 ">
            <?php $cat = get_option('mth_slidercat'); ?>
            <?php $sayac = 0; ?>
            <div class="col-md-6 col-sm-12 col-xs-12">
                <div class="carouselWrapper">
                  <?php $firstPosts = array(); ?>
                  <?php $recent = new WP_Query("category_name=$cat&showposts=3");
                   while($recent->have_posts()) : $recent->the_post();?>
                   <?php $firstPosts[] = $post->ID; ?>
                      <div class="well well-custom item">
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
            <?php wp_reset_query(); ?>
            <div class="col-md-6 col-sm-12 hidden-xs slider slider-8">
              <?php $args = array('post__not_in' => $firstPosts,'category_name'=>$cat,'showposts'=>4); ?>
              <?php $recent = new WP_Query($args);
               while($recent->have_posts()) : $recent->the_post();?>

               <div class="col-md-6 col-sm-3 pd-no">
                  <div class="well well-custom ">
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
                </div>

              <?php endwhile;?>
            </div>



        </div>

        <div class="col-md-1"></div>
    </section>

    <?php wp_reset_query(); ?>
