<?php
/**
 * Template Name: Full Width
 *
 * The template displays full-width page without the sidebar
 *
 * @package Unax
 */

get_header();

?>
	<div id="content" class="site-content no-sidebar <?php echo esc_attr( apply_filters( 'unax_container_fluid_class', 'container-fluid' ) ); ?>">

		<main id="primary" class="site-main">

			<?php
			while ( have_posts() ) :
				the_post();

				get_template_part( 'template-parts/content', 'page-full-width' );

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;
			endwhile; // End of the loop.
			?>

		</main><!-- #main -->

	</div><!-- #content -->
<?php

get_footer();
