<?php
/**
 * Template part for displaying single post
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Unax
 */

$post_content_class = apply_filters( 'unax_post_content_class', 'col-12 col-lg-10 mx-auto' );

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( apply_filters( 'unax_post_single_class', '' ) ); ?>>

	<header class="row entry-header">

		<div class="col-12">
			<?php unax_post_thumbnail(); ?>
		</div>

		<div class="<?php echo esc_attr( $post_content_class ) ?>">
			<strong class="text-uppercase"><?php the_category( ', ' ); ?></strong>
			<h1 class="entry-title"><?php the_title(); ?></h1>
		</div>

	</header><!-- .entry-header -->

	<div class="row">
		<div class="entry-content <?php echo esc_attr( $post_content_class ) ?>">
			<?php

			the_content();

			wp_link_pages(
				array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'unax' ),
					'after'  => '</div>',
				)
			);
			?>
		</div>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php unax_entry_footer(); ?>
	</footer><!-- .entry-footer -->

</article><!-- #post-<?php the_ID(); ?> -->
