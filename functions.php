<?php


//Özet Boyutu---------------------------------------------------//
// Özetler 25 kelimeye ayarlandı.
function new_excerpt_length($length) {
	return 25;
}
add_filter('excerpt_length', 'new_excerpt_length');


//Sayfalama---------------------------------------------------//
function sayfalama($pages = '', $range = 2)  {
     $showitems = ($range * 2)+1;

     global $paged;
     if(empty($paged)) $paged = 1;

     if($pages == '')
     {
         global $wp_query;
         $pages = $wp_query->max_num_pages;
         if(!$pages)
         {
             $pages = 1;
         }
     }

     if(1 != $pages)
     {
         if($paged > 2 && $paged > $range+1 && $showitems < $pages) echo "<a href='".get_pagenum_link(1)."' class='btn btn-default btn-sayfalama'>&laquo;</a>";
         if($paged > 1 && $showitems < $pages) echo "<a href='".get_pagenum_link($paged - 1)."' class='btn btn-default btn-sayfalama'>&lsaquo;</a>";

         for ($i=1; $i <= $pages; $i++)
         {
             if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
             {
                 echo ($paged == $i)? "<span class='btn btn-default btn-sayfalama btn-aktif'>".$i."</span>":"<a href='".get_pagenum_link($i)."' class='btn btn-default btn-sayfalama' >".$i."</a>";
             }
         }

         if ($paged < $pages && $showitems < $pages) echo "<a href='".get_pagenum_link($paged + 1)."' class='btn btn-default btn-sayfalama'>&rsaquo;</a>";
         if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) echo "<a href='".get_pagenum_link($pages)."' class='btn btn-default btn-sayfalama'>&raquo;</a>";
     }

}

//Öne Çıkarılmış Görsel----------------------------------------//
add_theme_support( 'post-thumbnails' );
set_post_thumbnail_size( 225, 150 );



//Dinamik Sidebar--------------------------------------------//


function dinamik_sidebar()
{
	register_sidebar(
		array(
			'id'=>'right-sidebar',
			'before_widget' => '<div class="widget">', //her widget'dan önce basılacak dom nesnesi
			'after_widget' => '</div></div>', //her widgettan sonra eklenecek olan dom nesnesi
			'before_title' => '<div class="widget-header"><div class="widget-headtext">', //her widget title'ından önce eklenen nesne
			'after_title' => '</div><div class="widget-hr"><div class="sari-cizgi-2"></div><div class="siyah-cizgi-2"></div></div></div><div class="widget-content">', //her widget title'ından sonra ekenen nesne
		)
	);
}
add_action( 'widgets_init', 'dinamik_sidebar' ); //widgetların yer aldığı fonksiyon wordpress'

//Benzer Yazılar Resim----------------------------------------------------//


function get_thumb($postid=0, $size='full',$return = false) {
	if($return==false){
		if ($postid<1)
		$postid = get_the_ID();
		$thumb = get_post_meta($postid, "resim", TRUE);
		if ($thumb != null or $thumb != '') {
		echo $thumb;
		}
		elseif ($images = get_children(array(
		'post_parent' => $postid,
		'post_type' => 'attachment',
		'numberposts' => '1',
		'post_mime_type' => 'image', )))
		foreach($images as $image) {
		$thumbnail=wp_get_attachment_image_src($image->ID, $size);
		?>
		<?php echo $thumbnail[0];?>
		<?php }
		else {
		echo bloginfo ( 'template_url' );
		echo '/img/no-image.jpg';
		}
	}else{
		if ($postid<1)
		$postid = get_the_ID();
		$thumb = get_post_meta($postid, "resim", TRUE);
		if ($thumb != null or $thumb != '') {
		return $thumb;
		}
		elseif ($images = get_children(array(
		'post_parent' => $postid,
		'post_type' => 'attachment',
		'numberposts' => '1',
		'post_mime_type' => 'image', )))
		foreach($images as $image) {
		$thumbnail=wp_get_attachment_image_src($image->ID, $size);
		?>
		<?php return $thumbnail[0]; ?>
		<?php }
		else {
		$url = get_template_directory_uri();
		return $url .'/img/no-image.jpg';
		}
	}
}
//Rastgele Yazı---------------------------------------------------------//

function rastgele_yazi($yazi_sayisi="3") {
    global $wpdb;
    $sorgu = "SELECT * FROM $wpdb->posts where (post_status='publish' and post_type='post') ORDER BY RAND() LIMIT 0, $yazi_sayisi";
    $sonuclar = $wpdb->get_results($sorgu);
    foreach ($sonuclar as $sonuc) {

      $cikti .= "<div class='populer-item page-404-featured col-md-4'>
                    <a href='" . get_permalink($sonuc->ID) . "' title='". $sonuc->post_title ."'>
                    	<img src='". get_thumb($sonuc->ID, 'full',true) ."' class='img-responsive' alt='". $sonuc->post_title ."' />
                    </a>
					<h3><a href='" . get_permalink($sonuc->ID) . "' title='". $sonuc->post_title ."'>". $sonuc->post_title ."</a><h3>
				</div>";

    }
    echo $cikti;
}


//Tema Menü Kodları-------------------------------------------------------//
add_action( 'init', 'theme_menus' );

function theme_menus() {
	register_nav_menus(
		array(
			'menu-1' => __( 'Ana Menu' ),
			'menu-2' => __( 'Top Line Menu' ),
			'menu-3' => __( 'Footer Menu' )
		)
	);
}

//Tema Panel Kodları-------------------------------------------------------//
if ( STYLESHEETPATH == TEMPLATEPATH ) {
	define('OF_FILEPATH', TEMPLATEPATH);
	define('OF_DIRECTORY', get_bloginfo('template_directory'));
} else {
	define('OF_FILEPATH', STYLESHEETPATH);
	define('OF_DIRECTORY', get_bloginfo('stylesheet_directory'));
}
require_once (OF_FILEPATH . '/admin/admin-functions.php');
require_once (OF_FILEPATH . '/admin/admin-interface.php');
require_once (OF_FILEPATH . '/admin/theme-options.php');
require_once (OF_FILEPATH . '/admin/theme-functions.php');


function abone_ekle($email){

	$aboneler = get_option('mth_abonemail');

	$aboneler = $aboneler . "\xA" . $email;

}


function advanced_comment($comment, $args, $depth) {
   $GLOBALS['comment'] = $comment; ?>

<li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
	<?php echo get_avatar($comment,$size='48',$default='' ); ?>
   <div class="comment-author vcard">
       <div class="comment-meta"><a href="<?php the_author_meta( 'user_url'); ?>"><?php printf(__('%s'), get_comment_author_link()) ?></a></div>
       <small><?php printf(__('%1$s at %2$s'), get_comment_date(),  get_comment_time()) ?><?php edit_comment_link(__('(Düzenle)'),'  ','') ?></small>
     </div>
     <div class="clearfix"></div>

     <?php if ($comment->comment_approved == '0') : ?>
       <em><?php _e('Yorumunuz onay için bekliyor.') ?></em>
       <br />
     <?php endif; ?>

     <div class="comment-text">
         <?php comment_text() ?>
     </div>

   <div class="reply">
      <button class="btn btn-default btn-reply">
      	<?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
      </button>
   </div>
   <div class="clearfix"></div>
<?php }



function kategori_yazdir(){
	$cat_say = 0;
	foreach((get_the_category()) as $category) {
	    if ($category->cat_name != 'Slider') {
	    echo ($sayac<1) ? '' : '<span class=\'span-sari\'> , </span>' ;
	    echo '<a href="' . get_category_link( $category->term_id ) . '" title="' . sprintf( __( "%s kategorisindeki tüm yazıları görmek için tıklayın." ), $category->name ) . '" ' . '>' . $category->name.'</a>';
	    $sayac++;
		}
	}

}


function keyword_yazdir(){
	$t = wp_get_post_tags($post->ID);

	if(!empty($t)){

		foreach ($t as $tag) {
		$tag_link = get_tag_link($tag->term_id);
		echo $tag->name;
		}

	}

}


//Custom theme logo wordpress

function get_custom_wp_logo(){
	$custom_logo_id = get_theme_mod( 'custom_logo' );
	$image = wp_get_attachment_image_src( $custom_logo_id , 'full' );
	return $image[0];
}












?>
