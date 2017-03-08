<?php

load_theme_textdomain( 'wordpress_bootstrap_flatly', get_template_directory() . '/languages' );

add_action( 'widgets_init', 'register_bootstrap_custom_hero');

function register_bootstrap_custom_hero() {
    register_widget( 'bootstrap_custom_hero');
}

class bootstrap_custom_hero extends WP_Widget {

	function __construct() {
		
		parent::__construct(
		
			'bootstrap-widget-hero',
			__('Boot Strap Hero', 'devdmbootstrap3'),
			array('description' => __('Hero widgets for hero sidebars', 'devdmbootstrap3'))
			
		);
			
	}
	
    //what our widget instance looks like and does with our arguments
    function widget ( $args, $instance) {
        extract($args);

        $title = apply_filters('widget_title', $instance['title']);
        $menuname = $instance['menuname'];
        $buttontype = $instance['buttontype'];
        $buttonurl = get_permalink( $instance['buttonurl']);
        $iconurl = get_permalink( $instance['iconurl']);
        $icon5x = $instance['icon5x'];
        $icon2x = $instance['icon2x'];
        $icon1x = $instance['icon1x'];
        //if ( $title )
        //    echo $before_title . $title . $after_title;

        echo $before_widget;
        echo $before_title;
        echo "    <a href='" . $iconurl . "'>";
        echo "      <span class='" . $icon5x . "'>";
        echo "        <i class='" . $icon2x . "'></i>";
        echo "        <i class='" . $icon1x . "'></i>";
        echo "      </span>";
        echo "      <a href='". $buttonurl ."' type='button' class='btn " . $buttontype . " btn-lg btn-block'>" . $title . "</button>";
        echo "    </a>";
        echo $after_title;
        echo $after_widget;

            
    }

    //update the widget instance with our new params
    function update ($new_instance, $old_instance) {
        $instance = $old_instance;

        $instance['title'] = strip_tags($new_instance['title']);
        $instance['menuname'] = strip_tags($new_instance['menuname']);
        $instance['buttontype'] = strip_tags($new_instance['buttontype']);
        $instance['buttonurl'] = strip_tags($new_instance['buttonurl']);
        $instance['iconurl'] = strip_tags($new_instance['iconurl']);        
        $instance['icon5x'] = strip_tags($new_instance['icon5x']);  
        $instance['icon2x'] = strip_tags($new_instance['icon2x']);  
        $instance['icon1x'] = strip_tags($new_instance['icon1x']);  
        
        return $instance;
    }


    //show form info for customizing
    function form( $instance ) {

     $defaults = array ( 'title' => __('Install', 'devdmbootstrap3'), 
                         'menuname' => __('Menu Name', 'devdmbootstrap3'),
                         'buttontype' => 'btn-default',
                         'icon5x' => 'fa-stack fa-5x',
                         'icon2x' => 'fa fa-circle fa-stack-2x text-danger',
                         'icon1x' => 'fa fa-photo fa-stack-1x fa-inverse');
                         
     $instance = wp_parse_args( (array) $instance, $defaults );
    ?>
    <p>
        <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title','devdmbootstrap3'); ?>:</label>
        <input id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" style="width:100%;" />
    </p>
    <p>
        <label for="<?php echo $this->get_field_id( 'icon5x' ); ?>"><?php _e('Font Awesome 5x','devdmbootstrap3'); ?>:</label>
        <input id="<?php echo $this->get_field_id( 'icon5x' ); ?>" name="<?php echo $this->get_field_name( 'icon5x' ); ?>" value="<?php echo $instance['icon5x']; ?>" style="width:100%;" />
    </p>
    <p>
        <label for="<?php echo $this->get_field_id( 'icon2x' ); ?>"><?php _e('Font Awesome 2x','devdmbootstrap3'); ?>:</label>
        <input id="<?php echo $this->get_field_id( 'icon2x' ); ?>" name="<?php echo $this->get_field_name( 'icon2x' ); ?>" value="<?php echo $instance['icon2x']; ?>" style="width:100%;" />
    </p>
    <p>
        <label for="<?php echo $this->get_field_id( 'icon1x' ); ?>"><?php _e('Font Awesome 1x','devdmbootstrap3'); ?>:</label>
        <input id="<?php echo $this->get_field_id( 'icon1x' ); ?>" name="<?php echo $this->get_field_name( 'icon1x' ); ?>" value="<?php echo $instance['icon1x']; ?>" style="width:100%;" />
    </p>
     <p>
            <label for="<?php echo $this->get_field_id( 'buttonurl' ); ?>"><?php _e('Button URL','devdmbootstrap3'); ?>:</label>
            <select id="<?php echo $this->get_field_id( 'buttonurl' ); ?>" name="<?php echo $this->get_field_name( 'buttonurl' ); ?>" style="width:100%;" type="text">
                <?php

                    $pages = get_pages('sort_column=post_parent,menu_order');

                        echo "<option value=''>". __('Install','devdmbootstrap3') ."</option>";
                             foreach ($pages as $page) {
                                     echo "<option value='" . $page->ID . "' ". selected($instance['buttonurl'], $page->ID).">" . $page->post_title . "</option>";
                             }

                ?>
            </select>
     </p>
     <p>
            <label for="<?php echo $this->get_field_id( 'iconurl' ); ?>"><?php _e('Icon URL','devdmbootstrap3'); ?>:</label>
            <select id="<?php echo $this->get_field_id( 'iconurl' ); ?>" name="<?php echo $this->get_field_name( 'iconurl' ); ?>" style="width:100%;" type="text">
                <?php

                    $pages = get_pages('sort_column=post_parent,menu_order');

                        echo "<option value=''>". __('Install','devdmbootstrap3') ."</option>";
                             foreach ($pages as $page) {
                                     echo "<option value='" . $page->ID . "' ". selected($instance['iconurl'], $page->ID).">" . $page->post_title . "</option>";
                             }

                ?>
            </select>
     </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'buttontype' ); ?>"><?php _e('Button Type','devdmbootstrap3'); ?>:</label>
            <select id="<?php echo $this->get_field_id( 'buttontype' ); ?>" name="<?php echo $this->get_field_name( 'buttontype' ); ?>" style="width:100%;" type="text">
                <?php

                    echo "<option value='btn-default' ". selected($instance['buttontype'], 'btn-default').">Default</option>";
                    echo "<option value='btn-primary' ". selected($instance['buttontype'], 'btn-primary').">Primary</option>";
                    echo "<option value='btn-success' ". selected($instance['buttontype'], 'btn-success').">Success</option>";
                    echo "<option value='btn-info' ". selected($instance['buttontype'], 'btn-info').">Info</option>";
                    echo "<option value='btn-warning' ". selected($instance['buttontype'], 'btn-warning').">Warning</option>";
                    echo "<option value='btn-danger' ". selected($instance['buttontype'], 'btn-danger').">Danger</option>";
                    echo "<option value='btn-link' ". selected($instance['buttontype'], 'btn-link').">Link</option>";
                ?>
            </select>
        </p>

    <?php

    }
}


