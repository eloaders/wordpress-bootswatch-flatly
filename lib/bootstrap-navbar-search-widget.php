<?php

load_theme_textdomain( 'wordpress_bootstrap_flatly', get_template_directory() . '/languages' );

add_action( 'widgets_init', 'register_bootstrap_navbar_search_widget');

function register_bootstrap_navbar_search_widget() {
    register_widget( 'bootstrap_navbar_search_widget');
}

class bootstrap_navbar_search_widget extends WP_Widget {

	function __construct() {
		
		parent::__construct(
		
			'bootstrap-navbar-search-widget',
			__('Search widget for bootstrap navbar', 'wordpress_bootstrap_flatly'),
			array('description' => __('Display bootstrap search in navbar', 'wordpress_bootstrap_flatly'))
			
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
        echo "<form class='navbar-form navbar-left' role='search' method='POST' action='/'>";
        echo "    <div class='form-group'>";
        echo "        <input id='s' name='s' type='text' class='form-control' placeholder='" . esc_attr_e( 'Search &hellip;', 'alienship' ) . "' value='" . esc_attr( get_search_query()) . "'>";
        echo "    </div>";
        echo "    <button type='submit' class='btn btn-default'><i class='fa fa-lg fa-search'></i></button>";
        echo "</form>";
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
