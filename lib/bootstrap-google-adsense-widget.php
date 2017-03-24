<?php

load_theme_textdomain( 'wordpress_bootstrap_flatly', get_template_directory() . '/languages' );

add_action( 'widgets_init', 'register_bootstrap_google_adsense_widget');

function register_bootstrap_google_adsense_widget() {
    register_widget( 'bootstrap_google_adsense_widget');
}

class bootstrap_google_adsense_widget extends WP_Widget {

	function __construct() {
		
		parent::__construct(
		
			'bootstrap-google-adsense-widget',
			__('Adsense Widget', 'wordpress_bootstrap_flatly'),
			array('description' => __('Adsense Widget for left and right sidebar', 'wordpress_bootstrap_flatly'))
			
		);
			
	}
	
    //what our widget instance looks like and does with our arguments
    function widget ( $args, $instance) {
        extract($args);

        $title = $instance['title'];
        $adsense_code = $instance['adsense_code'];

        //if ( $title )
        //    echo $before_title . $title . $after_title;
            echo $before_widget;
            echo $before_title;
            echo $title;
            echo $after_title;
            echo $adsense_code;
            echo $after_widget;
    }

    //update the widget instance with our new params
    function update ($new_instance, $old_instance) {
        $instance = $old_instance;
        
		if ( current_user_can( 'unfiltered_html' ) ) {
			$instance['adsense_code'] = $new_instance['adsense_code'];
		} else {
			$instance['adsense_code'] = wp_kses_post( $new_instance['adsense_code'] );
		}
        $instance['title'] = strip_tags($new_instance['title']);
        return $instance;
    }


    //show form info for customizing
    function form( $instance ) {

     $defaults = array ( 'adsense_code' => __('', 'wordpress_bootstrap_flatly'));

                         
     $instance = wp_parse_args( (array) $instance, $defaults );
    ?>
    <p>
        <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Panel Title','wordpress_bootstrap_flatly'); ?>:</label>
        <input id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" style="width:100%;" />
    </p>
    <p>
        <label for="<?php echo $this->get_field_id( 'adsense_code' ); ?>"><?php _e( 'Adsense Code:' ); ?></label>
		<textarea class="widefat" rows="16" cols="20" id="<?php echo $this->get_field_id('adsense_code'); ?>" name="<?php echo $this->get_field_name('adsense_code'); ?>"><?php echo esc_textarea( $instance['adsense_code'] ); ?></textarea>
    </p>
    <?php

    }
}
