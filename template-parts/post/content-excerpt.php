<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Unax
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
	</header><!-- .entry-header -->

	<div class="row">
		<?php $unax_entry_summary_class = has_post_thumbnail() ? 'col-8 col-lg-9' : 'col-12'; ?>
		<?php if ( has_post_thumbnail() ) : ?>
		<div class="entry-thumbnail col-4 col-lg-3">
			<?php unax_post_thumbnail(); ?>
		</div>
		<?php endif; ?>
		<div class="entry-summary <?php echo esc_attr( $unax_entry_summary_class ); ?>">
		<?php
			$unax_read_more = sprintf(
				'... <a href="%s" class="read-more">%s <span class="screen-reader-text">%s</span></a>',
				esc_url( get_the_permalink() ),
				apply_filters( 'unax_text_more', esc_html__( 'Continue reading', 'unax' ) ),
				get_the_title()
			);

			$unax_read_more = wp_trim_words( get_the_excerpt(), 55, $unax_read_more );

			echo wp_kses( $unax_read_more, 'post' );
			?>
		</div>
	</div><!-- .entry-summary -->

</article><!-- #post-<?php the_ID(); ?> -->
