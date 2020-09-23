<?php
/**
 * Template part for displaying single post
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Unax
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( apply_filters( 'unax_post_single_class', '' ) ); ?>>

	<header class="entry-header">

		<div class="thumbnail">
			<?php unax_post_thumbnail(); ?>
		</div>

		<h1 class="entry-title"><?php the_title(); ?></h1>

		<div class="entry-meta">
			<strong class="entry-category"><?php the_category( ', ' ); ?></strong>
		</div>

	</header><!-- .entry-header -->

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
