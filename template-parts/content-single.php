<?php
/**
 * Template part for displaying single post
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Unax
 */

if ( ! empty( get_the_title() ) ) {
	the_title( '<h1 class="entry-title">', '</h1>' );
}
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( apply_filters( 'unax_post_single_class', '' ) ); ?>>

	<?php if ( ! function_exists( 'is_product' ) || ! is_product() ) : ?>
	<header class="entry-header">

		<?php unax_post_thumbnail(); ?>


		<div class="entry-meta row">
			<div class="entry-category col-lg-9 order-2 order-lg-1">
				<?php esc_html_e( 'Category:', 'unax' ); ?>
				<?php the_category( ', ' ); ?>
			</div>
			<div class="col-lg-3 order-1 order-lg-2 text-lg-right">
				<?php unax_posted_on(); ?>
			</div>
		</div>

	</header><!-- .entry-header -->
	<?php endif; ?>

	<div class="entry-content">
		<?php

		the_content();

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
