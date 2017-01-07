
  <div class="small-12 medium-3 large-3 columns">
  <?php  if (has_nav_menu('primary')) { ?>
  <a class="toggle-menu"><i class="fa fa-bars" aria-hidden="true"></i></a>
<nav role="navigation" id="mainnavi">
 
  <?php 
 		
  wp_nav_menu( array(
                        'menu' => 'primary',
                        'menu_class' => 'overlay-menu vertical dropdown menu',
                        'menu_id' => 'menu',
						'theme_location' => 'primary',
                        'depth' => '0',
                        'items_wrap' => '<ul id="%1$s" class="%2$s" data-dropdown-menu >%3$s</ul>',
                        'fallback_cb' => 'wp_page_menu',
                        'walker' => new profile_Walker_Nav_Menu()
                    ) );   ?> 

</nav>  
  <?php } ?>
<div class="mainarea">
<div class="row bump">

<?php if(get_theme_mod('profile_profile_enble')=='enable') { ?>
	<div class="profileview">
	<?php if(get_theme_mod('profile_profile_photo')){
	echo '<img src="'.wp_get_attachment_url(get_theme_mod('profile_profile_photo')).'" />';
	}
	if(get_theme_mod('profile_profile_name')){
		echo '<h2><i class="fa fa-user" aria-hidden="true"></i>'.esc_attr(get_theme_mod('profile_profile_name')).'</h2>';
	} 
	
	?>
	</div>
	<div class="information">
		<?php 
		/*
		** Template to Render process Icons on Top Bar
		*/
			for ($i = 1; $i < 6; $i++) : 
			$process = get_theme_mod('profile_process_'.$i);			
			if ( ($process != 'none') && ($process != '') ) : ?>
			<?php echo esc_attr(get_theme_mod('profile_process_text'.$i)); ?>
			<div class="<?php echo $process; ?> progress" role="progressbar" tabindex="0" aria-valuetext="<?php echo esc_attr(get_theme_mod('profile_process_url'.$i)); ?> percent" aria-valuemax="100">
  <span class="progress-meter" style="width: <?php echo  esc_attr(get_theme_mod('profile_process_url'.$i)); ?>%">
    <p class="progress-meter-text"><?php echo  esc_attr(get_theme_mod('profile_process_url'.$i)); ?>%</p>
  </span>
</div>
<?php endif; endfor;
    

echo '<div class="user-desc">'.esc_attr(get_theme_mod('profile_profile_description')).'</div>'; 

echo '<div class="profile-social">';
		/*
		** Template to Render Social Icons on Top Bar
		*/
			for ($i = 1; $i < 8; $i++) : 
			$social = get_theme_mod('profile_social_'.$i);
			if ( ($social != 'none') && ($social != '') ) : ?>
			<a class="hvr-ripple-out" href="<?php echo esc_url( get_theme_mod('profile_social_url'.$i) ); ?>"><i class="fa fa-<?php echo $social; ?>"></i></a>
			<?php endif;

		endfor; 
		echo '</div>';
		?>
		
		<div class="address">
		 <?php
		 if (get_theme_mod('profile_profile_address')) {
			echo '<div class="marker"><i class="fa fa-map-marker"></i>'.esc_attr(get_theme_mod('profile_profile_address')).'</div>';
		}
		if (get_theme_mod('profile_profile_mobile')) {
			echo '<div class="mobile"><i class="fa fa-mobile"></i>'.esc_attr(get_theme_mod('profile_profile_mobile')).'</div>';
		}
		if (get_theme_mod('profile_profile_phone')) {
			echo '<div class="phone"><i class="fa fa-phone"></i>'.esc_attr(get_theme_mod('profile_profile_phone')).'</div>';
		}
		if (get_theme_mod('profile_profile_email')) {
			echo '<div class="envelop"><i class="fa fa-envelope-o"></i>'.esc_attr(get_theme_mod('profile_profile_email')).'</div>';
		}
		if (get_theme_mod('profile_profile_website')) {
			echo '<div class="linkweb"><i class="fa fa-link"></i>'.esc_attr(get_theme_mod('profile_profile_website')).'</div>';
		}
		
		?>
		</div>
</div>

<?php } ?>
<?php get_sidebar(); ?>
</div>
</div>
</div>
