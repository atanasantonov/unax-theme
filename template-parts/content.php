<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Unax
 */

if ( get_post_type() === 'post' ) {
	get_template_part( 'template-parts/content', apply_filters( 'unax_content', 'card' ) );
	return;
}

get_template_part( 'template-parts/content', get_post_type() );
