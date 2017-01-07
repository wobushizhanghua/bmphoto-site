<?php
/**
 * Add meta box
 *
 */
function profilepage_add_meta_boxes( $post ){
	add_meta_box( 'food_meta_box', __( '<span class="dashicons dashicons-layout"></span> Page Layout Select [Pro Only]', 'profile' ), 'profilepage_build_meta_box', 'page', 'side', 'high' );
}
add_action( 'add_meta_boxes', 'profilepage_add_meta_boxes' );
/**
 * Build custom field meta box
 *
 * @param post $post The post object
 */
function profilepage_build_meta_box( $post ){
	// make sure the form request comes from WordPress
	wp_nonce_field( basename( __FILE__ ), 'profilepagemeta_meta_box_nonce' );
	// retrieve the _food_profilepagemeta current value
	$current_profilepagemeta = get_post_meta( $post->ID, '_food_profilepagemeta', true );

		$upgradetopro = 'Layout Select for current Page only - for website layout please choose from theme options <a href="' . esc_url('http://www.insertcart.com/product/profile-pro-wordpress-theme/','profile') . '" target="_blank">' . esc_attr__( 'Get Profile Pro', 'profile' ) . '</a>';

	?>
	<div class='inside'>

		<h4><?php echo $upgradetopro; ?></h4>
		<p>
			<input type="radio" name="profilepagemeta" value="ls" <?php checked( $current_profilepagemeta, 'ls' ); ?> /> <?php _e('Left Sidebar - Default','profile'); ?><br/>			
			<input type="radio" name="profilepagemeta" value="rsd" <?php checked( $current_profilepagemeta, 'rsd' ); ?> /> <?php _e('Right Sidebar','profile'); ?><br />
			<input type="radio" name="profilepagemeta" value="fc" <?php checked( $current_profilepagemeta, 'fc' ); ?> /> <?php _e('Full Content - No Sidebar','profile'); ?>
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
function profilepage_save_meta_box_data( $post_id ){
	// verify meta box nonce
	if ( !isset( $_POST['profilepagemeta_meta_box_nonce'] ) || !wp_verify_nonce( $_POST['profilepagemeta_meta_box_nonce'], basename( __FILE__ ) ) ){
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
	// profilepagemeta string
	if ( isset( $_REQUEST['profilepagemeta'] ) ) {
		update_post_meta( $post_id, '_food_profilepagemeta', sanitize_text_field( $_POST['profilepagemeta'] ) );
	}

}
add_action( 'save_post', 'profilepage_save_meta_box_data' );