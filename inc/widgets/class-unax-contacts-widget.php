<?php
/**
 * Template Functions
 *
 * @package unax
 */

defined( 'ABSPATH' ) || exit;

/**
 * Unax_Contacts_Widget class.
 */
class Unax_Contacts_Widget extends WP_Widget {

	/**
	 * Constructor
	 */
	public function __construct() {
		// Instantiate the parent object.
		parent::__construct(
			'unax_contacts',
			esc_html__( 'Contacts', 'unax' ),
			array(
				'description' => __( 'Show contacts from theme customizer.', 'unax' ),
			)
		);
	}


	/**
	 * Echoes the widget content.
	 *
	 * @param array $args     Display arguments including 'before_title', 'after_title', 'before_widget', and 'after_widget'.
	 * @param array $instance The settings for the particular instan.
	 */
	public function widget( $args, $instance ) {
		echo wp_kses_post( $args['before_widget'] );

		$instance_title = ! empty( $instance['title'] ) ? $instance['title'] : '';

		// Get widget title.
		$title = apply_filters( 'unax_contacts_widget_title', $instance_title );
		if ( ! empty( $title ) ) {
			echo wp_kses_post( $args['before_title'] );
			echo esc_html( $title );
			echo wp_kses( $args['after_title'], array( 'div' => array() ) );
		}

		// Markup for contacts data.
		$markup = '<a href="%1$s" class="%2$s" title="%3$s" target="_blank"><figure>%4$s</figure><span>%5$s</span></a>';
		
		// wp_kses allowed HTML tags for svg.
		$wp_kses_allowed_html = array( 
			'svg' => array(
				'id' => true,
				'xmlns' => true,
				'xmlns:dc' => true,
				'xmlns:cc' => true,
				'xmlns:rdf=' => true,
				'xmlns:svg' => true,
				'xmlns:xlink' => true,
				'version' => true,
				'viewbox' => true,
			),
			'metadata' => array(
				'id' => true,
				'xmlns:rdf' => true,
			),
			'defs' => array(
				'id' => true,
			),
			'path' => array(
				'id' => true,
				'style' => true,
				'd' => true,
			),
		);

		echo '<div class="contacts">';

		// Phone.
		$unax_contact_phone = get_theme_mod( 'unax_contact_phone', '' );
		if ( ! empty( $unax_contact_phone ) ) {
			$svg = file_get_contents( get_template_directory() . '/dist/icons/phone-solid-white.svg' );
			printf(
				wp_kses_post( $markup ),
				'tel:' . esc_attr( $unax_contact_phone ),
				'',
				esc_attr__( 'Phone', 'unax' ),
				wp_kses( $svg, $wp_kses_allowed_html ),
				esc_html( $unax_contact_phone )
			);
		}

		// Email.
		$unax_contact_email = get_theme_mod( 'unax_contact_email', '' );
		if ( ! empty( $unax_contact_email ) ) {
			$svg = file_get_contents( get_template_directory() . '/dist/icons/envelope-regular-white.svg' );
			printf(
				wp_kses_post( $markup ),
				'mailto:' . esc_attr( $unax_contact_email ),
				'',
				esc_attr__( 'Email', 'unax' ),
				wp_kses( $svg, $wp_kses_allowed_html ),
				esc_html( $unax_contact_email )
			);
		}

		// Address.
		$unax_contact_address     = get_theme_mod( 'unax_contact_address', '' );
		$unax_contact_address_map = get_theme_mod( 'unax_contact_address_map', '' );
		if ( ! empty( $unax_contact_address ) ) {
			$svg = file_get_contents( get_template_directory() . '/dist/icons/envelope-regular-white.svg' );
			printf(
				wp_kses_post( $markup ),
				! empty( $unax_contact_address_map ) ? esc_url( $unax_contact_address_map ) : '#',
				'',
				esc_attr__( 'Address', 'unax' ),
				wp_kses( $svg, $wp_kses_allowed_html ),
				esc_html( $unax_contact_address )
			);
		}

		// Working hours.
		$unax_contact_working_hours = get_theme_mod( 'unax_contact_working_hours', '' );
		if ( ! empty( $unax_contact_working_hours ) ) {
			$svg = file_get_contents( get_template_directory() . '/dist/icons/clock-regular-white.svg' );
			printf(
				wp_kses_post( $markup ),
				'#',
				'',
				esc_attr__( 'Working hours', 'unax' ),
				wp_kses( $svg, $wp_kses_allowed_html ),
				esc_html( $unax_contact_working_hours )
			);
		}

		echo '</div>';
		echo '<div class="socials">';

		// Facebook page.
		$unax_contact_facebook_page = get_theme_mod( 'unax_contact_facebook_page', '' );
		if ( ! empty( $unax_contact_facebook_page ) ) {
			$svg = file_get_contents( get_template_directory() . '/dist/icons/facebook-white.svg' );
			printf(
				wp_kses_post( $markup ),
				esc_url( $unax_contact_facebook_page ),
				'',
				esc_attr__( 'Facebook page', 'unax' ),
				wp_kses( $svg, $wp_kses_allowed_html ),
				''
			);
		}

		// Youtube.
		$unax_contact_youtube = get_theme_mod( 'unax_contact_youtube', '' );
		if ( ! empty( $unax_contact_youtube ) ) {
			$svg = file_get_contents( get_template_directory() . '/dist/icons/youtube-white.svg' );
			printf(
				wp_kses_post( $markup ),
				esc_url( $unax_contact_youtube ),
				'',
				esc_attr__( 'Youtube', 'unax' ),
				wp_kses( $svg, $wp_kses_allowed_html ),
				''
			);
		}

		// LinkedIn.
		$unax_contact_linkedin = get_theme_mod( 'unax_contact_linkedin', '' );
		if ( ! empty( $unax_contact_linkedin ) ) {
			$svg = file_get_contents( get_template_directory() . '/dist/icons/linkedin-white.svg' );
			printf(
				wp_kses_post( $markup ),
				esc_url( $unax_contact_linkedin ),
				'',
				esc_attr__( 'LinkedIn', 'unax' ),
				wp_kses( $svg, $wp_kses_allowed_html ),
				''
			);
		}

		// Skype.
		$unax_contact_skype = get_theme_mod( 'unax_contact_skype', '' );
		if ( ! empty( $unax_contact_skype ) ) {
			$svg = file_get_contents( get_template_directory() . '/dist/icons/skype-white.svg' );
			printf(
				wp_kses_post( $markup ),
				'skype:' . esc_attr( $unax_contact_skype ) . '?chat',
				'',
				esc_attr__( 'Skype', 'unax' ),
				wp_kses( $svg, $wp_kses_allowed_html ),
				''
			);
		}

		echo '</div>';

		echo wp_kses_post( $args['after_title'] );
	}


	/**
	 * Updates a particular instance of a widget.
	 *
	 * @param  array $new_instance New settings for this instance as input by the user via WP_Widget::form().
	 * @param  array $old_instance Old settings for this instance.
	 * @return array Settings to save or bool false to cancel saving.
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = array();

		$instance['title'] = ! empty( $new_instance['title'] ) ? sanitize_text_field( $new_instance['title'] ) : '';
		return $instance;
	}


	/**
	 * Outputs the settings update form.
	 *
	 * @param  array $instance Current settings.
	 */
	public function form( $instance ) {
		$title = isset( $instance['title'] ) ? $instance['title'] : esc_html__( 'Contacts', 'unax' );

		// Widget admin form.
		?>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>">
				<?php esc_html_e( 'Title', 'unax' ); ?>;
			</label>
			<input
				class="widefat"
				id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"
				name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>"
				type="text" value="<?php echo esc_attr( $title ); ?>" />
		</p>
		<?php
	}
}

/**
 * Register and load the widget.
 */
function unax_contacts_widget() {
	register_widget( 'Unax_Contacts_Widget' );
}
add_action( 'widgets_init', 'unax_contacts_widget' );
