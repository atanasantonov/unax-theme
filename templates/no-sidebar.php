<?php
/**
 * Template Name: No Sidebar
 *
 * The template displays page without the sidebar
 *
 * @package Unax
 */

get_header();

?>
	<div id="content" class="site-content no-sidebar <?php echo esc_attr( apply_filters( 'unax_container_class', 'container' ) ); ?>">

		<main id="primary" class="site-main">

			<?php
			while ( have_posts() ) :
				the_post();

				get_template_part( 'template-parts/content', 'page' );

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
