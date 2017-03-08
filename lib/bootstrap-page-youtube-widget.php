<?php

load_theme_textdomain( 'wordpress_bootstrap_flatly', get_template_directory() . '/languages' );

add_action( 'widgets_init', 'register_bootstrap_page_youtube_widget');

function register_bootstrap_page_youtube_widget() {
    register_widget( 'bootstrap_page_youtube_widget');
}

class bootstrap_page_youtube_widget extends WP_Widget {

	function __construct() {
		
		parent::__construct(
		
			'bootstrap-page-youtube-widget',
			__('Youtube Widget for page youtube', 'wordpress_bootstrap_flatly'),
			array('description' => __('You can add movie to page Youtube', 'wordpress_bootstrap_flatly'))
			
		);
			
	}
	
    //what our widget instance looks like and does with our arguments
    function widget ( $args, $instance) {
        extract($args);

        $panel_color = $instance['panel_color'];
        $panel_icon = $instance['panel_icon'];
        $title = $instance['title'];
        $time = $instance['time'];
        $embed = $instance['embed'];
        echo "<div class='separator text-muted'>";
        echo "    <time>". $time ."</time>";
        echo "</div>";
        echo "<article class='panel ". $panel_color ." panel-outline'>";
        echo "    <div class='panel-heading icon'>";
        echo "        <i class='". $panel_icon ."'></i>";
        echo "    </div>";
        echo "    <div class='panel-body'>";
        echo "    <div class='embed-responsive embed-responsive-16by9'>";
        echo "        <iframe class='embed-responsive-item' src='". $embed ."'></iframe>";
        echo "    </div>";
        echo "    </div>";
        echo "</article>";

            
    }

    //update the widget instance with our new params
    function update ($new_instance, $old_instance) {
        $instance = $old_instance;
		$instance['title'] = sanitize_text_field( $new_instance['title'] );
        $instance['panel_color'] = strip_tags($new_instance['panel_color']);
        $instance['panel_icon'] = strip_tags($new_instance['panel_icon']);
        $instance['time'] = strip_tags($new_instance['time']);
        $instance['embed'] = strip_tags($new_instance['embed']);

        return $instance;
    }


    //show form info for customizing
    function form( $instance ) {

     $defaults = array ( 'panel_color' => __('panel-primary', 'wordpress_bootstrap_flatly'), 
                         'panel_icon' => __('glyphicon glyphicon-picture', 'wordpress_bootstrap_flatly'),
                         'time' => __('5 gru 2016', 'wordpress_bootstrap_flatly'),
                         'embed' => __('https://www.youtube.com/embed/6MUYBVGOcYk', 'wordpress_bootstrap_flatly'),
                         'title' => __('I-NEX - a Very Nice Linux Utility', 'wordpress_bootstrap_flatly'));

                         
     $instance = wp_parse_args( (array) $instance, $defaults );
    ?>
    <p>
        <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Panel Title','wordpress_bootstrap_flatly'); ?>:</label>
        <input id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" style="width:100%;" />
    </p>
    <p>
        <label for="<?php echo $this->get_field_id( 'time' ); ?>"><?php _e('Time','wordpress_bootstrap_flatly'); ?>:</label>
        <input id="<?php echo $this->get_field_id( 'time' ); ?>" name="<?php echo $this->get_field_name( 'time' ); ?>" value="<?php echo $instance['time']; ?>" style="width:100%;" />
    </p>
    <p>
        <label for="<?php echo $this->get_field_id( 'embed' ); ?>"><?php _e('Embed URL','wordpress_bootstrap_flatly'); ?>:</label>
        <input id="<?php echo $this->get_field_id( 'embed' ); ?>" name="<?php echo $this->get_field_name( 'embed' ); ?>" value="<?php echo $instance['embed']; ?>" style="width:100%;" />
    </p>
    <p>
        <label for="<?php echo $this->get_field_id( 'panel_icon' ); ?>"><?php _e('Font Awesome Icon or Glyphicon','wordpress_bootstrap_flatly'); ?>:</label>
        <input id="<?php echo $this->get_field_id( 'panel_icon' ); ?>" name="<?php echo $this->get_field_name( 'panel_icon' ); ?>" value="<?php echo $instance['panel_icon']; ?>" style="width:100%;" />
    </p>
    <p>
            <label for="<?php echo $this->get_field_id( 'panel_color' ); ?>"><?php _e('Panel Type','wordpress_bootstrap_flatly'); ?>:</label>
            <select id="<?php echo $this->get_field_id( 'panel_color' ); ?>" name="<?php echo $this->get_field_name( 'panel_color' ); ?>" style="width:100%;" type="text">
                <?php

                    echo "<option value='panel-default' ". selected($instance['panel_color'], 'panel-default').">Default</option>";
                    echo "<option value='panel-primary' ". selected($instance['panel_color'], 'panel-primary').">Primary</option>";
                    echo "<option value='panel-success' ". selected($instance['panel_color'], 'panel-success').">Success</option>";
                    echo "<option value='panel-info' ". selected($instance['panel_color'], 'panel-info').">Info</option>";
                    echo "<option value='panel-warning' ". selected($instance['panel_color'], 'panel-warning').">Warning</option>";
                    echo "<option value='panel-danger' ". selected($instance['panel_color'], 'panel-danger').">Danger</option>";
                ?>
            </select>
    </p>
    <?php

    }
}
