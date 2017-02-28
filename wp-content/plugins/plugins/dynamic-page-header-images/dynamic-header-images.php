<?php
/*
Plugin Name: Dynamic Page Header Images
Plugin URI: http://phpboys.in
Description: Dynamic Header Images for Pages
Version: 1.0
Author: Praveen
Author URI: http://phpboys.in
*/

// Define constant for plugin path
define('DHI_PATH', plugin_dir_url( __FILE__ ));

function dhi_deactivate()
{
	delete_option( 'dhi_headerimage' );
}

function dhi_menu() 
{
    add_options_page( 'Dhi Plugin Options', 'User Guide - DHI', 'manage_options', 'dhi-option', 'dhi_plugin_options' );
}

function dhi_plugin_options() 
{
    if ( !current_user_can( 'manage_options' ) )  
    {
        wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
    }
    include __DIR__."/options.php";
}

//inline settings menu on admin section
function dhi_settings_link( $links ) 
{
    $settings_link = '<a href="'.admin_url( 'options-general.php?page=dhi-option' ).'">User Guide</a>';
    array_push( $links, $settings_link );
    return $links;
}

register_deactivation_hook( __FILE__, 'dhi_deactivate' );
add_action( 'admin_menu', 'dhi_menu');
add_filter( "plugin_action_links_$plugin", 'dhi_settings_link' );


function add_dhi_meta_boxes() {
 
    // Define the custom header image for pages
    add_meta_box(
        'dhi_custom_headerimage',
        'Dynamic Header Image',
        'dhi_custom_headerimage',
        'page',
        'normal'
	);
 
} // end dhi_custom_meta_boxes

function dhi_custom_headerimage() {
 
 	$header_img	=	null;
	
    wp_nonce_field(plugin_basename(__FILE__), 'dhi_custom_headerimage_nonce');
     
	 
    $html = '<p class="description">';
        $html .= 'Upload your Header Image here.';
    $html .= '</p>';
    $html .= '<input type="file" id="dhi_headerimage" name="dhi_headerimage" value="" size="25" />';
	
	global $post;
	
	$header_img	=	dhi_get_header_image($post->ID);
	
	if( ! empty($header_img) )
		$header_img	=	'<img src="'.$header_img['url'].'" style="width:300px"/>';
		
	echo $html.$header_img;
 
} // end wp_custom_attachment

add_action('add_meta_boxes', 'add_dhi_meta_boxes');




function save_dhi_meta_data($id) {
 
    /* --- security verification --- */
    if(! wp_verify_nonce($_POST['dhi_custom_headerimage_nonce'], plugin_basename(__FILE__))) {
      return $id;
    } // end if
       
    if(defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
      return $id;
    } // end if
       
    if('page' == $_POST['post_type']) {
      if(! current_user_can('edit_page', $id) ) {
        return $id;
      } // end if
    } else {
        if(! current_user_can('edit_page', $id) ) {
            return $id;
        } // end if
    } // end if
    /* - end security verification - */
     
    // Make sure the file array isn't empty
    if(!empty($_FILES['dhi_headerimage']['name'])) {
         
        // Setup the array of supported file types. In this case, it's just Image.
        $supported_types = array('image/png', 'image/jpeg', 'image/gif');
         
        // Get the file type of the upload
        $arr_file_type = wp_check_filetype(basename($_FILES['dhi_headerimage']['name']));
        $uploaded_type = $arr_file_type['type'];
         
        // Check if the type is supported. If not, throw an error.
        if(in_array($uploaded_type, $supported_types)) {
 
            // Use the WordPress API to upload the file
            $upload = wp_upload_bits($_FILES['dhi_headerimage']['name'], null, file_get_contents($_FILES['dhi_headerimage']['tmp_name']));
     
            if(isset($upload['error']) && $upload['error'] != 0) {
                wp_die('There was an error uploading your file. The error is: ' . $upload['error']);
            } else {
                update_post_meta($id, 'dhi_headerimage', $upload);     
            } // end if/else
 
        } else {
            wp_die("The file type that you've uploaded is not a Image.");
        } // end if/else
         
    } // end if
     
} // end save_custom_meta_data
add_action('save_post', 'save_dhi_meta_data');


// GET Header IMAGE
function dhi_get_header_image($post_ID) {
    $post_header = get_post_meta( $post_ID, 'dhi_headerimage', true );
	if (! empty($post_header)) 
        return $post_header;
    
}


// ADD Header Image COLUMN in Page List
function dhi_columns_head($defaults) {
    $defaults['dhi_header_image'] = 'Header Image';
    return $defaults;
}
 
// SHOW THE Header Image For pages
function dhi_columns_content($column_name, $post_ID) {
    if ($column_name == 'dhi_header_image') {
        $page_header_image = dhi_get_header_image($post_ID);
		if ($page_header_image) {
            // HAS A Header IMAGE
            echo '<img src="' . $page_header_image['url'] . '" style="width:100px" />';
        }
        else {
            // NO Header IMAGE, SHOW THE DEFAULT ONE
            echo '<img src="' . DHI_PATH . '/images/no-header.jpg" />';
        }
    }
}

add_filter('manage_page_posts_columns', 'dhi_columns_head', 10);
add_action('manage_page_posts_custom_column', 'dhi_columns_content', 10, 2);


//Display Header Image Frontend Functions Start

function dhi_headerimages_shortcode($atts)
{
	ob_start();
	$headerimg_url	= $headerimg_url_short	=	null;
	$dhi_args		=	shortcode_atts(array(
							"img_tag" => 'true'
					), $atts);
					
	global $post;
	$headerimg_url	=	dhi_get_header_image($post->ID);
	if(! empty($headerimg_url) )
	{
		if($dhi_args['img_tag'] === 'true')
			$headerimg_url_short	=	'<img src="'.$headerimg_url['url'].'"/>';
		else
			$headerimg_url_short	=	$headerimg_url['url'];
	}
	
	$output = ob_get_clean();
	
	return $headerimg_url_short.$output;
	
}

//Short Code for get header images
add_shortcode('dhi_headerimage', 'dhi_headerimages_shortcode');


//Get header Image with img tag without shortcode
function dhi_get_headerimage_withtag()
{
	global $post;
	
	$headerimg_tag	=	null;
	
	$headerimg_tag	=	dhi_get_header_image($post->ID);
	if( ! empty($headerimg_tag))
		$headerimg_tag	=	'<img src="'.$headerimg_tag['url'].'"/>';
	
	return $headerimg_tag;
}


//Get header Image Url without shortcode
function dhi_get_headerimage_url()
{
	global $post;
	
	$header_img_url	=	null;
	
	$header_img_url	=	dhi_get_header_image($post->ID);
	
	if( ! empty($header_img_url) )
		$header_img_url  = $header_img_url['url'];
		
	return $header_img_url;
	
}

function update_edit_form() {
    echo ' enctype="multipart/form-data"';
} // end update_edit_form
add_action('post_edit_form_tag', 'update_edit_form');
