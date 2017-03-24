<?php

load_theme_textdomain( 'wordpress_bootstrap_flatly', get_template_directory() . '/languages' );

add_action( 'widgets_init', 'register_bootstrap_page_install_adsense_widget');

function register_bootstrap_page_install_adsense_widget() {
    register_widget( 'bootstrap_page_install_adsense_widget');
}

class bootstrap_page_install_adsense_widget extends WP_Widget {

	function __construct() {
		
		parent::__construct(
		
			'bootstrap-page-install-adsense-widget',
			__('Display ads in page install', 'wordpress_bootstrap_flatly'),
			array('description' => __('Adsense widget for page install', 'wordpress_bootstrap_flatly'))
			
		);
			
	}
	
    //what our widget instance looks like and does with our arguments
    function widget ( $args, $instance) {
        extract($args);

        $panel_color = $instance['panel_color'];
        $panel_icon = $instance['panel_icon'];
        $title = $instance['title'];
        $adsense_code = $instance['adsense_code'];
        //if ( $title )
        //    echo $before_title . $title . $after_title;
        
        echo "<article class='panel ". $panel_color ."'>";
        echo "    <div class='panel-heading icon'>";
        echo "        <i class='". $panel_icon ."fa fa-google'></i>";
        echo "    </div>";
        echo "    <div class='panel-body'>";
        echo $adsense_code;
        echo "    </div>";
        echo "</article>";

            
    }

    //update the widget instance with our new params
    function update ($new_instance, $old_instance) {
        $instance = $old_instance;
        
		if ( current_user_can( 'unfiltered_html' ) ) {
			$instance['adsense_code'] = $new_instance['adsense_code'];
		} else {
			$instance['adsense_code'] = wp_kses_post( $new_instance['adsense_code'] );
		}
		$instance['title'] = sanitize_text_field( $new_instance['title'] );
        $instance['panel_color'] = strip_tags($new_instance['panel_color']);
        $instance['panel_icon'] = strip_tags($new_instance['panel_icon']);
        
        
        return $instance;
    }


    //show form info for customizing
    function form( $instance ) {

     $defaults = array ( 'panel_color' => __('panel-primary', 'wordpress_bootstrap_flatly'), 
                         'panel_icon' => __('fa fa-google', 'wordpress_bootstrap_flatly'),
                         'title' => __('Adsense', 'wordpress_bootstrap_flatly'),
                         'adsense_code' => __('', 'wordpress_bootstrap_flatly'));

                         
     $instance = wp_parse_args( (array) $instance, $defaults );
    ?>
    <p>
        <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Ads Title','wordpress_bootstrap_flatly'); ?>:</label>
        <input id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" style="width:100%;" />
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
    <p>
        <label for="<?php echo $this->get_field_id( 'adsense_code' ); ?>"><?php _e( 'Adsense Code:' ); ?></label>
		<textarea class="widefat" rows="16" cols="20" id="<?php echo $this->get_field_id('adsense_code'); ?>" name="<?php echo $this->get_field_name('adsense_code'); ?>"><?php echo esc_textarea( $instance['adsense_code'] ); ?></textarea>
    </p>
    <?php

    }
}
