<?php

function dwwp_add_custom_metabox(){
	add_meta_box('dwwp_meta', 'Speakers Description', 'dwwp_meta_callback', 'speakers', 'normal', 'core');
}

add_action('add_meta_boxes', 'dwwp_add_custom_metabox');

function dwwp_meta_callback( $post ){

	wp_nonce_field(basename(__FILE__), 'dwwp_speakers_nonce');
	$dwwp_stored_meta = get_post_meta($post->ID);
	?>
	<div class="meta-th">
		<div class="meta-th">
			<span>Short Description</span>
		</div>
		<div class="meta-editor"></div>
			<?php
			$content = get_post_meta($post->ID, 'short-description', true);
			$editor = 'short-description';
			$settings = array(
				'textarea_rows' => 5,

			);
			wp_editor($content, $editor, $settings);
			?>
	</div>
	<div class="meta-th">
		<div class="meta-th">
			<span>Long Description</span>
		</div>
		<div class="meta-editor"></div>
			<?php
			$content = get_post_meta($post->ID, 'long-description', true);
			$editor = 'long-description';
			$settings = array(
				'textarea_rows' => 10,

			);
			wp_editor($content, $editor, $settings);
			?>
	</div>

<?php }

function dwwp_meta_save($post_id){
	$is_autosave = wp_is_post_autosave($post_id);
	$is_revision = wp_is_post_revision($post_id);
	$is_valid_nonce = (isset($_POST['dwwp_speakers_nonce']) && wp_verify_nonce($_POST['dwwp_speakers_nonce'], basename(__FILE__))) ? 'true' : 'false' ;

	if ($is_autosave || $is_revision || !$is_valid_nonce){
		return;
	}

	if (isset($_POST['short-description'])){
		update_post_meta($post_id, 'short-description', sanitize_text_field($_POST['short-description']));
	}

	if (isset($_POST['long-description'])){
		update_post_meta($post_id, 'long-description', sanitize_text_field($_POST['long-description']));
	}
}
add_action('save_post', 'dwwp_meta_save');