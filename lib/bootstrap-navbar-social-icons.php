<?php

load_theme_textdomain( 'wordpress_bootstrap_flatly', get_template_directory() . '/languages' );

add_action( 'widgets_init', 'register_bootstrap_navbar_social_icons');

function register_bootstrap_navbar_social_icons() {
    register_widget( 'bootstrap_navbar_social_icons');
}

class bootstrap_navbar_social_icons extends WP_Widget {

	function __construct() {
		
		parent::__construct(
		
			'bootstrap-navbar-social-icons',
			__('Social Icons in navbar', 'wordpress_bootstrap_flatly'),
			array('description' => __('Social Icons in top navbar', 'wordpress_bootstrap_flatly'))
			
		);
			
	}
	
    //what our widget instance looks like and does with our arguments
    function widget ( $args, $instance) {
        extract($args);


        $icon = $instance['icon'];
        $icon_url = $instance['icon_url'];
        //if ( $title )
        //    echo $before_title . $title . $after_title;
        
        echo $before_widget;
        echo "<a href='" . $icon_url . "' target='_blank'><i class='" . $icon . "'></i></a>";
        echo $after_widget;

            
    }

    //update the widget instance with our new params
    function update ($new_instance, $old_instance) {
        $instance = $old_instance;

        $instance['icon_url'] = strip_tags($new_instance['icon_url']);
        $instance['icon'] = strip_tags($new_instance['icon']);
        
        return $instance;
    }


    //show form info for customizing
    function form( $instance ) {

     $defaults = array ( 'icon_url' => __('https://github.com/i-nex/I-Nex', 'wordpress_bootstrap_flatly'), 
                         'icon' => __('fa fa-lg fa-github', 'wordpress_bootstrap_flatly'));

                         
     $instance = wp_parse_args( (array) $instance, $defaults );
    ?>
    <p>
        <label for="<?php echo $this->get_field_id( 'icon_url' ); ?>"><?php _e('Icon URL','wordpress_bootstrap_flatly'); ?>:</label>
        <input id="<?php echo $this->get_field_id( 'icon_url' ); ?>" name="<?php echo $this->get_field_name( 'icon_url' ); ?>" value="<?php echo $instance['icon_url']; ?>" style="width:100%;" />
    </p>
    <p>
        <label for="<?php echo $this->get_field_id( 'icon' ); ?>"><?php _e('Font Awesome Icon','wordpress_bootstrap_flatly'); ?>:</label>
        <input id="<?php echo $this->get_field_id( 'icon' ); ?>" name="<?php echo $this->get_field_name( 'icon' ); ?>" value="<?php echo $instance['icon']; ?>" style="width:100%;" />
    </p>

    <?php

    }
}
