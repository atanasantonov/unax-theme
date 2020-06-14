<?php
/**
 * Displays the menu icon and modal
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since 1.0.0
 */

?>

<div class="menu-modal cover-modal header-footer-group show-modal active" data-modal-target-string=".menu-modal">

	<div class="menu-modal-inner modal-inner">

		<div class="menu-wrapper section-inner">

			<div class="menu-top">

				<button class="toggle close-nav-toggle fill-children-current-color" data-toggle-target=".menu-modal" data-toggle-body-class="showing-menu-modal" aria-expanded="false" data-set-focus=".menu-modal">
					<span class="screen-reader-text"><?php _e( 'Close menu', 'unax' ); ?></span>
					<i class="fas fa-times"></i>
				</button><!-- .nav-toggle -->

				<nav class="mobile-menu" aria-label="<?php esc_attr_e( 'Mobile menu', 'unax' ); ?>" role="navigation">

					<ul class="modal-menu">

					<?php
					wp_nav_menu(
						array(
							'container'      => '',
							'items_wrap'     => '%3$s',
							'show_toggles'   => true,
							'theme_location' => 'mobile-menu',
						)
					);
					?>

					</ul>

				</nav>
			</div><!-- .menu-top -->

		</div><!-- .menu-wrapper -->

	</div><!-- .menu-modal-inner -->

</div><!-- .menu-modal -->
