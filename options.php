<?php
/**
 * A unique identifier is defined to store the options in the database and reference them from the theme.
 * By default it uses the theme name, in lowercase and without spaces, but this can be changed if needed.
 * If the identifier changes, it'll appear as if the options have been reset.
 *
 */

function optionsframework_option_name() {

	// This gets the theme name from the stylesheet (lowercase and without spaces)
	$themename = get_option( 'stylesheet' );
	$themename = preg_replace("/\W/", "_", strtolower($themename) );

	$optionsframework_settings = get_option('optionsframework');
	$optionsframework_settings['id'] = $themename;
	update_option('optionsframework', $optionsframework_settings);

	// echo $themename;
}

/**
 * Defines an array of options that will be used to generate the settings page and be saved in the database.
 * When creating the 'id' fields, make sure to use all lowercase and no spaces.
 *
 */

function optionsframework_options() {

	// Test data
	$theme_footer_widgets = array(
		'3' => __('Three', 'options_check'),
		'4' => __('Four', 'options_check')
	);
	
	$theme_layout_array = array(
		'boxed' => __('Boxed', 'options_check'),
		'wide' => __('Wide', 'options_check')
	);
	
	$install_text_size_array = array(
		'h1' => __('h1', 'options_check'),
		'h2' => __('h2', 'options_check'),
		'h3' => __('h3', 'options_check')
	);
	
	$wider_sidebar = array(
		'1' => __('Yes', 'options_check'),
		'0' => __('No', 'options_check')
	);	

	// Multicheck Array
	$multicheck_array = array(
		'one' => __('French Toast', 'options_check'),
		'two' => __('Pancake', 'options_check'),
		'three' => __('Omelette', 'options_check'),
		'four' => __('Crepe', 'options_check'),
		'five' => __('Waffle', 'options_check')
	);

	// Multicheck Defaults
	$multicheck_defaults = array(
		'one' => '1',
		'five' => '1'
	);

	// Background Defaults
	$background_defaults = array(
		'color' => '',
		'image' => '',
		'repeat' => 'repeat',
		'position' => 'top center',
		'attachment'=>'scroll' );

	// Typography Defaults
	$typography_defaults = array(
		'size' => '15px',
		'face' => 'georgia',
		'style' => 'bold',
		'color' => '#bada55' );
		
	// Typography Options
	$typography_options = array(
		'sizes' => array( '6','12','14','16','20' ),
		'faces' => array( 'Helvetica Neue' => 'Helvetica Neue','Arial' => 'Arial' ),
		'styles' => array( 'normal' => 'Normal','bold' => 'Bold' ),
		'color' => false
	);

	// Pull all the categories into an array
	$options_categories = array();
	$options_categories_obj = get_categories();
	foreach ($options_categories_obj as $category) {
		$options_categories[$category->cat_ID] = $category->cat_name;
	}
	
	// Pull all tags into an array
	$options_tags = array();
	$options_tags_obj = get_tags();
	foreach ( $options_tags_obj as $tag ) {
		$options_tags[$tag->term_id] = $tag->name;
	}

	// Pull all the pages into an array
	$options_pages = array();
	$options_pages_obj = get_pages('sort_column=post_parent,menu_order');
	$options_pages[''] = 'Select a page:';
	foreach ($options_pages_obj as $page) {
		$options_pages[$page->ID] = $page->post_title;
	}

	// If using image radio buttons, define a directory path
	
	$imagepath =  get_template_directory_uri() . '/inc/admin/images/';

	$options = array();
    
    $options[] = array(
		'name' => __('Jumbotron', 'options_check'),
		'type' => 'heading');
    
    $options[] = array(
		'name' => __('h1 Text', 'options_check'),
		'desc' => __('Set main text ', 'options_check'),
		'id' => 'jumbotron_main_text',
		'std' => '',
		'type' => 'text');
    
    $options[] = array(
		'name' => __('Jumbotron long Text', 'options_check'),
		'desc' => __('Set long text ', 'options_check'),
		'id' => 'jumbotron_long_text',
		'std' => '',
		'type' => 'text');
    
    $options[] = array(		
		'desc' => __('Set title for Jumbotron Button.', 'options_check'),
		'id' => 'jumbotron_button_title',
		'std' => 'Install',
		'type' => 'text');	
    
    $options[] = array(		
		'desc' => __('Link for Jumbotron Button', 'options_check'),
		'id' => 'jumbotron_button_link',
		'type' => 'select',
		'options' => $options_pages);	
    
	$options[] = array(
		'name' => __('Front Page Settings', 'options_check'),
		'type' => 'heading');	
		
	$options[] = array(
		'name' => __('Settings for Slider on Home page. (This is displayed on Front Page template with Slider Only.)', 'options_check'),
		'desc' => __('Check to display Slider. Defaults to False.', 'options_check'),
		'id' => 'display_slider',
		'std' => '0',
		'type' => 'checkbox');
		
	$options[] = array(
		'name' => __('Slider Speed', 'options_check'),
		'desc' => __('Set Slider Interval (in miliseconds).', 'options_check'),
		'id' => 'slider_interval',
		'std' => '2500',
		'type' => 'text');		

	$options[] = array(
		'name' => __('Slider Pause on Mouse Hover', 'options_check'),
		'desc' => __('Check if you want Slider to pause on mouse hover.', 'options_check'),
		'id' => 'pause_on_hover',
		'std' => '1',
		'type' => 'checkbox');		
		
	$options[] = array(
		'name' => __('Slider Image 1', 'options_check'),
		'desc' => __('Set image for slider. Preferred size 1170x500', 'options_check'),
		'id' => 'slider_img_1',
		'type' => 'upload');
		
	$options[] = array(		
		'desc' => __('Heading of Image 1.', 'options_check'),
		'id' => 'slider_image_heading_1',
		'std' => 'Heading 1',
		'type' => 'text');		
		
	$options[] = array(		
		'desc' => __('Caption of Image 1.', 'options_check'),
		'id' => 'slider_image_caption_1',
		'std' => 'Caption 1',
		'type' => 'textarea');		

	$options[] = array(		
		'desc' => __('Set title for Button.', 'options_check'),
		'id' => 'slider_image_button_1',
		'std' => 'Learn more',
		'type' => 'text');		
		
	$options[] = array(		
		'desc' => __('Link for Button', 'options_check'),
		'id' => 'slider_image_button_1_link',
		'type' => 'select',
		'options' => $options_pages);		

	$options[] = array(
		'name' => __('Slider Image 2', 'options_check'),
		'desc' => __('Set image for slider. Preferred size 1170x500', 'options_check'),
		'id' => 'slider_img_2',
		'type' => 'upload');
		
	$options[] = array(		
		'desc' => __('Heading of Image 2.', 'options_check'),
		'id' => 'slider_image_heading_2',
		'std' => 'Heading 2',
		'type' => 'text');			
		
	$options[] = array(		
		'desc' => __('Caption of Image 2.', 'options_check'),
		'id' => 'slider_image_caption_2',
		'std' => 'Caption 2',
		'type' => 'textarea');		
		
	$options[] = array(		
		'desc' => __('Set title for Button.', 'options_check'),
		'id' => 'slider_image_button_2',
		'std' => 'Learn more',
		'type' => 'text');		
		
	$options[] = array(		
		'desc' => __('Link for Button', 'options_check'),
		'id' => 'slider_image_button_2_link',
		'type' => 'select',
		'options' => $options_pages);			

	$options[] = array(
		'name' => __('Slider Image 3', 'options_check'),
		'desc' => __('Set image for slider. Preferred size 1170x500', 'options_check'),
		'id' => 'slider_img_3',
		'type' => 'upload');	

	$options[] = array(		
		'desc' => __('Heading of Image 3.', 'options_check'),
		'id' => 'slider_image_heading_3',
		'std' => 'Heading 3',
		'type' => 'text');			
		
	$options[] = array(		
		'desc' => __('Caption of Image 3.', 'options_check'),
		'id' => 'slider_image_caption_3',
		'std' => 'Caption 3',
		'type' => 'textarea');		

	$options[] = array(		
		'desc' => __('Set title for Button.', 'options_check'),
		'id' => 'slider_image_button_3',
		'std' => 'Learn more',
		'type' => 'text');		
		
	$options[] = array(		
		'desc' => __('Link for Button', 'options_check'),
		'id' => 'slider_image_button_3_link',
		'type' => 'select',
		'options' => $options_pages);		
		
	$options[] = array(
		'name' => __('Slider Image 4', 'options_check'),
		'desc' => __('Set image for slider. Preferred size 1170x500', 'options_check'),
		'id' => 'slider_img_4',
		'type' => 'upload');	

	$options[] = array(		
		'desc' => __('Heading of Image 4.', 'options_check'),
		'id' => 'slider_image_heading_4',
		'std' => 'Heading 4',
		'type' => 'text');			
		
	$options[] = array(		
		'desc' => __('Caption of Image 4.', 'options_check'),
		'id' => 'slider_image_caption_4',
		'std' => 'Caption 4',
		'type' => 'textarea');		
		
	$options[] = array(		
		'desc' => __('Set title for Button.', 'options_check'),
		'id' => 'slider_image_button_4',
		'std' => 'Learn more',
		'type' => 'text');		
		
	$options[] = array(		
		'desc' => __('Link for Button', 'options_check'),
		'id' => 'slider_image_button_4_link',
		'type' => 'select',
		'options' => $options_pages);		

	$options[] = array(
		'name' => __('Widget Areas in Front Page', 'options_check'),
		'desc' => __('This option allows you to set how many widget areas you want in Frontpage. Default is 3.', 'options_check'),
		'id' => 'front_page_widget_section_count',
		'std' => '3',
		'type' => 'select',
		'class' => 'mini', //mini, tiny, small
		'options' => $theme_footer_widgets);			
		
	$options[] = array(
		'name' => __('Misc Settings', 'options_check'),
		'type' => 'heading');		
	

	$options[] = array(
		'name' => __('Set your Favicon', 'options_check'),
		'desc' => __('Set your Favicon. Add complete url for icon image' , 'options_check'),
		'id' => 'favicon_url',
		'std' => '',
		'type' => 'text');			
    /**
    * Footer navbar options
    *
    */
    $options[] = array(
		'name' => __('Display Navbar Brand', 'options_check'),
		'desc' => __('Show brand in site navbar.', 'options_check'),
		'id' => 'display_navbar_brand',
		'std' => '',
		'type' => 'checkbox');
    
    $options[] = array(
		'name' => __('Navbar Brand Text', 'options_check'),
		'desc' => __('Set your Navbar brand text' , 'options_check'),
		'id' => 'navbar_brand_text',
		'std' => '',
		'type' => 'text');
    
    $options[] = array(
		'name' => __('Navbar Brand Url', 'options_check'),
		'desc' => __('Set your Navbar brand Url' , 'options_check'),
		'id' => 'navbar_brand_url',
		'std' => '',
		'type' => 'text');

    /**
    * Footer navbar options
    *
    */
    $options[] = array(
		'name' => __('Display Footer Navbar Brand', 'options_check'),
		'desc' => __('Show brand in site Footer navbar.', 'options_check'),
		'id' => 'display_footer_navbar_brand',
		'std' => '',
		'type' => 'checkbox');
		
    $options[] = array(
		'name' => __('Navbar Footer Brand Text', 'options_check'),
		'desc' => __('Set your Navbar Footer brand text' , 'options_check'),
		'id' => 'navbar_footer_brand_text',
		'std' => '',
		'type' => 'text');
    
    $options[] = array(
		'name' => __('Navbar Footer Brand Url', 'options_check'),
		'desc' => __('Set your Navbar Footer brand Url' , 'options_check'),
		'id' => 'navbar_footer_brand_url',
		'std' => '',
		'type' => 'text');
		
	$options[] = array(
		'name' => __('Display left sidebar in blog index', 'options_check'),
		'desc' => __('Displays the sidebar on the left side of the entries', 'options_check'),
		'id' => 'display_left_sidebar_in_blog',
		'std' => '0',
		'type' => 'checkbox');			
	
	$options[] = array(
		'name' => __('Display right sidebar in blog index', 'options_check'),
		'desc' => __('Displays the sidebar on the right side of the entries', 'options_check'),
		'id' => 'display_right_sidebar_in_blog',
		'std' => '0',
		'type' => 'checkbox');			

	
	$options[] = array(
		'name' => __('Display Post Meta Information', 'options_check'),
		'desc' => __('Check to display Post Meta Information. Defaults to True.', 'options_check'),
		'id' => 'display_post_meta_info',
		'std' => '1',
		'type' => 'checkbox');		
		
	$options[] = array(
		'name' => __('Display Post/Page Navigation and Category/Tags on Single Post/Page', 'options_check'),
		'desc' => __('Check to display Post/Page Navigation and Category/Tags on Single Post/Page. Defaults to True.', 'options_check'),
		'id' => 'display_post_page_nav',
		'std' => '1',
		'type' => 'checkbox');	
	
	$options[] = array(
		'name' => __('Banners', 'options_check'),
		'type' => 'heading');
		
	$options[] = array(		
		'desc' => __('Content Sidebar Banner.', 'options_check'),
		'id' => 'content_sidebar_banner_code',
		'std' => '',
		'type' => 'textarea');
	
	$options[] = array(		
		'desc' => __('Sidebar Content Banner.', 'options_check'),
		'id' => 'sidebar_content_banner_code',
		'std' => '',
		'type' => 'textarea');	
	
    $options[] = array(
		'name' => __('Social Icons', 'options_check'),
		'type' => 'heading');
		
        $options[] = array(
		'desc' => __('Display Github icon.', 'options_check'),
		'id' => 'display_github_icon',
		'std' => '1',
		'type' => 'checkbox');
		
        $options[] = array(
        'name' => __('Github URL:', 'options_check'),
        'id' => 'github_url',
        'std' => '',
        'type' => 'text');

        $options[] = array(
		'desc' => __('Display Facebook icon.', 'options_check'),
		'id' => 'display_facebook_icon',
		'std' => '1',
		'type' => 'checkbox');
		
        $options[] = array(
        'name' => __('Facebook URL:', 'options_check'),
        'id' => 'facebook_url',
        'std' => '',
        'type' => 'text');
		
	return $options;
}
