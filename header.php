<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head class="animated">
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<?php wp_head(); ?>
</head>

<?php
$option = get_option("xnews_theme_options");
?>
<body <?php body_class(); ?> itemscope itemtype="http://schema.org/WebPage">

<?php
$bg_post = get_post_meta(get_the_ID(), "magazin_background_image", true);
$style = get_post_meta(get_the_ID(), "magazin_post_style", true);
$pagetop = get_post_meta(get_the_ID(), "magazin_page_top", true);

$body_class = "";
if(!empty($style)){
	$body_class = $style;
} else if (!empty($option['post_style'])) {
	$body_class = $option['post_style'];
}
?>
<?php if(is_single() and $body_class == "8") { ?>
	<div class="background-image lazyload" style="background-image:url('<?php echo get_the_post_thumbnail_url(get_the_ID(),"full"); ?>');"></div>
	<?php } else if(!empty($bg_post)) {
		// Fix for SSL
			$bg = esc_url($bg_post);
			if(is_ssl() and 'http' == parse_url($bg, PHP_URL_SCHEME) ){
					$bg = str_replace('http://', 'https://', $bg);
			}
		 ?>
		<div class="background-image lazyload" style="background-image:url('<?php echo esc_url($bg); ?>');"></div>
	<?php } else if(!empty($option['background_image'])) {
		// Fix for SSL
			$bg = esc_url($option['background_image']);
			if(is_ssl() and 'http' == parse_url($bg, PHP_URL_SCHEME) ){
					$bg = str_replace('http://', 'https://', $bg);
			}
		 ?>
		<div class="background-image lazyload" style="background-image:url('<?php echo esc_url($bg); ?>');"></div>
	<?php } ?>
<div class="mt-smart-menu-out"></div>

<div class="mt-smart-menu">
	<span class="close pointer"></span>
	<?php xnews_logo(); ?>
	<?php xnews_nav_mobile(); ?>
	<?php xnews_socials(); ?>
</div>

<div class="mt-outer-wrap">

<?php xnews_header(); ?>
<?php if($pagetop=="on") { ?>
<div class="container">
	<div class="row mt-head">
		<div class="col-md-8 pull-left">
			<div class="mt-head-title pull-left"><?php if ( false == get_theme_mod( 't_p_last_rumor', false ) ) { $t_p_last_rumor = esc_html__("Last Rumor:", "xnews");  } else { $t_p_last_rumor = get_theme_mod( 't_p_last_rumor' ); } echo esc_html($t_p_last_rumor) ?></div>
			<div class="mt-head-aleft pull-left"></div>
			<div class="mt-head-aright pull-left"></div>
			<div class="mt-head-text pull-left">
				<div>
					<?php
					$item_nr = '9';
					$category = '';
					$tag = '';
					$args = array(
						'post_type'=>'post',
						'posts_per_page'=>$item_nr,
						'category_name'=>$category,
						'tag'=>$tag
					);
					$the_query = new WP_Query( $args );
					while ( $the_query->have_posts() ) : $the_query->the_post();
						?><div><a href="<?php echo get_the_permalink(); ?>"><?php echo get_the_title();?></a></div><?php
					endwhile;
					?>
				</div>
			</div>
		</div>
		<div class="col-md-4 pull-right">
			<?php if ( true == get_theme_mod( 'mt_header_date', false ) ) { ?><div class="mt-head-date"><?php echo date( 'd M' ); ?></div><?php } ?>
			<?php if ( true == get_theme_mod( 'mt_header_time', false ) ) { ?><div class="mt-head-clock"><div id="time-live">00:00<span>:00</span></div></div><?php } ?>
		</div>
	</div>
</div>
<?php } ?>
