<?php
/**
 * Displays the menu icon and modal
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since 1.0.0
 */

?>

<div class="menu-modal cover-modal header-footer-group" data-modal-target-string=".menu-modal">

	<div class="menu-modal-inner modal-inner">

		<div class="menu-wrapper section-inner">

			<div class="menu-top">

				<button class="toggle close-nav-toggle fill-children-current-color" data-toggle-target=".menu-modal" data-toggle-body-class="showing-menu-modal" aria-expanded="false" data-set-focus=".menu-modal">
					<span class="screen-reader-text"><?php esc_html_e( 'Close menu', 'unax' ); ?></span>
					<i class="fas fa-times"></i>
				</button><!-- .nav-toggle -->

				<nav class="mobile-menu" aria-label="<?php esc_attr_e( 'Mobile menu', 'unax' ); ?>">
					<ul class="modal-menu">
					<?php
					if ( has_nav_menu( 'mobile' ) ) :
						wp_nav_menu(
							array(
								'container' => '',
								'container_class' => '',
								'items_wrap'      => '%3$s',
								'show_toggles'    => true,
								'theme_location'  => 'mobile',
							)
						);
					else :
						wp_nav_menu(
							array(
								'container'       => '',
								'container_class' => '',
								'items_wrap'      => '%3$s',
								'theme_location'  => 'primary-menu',
							)
						);
					endif;
					?>
					</ul>
				</nav>
			</div><!-- .menu-top -->

		</div><!-- .menu-wrapper -->

	</div><!-- .menu-modal-inner -->

</div><!-- .menu-modal -->
