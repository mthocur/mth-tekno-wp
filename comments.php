<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 */
 
// Do not delete these lines
    if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
        die ('Please do not load this page directly. Thanks!');
 
    if ( post_password_required() ) { ?>
        <p class="nocomments">This post is password protected. Enter the password to view comments.</p>
    <?php
        return;
    }
?>
 
<!-- You can start editing here. -->
 
<?php if ( have_comments() ) : ?>
    <h1 id="comments">Yorum yapmak istemez misiniz?</h1>
    <div class="widget-hr">
        <div class="sari-cizgi-2"></div><div class="siyah-cizgi-2"></div>
    </div>
 
    <ol class="commentlist">
        <?php wp_list_comments('type=comment&callback=advanced_comment'); //this is the important part that ensures we call our custom comment layout defined above 
                ?>
    </ol>
    <div class="clear"></div>
    <div class="comment-navigation">
        <div class="older"><?php previous_comments_link() ?></div>
        <div class="newer"><?php next_comments_link() ?></div>
    </div>
 <?php else : // this is displayed if there are no comments so far ?>
 
    <?php if ( comments_open() ) : ?>
        <!-- If comments are open, but there are no comments. -->
 
     <?php else : // comments are closed ?>
        <!-- If comments are closed. -->
        <p class="nocomments">Bu yazı için yorumlar devredışıdır.</p>
 
    <?php endif; ?>
<?php endif; ?>
 
 
<?php if ( comments_open() ) : ?>
 
<div id="respond">
    <h1 id="comments">Yorum yapmak istemez misiniz?</h1>
    <div class="widget-hr">
        <div class="sari-cizgi-2"></div><div class="siyah-cizgi-2"></div>
    </div> 
<h3><?php comment_form_title( 'Bir cevap yazın', '%s için bir cevap yazın' ); ?></h3>
 
<div class="cancel-comment-reply">
    <small><?php cancel_comment_reply_link(); ?></small>
</div>
 
<?php if ( get_option('comment_registration') && !is_user_logged_in() ) : ?>
<p>Yorum yazmak için <a href="<?php echo wp_login_url( get_permalink() ); ?>">giriş</a> yapmış olmalısınız.</p>
<?php else : ?>
 
<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">
 
<?php if ( is_user_logged_in() ) : ?>
 
<p> <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a> olarak giriş yaptınız. <a href="<?php echo wp_logout_url(get_permalink()); ?>" title="Çıkış yap">Çıkış yap &raquo;</a></p>
 
<?php else : //this is where we setup the comment input forums ?>
 
        <div class="form-group frm-grp-custom">
            <label for="author" class="col-md-1 control-label">İsim*</label>
            <div class="col-md-4">
                <input type="text" class="form-control" name="author" id="author" value="<?php echo esc_attr($comment_author); ?>" placeholder="İsim" <?php if ($req) echo "aria-required='true'"; ?>>
            </div>
        </div>

        <div class="form-group frm-grp-custom">
            <label for="email" class="col-md-1 control-label">Email*</label>
            <div class="col-md-4">
                <input type="email" class="form-control" name="email" id="email" value="<?php echo esc_attr($comment_author_email); ?>" placeholder="Email" <?php if ($req) echo "aria-required='true'"; ?>>
            </div>
        </div>        

        <div class="clearfix"></div>

        <div class="form-group frm-grp-custom">
            <label for="inputKontrol" class="col-md-1 control-label">Kontrol*</label>
            <div class="col-md-4">
                <input type="text" class="form-control" id="inputKontrol" placeholder="2+4=?">
            </div>
        </div> 

        <div class="form-group frm-grp-custom">
            <label class="col-md-5">
                <input type="checkbox" name="abonelik"> Webreey'e abone olmak istiyorum.
            </label>
        </div> 


<?php endif; ?>
 
<!--<p><small><strong>XHTML:</strong> You can use these tags: <code><?php echo allowed_tags(); ?></code></small></p>-->
 
        <div class="clearfix"></div>

        <div class="form-group">
            <label for="yorum" class="col-md-1 control-label">Yorum</label>

            <div class="col-md-10">
                <textarea class="form-control" rows="3" name="comment" id="comment"></textarea>
                <span class="help-block">
                    Mesajınız onaylanmadan önce yöneticiler tarafından incelenecektir.
                </span>
            </div>
        </div>
 
        <div class="form-group frm-grp-custom">
            <input class="btn btn-reply btn-raised pull-right" type="button" onclick="formKontrol()" id="sub" value="Yorum Yap" />
            <input type="hidden" name="comment_post_ID" value="<?php echo $id; ?>">
        </div> 
        
<?php comment_id_fields(); ?>
</p>
<?php do_action('comment_form', $post->ID); ?>
 
</form>
 
<?php endif; // If registration required and not logged in ?>
</div>
 
<?php endif; // if you delete this the sky will fall on your head ?>