<?php

load_theme_textdomain( 'wordpress_bootstrap_flatly', get_template_directory() . '/languages' );

add_action( 'widgets_init', 'register_bootstrap_page_install_widget');

function register_bootstrap_page_install_widget() {
    register_widget( 'bootstrap_page_install_widget');
}

class bootstrap_page_install_widget extends WP_Widget {

	function __construct() {
		
		parent::__construct(
		
			'bootstrap-page-install-widget',
			__('Install Widget for page install', 'wordpress_bootstrap_flatly'),
			array('description' => __('You can add distribution to page install', 'wordpress_bootstrap_flatly'))
			
		);
			
	}
	
    //what our widget instance looks like and does with our arguments
    function widget ( $args, $instance) {
        extract($args);

        $panel_color = $instance['panel_color'];
        $panel_icon = $instance['panel_icon'];
        $title = $instance['title'];
        $distro_sticker = $instance['distro_sticker'];
        $install_instructions = $instance['install_instructions'];
        $button_one_text = $instance['button_one_text'];
        $button_two_text = $instance['button_two_text'];
        $button_thre_text = $instance['button_thre_text'];
        $button_one_link = $instance['button_one_link'];
        $button_two_link = $instance['button_two_link'];
        $button_thre_link = $instance['button_thre_link'];
        $i_nex_version = $instance['i_nex_version'];
        $help_button_text = $instance['help_button_text'];
        $help_button_link = $instance['help_button_link'];
        //if ( $title )
        //    echo $before_title . $title . $after_title;
        
            echo "<article class='panel ". $panel_color ."'>";
    
            //<!-- Icon -->
            echo "<div class='panel-heading icon'>";
            echo "    <i class='". $panel_icon ."'></i>";
            echo "</div>";
            //<!-- /Icon -->
    
            //<!-- Heading -->
            echo "<div class='panel-heading'>";
            echo "    <h2 class='panel-title'>". $title ."</h2>";
            echo "</div>";
            //<!-- /Heading -->
    
            //<!-- Body -->
            echo "<div class='panel-body'>";
            echo "    <div class='list-group'>";
            echo "        <div class='list-group-item'>";
            echo "            <div class='media col-md-3'>";
            echo "                <figure>";
            echo "                    <img class='media-object img-rounded img-responsive'  src='". $distro_sticker ."'>";
            echo "                </figure>";
            echo "            </div>";
            echo "            <div class='col-md-9'>";
            echo $install_instructions;
            echo "            </div>";
            echo "            <div class='clearfix'></div>";
            echo "        </div>";
            echo "    </div>";
            echo "</div>";
            //<!-- /Body -->
            
            //<!-- Footer -->
            echo "<div class='panel-footer'>";
            echo "    <div class='col-md-3 text-center'>";
            echo "    <div class='btn-group btn-group-justified'>";
            if ( ! empty( $button_one_text ) ) {
			echo "        <a href='". $button_one_link ."' target='_blank' class='btn btn-primary btn-xs'>". $button_one_text ."</a>";
            }
            if ( ! empty( $button_two_text ) ) {
            echo "        <a href='". $button_two_link ."' target='_blank' class='btn btn-success btn-xs'>". $button_two_text ."</a>";
            }
            if ( ! empty( $button_thre_text ) ) {
            echo "        <a href='". $button_thre_link ."' target='_blank' class='btn btn-info btn-xs'>". $button_thre_text ."</a>";
            }
            echo "    </div>";
            echo "    </div>";
            if ( ! empty( $i_nex_version ) ) {
            echo "    <span class='label label-default'>I-Nex Version: ". $i_nex_version ."</span>";
            }
            if ( ! empty( $help_button_text ) ) {
            echo "        <a href='". $help_button_link ."' class='btn btn-info pull-right'>". $help_button_text ."</a>";
            }
            echo "    <div class='clearfix'></div>";
            echo "</div>";
            //<!-- /Footer -->
                
            echo "</article>";

            
    }

    //update the widget instance with our new params
    function update ($new_instance, $old_instance) {
        $instance = $old_instance;
        
		if ( current_user_can( 'unfiltered_html' ) ) {
			$instance['install_instructions'] = $new_instance['install_instructions'];
		} else {
			$instance['install_instructions'] = wp_kses_post( $new_instance['install_instructions'] );
		}
		$instance['title'] = sanitize_text_field( $new_instance['title'] );
        $instance['panel_color'] = strip_tags($new_instance['panel_color']);
        $instance['panel_icon'] = strip_tags($new_instance['panel_icon']);
        $instance['distro_sticker'] = strip_tags($new_instance['distro_sticker']);
        $instance['button_one_text'] = strip_tags($new_instance['button_one_text']);
        $instance['button_two_text'] = strip_tags($new_instance['button_two_text']);
        $instance['button_thre_text'] = strip_tags($new_instance['button_thre_text']);
        $instance['button_one_link'] = strip_tags($new_instance['button_one_link']);
        $instance['button_two_link'] = strip_tags($new_instance['button_two_link']);
        $instance['button_thre_link'] = strip_tags($new_instance['button_thre_link']);
        $instance['i_nex_version'] = strip_tags($new_instance['i_nex_version']);
        $instance['help_button_text'] = strip_tags($new_instance['help_button_text']);
        $instance['help_button_link'] = strip_tags($new_instance['help_button_link']);
        
        
        return $instance;
    }


    //show form info for customizing
    function form( $instance ) {

     $defaults = array ( 'panel_color' => __('panel-primary', 'wordpress_bootstrap_flatly'), 
                         'panel_icon' => __('glyphicon glyphicon-plus', 'wordpress_bootstrap_flatly'),
                         'title' => __('Ubuntu', 'wordpress_bootstrap_flatly'),
                         'distro_sticker' => __('', 'wordpress_bootstrap_flatly'),
                         'install_instructions' => __('', 'wordpress_bootstrap_flatly'),
                         'button_one_text' => __('Repository', 'wordpress_bootstrap_flatly'),
                         'button_two_text' => __('Download', 'wordpress_bootstrap_flatly'),
                         'button_thre_text' => __('Source', 'wordpress_bootstrap_flatly'),
                         'button_one_link' => __('', 'wordpress_bootstrap_flatly'),
                         'button_two_link' => __('', 'wordpress_bootstrap_flatly'),
                         'button_thre_link' => __('', 'wordpress_bootstrap_flatly'),
                         'help_button_text' => __('', 'wordpress_bootstrap_flatly'),
                         'help_button_link' => __('', 'wordpress_bootstrap_flatly'),
                         'i_nex_version' => __('7.6.0', 'wordpress_bootstrap_flatly'));

                         
     $instance = wp_parse_args( (array) $instance, $defaults );
    ?>
    <p>
        <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Panel Title','wordpress_bootstrap_flatly'); ?>:</label>
        <input id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" style="width:100%;" />
    </p>
    <p>
        <label for="<?php echo $this->get_field_id( 'panel_icon' ); ?>"><?php _e('Font Awesome Icon or Glyphicon','wordpress_bootstrap_flatly'); ?>:</label>
        <input id="<?php echo $this->get_field_id( 'panel_icon' ); ?>" name="<?php echo $this->get_field_name( 'panel_icon' ); ?>" value="<?php echo $instance['panel_icon']; ?>" style="width:100%;" />
    </p>
    <p>
        <label for="<?php echo $this->get_field_id( 'distro_sticker' ); ?>"><?php _e('Direct URL for distro sticker','wordpress_bootstrap_flatly'); ?>:</label>
        <input id="<?php echo $this->get_field_id( 'distro_sticker' ); ?>" name="<?php echo $this->get_field_name( 'distro_sticker' ); ?>" value="<?php echo $instance['distro_sticker']; ?>" style="width:100%;" />
    </p>
    <p>
        <label for="<?php echo $this->get_field_id( 'button_one_text' ); ?>"><?php _e('Button One Text','wordpress_bootstrap_flatly'); ?>:</label>
        <input id="<?php echo $this->get_field_id( 'button_one_text' ); ?>" name="<?php echo $this->get_field_name( 'button_one_text' ); ?>" value="<?php echo $instance['button_one_text']; ?>" style="width:100%;" />
    </p>
    <p>
        <label for="<?php echo $this->get_field_id( 'button_one_link' ); ?>"><?php _e('Button One Link','wordpress_bootstrap_flatly'); ?>:</label>
        <input id="<?php echo $this->get_field_id( 'button_one_link' ); ?>" name="<?php echo $this->get_field_name( 'button_one_link' ); ?>" value="<?php echo $instance['button_one_link']; ?>" style="width:100%;" />
    </p>
    <p>
        <label for="<?php echo $this->get_field_id( 'button_two_text' ); ?>"><?php _e('Button Two Text','wordpress_bootstrap_flatly'); ?>:</label>
        <input id="<?php echo $this->get_field_id( 'button_two_text' ); ?>" name="<?php echo $this->get_field_name( 'button_two_text' ); ?>" value="<?php echo $instance['button_two_text']; ?>" style="width:100%;" />
    </p>
    <p>
        <label for="<?php echo $this->get_field_id( 'button_two_link' ); ?>"><?php _e('Button Two Link','wordpress_bootstrap_flatly'); ?>:</label>
        <input id="<?php echo $this->get_field_id( 'button_two_link' ); ?>" name="<?php echo $this->get_field_name( 'button_two_link' ); ?>" value="<?php echo $instance['button_two_link']; ?>" style="width:100%;" />
    </p>
    <p>
        <label for="<?php echo $this->get_field_id( 'button_thre_text' ); ?>"><?php _e('Button Thre Text','wordpress_bootstrap_flatly'); ?>:</label>
        <input id="<?php echo $this->get_field_id( 'button_thre_text' ); ?>" name="<?php echo $this->get_field_name( 'button_thre_text' ); ?>" value="<?php echo $instance['button_thre_text']; ?>" style="width:100%;" />
    </p>
    <p>
        <label for="<?php echo $this->get_field_id( 'button_thre_link' ); ?>"><?php _e('Button Thre Link','wordpress_bootstrap_flatly'); ?>:</label>
        <input id="<?php echo $this->get_field_id( 'button_thre_link' ); ?>" name="<?php echo $this->get_field_name( 'button_thre_link' ); ?>" value="<?php echo $instance['button_thre_link']; ?>" style="width:100%;" />
    </p>
    <p>
        <label for="<?php echo $this->get_field_id( 'i_nex_version' ); ?>"><?php _e('I-Nex Version','wordpress_bootstrap_flatly'); ?>:</label>
        <input id="<?php echo $this->get_field_id( 'i_nex_version' ); ?>" name="<?php echo $this->get_field_name( 'i_nex_version' ); ?>" value="<?php echo $instance['i_nex_version']; ?>" style="width:100%;" />
    </p>
    <p>
        <label for="<?php echo $this->get_field_id( 'help_button_text' ); ?>"><?php _e('Help Button Text','wordpress_bootstrap_flatly'); ?>:</label>
        <input id="<?php echo $this->get_field_id( 'help_button_text' ); ?>" name="<?php echo $this->get_field_name( 'help_button_text' ); ?>" value="<?php echo $instance['help_button_text']; ?>" style="width:100%;" />
    </p>
    <p>
        <label for="<?php echo $this->get_field_id( 'help_button_link' ); ?>"><?php _e('Help Button Link','wordpress_bootstrap_flatly'); ?>:</label>
        <input id="<?php echo $this->get_field_id( 'help_button_link' ); ?>" name="<?php echo $this->get_field_name( 'help_button_link' ); ?>" value="<?php echo $instance['help_button_link']; ?>" style="width:100%;" />
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
        <label for="<?php echo $this->get_field_id( 'install_instructions' ); ?>"><?php _e( 'Install Instructions:' ); ?></label>
		<textarea class="widefat" rows="16" cols="20" id="<?php echo $this->get_field_id('install_instructions'); ?>" name="<?php echo $this->get_field_name('install_instructions'); ?>"><?php echo esc_textarea( $instance['install_instructions'] ); ?></textarea>
    </p>
    <?php

    }
}
