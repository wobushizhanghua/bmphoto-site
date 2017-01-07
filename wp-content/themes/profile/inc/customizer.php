<?php
/**
 * Profile Theme Customizer.
 *
 * @package Profile
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function profile_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';	
	$wp_customize->get_section( 'title_tagline'  )->title		= __('Site Titles & Logo','profile');
	$wp_customize->get_control( 'header_text'  )->label			= __('Display Site Title','profile');
	$wp_customize->get_section( 'title_tagline'  )->priority	= 10;
	$wp_customize->get_section( 'colors'  )->title				= __('Logo Text & Background Color','profile');
	$wp_customize->get_section( 'colors'  )->panel				= 'profile_panel_design';
	$wp_customize->remove_section( 'background_image'  );
	
	
		// Theme important links started
   class profile_Important_Links extends WP_Customize_Control {

      public $type = "profile-important-links";

      public function render_content() {
         //Add Theme instruction
		 echo '<ul><b>
			<li>' . esc_attr__( '* Fully Mobile Responsive', 'profile' ) . '</li>
			<li>' . esc_attr__( '* Dedicated Option Panel', 'profile' ) . '</li>
			<li>' . esc_attr__( '* Customize Theme Color', 'profile' ) . '</li>
			<li>' . esc_attr__( '* WooCommerce & bbPress Support', 'profile' ) . '</li>
			<li>' . esc_attr__( '* SEO Optimized', 'profile' ) . '</li>
			<li>' . esc_attr__( '* Control Individual Meta Option like: Category, date, Author, Tags etc. ', 'profile' ) . '</li>
			<li>' . esc_attr__( '* Full Support', 'profile' ) . '</li>
			<li>' . esc_attr__( '* Google Fonts', 'profile' ) . '</li>
			<li>' . esc_attr__( '* Theme Color Customization', 'profile' ) . '</li>
			<li>' . esc_attr__( '* Custom CSS', 'profile' ) . '</li>
			<li>' . esc_attr__( '* Website Layout', 'profile' ) . '</li>
			<li>' . esc_attr__( '* Select Number of Columns', 'profile' ) . '</li>
			<li>' . esc_attr__( '* Website Width Control', 'profile' ) . '</li>
			</b></ul>
		 ';
         $important_links = array(
            'theme-info' => array(
               'link' => esc_url('http://www.insertcart.com/product/profile-wordpress-theme/'),
               'text' => __('Profile Pro', 'profile'),
            ),
            'support' => array(
               'link' => esc_url('http://www.insertcart.com/contact-us/'),
               'text' => __('Contact us', 'profile'),
            ),    
			       
         );
         foreach ($important_links as $important_link) {
            echo '<p><a target="_blank" href="' . $important_link['link'] . '" >' . esc_attr($important_link['text']) . ' </a></p>';
         }
               }

   }

    $wp_customize->add_section('profile_important_links', array(
      'priority' => 1,
      'title' => __('Upgrade to Pro', 'profile'),
    ));

   $wp_customize->add_setting('profile_important_links', array(
      'capability' => 'edit_theme_options',
      'sanitize_callback' => 'profile_links_sanitize'
    ));

    $wp_customize->add_control(new profile_Important_Links($wp_customize, 'important_links', array(
       'section' => 'profile_important_links',
       'settings' => 'profile_important_links'
   )));
	
	// Custom CSS
	$wp_customize->add_section('custom_section_css',
		array(
			'title'			=> __( 'Custom CSS', 'profile' ),			
			'panel'			=> 'profile_panel_design',
            'priority'    => 62,
		));
//Header Image Height
$wp_customize->add_setting('profile_header_height',	
	array(
		'default'			=> '400px',
		'type'				=> 'theme_mod',
		'capability'		=> 'edit_theme_options',		
		'sanitize_callback'	=> 'esc_textarea'
		
));
$wp_customize->add_control('profile_header_height',
	 array (                             
		'type' => 'text',
		'label' => __('Adjust Height of Header','profile'),
		'settings'   => 'profile_header_height',
		'priority'   => 1,
		'section' => 'header_image',	 
	 ));	 
//Logo Position from top
$wp_customize->add_setting('profile_logo_position',	
	array(
		'default'			=> '9%',
		'type'				=> 'theme_mod',
		'capability'		=> 'edit_theme_options',		
		'sanitize_callback'	=> 'esc_textarea'
		
));
$wp_customize->add_control('profile_logo_position',
	 array (                             
		'type' => 'text',
		'label' => __('Logo Position from Top','profile'),
		'settings'   => 'profile_logo_position',
		'priority'   => 1,
		'section' => 'title_tagline',	 
	 ));		 
/**************************************************
* Settings
***************************************************/
 $wp_customize->add_setting('custom_css',
		array(
			'default'			=> '',
			'section'		=> 'custom_section_css',
			'type'				=> 'theme_mod',
			'capability'		=> 'edit_theme_options',
			'sanitize_callback'	=> 'profile_sanitize_css'
		)
	);
$wp_customize->add_setting('radio_menu',
    array(
        'default'			=> 'fixed',
			'type'				=> 'theme_mod',
			'capability'		=> 'edit_theme_options',
			'sanitize_callback'	=> 'profile_sanitize_select'
    )
);


/**************************************************
* Fonts
***************************************************/
$font_array = array('Helvetica Neue','Helvetica','Raleway','Khula','Open Sans','Indie Flower','Droid Sans','Droid Serif','Roboto','Roboto Condensed','Lato','Bree Serif','Oswald','Slabo','Lora','Source Sans Pro','PT Sans','Ubuntu','Lobster','Arimo','Bitter','Noto Sans','Fjalla One','PT Sans Narrow','Poiret One','Passion One','Arvo','Inconsolata','Shadows Into Light','Pacifico','Dancing Script','Architects Daughter','Sigmar One','Righteous','Amatic SC','Orbitron','Chewy','Lobster Two','Gloria Hallelujah','Lekton','Almendra Display','Swanky and Moo Moo','Hanalei Fill','Uncial Antiqua','Rouge Script','Engagement','Bonbon','Caesar Dressing','Kenia','Lemon','Stardos Stencil','Bilbo','Macondo','Delius Unicase','Butcherman','Monoton','Nosifer','Codystar','Fontdiner Swanky','Diplomata SC','Snowburst One','Faster One','Rock Salt','Eater');
$fonts = array_combine($font_array, $font_array);
// Body Fonts
	$wp_customize->add_section( 'profile_panel_bodyfonts' , array(
    'title'      => __( 'Body Fonts', 'profile' ),
	'panel'			=> 'profile_panel_advance',
    'priority'   => 1,
) );	
$wp_customize->add_setting(
	'profile_title_font',
	array(
		'default'=> 'Open Sans',
		'sanitize_callback' => 'profile_sanitize_gfont' 
		)
);
$wp_customize->add_control(
	'profile_title_font',array(
			'label' => __('Title','profile'),
			'settings' => 'profile_title_font',
			'section'  => 'profile_panel_bodyfonts',
			'type' => 'select',
			'choices' => $fonts,
		)
);
$wp_customize->add_setting(
		'profile_body_font',
			array(	'default'=> 'Helvetica',
					'sanitize_callback' => 'profile_sanitize_gfont' )
	);

$wp_customize->add_control(
		'profile_body_font',array(
				'label' => __('Body','profile'),
				'settings' => 'profile_body_font',
				'section'  => 'profile_panel_bodyfonts',
				'type' => 'select',
				'choices' => $fonts
			)
	);
/**************************************************
* Post Settings
***************************************************/
// Post Settings
	$wp_customize->add_section( 'profile_panel_postsettings' , array(
    'title'      => __( 'Post Settings', 'profile' ),
	'panel'			=> 'profile_panel_advance',
    'priority'   => 2,
) );


$wp_customize->add_setting('random_post',	
	array(
		'default'			=> 'enable',
		'type'				=> 'theme_mod',
		'capability'		=> 'edit_theme_options',
		'sanitize_callback'	=> 'profile_sanitize_select'
	));
$wp_customize->add_control('random_post',
                         array (                             
							'type' => 'radio',
							'label' => __('Random Post Below Post','profile'),
							'settings'   => 'random_post',
							'section' => 'profile_panel_postsettings',
							'choices' => array(
							'enable' => __('Enable','profile'),
							'disable' => __('Disable','profile'),
                         )
						 ));
$wp_customize->add_setting('profile_author_profile',	
	array(
		'default'			=> 'enable',
		'type'				=> 'theme_mod',
		'capability'		=> 'edit_theme_options',
		'sanitize_callback'	=> 'profile_sanitize_select'
	));
$wp_customize->add_control('profile_author_profile',
                         array (                             
							'type' => 'radio',
							'label' => __('Show Author Profile in Post and Pages','profile'),
							'settings'   => 'profile_author_profile',
							'section' => 'profile_panel_postsettings',
							'choices' => array(
							'enable' => __('Enable','profile'),
							'disable' => __('Disable','profile'),
                         )
						 ));

$wp_customize->add_setting('profile_post_thumb',	
	array(
		'default'			=> 'enable',
		'type'				=> 'theme_mod',
		'capability'		=> 'edit_theme_options',
		'sanitize_callback'	=> 'profile_sanitize_select'
	));
$wp_customize->add_control('profile_post_thumb',
                         array (                             
							'type' => 'radio',
							'label' => __('Post Thumbnail Width','profile'),
							'settings'   => 'profile_post_thumb',
							'section' => 'profile_panel_postsettings',
							'choices' => array(
							'enable' => __('Normal','profile'),
							'disable' => __('100% Stretch to Fit','profile'),
                         )
						 ));


/**************************************************
* Footer Copyright
***************************************************/
	$wp_customize-> add_section(
    'profile_custom_footer',
    array(
    	'title'			=> __('Custom Footer Text','profile'),
    	'description'	=> __('Enter your Own Copyright Text.','profile'),
    	'priority'		=> 3,
    	'panel'			=> 'profile_panel_advance'
    	)
    );
    
	$wp_customize->add_setting(
	'profile_footer_text',
	array(
		'default'		=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
		)
	);
	
	$wp_customize->add_control(	 
	       'profile_footer_text',
	        array(
	            'section' => 'profile_custom_footer',
	            'settings' => 'profile_footer_text',
	            'type' => 'text'
	        )
	);
	
/**************************************************
* Social
***************************************************/
	// Social Icons
	$wp_customize->add_section('profile_social_section', array(
			'title' => __('Social Icons','profile'),
			'priority' => 44 ,
				'panel'	=> 'profile_panel_advance'
	));
	
	$social_networks = array( //Redefinied in Sanitization Function.
					'none' => __('-','profile'),
					'facebook' => __('Facebook','profile'),
					'twitter' => __('Twitter','profile'),
					'google-plus' => __('Google Plus','profile'),
					'instagram' => __('Instagram','profile'),
					'rss' => __('RSS Feeds','profile'),
					'vine' => __('Vine','profile'),
					'vimeo-square' => __('Vimeo','profile'),
					'youtube' => __('Youtube','profile'),
					'flickr' => __('Flickr','profile'),
				);
				
	$social_count = count($social_networks);
				
	for ($x = 1 ; $x <= ($social_count - 3) ; $x++) :
			
		$wp_customize->add_setting(
			'profile_social_'.$x, array(
				'sanitize_callback' => 'profile_sanitize_social',
				'default' => 'none'
			));

		$wp_customize->add_control( 'profile_social_'.$x, array(
					'settings' => 'profile_social_'.$x,
					'label' => __('Icon ','profile').$x,
					'section' => 'profile_social_section',
					'type' => 'select',
					'choices' => $social_networks,			
		));
		
		$wp_customize->add_setting(
			'profile_social_url'.$x, array(
				'sanitize_callback' => 'esc_url_raw'
			));

		$wp_customize->add_control( 'profile_social_url'.$x, array(
					'settings' => 'profile_social_url'.$x,
					'description' => __('Icon ','profile').$x.__(' Url','profile'),
					'section' => 'profile_social_section',
					'type' => 'url',
					'choices' => $social_networks,			
		));
		
	endfor;
	
	function profile_sanitize_social( $input ) {
		$social_networks = array(
					'none' ,
					'facebook',
					'twitter',
					'google-plus',
					'instagram',
					'rss',
					'vine',
					'vimeo-square',
					'youtube',
					'flickr'
				);
		if ( in_array($input, $social_networks) )
			return $input;
		else
			return '';	
	}	
	
/**************************************************
* Process Bar
***************************************************/
	// Process bar
	$wp_customize->add_section('profile_process_section', array(
			'title' => __('Process Icons','profile'),
			'priority' => 44 ,
				'panel'	=> 'profile_sidebar_panel'
	));
	
	$process_networks = array( //Redefinied in Sanitization Function.
					'none' => __('-','profile'),
					'secondary' => __('Simple','profile'),
					'success' => __('Green','profile'),
					'warning' => __('Yellow','profile'),
					'alert' => __('Red','profile'),
					'blue' => __('Blue','profile'),
				);
				
	$process_count = count($process_networks);
				
	for ($x = 1 ; $x <= ($process_count - 1) ; $x++) :
			
		$wp_customize->add_setting(
			'profile_process_'.$x, array(
				'sanitize_callback' => 'profile_sanitize_process',
				'default' => 'none'
			));

		$wp_customize->add_control( 'profile_process_'.$x, array(
					'settings' => 'profile_process_'.$x,
					'label' => __('Bar Color ','profile').$x,
					'section' => 'profile_process_section',
					'type' => 'select',
					'choices' => $process_networks,			
		));
		$wp_customize->add_setting(
			'profile_process_text'.$x, array(
				'sanitize_callback' => 'esc_textarea'
			));

		$wp_customize->add_control( 'profile_process_text'.$x, array(
					'settings' => 'profile_process_text'.$x,
					'description' => __('Label For ','profile').$x.__(' Bar','profile'),
					'section' => 'profile_process_section',
					'type' => 'text',
					'choices' => $process_networks,			
		));
		
		
		$wp_customize->add_setting(
			'profile_process_url'.$x, array(
				'sanitize_callback' => 'esc_textarea'
			));

		$wp_customize->add_control( 'profile_process_url'.$x, array(
					'settings' => 'profile_process_url'.$x,
					'description' => __('Bar ','profile').$x.__(' Percentage 0- 100','profile'),
					'section' => 'profile_process_section',
					'type' => 'text',
					'choices' => $process_networks,			
		));
		
	endfor;
	
	function profile_sanitize_process( $input ) {
		$process_networks = array(
					'' ,
					'secondary',
					'success',
					'warning',
					'alert',
					'blue'
				);
		if ( in_array($input, $process_networks) )
			return $input;
		else
			return '';	
	}
/**************************************************
* Control
***************************************************/
	$wp_customize->add_control('custom_css',
		array(
			'settings'		=> 'custom_css',
			'section'		=> 'custom_section_css',
			'type'			=> 'textarea',
			'label'			=> __( 'Custom CSS', 'profile' ),
			'description'	=> __( 'Define custom CSS be used for your site. Do not enclose in script tags.', 'profile' ),
		));
	
/**************************************************
* Customizer Panels
***************************************************/	
	$wp_customize->add_panel('profile_panel_geranal',
		array(
			'priority' 			=> 11,
			'capability' 		=> 'edit_theme_options',
			'theme_supports'	=> '',
			'title' 			=> __( 'General Settings', 'profile' ),
			'description' 		=> __( 'Configure color and layout settings for the Theme Name Theme', 'profile' ),
		)
	);
	$wp_customize->add_panel('profile_panel_design',
		array(
			'priority' 			=> 12,
			'capability' 		=> 'edit_theme_options',
			'theme_supports'	=> '',
			'title' 			=> __( 'Color, Design & CSS', 'profile' ),
			'description' 		=> __( 'Configure color and layout settings for the Profile Theme', 'profile' ),
		)
	);
	$wp_customize->add_panel('profile_panel_advance',
		array(
			'priority' 			=> 13,
			'capability' 		=> 'edit_theme_options',
			'theme_supports'	=> '',
			'title' 			=> __( 'Advance Settings', 'profile' ),
			'description' 		=> __( 'Advance Settings related to footer copyright and Enable options', 'profile' ),
		)
	);
$wp_customize->add_panel('profile_sidebar_panel',
		array(
			'priority' 			=> 13,
			'capability' 		=> 'edit_theme_options',
			'theme_supports'	=> '',
			'title' 			=> __( 'Sidebar Options', 'profile' ),
		)
	);
$wp_customize->add_panel('profile_frontpage_panel',
	array(
		'priority' 			=> 13,
		'capability' 		=> 'edit_theme_options',
		'theme_supports'	=> '',
		'title' 			=> __( 'My Front Page', 'profile' ),
	)
);

/**************************************************
* Top Bar
***************************************************/
	$wp_customize->add_section( 'profile_panel_topbar' , array(
    'title'      => __( 'Top Bar', 'profile' ),
	'description' 		=> __( 'Top Bar information Area', 'profile' ),
    'priority'   => 14,
) );
//Show or Hide top bar
$wp_customize->add_setting('profile_topbar_enble',	
	array(
		'default'			=> 'enable',
		'type'				=> 'theme_mod',
		'capability'		=> 'edit_theme_options',		
		'sanitize_callback'	=> 'profile_sanitize_select'
		
));
$wp_customize->add_control('profile_topbar_enble',
	 array (                             
		'type' => 'radio',
		'label' => __('Show or hide top bar','profile'),
		'settings'   => 'profile_topbar_enble',
		'section' => 'profile_panel_topbar',
		'choices' => array(
		'enable' => __('Enable','profile'),
		'disable' => __('Disable','profile'),
	 )
	 ));
	
// Right Textarea
$wp_customize->add_setting('profile_topbar_textarea',	
	array(
		'default'			=> __('Your Default Text Goes Here','profile'),
		'type'				=> 'theme_mod',
		'capability'		=> 'edit_theme_options',		
		'sanitize_callback'	=> 'esc_textarea',
		
));
$wp_customize->add_control('profile_topbar_textarea',
	 array (                             
		'type' => 'textarea',
		'label' => __('Input text here to show in top bar','profile'),
		'settings'   => 'profile_topbar_textarea',
		'section' => 'profile_panel_topbar',
		
	 
	 ));	
	
$topbar_networks = array( //Redefinied in Sanitization Function.
					'none' => __('-','profile'),
					'mobile' => __('Mobile No.','profile'),
					'envelope' => __('Email','profile'),
					'hand-o-right' => __('Hand','profile'),
					'angle-double-right' => __('Double Arrow','profile'),
				);
				
	$topbar_count = count($topbar_networks);
				
	for ($x = 1 ; $x <= ($topbar_count - 3) ; $x++) :
			
		$wp_customize->add_setting(
			'profile_topbar_'.$x, array(
				'sanitize_callback' => 'profile_sanitize_topbar',
				'default' => 'none'
			));

		$wp_customize->add_control( 'profile_topbar_'.$x, array(
					'settings' => 'profile_topbar_'.$x,
					'label' => __('Icon ','profile').$x,
					'section' => 'profile_panel_topbar',
					'type' => 'select',
					'choices' => $topbar_networks,			
		));
		
		$wp_customize->add_setting(
			'profile_topbar_url'.$x, array(
				'sanitize_callback' => 'esc_textarea'
			));

		$wp_customize->add_control( 'profile_topbar_url'.$x, array(
					'settings' => 'profile_topbar_url'.$x,
					'description' => __('Icon ','profile').$x.__(' Url','profile'),
					'section' => 'profile_panel_topbar',
					'type' => 'text',
					'choices' => $topbar_networks,			
		));
		
	endfor;
	
	function profile_sanitize_topbar( $input ) {
		$topbar_networks = array(
					'none' ,
					'mobile',
					'envelope',
					'hand-o-right',
					'angle-double-right'
				);
		if ( in_array($input, $topbar_networks) )
			return $input;
		else
			return '';	
	}	
	
	
/**************************************************
* Profile
***************************************************/
	$wp_customize->add_section( 'profile_panel_profiler' , array(
    'title'      => __( 'Profile', 'profile' ),
	'description' 		=> __( 'Profile information Area', 'profile' ),
	'panel'   => 'profile_sidebar_panel',
    'priority'   => 15,
) );
	//Show or Hide top bar
	$wp_customize->add_setting('profile_profile_enble',	
		array(
			'default'			=> 'enable',
			'type'				=> 'theme_mod',
			'capability'		=> 'edit_theme_options',			
			'sanitize_callback'	=> 'profile_sanitize_select'
			
	));
	$wp_customize->add_control('profile_profile_enble',
		 array (                             
			'type' => 'radio',
			'label' => __('Show or hide sidebar profile area','profile'),
			'settings'   => 'profile_profile_enble',
			'section' => 'profile_panel_profiler',
			'choices' => array(
			'enable' => __('Enable','profile'),
			'disable' => __('Disable','profile'),
		 )
		 ));

	//Profile Photo
	
	$wp_customize->add_setting('profile_profile_photo',
		array(
			'type'				=> 'theme_mod',
			'capability'		=> 'edit_theme_options',
			'sanitize_callback' => 'absint'
		)
	);
                $wp_customize->add_control(
		new WP_Customize_Cropped_Image_Control(	$wp_customize,	'profile_profile_photo',
			array(
				'settings'		=> 'profile_profile_photo',
				'section'		=> 'profile_panel_profiler',
				'flex_width'  => false,
				'flex_height' => true, 
				'width'       => 330,
				'height'      => 300,
				'label'			=> __('Upload Profile Photo', 'profile' )
				
			)
		)
	);
	
	$profile_profile_name =__('Company/User','profile');
		//Profile name
	$wp_customize->add_setting('profile_profile_name',	
		array(
			'default'			=> $profile_profile_name,
			'type'				=> 'theme_mod',
			'capability'		=> 'edit_theme_options',			
			'sanitize_callback'	=> 'profile_sanitize_html'
			
	));
	$wp_customize->add_control('profile_profile_name',
		 array (                             
			'type' => 'text',
			'label' => __('Name of Profile','profile'),
			'settings'   => 'profile_profile_name',
			'section' => 'profile_panel_profiler',
		 ));
		 		//description
	$wp_customize->add_setting('profile_profile_description',	
		array(
			'default'			=> __('This is default description for author you can set it from Customizer then Profile, there are lots of option for this please check options','profile'),
			'type'				=> 'theme_mod',
			'capability'		=> 'edit_theme_options',			
			'sanitize_callback'	=> 'profile_sanitize_html'
			
	));
	$wp_customize->add_control('profile_profile_description',
		 array (                             
			'type' => 'textarea',
			'label' => __('Profile Description','profile'),
			'settings'   => 'profile_profile_description',
			'section' => 'profile_panel_profiler',
		 ));
		 
		 //Address
		 $wp_customize->add_setting('profile_profile_address',	
		array(
			'default'			=> __('404 Place St. Gurgaon, Haryana 122001','profile'),
			'type'				=> 'theme_mod',
			'capability'		=> 'edit_theme_options',			
			'sanitize_callback'	=> 'profile_sanitize_html'
			
	));
	$wp_customize->add_control('profile_profile_address',
		 array (                             
			'type' => 'text',
			'label' => __('Address','profile'),
			'settings'   => 'profile_profile_address',
			'section' => 'profile_panel_profiler',
		 ));
		 //Mobile Number
		  $wp_customize->add_setting('profile_profile_mobile',	
		array(
			'default'			=> __('+1-23456789','profile'),
			'type'				=> 'theme_mod',
			'capability'		=> 'edit_theme_options',			
			'sanitize_callback'	=> 'profile_sanitize_html'
			
	));
	$wp_customize->add_control('profile_profile_mobile',
		 array (                             
			'type' => 'text',
			'label' => __('Mobile Number','profile'),
			'settings'   => 'profile_profile_mobile',
			'section' => 'profile_panel_profiler',
		 ));
		 //Phone Number
		  $wp_customize->add_setting('profile_profile_phone',	
		array(
			'default'			=> __('+1-121-12345678','profile'),
			'type'				=> 'theme_mod',
			'capability'		=> 'edit_theme_options',			
			'sanitize_callback'	=> 'profile_sanitize_html'
			
	));
	$wp_customize->add_control('profile_profile_phone',
		 array (                             
			'type' => 'text',
			'label' => __('Phone Number','profile'),
			'settings'   => 'profile_profile_phone',
			'section' => 'profile_panel_profiler',
		 ));
		 //Email
		  $wp_customize->add_setting('profile_profile_email',	
		array(
			'default'			=> __('email@mysite.com','profile'),
			'type'				=> 'theme_mod',
			'capability'		=> 'edit_theme_options',			
			'sanitize_callback'	=> 'profile_sanitize_html'
			
	));
	$wp_customize->add_control('profile_profile_email',
		 array (                             
			'type' => 'text',
			'label' => __('Email','profile'),
			'settings'   => 'profile_profile_email',
			'section' => 'profile_panel_profiler',
		 ));
		 //Website
		  $wp_customize->add_setting('profile_profile_website',	
		array(
			'default'			=> __('www.insertcart.com','profile'),
			'type'				=> 'theme_mod',
			'capability'		=> 'edit_theme_options',			
			'sanitize_callback'	=> 'profile_sanitize_html'
			
	));
	$wp_customize->add_control('profile_profile_website',
		 array (                             
			'type' => 'text',
			'label' => __('Website','profile'),
			'settings'   => 'profile_profile_website',
			'section' => 'profile_panel_profiler',
		 ));
		 
		 
$wp_customize->add_setting( 'profile_profile_pages',
    array(
        'sanitize_callback' => 'profile_sanitize_integer',
    )
);
 
$wp_customize->add_control(
    'profile_profile_pages',
    array(
        'type' => 'dropdown-pages',		
		'settings'   => 'profile_profile_pages',
        'label' => __('Choose a page:','profile'),
        'section' => 'profile_panel_profiler',
    )
);


/**************************************************
* Tabs Front Page
***************************************************/
	$wp_customize->add_section( 'profile_panel_tabs' , array(
    'title'      => __( 'Tabs Front Page', 'profile' ),
	'panel' => 'profile_frontpage_panel',
    'priority'   => 16,
) );
	//Show or Hide top bar
	$wp_customize->add_setting('profile_front_tabs',	
		array(
			'default'			=> 'disable',
			'type'				=> 'theme_mod',
			'capability'		=> 'edit_theme_options',			
			'sanitize_callback'	=> 'profile_sanitize_select'
			
	));
	$wp_customize->add_control('profile_front_tabs',
		 array (                             
			'type' => 'radio',
			'label' => __('Show or hide top bar','profile'),
			'settings'   => 'profile_front_tabs',
			'section' => 'profile_panel_tabs',
			'choices' => array(
			'enable' => __('Enable','profile'),
			'disable' => __('Disable','profile'),
		 )
		 ));
		 //Page 1
		$wp_customize->add_setting( 'profile_profile_pages',
		  array(
				'default' => get_template_directory_uri() . '/images/profile.png',
				'sanitize_callback' => 'profile_sanitize_integer',
			));
		 
		$wp_customize->add_control('profile_profile_pages',
			array(
				'type' => 'dropdown-pages',		
				'settings'   => 'profile_profile_pages',
				'label' => __('Choose a page:','profile'),
				'section' => 'profile_panel_tabs',
			));
			 //Page 2
		$wp_customize->add_setting( 'profile_profile_pages2',
		  array(
				'sanitize_callback' => 'profile_sanitize_integer',
			));
		 
		$wp_customize->add_control('profile_profile_pages2',
			array(
				'type' => 'dropdown-pages',		
				'settings'   => 'profile_profile_pages2',
				'label' => __('Choose a page:','profile'),
				'section' => 'profile_panel_tabs',
			));
				 //Page 3
		$wp_customize->add_setting( 'profile_profile_pages3',
		  array(
				'sanitize_callback' => 'profile_sanitize_integer',
			));
		 
		$wp_customize->add_control('profile_profile_pages3',
			array(
				'type' => 'dropdown-pages',		
				'settings'   => 'profile_profile_pages3',
				'label' => __('Choose a page:','profile'),
				'section' => 'profile_panel_tabs',
			));
				 //Page 4
		$wp_customize->add_setting( 'profile_profile_pages4',
		  array(
				'sanitize_callback' => 'profile_sanitize_integer',
			));
		 
		$wp_customize->add_control('profile_profile_pages4',
			array(
				'type' => 'dropdown-pages',		
				'settings'   => 'profile_profile_pages4',
				'label' => __('Choose a page:','profile'),
				'section' => 'profile_panel_tabs',
			));
				 //Page 5
		$wp_customize->add_setting( 'profile_profile_pages5',
		  array(
				'sanitize_callback' => 'profile_sanitize_integer',
			));
		 
		$wp_customize->add_control('profile_profile_pages5',
			array(
				'type' => 'dropdown-pages',		
				'settings'   => 'profile_profile_pages5',
				'label' => __('Choose a page:','profile'),
				'section' => 'profile_panel_tabs',
			));
/**************************************************
* Block Grid
***************************************************/
	$wp_customize->add_section( 'profile_panel_blockgrids' , array(
    'title'      => __( 'Block on Front Page', 'profile' ),
	'description' 		=> __( 'Show Three Block on Front Page', 'profile' ),
	'panel' => 'profile_frontpage_panel',
    'priority'   => 17,
) );
	//Show or Hide top bar
	$wp_customize->add_setting('profile_blockgrid_enble',	
		array(
			'default'			=> 'enable',
			'type'				=> 'theme_mod',
			'capability'		=> 'edit_theme_options',			
			'sanitize_callback'	=> 'profile_sanitize_select'
			
	));
	$wp_customize->add_control('profile_blockgrid_enble',
		 array (                             
			'type' => 'radio',
			'label' => __('Show or hide top bar','profile'),
			'settings'   => 'profile_blockgrid_enble',
			'section' => 'profile_panel_blockgrids',
			'choices' => array(
			'enable' => __('Enable','profile'),
			'disable' => __('Disable','profile'),
		 )
		 ));

	//Block Photo
	
	$wp_customize->add_setting('profile_blockgrid_photo',
		array(
			'type'				=> 'theme_mod',
			'capability'		=> 'edit_theme_options',
			'sanitize_callback' => 'absint'
		)
	);
                $wp_customize->add_control(
		new WP_Customize_Cropped_Image_Control(	$wp_customize,	'profile_blockgrid_photo',
			array(
				'settings'		=> 'profile_blockgrid_photo',
				'section'		=> 'profile_panel_blockgrids',
				'flex_width'  => false,
				'flex_height' => true, 
				'width'       => 150,
				'height'      => 150,
				'label'			=> __('Upload Block Photo', 'profile' )
				
			)));
	
		//Block name
	$wp_customize->add_setting('profile_blockgrid_name',	
		array(
			'default'			=> __('Insertcart','profile'),
			'type'				=> 'theme_mod',
			'capability'		=> 'edit_theme_options',			
			'sanitize_callback'	=> 'profile_sanitize_html'
			
	));
	$wp_customize->add_control('profile_blockgrid_name',
		 array (                             
			'type' => 'text',
			'label' => __('Name of Profile','profile'),
			'settings'   => 'profile_blockgrid_name',
			'section' => 'profile_panel_blockgrids',
		 ));
		//description
	$wp_customize->add_setting('profile_blockgrid_description',	
		array(
			'default'			=> __('This is default description for author you can set it from Dashboard > Appearance > Customizer > Profile, there are lots of option for this please check options','profile'),
			'type'				=> 'theme_mod',
			'capability'		=> 'edit_theme_options',			
			'sanitize_callback'	=> 'profile_sanitize_html'
			
	));
	$wp_customize->add_control('profile_blockgrid_description',
		 array (                             
			'type' => 'textarea',
			'label' => __('Profile Description','profile'),
			'settings'   => 'profile_blockgrid_description',
			'section' => 'profile_panel_blockgrids',
		 ));
		//Block Photo
	
	$wp_customize->add_setting('profile_blockgrid_photo2',
		array(
			'type'				=> 'theme_mod',
			'capability'		=> 'edit_theme_options',
			'sanitize_callback' => 'absint'
		)
	);
                $wp_customize->add_control(
		new WP_Customize_Cropped_Image_Control(	$wp_customize,	'profile_blockgrid_photo2',
			array(
				'settings'		=> 'profile_blockgrid_photo2',
				'section'		=> 'profile_panel_blockgrids',
				'flex_width'  => false,
				'flex_height' => true, 
				'width'       => 150,
				'height'      => 150,
				'label'			=> __('Upload Block Photo', 'profile' )
				
			)));
	
		//Block name
	$wp_customize->add_setting('profile_blockgrid_name2',	
		array(
			'default'			=> __('Insertcart','profile'),
			'type'				=> 'theme_mod',
			'capability'		=> 'edit_theme_options',			
			'sanitize_callback'	=> 'profile_sanitize_html'
			
	));
	$wp_customize->add_control('profile_blockgrid_name2',
		 array (                             
			'type' => 'text',
			'label' => __('Name of Profile','profile'),
			'settings'   => 'profile_blockgrid_name2',
			'section' => 'profile_panel_blockgrids',
		 ));
		//description
	$wp_customize->add_setting('profile_blockgrid_description2',	
		array(
			'default'			=> __('This is default description for author you can set it from Dashboard > Appearance > Customizer > Profile, there are lots of option for this please check options','profile'),
			'type'				=> 'theme_mod',
			'capability'		=> 'edit_theme_options',			
			'sanitize_callback'	=> 'profile_sanitize_html'
			
	));
	$wp_customize->add_control('profile_blockgrid_description2',
		 array (                             
			'type' => 'textarea',
			'label' => __('Profile Description','profile'),
			'settings'   => 'profile_blockgrid_description2',
			'section' => 'profile_panel_blockgrids',
		 )); 
//Block Photo
	
	$wp_customize->add_setting('profile_blockgrid_photo3',
		array(
			'type'				=> 'theme_mod',
			'capability'		=> 'edit_theme_options',
			'sanitize_callback' => 'absint'
		)
	);
                $wp_customize->add_control(
		new WP_Customize_Cropped_Image_Control(	$wp_customize,	'profile_blockgrid_photo3',
			array(
				'settings'		=> 'profile_blockgrid_photo3',
				'section'		=> 'profile_panel_blockgrids',
				'flex_width'  => false,
				'flex_height' => true, 
				'width'       => 150,
				'height'      => 150,
				'label'			=> __('Upload Block Photo', 'profile' )
				
			)));
	
		//Block name
	$wp_customize->add_setting('profile_blockgrid_name3',	
		array(
			'default'			=> __('Insertcart','profile'),
			'type'				=> 'theme_mod',
			'capability'		=> 'edit_theme_options',			
			'sanitize_callback'	=> 'profile_sanitize_html'
			
	));
	$wp_customize->add_control('profile_blockgrid_name3',
		 array (                             
			'type' => 'text',
			'label' => __('Name of Profile','profile'),
			'settings'   => 'profile_blockgrid_name3',
			'section' => 'profile_panel_blockgrids',
		 ));
		//description
	$wp_customize->add_setting('profile_blockgrid_description3',	
		array(
			'default'			=> __('This is default description for author you can set it from Dashboard > Appearance > Customizer > Profile, there are lots of option for this please check options','profile'),
			'type'				=> 'theme_mod',
			'capability'		=> 'edit_theme_options',			
			'sanitize_callback'	=> 'profile_sanitize_html'
			
	));
	$wp_customize->add_control('profile_blockgrid_description3',
		 array (                             
			'type' => 'textarea',
			'label' => __('Profile Description','profile'),
			'settings'   => 'profile_blockgrid_description3',
			'section' => 'profile_panel_blockgrids',
		 ));

}
add_action( 'customize_register', 'profile_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function profile_customize_preview_js() {
	wp_enqueue_script( 'profile_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'profile_customize_preview_js' );

/************************************
 * sanitization callback.
 ***********************************/
function profile_sanitize_css( $css ) {
	return wp_strip_all_tags( $css );
}
function profile_sanitize_hex_color( $hex_color, $setting ) {
	// Sanitize $input as a hex value without the hash prefix.
	$hex_color = sanitize_hex_color( $hex_color );
	
	// If $input is a valid hex value, return it; otherwise, return the default.
	return ( ! null( $hex_color ) ? $hex_color : $setting->default );
}
function profile_sanitize_select( $input, $setting ) {
	
	// Ensure input is a slug.
	$input = sanitize_key( $input );
	
	// Get list of choices from the control associated with the setting.
	$choices = $setting->manager->get_control( $setting->id )->choices;
	
	// If the input is a valid key, return it; otherwise, return the default.
	return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
}
function profile_sanitize_gfont( $input ) {
		if ( in_array($input, array('Helvetica Neue','Helvetica','Raleway','Khula','Open Sans','Indie Flower','Droid Sans','Droid Serif','Roboto','Roboto Condensed','Lato','Bree Serif','Oswald','Slabo','Lora','Source Sans Pro','PT Sans','Ubuntu','Lobster','Arimo','Bitter','Noto Sans','Fjalla One','PT Sans Narrow','Poiret One','Passion One','Arvo','Inconsolata','Shadows Into Light','Pacifico','Dancing Script','Architects Daughter','Sigmar One','Righteous','Amatic SC','Orbitron','Chewy','Lobster Two','Gloria Hallelujah','Lekton','Almendra Display','Swanky and Moo Moo','Hanalei Fill','Uncial Antiqua','Rouge Script','Engagement','Bonbon','Caesar Dressing','Kenia','Lemon','Stardos Stencil','Bilbo','Macondo','Delius Unicase','Butcherman','Monoton','Nosifer','Codystar','Fontdiner Swanky','Diplomata SC','Snowburst One','Faster One','Rock Salt','Eater') ) )
			return $input;
		else
			return '';	
	}
	
	function profile_sanitize_image( $image, $setting ) {
	/*
	 * Array of valid image file types.
	 *
	 * The array includes image mime types that are included in wp_get_mime_types()
	 */
    $mimes = array(
        'jpg|jpeg|jpe' => 'image/jpeg',
        'gif'          => 'image/gif',
        'png'          => 'image/png',
        'bmp'          => 'image/bmp',
        'tif|tiff'     => 'image/tiff',
        'ico'          => 'image/x-icon'
    );
	// Return an array with file extension and mime_type.
    $file = wp_check_filetype( $image, $mimes );
	// If $image has a valid mime_type, return it; otherwise, return the default.
    return ( $file['ext'] ? $image : $setting->default );
}

function profile_sanitize_html( $html ) {
	return wp_filter_post_kses( $html );
}

function profile_sanitize_integer( $input ) {
    if( is_numeric( $input ) ) {
        return intval( $input );
    }
}