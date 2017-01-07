<?php if(get_theme_mod('profile_front_tabs')=='enable'){ ?>
<div class="row collapse front-tabs">
  <div class="medium-12 columns">
    <ul class="tabs " id="example-vert-tabs" data-tabs>
	<?php if (get_theme_mod('profile_profile_pages')){ ?>
      <li class="tabs-title is-active"><a href="#panel1v" aria-selected="true">
	<?php echo esc_html(get_the_title( get_theme_mod('profile_profile_pages')) ); ?></a></li> <?php } ?>
	
	<?php if (get_theme_mod('profile_profile_pages2')){ ?>
      <li class="tabs-title"><a href="#panel2v">
	<?php echo esc_html(get_the_title( get_theme_mod('profile_profile_pages2')) ); ?></a></li> 
	<?php } ?>
	  <?php if (get_theme_mod('profile_profile_pages3')){ ?>
      <li class="tabs-title"><a href="#panel3v"><?php echo esc_html(get_the_title( get_theme_mod('profile_profile_pages3')) ); ?></a></li>	  
	  <?php } ?>
	  <?php if (get_theme_mod('profile_profile_pages4')){ ?>
      <li class="tabs-title"><a href="#panel4v"><?php echo esc_html(get_the_title( get_theme_mod('profile_profile_pages4')) ); ?></a></li>	  
	  <?php } ?>
	  <?php if (get_theme_mod('profile_profile_pages5')){ ?>
      <li class="tabs-title"><a href="#panel5v"><?php echo esc_html(get_the_title( get_theme_mod('profile_profile_pages5')) ); ?></a></li>
	   <?php } ?>
    </ul>
    </div>
    <div class="medium-12 columns">
    <div class="tabs-content vertical" data-tabs-content="example-vert-tabs">
	<?php if (get_theme_mod('profile_profile_pages')){ ?>
      <div class="tabs-panel is-active" id="panel1v">
        <?php
		$profile_page_id = absint( get_theme_mod('profile_profile_pages') );
		if ( $profile_page_id ) {
		$content_post = get_post( $profile_page_id );
			if ( !empty( $content_post->post_content ) ) {
				$content_post = get_post(get_theme_mod('profile_profile_pages'));
				$content = $content_post->post_content;
				$content = apply_filters('the_content', $content);
				$content = str_replace(']]>', ']]&gt;', $content);
				echo $content;
			}
		}		
		?>
      </div>
	   <?php } ?>
	  <?php if (get_theme_mod('profile_profile_pages2')){ ?>
      <div class="tabs-panel" id="panel2v">
         <?php
		 $profile_page_id2 = absint( get_theme_mod('profile_profile_pages2') );
		if ( $profile_page_id2 ) {
		$content2_post = get_post( $profile_page_id2 );
			if ( !empty( $content2_post->post_content ) ) {
				$content2_post = get_post(get_theme_mod('profile_profile_pages2'));
				$content2 = $content2_post->post_content;
				$content2 = apply_filters('the_content', $content2);
				$content2 = str_replace(']]>', ']]&gt;', $content2);
				echo $content2;
			}
		}
		?>
      </div>
	  <?php } ?>
	  <?php if (get_theme_mod('profile_profile_pages3')){ ?>
      <div class="tabs-panel" id="panel3v">
          <?php
		   $profile_page_id3 = absint( get_theme_mod('profile_profile_pages3') );
		if ( $profile_page_id3 ) {
		$content3_post = get_post( $profile_page_id3 );
			if ( !empty( $content3_post->post_content ) ) {
				$content3_post = get_post(get_theme_mod('profile_profile_pages3'));
				$content3 = $content3_post->post_content;
				$content3 = apply_filters('the_content', $content3);
				$content3 = str_replace(']]>', ']]&gt;', $content3);
				echo $content3;
			}
		}
		
		?>
      </div>
	  <?php } ?>
	  <?php if (get_theme_mod('profile_profile_pages4')){ ?>
      <div class="tabs-panel" id="panel4v">
         <?php
		 $profile_page_id4 = absint( get_theme_mod('profile_profile_pages4') );
		if ( $profile_page_id4 ) {
		$content4_post = get_post( $profile_page_id4 );
			if ( !empty( $content4_post->post_content ) ) {
				$content4_post = get_post(get_theme_mod('profile_profile_pages4'));
				$content4 = $content4_post->post_content;
				$content4 = apply_filters('the_content', $content4);
				$content4 = str_replace(']]>', ']]&gt;', $content4);
				echo $content4;
			}
		}
		?>
      </div>
	  <?php } ?>
	  <?php if (get_theme_mod('profile_profile_pages5')){ ?>
      <div class="tabs-panel" id="panel5v">
        <?php
		$profile_page_id5 = absint( get_theme_mod('profile_profile_pages5') );
		if ( $profile_page_id5 ) {
		$content5_post = get_post( $profile_page_id5 );
			if ( !empty( $content5_post->post_content ) ) {
				$content5_post = get_post(get_theme_mod('profile_profile_pages5'));
				$content5 = $content5_post->post_content;
				$content5 = apply_filters('the_content', $content5);
				$content5 = str_replace(']]>', ']]&gt;', $content5);
				echo $content5;
			}
		}
		
		?>
      </div>
	  
	  <?php } ?>
    </div>
  </div>
</div>
<?php } ?>
 
 
<?php if(get_theme_mod('profile_blockgrid_enble')=='enable'){ ?> 
<div class="row" >
<div class="medium-4 columns blockgrid">
<?php
	echo '<img src="'.wp_get_attachment_url( get_theme_mod('profile_blockgrid_photo')).'" />';
	echo '<h4>'.esc_attr(get_theme_mod('profile_blockgrid_name')).'</h4>';
	echo '<p>'.esc_attr( get_theme_mod('profile_blockgrid_description')).'</p>';
?>
</div>
<div class="medium-4 columns blockgrid">
<?php
	echo '<img src="'.wp_get_attachment_url( get_theme_mod('profile_blockgrid_photo2')).'" />';
	echo '<h4>'.esc_attr(get_theme_mod('profile_blockgrid_name2')).'</h4>';
	echo '<p>'.esc_attr( get_theme_mod('profile_blockgrid_description2')).'</p>';
?>
</div>
<div class="medium-4 columns blockgrid">
<?php
	echo '<img src="'.wp_get_attachment_url( get_theme_mod('profile_blockgrid_photo3')).'" />';
	echo '<h4>'.esc_attr(get_theme_mod('profile_blockgrid_name3')).'</h4>';
	echo '<p>'.esc_attr( get_theme_mod('profile_blockgrid_description3')).'</p>';
?>
</div>
</div>
<?php } ?>
