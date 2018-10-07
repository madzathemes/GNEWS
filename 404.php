<?php get_header(); ?>
<?php if ( false == get_theme_mod( 't_p_nothing_found', false ) ) { $t_p_nothing_found = esc_html__("Page not found", "xnews");  } else { $t_p_nothing_found = get_theme_mod( 't_p_nothing_found' ); }?>
<div class="mt-container-wrap">
	<div class="container mt-content-container">
			<div class="heading-404">
				<h2><?php esc_html_e( '404', 'xnews' ); ?></h2>
				<h3><?php echo esc_html($t_p_nothing_found); ?></h3>
				<p><?php esc_html_e( 'The requested term was not found on this server. That is all we know.', 'xnews' ); ?></p>
			</div>
	</div>
</div>
<?php get_footer(); ?>
