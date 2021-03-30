<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Unax
 */

get_header();

?>
	<div id="content" class="site-content <?php echo esc_attr( apply_filters( 'unax_container_class', 'container' ) ); ?>">

		<main id="primary" class="site-main">

			<?php if ( have_posts() ) : ?>

				<header class="page-header">
					<?php unax_archive_header(); ?>
				</header><!-- .page-header -->

				<div class="<?php echo esc_attr( unax_loop_class() ); ?>">

				<?php

				/* Start the Loop */
				while ( have_posts() ) :
					the_post();

					/*
					 * Include the Post-Type-specific template for the content.
					 * If you want to override this in a child theme, then include a file
					 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
					 */
					get_template_part( 'template-parts/content', get_post_type() );
				endwhile;

				?>

				</div><!-- .loop -->

				<?php

				the_posts_navigation();
			else :
				get_template_part( 'template-parts/content', 'none' );
			endif;
			?>

		</main><!-- #main -->

		<?php get_sidebar(); ?>

	</div><!-- #content -->
<?php

get_footer();
