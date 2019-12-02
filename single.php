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
                                } 
                                else { ?>
                                    <img src="<?php bloginfo('template_url'); ?>/img/no-image.jpg" alt="" class="img-responsive">
                                <?php } ?>
            </div>
            <div class="col-md-12">
                
                <div class="single-post-paylas">
                    <a href="#" class="btn btn-default btn-custom">MOBİL</a>
                    <a href="http://www.facebook.com/sharer.php?u=<?php the_permalink(); ?>" class="btn btn-default btn-custom btn-facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                    <a href="https://twitter.com/intent/tweet?text=<?php the_title(''); ?>&amp;url=<?php the_permalink(); ?>" class="btn btn-default btn-custom btn-twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                    <a href="https://plus.google.com/share?url=<?php the_permalink(); ?>" class="btn btn-default btn-custom btn-gplus"><i class="fa fa-google-plus" aria-hidden="true"></i></a>
                </div>

                <div class="single-post-author">
                    <?php echo get_avatar( get_the_author_email(), 35 , array("class","post-author-img") ); ?>
                    <span class="post-author-text"><p><?php the_author_link('');?></p></a></span>
                    
                    
                </div>
            </div>

            <div class="clearfix"></div>
            <div class="single-post-text row">
                <p>
                    <?php the_content(''); ?>
                </p>
            </div>

            <div class="single-post-tags">
                <?php $t = wp_get_post_tags($post->ID); if(!empty($t)){ ?><div class="col-md-1 tags-head">Etiketler:</div>
                <div class="col-md-11">
                <ul>
                    <?php //get all tags for the post

                    foreach ($t as $tag) {
                        $tag_link = get_tag_link($tag->term_id);
                        echo "<li><a href='$tag_link' class='btn btn-default btn-sm btn-tags' rel='tag'>#".($tag->name)."</a></li>";
                    }
                    ?>
                </ul>

                
                </div><?php } ?>
            </div>

            <div class="clearfix"></div>

            <div class="single-post-paylas-2 col-md-12">
                
                <div class="col-md-4 paylas-2">
                    <div class="facebook2 social-link">
                        <p><a href="http://www.facebook.com/sharer.php?u=<?php the_permalink(); ?>">Facebook'ta Paylaş</a></p>
                    </div>
                </div>
                <div class="col-md-4 paylas-2">
                    <div class="twitter2 social-link">
                        <p><a href="https://twitter.com/intent/tweet?text=<?php the_title(''); ?>&amp;url=<?php the_permalink(); ?>">Twitter'da Paylaş</a></p>
                    </div>
                </div>
                <div class="col-md-4 paylas-2">
                    <div class="gplus2 social-link">
                        <p><a href="https://plus.google.com/share?url=<?php the_permalink(); ?>">Google+'da Paylaş</a></p>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>    
            <div class="reklam-kucuk">
                <?php get_template_part('inc/reklam-kucuk'); ?>
            </div>
            
            <div class="benzer-yazilar col-md-12">

                    <?php   
                    $backup = $post;   
                    $tags = wp_get_post_tags($post->ID); 
                    $tagIDs = array(); 
                    if ($tags) { 
                    $tagcount = count($tags); 
                    for ($i = 0; $i < $tagcount; $i++) { 
                    $tagIDs[$i] = $tags[$i]->term_id; 
                    } 
                    $args=array( 
                    'tag__in' => $tagIDs, 
                    'post__not_in' => array($post->ID), 
                    'showposts'=>2,  // 3 yazi gosterilir 
                    'caller_get_posts'=>1 
                    ); 
                    $my_query = new WP_Query($args); 
                    if( $my_query->have_posts() ) { ?>

                    <h1>Benzer yazılar</h1>
                    <div class="widget-hr">
                        <div class="sari-cizgi-2"></div><div class="siyah-cizgi-2"></div>
                    </div>
    
                    <?php while ($my_query->have_posts()) : $my_query->the_post(); ?> 

                    <div class="populer-item col-md-6">
                        <a href="<?php the_permalink() ?>" title="<?php the_title(); ?>">
                        <img src="<?php get_thumb($post->ID, 'full'); ?>" class="img-responsive" alt="<?php the_title(); ?>" /> </a>
                        <h3><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h3> 

                    </div> 
                    <?php endwhile; 
                    } else { ?> 
                    <?php 
                    $this_post = $post; 
                    $category = get_the_category(); $category = $category[0]; $category = $category->cat_ID; 
                    $posts = get_posts('numberposts=2&offset=0&orderby=post_date&order=DESC&category='.$category); 
                    $count = 0; 
                    foreach ( $posts as $post ) { 
                    if ( $post->ID == $this_post->ID || $count == 5) { 
                    unset($posts[$count]); 
                    }else{ 
                    $count ++; 
                    } 
                    } 
                    ?> 
                    <?php if ( $posts ) : ?> 

                    <?php function getWords($text, $limit) { 
                    $array = explode(" ", $text, $limit +1); 
                    if(count($array) > $limit) { 
                    unset($array[$limit]); 
                    } 
                    return implode(" ", $array); } 
                    ?> 
                    <h1>Benzer yazılar</h1>
                    <div class="widget-hr">
                        <div class="sari-cizgi-2"></div><div class="siyah-cizgi-2"></div>
                    </div>
                    <?php foreach ( $posts as $post ) : ?> 
                    <?php $mycontent = strip_tags($post->post_content); 
                    $excerpt = getWords($mycontent, 15); 
                    $a_title = $excerpt . "..."; ?> 

                    <div class="populer-item col-md-6">
                        <a href="<?php the_permalink() ?>" title="<?php the_title(); ?>">
                        <img src="<?php get_thumb($post->ID, 'full'); ?>" class="img-responsive" alt="<?php the_title(); ?>" /> </a>
                        <h3><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h3> 

                    </div> 




                    <?php endforeach // $posts as $post ?> 

                    <?php endif // $posts ?> 
                    <?php 
                    $post = $this_post; 
                    unset($this_post); 
                    ?> 
                    <?php } 
                      } 
                      $post = $backup;   
                      wp_reset_query();  
                    ?> 
             </div>   

        </div>    

        <div class="clearfix"></div>
        
        <div class="comments">
            <div class="list-group">
                
                <?php comments_template(); ?>
              
            </div>
        </div>

        <?php endwhile;?> 
    </div>
    <!-- Content -->
    
    <!-- Sidebar -->
    <?php get_sidebar(); ?>
    <!-- Sidebar -->

    <!-- Footer -->
    <?php get_footer(); ?>
    <?php
    if ( is_user_logged_in() ) { 
        echo "<script>
                var buton = document.getElementById('sub');
                buton.setAttribute('type', 'submit');

                function formKontrol() {
                    var form = document.getElementById('commentform');
     
                    form.submit();
                
                };
            </script>";
    } else { 
        echo "<script>
            var buton = document.getElementById('sub');
            buton.setAttribute('type', 'button');

            function formKontrol() {
                var kontrol = document.getElementById('inputKontrol').value;
                var form = document.getElementById('commentform');

                if(kontrol != 6){ 
                   alert('Güvenlik sorusunu doğru cevaplayınız!');
                }else{   
                    form.submit();
                }
            };
            </script>";
   } 

   ?>
        
    <!-- Footer -->
    