<div class="topbar-info">
<div class="row">
<div class="small-12 large-6 columns infoleft">
<?php echo esc_textarea(get_theme_mod('profile_topbar_textarea','Your Default Text Goes Here Go to')); ?>
</div>	

<div class="small-12 large-6 columns inforight">

	<?php
		/*
		** Template to Render topbar Icons on Top Bar
		*/
			for ($i = 1; $i < 4; $i++) : 
			$topbar = get_theme_mod('profile_topbar_'.$i);
			if ( ($topbar != 'none') && ($topbar != '') ) : ?>
			<i class="fa fa-<?php echo $topbar; ?>"></i>  <?php echo esc_attr( get_theme_mod('profile_topbar_url'.$i) ); ?>
			<?php endif;

		endfor; ?>
</div>	

</div>	
</div>	