<?php
/*
Plugin Name: Speakers
Plugin URI: tedxkiituniversity.in
Author: TedxKiit University Web Team
Version: 1.0.0
*/

if (!defined('ABSPATH')){
	exit;
}

require ( plugin_dir_path(__FILE__) . 'speakers_custom_post_type.php' );
require ( plugin_dir_path(__FILE__) . 'speakers_custom_meta_box.php' );
require ( plugin_dir_path(__FILE__) . 'speakers_reorder_submenu.php' );
require ( plugin_dir_path(__FILE__) . 'speakers_shortcode.php');

function dwwp_admin_enqueue_scripts(){
	global $pagenow, $typenow;

	if ($typenow == 'speakers'){
		wp_enqueue_style('dwwp-admin-css', plugins_url('css/style.css', __FILE__));
		wp_enqueue_script('dwwp-admin-js', plugins_url('js/style.js', __FILE__), array( 'jquery' , 'jquery-ui-datepicker' ), '1.0.0', true);
	}

	if (($pagenow == 'post.php' || $pagenow == 'post-new.php') && $typenow == 'speakers'){
		wp_enqueue_style('dwwp-admin-css', plugins_url('css/style.css', __FILE__));
		wp_enqueue_script('dwwp-admin-js', plugins_url('js/reorder.js', __FILE__), array( 'jquery' , 'jquery-ui-datepicker' ), '1.0.0', true);
	}

	if ($pagenow == 'edit.php' && $typenow == 'speakers'){
		wp_enqueue_script('dwwp-reorder-admin-js', plugins_url('js/reorder.js', __FILE__), array( 'jquery' , 'jquery-ui-sortable' ), '1.0.0', true);
		wp_localize_script('dwwp-reorder-admin-js', 'WP_SPEAKERS_LISTING', array(
			'security' => wp_create_nonce('wp-speakers-order'),
			'success' => __('Speakers sort order has been saved.'),
			'failure' => __('There was an error saving the sort order, or you do not have priviledges')
		));
	}
}
add_action('admin_enqueue_scripts', 'dwwp_admin_enqueue_scripts');