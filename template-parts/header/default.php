<?php
/**
 * Displays the default header
 *
 * @package Unax
 */

?>

<div class="header-top">
	<div class="<?php echo esc_attr( apply_filters( 'unax_container_class', 'container' ) ); ?>">
		<div class="site-branding">
		<?php

		if ( has_custom_logo() ) :
			the_custom_logo();
		endif;

		if ( display_header_text() ) :

			?>
			<div class="site-branding-texts">

				<?php if ( is_home() || is_front_page() ) : ?>
				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php echo esc_html( bloginfo( 'name' ) ); ?></a></h1>
				<?php else : ?>
				<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php echo esc_html( bloginfo( 'name' ) ); ?></a></p>
				<?php endif; ?>

				<?php $unax_description = get_bloginfo( 'description', 'display' ); ?>
				<?php if ( $unax_description ) : ?>
				<p class="site-description"><?php echo esc_html( $unax_description ); ?></p>
				<?php endif; ?>

			</div><!-- .site-branding-text -->
			<?php endif; ?>

		</div><!-- .site-branding -->

		<?php if ( is_active_sidebar( 'header-widget-area' ) ) : ?>
		<div class="widget-area header-widget-area">
			<?php dynamic_sidebar( 'header-widget-area' ); ?>
		</div>
		<?php endif; ?>

	</div><!-- .container -->

</div><!-- .header-top -->
