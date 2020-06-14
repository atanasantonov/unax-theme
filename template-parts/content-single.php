<?php
/**
 * Template part for displaying single post
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Unax
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( apply_filters( 'unax_post_single_class', 'card mb-4' ) ); ?>>

	<header class="entry-header">

		<?php unax_post_thumbnail(); ?>

		<div class="entry-category"><?php the_category( ', ' ); ?></div>

		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

		<div class="entry-meta">
			<?php
			unax_posted_on();
			unax_posted_by();
			?>
		</div><!-- .entry-meta -->

	</header><!-- .entry-header -->

	<div class="entry-content">

		<?php
		the_content(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'unax' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				wp_kses_post( get_the_title() )
			)
		);

		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'unax' ),
				'after'  => '</div>',
			)
		);
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php unax_entry_footer(); ?>
	</footer><!-- .entry-footer -->

</article><!-- #post-<?php the_ID(); ?> -->
