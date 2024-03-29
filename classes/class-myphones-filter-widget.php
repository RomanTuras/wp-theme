<?php

class FilterWidget extends WP_Widget{
	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'filter_manufacturer_widget', // Base ID
			esc_html__( 'Manufacturer Filter', 'text_domain' ), // Name
			array( 'description' => esc_html__( 'A Manufacturer Filter Widget', 'text_domain' ), ) // Args
		);
	}

	/**
	 * Front-end display of widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args     Widget arguments.
	 * @param array $instance Saved values from database.
	 */
	public function widget( $args, $instance ) {
		echo $args['before_widget'];
		if ( ! empty( $instance['title'] ) ) {
			echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];
		}
		$terms = get_terms( array(
						'taxonomy' => 'manufacturer',
						'hide_empty' => false,  ) );

		$output = '<p style="margin-top: 30px;">Manufacturer:</p>';
		foreach($terms as $term){
		$output .= '<input id="' . $term->name . '" class="manufacturerCheckbox" type="checkbox" name="terms" value="' . $term->name . '" /> ' .  $term->name . '<br />';
		}
		echo $output;

		$terms = get_terms( array(
			'taxonomy' => 'reliable',
			'hide_empty' => false,  ) );
		$output = '<p style="margin-top: 30px;">Reliable:</p>';
		foreach($terms as $term){
		$output .= '<input id="' . $term->name . '" class="reliableCheckbox" type="checkbox" name="terms" value="' . $term->name . '" /> ' .  $term->name . '<br />';
		}
		echo $output;

		echo '<button id="submit" class="btn btn-secondary" type="submit">show</button>';
		echo $args['after_widget'];
	}

	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
	public function form( $instance ) {
		$title = ! empty( $instance['title'] ) ? $instance['title'] : esc_html__( 'New title', 'text_domain' );
		?>
		<p>
		<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_attr_e( 'Title:', 'text_domain' ); ?></label> 
		<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
		</p>
		<?php 
	}

	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @see WP_Widget::update()
	 *
	 * @param array $new_instance Values just sent to be saved.
	 * @param array $old_instance Previously saved values from database.
	 *
	 * @return array Updated safe values to be saved.
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? sanitize_text_field( $new_instance['title'] ) : '';

		return $instance;
	}
}