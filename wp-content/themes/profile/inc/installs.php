<?php
// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

function profile_notice() {
	if ( isset( $_GET['activated'] ) ) {
		$return = '<div class="updated activation"><p>';
		$return .= ' <a class="button button-primary theme-options" href="' . esc_url(admin_url( 'customize.php' )) . '">' . __( 'Theme Options', 'profile' ) . '</a>';
		$return .= ' <a class="button button-primary help" href="http://www.insertcart.com/profile-theme-setup/">' . __( 'Need Help?', 'profile' ) . '</a>';
		$return .= '</p></div>';
		echo $return;
	}
}
add_action( 'admin_notices', 'profile_notice' );

/*
 * Hide core theme activation message.
 */
function profile_admincss() { 
	?>

	<style>
	.themes-php div.activation a {
		text-decoration: none;
	}
	</style>
<?php }
add_action( 'admin_head-themes.php', 'profile_admincss' );
