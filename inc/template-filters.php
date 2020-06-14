<?php

add_filter( 'body_class', 'unax_body_classes' );

// Header
add_filter( 'nav_menu_item_args', 'unax_add_sub_toggles_to_main_menu', 10, 3 );

add_filter( 'unax_post_class', function() { return 'col-6'; } );
