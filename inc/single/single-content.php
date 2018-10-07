<?php function xnews_single_bottom() {

if ( false == get_theme_mod( 't_p_read_more', false ) ) { $t_p_read_more = esc_html__("Read More:", "xnews");  } else { $t_p_read_more = get_theme_mod( 't_p_read_more' ); }
if ( false == get_theme_mod( 't_p_previous_article', false ) ) { $t_p_previous_article = esc_html__("Previous article", "xnews");  } else { $t_p_previous_article = get_theme_mod( 't_p_previous_article' ); }
if ( false == get_theme_mod( 't_p_next_article', false ) ) { $t_p_next_article = esc_html__("Next article", "xnews");  } else { $t_p_next_article = get_theme_mod( 't_p_next_article' ); }
if ( false == get_theme_mod( 't_p_may_be_intrested', false ) ) { $t_p_may_be_intrested = esc_html__("You may be interested", "xnews");  } else { $t_p_may_be_intrested = get_theme_mod( 't_p_may_be_intrested' ); }
$allowed_html = array('ins' => array( 'class' => array(), 'style' => array(),'data-ad-client' => array(),'data-ad-slot' => array(),'data-ad-format' => array()), 'iframe' => array( 'id' => array(),'name' => array(),'src' => array(),'style' => array(),'scrolling' => array(),'frameborder' => array()), 'script' => array( 'async' => array(), 'type' => array(),'src' => array()), 'noscript' => array(), 'small' => array( 'class' => array()), 'img' => array( 'src' => array(), 'alt' => array(), 'class' => array(), 'width' => array(), 'height' => array() ), 'a' => array( 'href' => array(), 'title' => array() ), 'br' => array(), 'i' => array('class' => array()),  'em' => array(), 'strong' => array(), 'div' => array('class' => array()), 'span' => array('class' => array()));
$option = get_option("xnews_theme_options");
$optionz = get_option("magazin_theme_options");
$url = wp_get_attachment_url( get_post_thumbnail_id(get_the_ID()));
$share_bottom = "";
$share_bottom = get_post_meta(get_the_ID(), "magazin_post_share_bottom", true);
?>
<div class="mt-pagepagination">
  <?php $defaults = array(
		'before'           => '<p>' . esc_html($t_p_read_more),
		'after'            => '</p>',
		'link_before'      => '<span>',
		'link_after'       => '</span>',
		'next_or_number'   => 'number',
		'separator'        => ' ',
		'pagelink'         => '%',
		'echo'             => 1
	);
  wp_link_pages( $defaults ); ?>
</div>
<?php $review = get_post_meta(get_the_ID(), "magazin_review_location", true); if($review==""){ if(function_exists("mt_review_title")) { echo mt_review_single(); }} ?>
  <div class="tags"><?php echo get_the_tag_list('#', '#'); ?></div>
  <?php  if(function_exists("mt_share_bottom_")) { mt_share_bottom(); } ?>
  <div class="clearfix"></div>
  <div class="entry-meta">

    <?php if ( get_the_author_meta( 'description' )) { ?>
      <div class="author-info">
        <div class="author-avatar">
          <?php echo get_avatar( get_the_author_meta( 'user_email' ), apply_filters( 'xnews_author_bio_avatar_size', 70 ) ); ?>
          </div>
          <div class="author-description">

            <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" rel="author"><h3><?php printf( esc_html__( '%s', 'xnews' ), get_the_author() ); ?></h3></a>

          <p><?php the_author_meta( 'description' ); ?></p>
          <div class="mt-bio-social">

            <?php $twitterHandle = get_the_author_meta('twitter');
            $facebookHandle = get_the_author_meta('facebook');
            $googleHandle = get_the_author_meta('gplus');
            $instagramHandle = get_the_author_meta('instagram');
            $linkedinHandle = get_the_author_meta('linkedin');
            $pinterestHandle = get_the_author_meta('pinterest');
            $youtubeHandle = get_the_author_meta('youtube');
            $dribbbleHandle = get_the_author_meta('dribbble'); ?>

            <?php if(!empty($twitterHandle)) { ?><a class="mt-bio-twitter" href="<?php echo esc_url($twitterHandle); ?>"></a> <?php } ?>
            <?php if(!empty($facebookHandle)) { ?><a class="mt-bio-facebook" href="<?php echo esc_url($facebookHandle); ?>"></a> <?php } ?>
            <?php if(!empty($googleHandle)) { ?><a class="mt-bio-google" href="<?php echo esc_url($googleHandle); ?>"></a> <?php } ?>
            <?php if(!empty($instagramHandle)) { ?><a class="mt-bio-instagram" href="<?php echo esc_url($instagramHandle); ?>"></a> <?php } ?>
            <?php if(!empty($linkedinHandle)) { ?><a class="mt-bio-linkedin" href="<?php echo esc_url($linkedinHandle); ?>"></a> <?php } ?>
            <?php if(!empty($pinterestHandle)) { ?><a class="mt-bio-pinterest" href="<?php echo esc_url($pinterestHandle); ?>"></a> <?php } ?>
            <?php if(!empty($youtubeHandle)) { ?><a class="mt-bio-youtube" href="<?php echo esc_url($youtubeHandle); ?>"></a> <?php } ?>
            <?php if(!empty($dribbbleHandle)) { ?><a class="mt-bio-dribbble" href="<?php echo esc_url($dribbbleHandle); ?>"></a> <?php } ?>

          </div>

        </div>
      </div>
    <?php } ?>

  </div>
  <?php if  (!empty($optionz['article_ad_bottom'])) {  ?>
    <div class="advertise text-center">
      <?php echo html_entity_decode($optionz['article_ad_bottom']); ?>
    </div>
  <?php } ?>
  <?php if ( true == get_theme_mod( 'mt_post_prev_next_article', true ) ) { ?>
    <ul class="nav-single">
      <li class="previous pull-left"><?php previous_post_link( '%link', '<span class="color-silver-light">' . esc_html($t_p_previous_article) . '</span><div>%title</div>' ); ?></li>
      <li class="next pull-right"><?php next_post_link( '%link', ' <span class="color-silver-light">' . esc_html($t_p_next_article) . '</span><div>%title</div>' ); ?></li>
      <li class="clearfix"></li>
    </ul>
  <?php } ?>
  <div class="clear"></div>

  <?php if ( is_active_sidebar( 'sidebar-single-bottom-widget-area-before' ) ) {

    dynamic_sidebar( 'sidebar-single-bottom-widget-area-before' );

  } else {

     if ( shortcode_exists( 'posts' ) ) { echo do_shortcode('[posts title="'. esc_html($t_p_may_be_intrested) .'" title_type="left" type=normal-right-small item_nr=3 ]'); }

  }

  if ( comments_open() || '0' != get_comments_number() ) comments_template( '', true );


 }

function xnews_single_bottom_after() {
 if ( is_active_sidebar( 'sidebar-single-bottom-widget-area-after' ) ) {

   dynamic_sidebar( 'sidebar-single-bottom-widget-area-after' );

 }
}
 ?>
