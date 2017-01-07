<?php
/**
 * Add meta box
 *
 */
function profilesingle_add_meta_boxes( $post ){
	add_meta_box( 'food_meta_box', __( '<span class="dashicons dashicons-layout"></span> Post Layout Select [Pro Only]', 'profile' ), 'profilesingle_build_meta_box', 'post', 'side', 'high' );
}
add_action( 'add_meta_boxes', 'profilesingle_add_meta_boxes' );
/**
 * Build custom field meta box
 *
 * @param post $post The post object
 */
function profilesingle_build_meta_box( $post ){
	// make sure the form request comes from WordPress
	wp_nonce_field( basename( __FILE__ ), 'profilesinglemeta_meta_box_nonce' );
	// retrieve the _food_profilesinglemeta current value
	$current_profilesinglemeta = get_post_meta( $post->ID, '_food_profilesinglemeta', true );
	$upgradetopro = 'Layout Select for current post only - for website layout please choose from theme options <a href="' . esc_url('http://www.insertcart.com/product/profile-pro-wordpress-theme/','profile') . '" target="_blank">' . esc_attr__( 'Get Profile Pro', 'profile' ) . '</a>';

	?>
	<div class='inside'>

		<h4><?php echo $upgradetopro; ?></h4>
		<p>
			<input type="radio" name="profilesinglemeta" value="ls" <?php checked( $current_profilesinglemeta, 'ls' ); ?> /> <?php _e('Left Sidebar - Default','profile'); ?><br/>
			<input type="radio" name="profilesinglemeta" value="rsd" <?php checked( $current_profilesinglemeta, 'rsd' ); ?> /> <?php _e('Right Sidebar','profile'); ?><br />
			<input type="radio" name="profilesinglemeta" value="fc" <?php checked( $current_profilesinglemeta, 'fc' ); ?> /> <?php _e('Full Content - No Sidebar','profile'); ?>
		</p>

		

	</div>
	<?php
}
/**
 * Store custom field meta box data
 *
 * @param int $post_id The post ID.
 * @link https://codex.wordpress.org/Plugin_API/Action_Reference/save_post
 */
function food_save_meta_box_data( $post_id ){
	// verify meta box nonce
	if ( !isset( $_POST['profilesinglemeta_meta_box_nonce'] ) || !wp_verify_nonce( $_POST['profilesinglemeta_meta_box_nonce'], basename( __FILE__ ) ) ){
		return;
	}
	// return if autosave
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ){
		return;
	}
  // Check the user's permissions.
	if ( ! current_user_can( 'edit_post', $post_id ) ){
		return;
	}
	// store custom fields values
	// profilesinglemeta string
	if ( isset( $_REQUEST['profilesinglemeta'] ) ) {
		update_post_meta( $post_id, '_food_profilesinglemeta', sanitize_text_field( $_POST['profilesinglemeta'] ) );
	}

}
add_action( 'save_post', 'food_save_meta_box_data' );