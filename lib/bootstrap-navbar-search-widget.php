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


        $placeholder = $instance['placeholder'];
        $icon = $instance['icon'];
        //if ( $title )
        //    echo $before_title . $title . $after_title;
        
        echo $before_widget;
        echo "<form class='navbar-form navbar-left' role='search' method='POST' action='/'>";
        echo "    <div class='form-group'>";
        echo "        <input id='s' name='s' type='text' class='form-control' placeholder='" . $placeholder . "' value='" . esc_attr( get_search_query()) . "'>";
        echo "    </div>";
        echo "    <button type='submit' class='btn btn-default'><i class='". $icon ."'></i></button>";
        echo "</form>";
        echo $after_widget;

            
    }

    //update the widget instance with our new params
    function update ($new_instance, $old_instance) {
        $instance = $old_instance;

        $instance['placeholder'] = strip_tags($new_instance['placeholder']);
        $instance['icon'] = strip_tags($new_instance['icon']);
        return $instance;
    }


    //show form info for customizing
    function form( $instance ) {

     $defaults = array ( 'placeholder' => __('Search', 'wordpress_bootstrap_flatly'),
                         'icon' => __('fa fa-lg fa-search', 'wordpress_bootstrap_flatly'));

                         
     $instance = wp_parse_args( (array) $instance, $defaults );
    ?>
    <p>
        <label for="<?php echo $this->get_field_id( 'placeholder' ); ?>"><?php _e('Placeholder','wordpress_bootstrap_flatly'); ?>:</label>
        <input id="<?php echo $this->get_field_id( 'placeholder' ); ?>" name="<?php echo $this->get_field_name( 'placeholder' ); ?>" value="<?php echo $instance['placeholder']; ?>" style="width:100%;" />
    </p>
    <p>
        <label for="<?php echo $this->get_field_id( 'icon' ); ?>"><?php _e('Font Awesome Icon','wordpress_bootstrap_flatly'); ?>:</label>
        <input id="<?php echo $this->get_field_id( 'icon' ); ?>" name="<?php echo $this->get_field_name( 'icon' ); ?>" value="<?php echo $instance['icon']; ?>" style="width:100%;" />
    </p>

    <?php

    }
}
