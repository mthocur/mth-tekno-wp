    <div id="sidebar" class="col-md-3 hidden-sm hidden-xs">
       <div class="widget">

              <?php get_template_part('inc/reklam-sidebar'); ?>

       </div>

       <div class="widget">
            <div class="widget-header">
               <div class="widget-headtext">Popüler Yazılar</div>
                <div class="widget-hr">
                    <div class="sari-cizgi-2"></div><div class="siyah-cizgi-2"></div>
                </div>
            </div>

           <div class="widget-content">
               <div class="populer-yazilar">
                    <?php query_posts('showposts=3&orderby=comment_count'); ?>
                    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                         <div class="populer-item">
                              <a href="<?php the_permalink('') ?>">
                                 <?php if ( has_post_thumbnail() ) {
                                    the_post_thumbnail( array(725, 450), array( 'class' => 'img-responsive item-img', 'style'=>'max-width:100%;height:auto;min-height:150px' ) );
                                }
                                else { ?>
                                    <img src="<?php bloginfo('template_url'); ?>/img/no-image.jpg" alt="" class="img-responsive item-img" style="min-height:200px;">
                                <?php } ?>
                              </a>
                              <h3><a href="<?php the_permalink('') ?>" title="<?php the_title(''); ?>"><?php the_title(''); ?></a></h3>
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
                    <?php endwhile;else : endif; ?>
               </div>
           </div>


       </div>
       <?php dynamic_sidebar("right-sidebar"); ?>
    </div>
