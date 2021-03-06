<?php

load_theme_textdomain( 'wordpress_bootstrap_flatly', get_template_directory() . '/languages' );

/////////////////////////////////////////////////////////////////////
// Add Wordpress Bootstrap Flatly Theme Options to the Appearance Menu and Admin Bar
////////////////////////////////////////////////////////////////////

    function dmbs_theme_options_menu() {
        add_theme_page( 'Wordpress Bootstrap Flatly' . __('Options','wordpress_bootstrap_flatly'), 'Wbf' . __('Options','wordpress_bootstrap_flatly'), 'manage_options', 'Wbf-theme-options', 'Wbf_theme_options' );
    }
    add_action( 'admin_menu', 'dmbs_theme_options_menu' );

    add_action( 'admin_bar_menu', 'toolbar_link_to_dmbs_options', 999 );

    function toolbar_link_to_dmbs_options( $wp_admin_bar ) {
        $args = array(
            'id'    => 'Wbf_theme_options',
            'title' => __('I-Nex Theme Options','wordpress_bootstrap_flatly'),
            'href'  => home_url() . '/wp-admin/themes.php?page=Wbf-theme-options',
            'meta'  => array( 'class' => 'Wbf-theme-options' ),
            'parent' => 'site-name'
        );
        $wp_admin_bar->add_node( $args );
    }

////////////////////////////////////////////////////////////////////
// Add admin.css enqueue
////////////////////////////////////////////////////////////////////

    function Wbf_theme_style() {
        wp_enqueue_style('Wbf-theme', get_template_directory_uri() . '/css/admin.css');
    }
    add_action('admin_enqueue_scripts', 'Wbf_theme_style');

////////////////////////////////////////////////////////////////////
// Custom background theme support
////////////////////////////////////////////////////////////////////

    $defaults = array(
        'default-color'          => '',
        'default-image'          => '',
        'wp-head-callback'       => '_custom_background_cb',
        'admin-head-callback'    => '',
        'admin-preview-callback' => ''
    );
    add_theme_support( 'custom-background', $defaults );

////////////////////////////////////////////////////////////////////
// Custom header theme support
////////////////////////////////////////////////////////////////////

    register_default_headers( array(
        'wheel' => array(
            'url' => '%s/img/deafaultlogo.png',
            'thumbnail_url' => '%s/img/deafaultlogo.png',
            'description' => __( 'Your Business Name', 'wordpress_bootstrap_flatly' )
        ))

    );

    $defaults = array(
        'default-image'          => get_template_directory_uri() . '/img/deafaultlogo.png',
        'width'                  => 300,
        'height'                 => 100,
        'flex-height'            => true,
        'flex-width'             => true,
        'default-text-color'     => '000',
        'header-text'            => true,
        'uploads'                => true,
        'wp-head-callback'       => '',
        'admin-head-callback'    => '',
        'admin-preview-callback' => 'Wbf_admin_header_image',
    );
    add_theme_support( 'custom-header', $defaults );

    function Wbf_admin_header_image() { ?>

        <div id="headimg">
            <?php
            $color = get_header_textcolor();
            $image = get_header_image();

            if ( $color && $color != 'blank' ) :
                $style = ' style="color:#' . $color . '"';
            else :
                $style = ' style="display:none"';
            endif;
            ?>


            <?php if ( $image ) : ?>
                <img src="<?php echo esc_url( $image ); ?>" alt="" />
            <?php endif; ?>
            <div class="dm_header_name_desc">
            <h1><a id="name"<?php echo $style; ?> onclick="return false;" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a></h1>
            <div id="desc"<?php echo $style; ?>><?php bloginfo( 'description' ); ?></div>

            </div>
        </div>

    <?php }

    function custom_header_text_color () {
        if ( get_header_textcolor() != 'blank' ) { ?>
            <style>
               .custom-header-text-color { color: #<?php echo get_header_textcolor(); ?> }
            </style>
    <?php }
    }

    add_action ('wp_head', 'custom_header_text_color');

////////////////////////////////////////////////////////////////////
// Register our settings options (the options we want to use)
////////////////////////////////////////////////////////////////////

    $dm_options = array(
        'author_credits' => true,
        'right_sidebar' => true,
        'right_sidebar_width' => 3,
        'left_sidebar' => false,
        'left_sidebar_width' => 3,
        'blog_posts_size' => 12,
        'show_header' => true,
        'show_postmeta' => true
    );

    $dm_sidebar_sizes = array(
        '1' => array (
            'value' => '1',
            'label' => '1'
        ),
        '2' => array (
            'value' => '2',
            'label' => '2'
        ),
        '3' => array (
            'value' => '3',
            'label' => '3'
        ),
        '4' => array (
            'value' => '4',
            'label' => '4'
        ),
        '5' => array (
            'value' => '5',
            'label' => '5'
        )

    );
    
    $dm_blog_posts_sizes = array(
        '6' => array (
            'value' => '6',
            'label' => '6'
        ),
        '9' => array (
            'value' => '9',
            'label' => '9'
        ),
        '12' => array (
            'value' => '12',
            'label' => '12'
        )

    );
    
    function dm_register_settings() {
        register_setting( 'dm_theme_options', 'dm_options', 'dm_validate_options' );
    }

    add_action ('admin_init', 'dm_register_settings');
    $dm_settings = get_option( 'dm_options', $dm_options );


////////////////////////////////////////////////////////////////////
// Validate Options
////////////////////////////////////////////////////////////////////

    function dm_validate_options( $input ) {

        global $dm_options, $dm_sidebar_sizes, $dm_blog_posts_sizes;

        $settings = get_option( 'dm_options', $dm_options );

        $prev = $settings['right_sidebar_width'];
        if ( !array_key_exists( $input['right_sidebar_width'], $dm_sidebar_sizes ) ) {
            $input['right_sidebar_width'] = $prev;
        }

        $prev = $settings['left_sidebar_width'];
        if ( !array_key_exists( $input['left_sidebar_width'], $dm_sidebar_sizes ) ) {
            $input['left_sidebar_width'] = $prev;
        }
        
        $prev = $settings['blog_posts_size'];
        if ( !array_key_exists( $input['blog_posts_size'], $dm_blog_posts_sizes ) ) {
            $input['blog_posts_size'] = $prev;
        }
        
        if ( ! isset( $input['author_credits'] ) ) {
            $input['author_credits'] = null;
        } else {
            $input['author_credits'] = ( $input['author_credits'] == 1 ? 1 : 0 );
        }

        if ( ! isset( $input['show_header'] ) ) {
            $input['show_header'] = null;
        } else {
            $input['show_header'] = ( $input['show_header'] == 1 ? 1 : 0 );
        }

        if ( ! isset( $input['right_sidebar'] ) ) {
            $input['right_sidebar'] = null;
        } else {
            $input['right_sidebar'] = ( $input['right_sidebar'] == 1 ? 1 : 0 );
        }

        if ( ! isset( $input['left_sidebar'] ) ) {
            $input['left_sidebar'] = null;
        } else {
            $input['left_sidebar'] = ( $input['left_sidebar'] == 1 ? 1 : 0 );
        }

        if ( ! isset( $input['show_postmeta'] ) ) {
            $input['show_postmeta'] = null;
        } else {
            $input['show_postmeta'] = ( $input['show_postmeta'] == 1 ? 1 : 0 );
        }

        return $input;
    }

////////////////////////////////////////////////////////////////////
// Display Options Page
////////////////////////////////////////////////////////////////////

    function Wbf_theme_options() {

    if ( !current_user_can( 'manage_options' ) )  {
        wp_die('You do not have sufficient permissions to access this page.');
    }

        //get our global options
        global $dm_options, $dm_sidebar_sizes, $dm_blog_posts_sizes, $developer_uri;

        //get our logo
        $logo = get_template_directory_uri() . '/img/logo.png'; ?>

        <div class="wrap">

        <div class="dm-logo-wrap"><a href="<?php echo $developer_uri ?>" target="_blank"><img src="<?php echo $logo; ?>" class="dm-logo" title="Created by Michał Głowienka" /></a></div>

            <div class="icon32" id="icon-options-general"></div>

            <h2><a href="<?php echo $developer_uri ?>" target="_blank">wordpress_bootstrap_flatly</a></h2>

               <?php

               if ( ! isset( $_REQUEST['settings-updated'] ) )

                   $_REQUEST['settings-updated'] = false;

               ?>

               <?php if ( false !== $_REQUEST['settings-updated'] ) : ?>

               <div class='saved'><p><strong><?php _e('Options Saved!','wordpress_bootstrap_flatly') ;?></strong></p></div>

               <?php endif; ?>

            <form action="options.php" method="post">

                <?php
                    $settings = get_option( 'dm_options', $dm_options );
                    settings_fields( 'dm_theme_options' );
                ?>

                <table cellpadding='10'>

                    <tr valign="top"><th scope="row"><?php _e('Right Sidebar','wordpress_bootstrap_flatly') ;?></th>
                        <td>
                            <input type="checkbox" id="right_sidebar" name="dm_options[right_sidebar]" value="1" <?php checked( true, $settings['right_sidebar'] ); ?> />
                            <label for="right_sidebar"><?php _e('Show the Right Sidebar','wordpress_bootstrap_flatly') ;?></label>
                        </td>
                    </tr>

                    <tr valign="top"><th scope="row"><?php _e('Right Sidebar Size','wordpress_bootstrap_flatly') ;?></th>
                        <td>
                    <?php foreach( $dm_sidebar_sizes as $sizes ) : ?>
                        <input type="radio" id="<?php echo $sizes['value']; ?>" name="dm_options[right_sidebar_width]" value="<?php echo esc_attr($sizes['value']); ?>" <?php checked( $settings['right_sidebar_width'], $sizes['value'] ); ?> />
                        <label for="<?php echo $sizes['value']; ?>"><?php echo $sizes['label']; ?></label><br />
                    <?php endforeach; ?>
                        </td>
                    </tr>

                    <tr valign="top"><th scope="row"><?php _e('Left Side Bar','wordpress_bootstrap_flatly') ;?></th>
                        <td>
                            <input type="checkbox" id="left_sidebar" name="dm_options[left_sidebar]" value="1" <?php checked( true, $settings['left_sidebar'] ); ?> />
                            <label for="left_sidebar"><?php _e('Show the Left Sidebar','wordpress_bootstrap_flatly') ;?></label>
                        </td>
                    </tr>

                    <tr valign="top"><th scope="row"><?php _e('Left Sidebar Size','wordpress_bootstrap_flatly') ;?></th>
                        <td>
                            <?php foreach( $dm_sidebar_sizes as $sizes ) : ?>
                                <input type="radio" id="<?php echo $sizes['value']; ?>" name="dm_options[left_sidebar_width]" value="<?php echo esc_attr($sizes['value']); ?>" <?php checked( $settings['left_sidebar_width'], $sizes['value'] ); ?> />
                                <label for="<?php echo $sizes['value']; ?>"><?php echo $sizes['label']; ?></label><br />
                            <?php endforeach; ?>
                        </td>
                    </tr>
                    
                    <tr valign="top"><th scope="row"><?php _e('Blog Post Size','wordpress_bootstrap_flatly') ;?></th>
                        <td>
                            <?php foreach( $dm_blog_posts_sizes as $sizes ) : ?>
                                <input type="radio" id="<?php echo $sizes['value']; ?>" name="dm_options[blog_posts_size]" value="<?php echo esc_attr($sizes['value']); ?>" <?php checked( $settings['blog_posts_size'], $sizes['value'] ); ?> />
                                <label for="<?php echo $sizes['value']; ?>"><?php echo $sizes['label']; ?></label><br />
                            <?php endforeach; ?>
                        </td>
                    </tr>
                    
                    <tr valign="top"><th scope="row"><?php _e('Show Header','wordpress_bootstrap_flatly') ;?></th>
                        <td>
                            <input type="checkbox" id="show_header" name="dm_options[show_header]" value="1" <?php checked( true, $settings['show_header'] ); ?> />
                            <label for="show_header"><?php _e('Show The Main Header in the Template (logo/sitename/etc.)','wordpress_bootstrap_flatly') ;?></label>
                        </td>
                    </tr>

                    <tr valign="top"><th scope="row"><?php _e('Show Post Meta','wordpress_bootstrap_flatly') ;?></th>
                        <td>
                            <input type="checkbox" id="show_postmeta" name="dm_options[show_postmeta]" value="1" <?php checked( true, $settings['show_postmeta'] ); ?> />
                            <label for="show_postmeta"><?php _e('Show Post Meta data (author, category, date created)','wordpress_bootstrap_flatly') ;?></label>
                        </td>
                    </tr>

                    <tr valign="top"><th scope="row"><?php _e('Give Michał His Credit?','wordpress_bootstrap_flatly') ;?></th>
                        <td>
                            <input type="checkbox" id="author_credits" name="dm_options[author_credits]" value="1" <?php checked( true, $settings['author_credits'] ); ?> />
                            <label for="author_credits"><?php _e('Show me some love and keep a link to i-nex.linux.pl in your footer.','wordpress_bootstrap_flatly') ;?></label>
                        </td>
                    </tr>

                </table>

                <p class="submit">
                    <input name="Submit" type="submit" class="button-primary" value="<?php esc_attr_e('Save Changes','wordpress_bootstrap_flatly'); ?>" />
                </p>

            </form>

        </div>
<?php

}
?>
