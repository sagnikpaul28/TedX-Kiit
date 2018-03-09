<?php
//Add submenu
function dwwp_add_submenu_page(){
	add_submenu_page(
		'edit.php?post_type=speakers',
		'Reorder Speakers',
		'Reorder Speakers',
		'manage_options',
		'reorder_speakers',
		'reorder_callback'
	);
}
add_action('admin_menu', 'dwwp_add_submenu_page');


//Reorder speakers
function reorder_callback(){

	$args = array(
		'post_type' => 'speakers',
		'orderby' => 'menu_order',
		'order' => 'ASC',
		'no_found_rows' => true,
		'update_post_term_cache' => false,
		'post_per_page' => 50
	);

	$speakers_list = new WP_Query($args);?>

	<div id="speakers-sort" class="sort">
		<div id="icon-job-admin" class="icon32"><br/></div>
		<h2>Reorder Speakers
		<img src = "<?php echo esc_url(admin_url() .'/images/loading.gif'); ?>"  alt="loading.gif" id="loading-animation" ></h2>

		<?php
		if ($speakers_list->have_posts()): ?>
		<ul id="custom-type-list">
			<?php 
			while ($speakers_list->have_posts()): $speakers_list->the_post();
			?>
			<li id="<?php the_id(); ?>">
				<?php the_title(); ?>
			</li>
		<?php endwhile; ?>
		</ul>
		<?php else: ?>
			<p>No Speakers</p>
		<?php endif; ?>
	</div>


<?php
}

function dwwp_save_reorder(){

	if (!check_ajax_referer('wp-speakers-order', 'security')){
		return wp_send_json_error('Invalid Nonce');
	}

	if (!current_user_can('manage_options')){
		return wp_send_json_error( 'You are not allowed to do this.' );
	}

	$order = $_POST['order'];
	$count = 0;
	foreach( $order as $item_id ){

		$post = array(
			'ID' => (int)$item_id,
			'menu_order' => $count
		);
		wp_update_post($post);
		$count++;
	}

	wp_send_json_success('Post Saved.');

}
add_action('wp_ajax_save_post', 'dwwp_save_reorder');