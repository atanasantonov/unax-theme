<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Unax
 */

if( is_singular() ) :

	get_template_part( 'template-parts/content-single', get_post_type() );

else :

	get_template_part( 'template-parts/content-card', get_post_type() );

endif;
