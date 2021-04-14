<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package unax
 */

if ( ! function_exists( 'unax_wp_body_open' ) ) :
	/**
	 * Shim for sites older than 5.2.
	 *
	 * @link https://core.trac.wordpress.org/ticket/12563
	 */
	function unax_wp_body_open() {
		do_action( 'unax_wp_body_open' );
	}
endif;


if ( ! function_exists( 'unax_archive_header' ) ) {
	/**
	 * Archive header
	 */
	function unax_archive_header() {
		$prefix = '';
		$title  = __( 'Archives', 'unax' );

		if ( is_category() ) {
			$title  = single_cat_title( '', false );
			$prefix = __( 'Category', 'unax' );
		} elseif ( is_tag() ) {
			$title  = single_tag_title( '', false );
			$prefix = __( 'Tag', 'unax' );
		} elseif ( is_author() ) {
			$title  = get_the_author();
			$prefix = __( 'Author', 'unax' );
		} elseif ( is_year() ) {
			$title  = get_the_date( _x( 'Y', 'yearly archives date format', 'unax' ) );
			$prefix = __( 'Year', 'unax' );
		} elseif ( is_month() ) {
			$title  = get_the_date( _x( 'F Y', 'monthly archives date format', 'unax' ) );
			$prefix = __( 'Month', 'unax' );
		} elseif ( is_day() ) {
			$title  = get_the_date( _x( 'F j, Y', 'daily archives date format', 'unax' ) );
			$prefix = __( 'Day', 'unax' );
		} elseif ( is_tax( 'post_format' ) ) {
			if ( is_tax( 'post_format', 'post-format-aside' ) ) {
				$title = __( 'Asides', 'unax' );
			} elseif ( is_tax( 'post_format', 'post-format-gallery' ) ) {
				$title = __( 'Galleries', 'unax' );
			} elseif ( is_tax( 'post_format', 'post-format-image' ) ) {
				$title = __( 'Images', 'unax' );
			} elseif ( is_tax( 'post_format', 'post-format-video' ) ) {
				$title = __( 'Videos', 'unax' );
			} elseif ( is_tax( 'post_format', 'post-format-quote' ) ) {
				$title = __( 'Quotes', 'unax' );
			} elseif ( is_tax( 'post_format', 'post-format-link' ) ) {
				$title = __( 'Links', 'unax' );
			} elseif ( is_tax( 'post_format', 'post-format-status' ) ) {
				$title = __( 'Statuses', 'unax' );
			} elseif ( is_tax( 'post_format', 'post-format-audio' ) ) {
				$title = __( 'Audio', 'unax' );
			} elseif ( is_tax( 'post_format', 'post-format-chat' ) ) {
				$title = __( 'Chats', 'unax' );
			}
		} elseif ( is_post_type_archive() ) {
			$title  = post_type_archive_title( '', false );
			$prefix = __( 'Archives', 'unax' );
		} elseif ( is_tax() ) {
			$queried_object = get_queried_object();
			if ( $queried_object ) {
				$tax    = get_taxonomy( $queried_object->taxonomy );
				$title  = single_term_title( '', false );
				$prefix = sprintf(
					/* translators: %s: Taxonomy singular name. */
					_x( '%s:', 'taxonomy term archive title prefix', 'unax' ),
					$tax->labels->singular_name
				);
			}
		}

		printf(
			'<h1 class="page-title">%s: %s</h1>',
			esc_html( $prefix ),
			esc_html( $title )
		);

		the_archive_description( '<div class="archive-description">', '</div>' );
	}
}


if ( ! function_exists( 'unax_posted_on' ) ) :
	/**
	 * Prints HTML with meta information for the current post-date/time.
	 */
	function unax_posted_on() {
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';

		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
		}

		$date_format = apply_filters( 'unax_posted_on_format', 'M j, Y' );

		$time_string = sprintf(
			$time_string,
			esc_attr( get_the_date( DATE_W3C ) ),
			esc_html( get_the_date( $date_format ) ),
			esc_attr( get_the_modified_date( DATE_W3C ) ),
			esc_html( get_the_modified_date( $date_format ) )
		);

		$posted_on = sprintf(
			/* translators: %s: post date. */
			esc_html_x( 'Posted on %s', 'post date', 'unax' ),
			'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
		);

		$date = '<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>';

		echo '<span class="posted-on">' . $date . '</span>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
	}
endif;


if ( ! function_exists( 'unax_posted_by' ) ) :
	/**
	 * Prints HTML with meta information for the current author.
	 */
	function unax_posted_by() {
		$byline = sprintf(
			/* translators: %s: post author. */
			esc_html_x( 'by %s', 'post author', 'unax' ),
			'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
		);

		echo '<span class="byline"> ' . $byline . '</span>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
	}
endif;


if ( ! function_exists( 'unax_entry_footer' ) ) :
	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 */
	function unax_entry_footer() {
		// Hide category and tag text for pages.
		if ( 'post' === get_post_type() ) {
			/* translators: used between list items, there is a space after the comma */
			$tags_list = get_the_tag_list( '', esc_html_x( ', ', 'list item separator', 'unax' ) );
			if ( $tags_list ) {
				/* translators: 1: list of tags. */
				printf( '<span class="tags-links">' . esc_html__( 'Tagged', 'unax' ) . ': %1$s</span>', $tags_list ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			}
		}

		if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
			echo ' <span class="comments-link">';
			comments_popup_link(
				sprintf(
					wp_kses(
						/* translators: %s: post title */
						__( 'Leave a Comment<span class="screen-reader-text"> on %s</span>', 'unax' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					wp_kses_post( get_the_title() )
				)
			);
			echo '</span>';
		}

		edit_post_link(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Edit <span class="screen-reader-text">%s</span>', 'unax' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				wp_kses_post( get_the_title() )
			),
			'<div class="mt-3"><span class="edit-link">',
			'</span></div>'
		);
	}
endif;


if ( ! function_exists( 'unax_post_thumbnail' ) ) :
	/**
	 * Displays an optional post thumbnail.
	 *
	 * Wraps the post thumbnail in an anchor element on index views, or a div
	 * element when on single views.
	 */
	function unax_post_thumbnail() {
		if ( post_password_required() || is_attachment() ) {
			return;
		}

		$thumbnail_wrapper_class = apply_filters( 'unax_thumbnail_wrapper_class', 'post-thumbnail-wrapper' );

		$thumbnail_class_default = get_post_type() === 'post' && ! is_single() ? 'card-img-top' : '';
		$thumbnail_class = apply_filters( 'unax_thumbnail_class', $thumbnail_class_default );

		if ( has_post_thumbnail() ) :
			return printf(
				'<div class="%s">%s</div>',
				esc_attr( $thumbnail_wrapper_class ),
				get_the_post_thumbnail(
					null,
					'post-thumbnail',
					[ 'class' => $thumbnail_class ]
				)
			);
		endif;
	}

endif;
