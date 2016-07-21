<?php

/**
 * Class Date_Field
 */
class Date_Field extends WP_Widget {

	/**
	 * Id/Machine name of the Widget.
	 * @var string|void
	 */
	public $id;

	/**
	 * Human readable name of the Widget.
	 * @var string|void
	 */
	public $name;

	/**
	 * Options for the widget.
	 * @var array
	 */
	public $widget_options;

	/**
	 * Register Widget with WordPress.
	 */
	function __construct() {
		$this->id             = __( 'Date_Field', 'ust_date_field' );
		$this->name           = __( 'Date Field', 'ust_date_field' );
		$this->widget_options = array(
			'description',
			__( 'Creates a date picker field for users on your site.',
				'ust_date_field' )
		);
		parent::__construct( $this->id, $this->name, $this->name );
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
			echo $args['before_title'] . apply_filters( 'widget_title',
					$instance['title'] ) . $args['after_title'];
		}
		echo "<input type='text' id='ustDatePicker' data-format='{$instance["date_format"]}'/>";
		echo $args['after_widget'];
	}

	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 *
	 * @return void
	 */
	public function form( $instance ) {
		$title       = ! empty( $instance['title'] ) ? $instance['title'] : __( 'New title',
			'ust_date_field' );
		$date_format = ! empty( $instance['date_format'] ) ? $instance['date_format'] : __( 'mm-dd-yyyy',
			'ust_date_field' );
		?>
		<p>
			<label
				for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php _e( esc_attr( 'Title:' ) ); ?></label>
			<input class="widefat"
			       id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"
			       name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>"
			       type="text" value="<?php echo esc_attr( $title ); ?>">
		</p>
		<p>
			<label
				for="<?php echo esc_attr( $this->get_field_id( 'date_format' ) ); ?>"><?php _e( esc_attr( 'Date Format:' ) ); ?></label>
			<input class="widefat"
			       id="<?php echo esc_attr( $this->get_field_id( 'date_format' ) ); ?>"
			       name="<?php echo esc_attr( $this->get_field_name( 'date_format' ) ); ?>"
			       type="text" value="<?php echo esc_attr( $date_format ); ?>">
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
		$instance                = array();
		$instance['title']       = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		$instance['date_format'] = ( ! empty( $new_instance['date_format'] ) ) ? strip_tags( $new_instance['date_format'] ) : '';

		return $instance;
	}

}
