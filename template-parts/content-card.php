<?php
/**
 * Template part for displaying card
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Unax
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( apply_filters( 'unax_card_post_class', 'card mb-4' ) ); ?>>

	<a class="thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
		<?php unax_post_thumbnail(); ?>
	</a>

	<div class="card-body">

		<?php the_title( '<h2 class="entry-title card-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?>

		<p class="card-text">
			<?php

				$more = apply_filters( 'unax_conent_more', __( '<br><span class="more">Read more</span>', 'unax-theme' ) );

				echo wp_trim_words( get_the_excerpt(), 15, $more );

			?>
		</p>

	</div><!-- .card-body -->

	<div class="entry-meta card-footer text-muted">
		<?php unax_posted_on(); ?>
	</div>

</article><!-- #post-<?php the_ID(); ?> -->
