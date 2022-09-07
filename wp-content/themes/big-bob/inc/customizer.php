<?php
/**
 * Big Bob Theme Customizer
 *
 * @package Big_Bob
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function big_bob_customize_register( $wp_customize ) {
    $wp_customize->get_setting( 'header_textcolor' )->transport = 'refresh';
    $wp_customize->get_control('header_textcolor')->description = __('This feature only works when a logo is used and the site title and 
    tagline are being displayed.  You can find these options in the site identity section.', "big-bob");
    $wp_customize->get_setting( 'header_image' )->transport = 'refresh';
    $wp_customize->get_section( 'header_image' )->description = __("The big-bob theme is designed to maximize the size of any header image 
        or header video while minimizing distortion regardless of the screen size or the header media's dimensions.  
        <b> You should feel free to utilize horizontally or vertically or squarely defined images or videos.</b>
        If you choose both an image and a video, the image will load first then the video will replace it.  Header media is only displayed 
        on your homepage.", "big-bob");
    $wp_customize->get_setting( 'header_video' )->transport = 'refresh';
    $wp_customize->get_setting( 'custom_logo' )->transport = 'refresh';
    $wp_customize->get_control( 'display_header_text' )->description = __('This has no effect on the display of the logo.  This feature 
    looks best when <u>Center Navbar</u> has been switched on in the <u>Navigation</u> section.', "big-bob");
    $wp_customize->get_control( 'background_color' )->description = __('Black or a dark color works best when the theme is in the default
    setting.  White or a light color works best when the theme is in bright mode.', "big-bob");
    $wp_customize->get_control('background_color')->priority = '-3';
    $wp_customize->get_section('background_image')->description = __("Please note that the background image is 
    distinct from header images which can be set to the background.  The background image is also
    distinct from featured images which are set to the background.  
    You can use this section to create a background image if
    you want the same background image on every page or if you want to use a background image on your feed pages (like your posts page).
    It is recommended that you turn the <i>Background Copy</i> <b>ON</b>
    to maximize the <u>mobile compatibilty</u> of your background image.  
    The <i>Background Copy</i> control and the <i>Background Copy All Pages</i> control 
    must be turned <b>OFF</b> if you want to use the legacy background image with traditonal styling controls.  
    The <i>Background Copy</i> controls have been added to create more control over background image placement and to create 
    more <u>mobile friendly</u> images.  The rest of the controls are available for legacy purposes and are only recommended for advanced
    users.", "big-bob");
    $wp_customize->get_control( 'external_header_video' )->description = __("YouTube adds extra negative space to its videos,
    so your background color may include black in the header.  You should also be aware that some browsers do not support 
    YouTube's autoplay feature, so it is recommended that you set the <u>Set Header Media to Background</u> control in the
    <u>Header Media Options</u>section to OFF.", "big-bob");
    $wp_customize->get_control( 'external_header_video' )->label = __("Use a YouTube URL", "big-bob");
    $wp_customize->get_setting('background_image')->transport = 'refresh';
    $wp_customize->get_control('background_image')->description = __("If you intend to set the background image so that it does <u>not</u>
    scroll with the page (default setting), then you should use the controls at the top of this section to make sure that it is 
    <u>mobile friendly</u>.
    The controls below (other than the select image control) are only recommended for advanced users.  They exist for legacy purposes."
    , "big-bob");

    $wp_customize->add_setting('big_bob_preloader', array(
        'default'     => 'On',
        'transport'   => 'refresh',
        'sanitize_callback' => 'big_bob_checkMediaFit',
    ));
  
    $wp_customize->add_control('big_bob_preloader', array(
    'label' => __('Preloader', 'big-bob'),
    'section' => 'title_tagline',
    'settings' => 'big_bob_preloader',
    'type' => 'radio',
    'choices' => array(
      'On' => __('On', 'big-bob'),
      'Off' => __('Off', 'big-bob'),
	),
    'priority' => 0,
    'description' => __('This turns the prelaoder on and off.', 'big-bob'),
    ));

    $wp_customize->add_setting('big_bob_big_description_only', array(
        'default'     => 'On',
        'transport'   => 'refresh',
        'sanitize_callback' => 'big_bob_checkMediaFit',
    ));
  
    $wp_customize->add_control('big_bob_big_description_only', array(
    'label' => __('Big Tagline Only', 'big-bob'),
    'section' => 'title_tagline',
    'settings' => 'big_bob_big_description_only',
    'type' => 'radio',
    'choices' => array(
      'On' => __('On', 'big-bob'),
      'Off' => __('Off', 'big-bob'),
	),
    'priority' => 50,
    'description' => __('This is only active when there is a logo and the <b>Display Site Title and Tagline</b> option is checked.
    When this is on the title will not be displayed, and the tagline will become big, and it will be set to the left on
    screens that are wider and taller.', 'big-bob'),
    ));
    
    $wp_customize->selective_refresh->add_partial( 'big_bob_big_description_only', array(
        'render_callback' => 'big_bob_turn_on_big_description',
    ) );

    $wp_customize->add_setting('big_bob_big_descrip_small_text', array(
        'default'     => 'On',
        'transport'   => 'refresh',
        'sanitize_callback' => 'big_bob_checkMediaFit',
    ));
  
    $wp_customize->add_control('big_bob_big_descrip_small_text', array(
    'label' => __('Big Tagline Small Text', 'big-bob'),
    'section' => 'title_tagline',
    'settings' => 'big_bob_big_descrip_small_text',
    'type' => 'radio',
    'choices' => array(
      'On' => __('On', 'big-bob'),
      'Off' => __('Off', 'big-bob'),
	),
    'priority' => 50,
    'description' => __('If Big Tagline Only is turned on then this will make the text smaller.', 'big-bob'),
    ));
    
    $wp_customize->selective_refresh->add_partial( 'big_bob_big_descrip_small_text', array(
        'render_callback' => 'big_bob_turn_on_big_description',
    ) );

    $wp_customize->add_setting('big_bob_bright_mode', array(
        'default'     => 'Off',
        'transport'   => 'refresh',
        'sanitize_callback' => 'big_bob_checkMediaFit',
    ));
    
    $wp_customize->add_control('big_bob_bright_mode', array(
    'label' => 'Bright Mode',
    'section' => 'colors',
    'settings' => 'big_bob_bright_mode',
    'type' => 'radio',
    'choices' => array(
        'On' => __('On', 'big-bob'),
        'Off' => __('Off', 'big-bob'),
    ),
    'priority' => -5,
    'description' => __('This will change the different sections of the site into black text on a white background.
    It is recommended that you update the background color to white or a bright color if you use this mode.', 'big-bob'),
    ));

    $wp_customize->selective_refresh->add_partial( 'big_bob_bright_mode', array(
        'render_callback' => 'big_bob_add_bright',
    ) );

    $wp_customize->add_setting('big_bob_opaque_body', array(
        'default'     => 'Off',
        'transport'   => 'refresh',
        'sanitize_callback' => 'big_bob_checkMediaFit',
    ));
    
    $wp_customize->add_control('big_bob_opaque_body', array(
    'label' => 'Opaque Body',
    'section' => 'colors',
    'settings' => 'big_bob_opaque_body',
    'type' => 'radio',
    'choices' => array(
        'On' => __('On', 'big-bob'),
        'Off' => __('Off', 'big-bob'),
    ),
    'priority' => -4,
    'description' => __('This will render the body, sidebar, slidepanel, and footer as opaque.  And it will
    render the navbar as opaque when you scroll down the screen.', 'big-bob'),
    ));

    $wp_customize->selective_refresh->add_partial( 'big_bob_extra_dark', array(
        'render_callback' => 'big_bob_add_bright',
    ) );

    $wp_customize->add_setting('big_bob_opaque_top', array(
        'default'     => 'Off',
        'transport'   => 'refresh',
        'sanitize_callback' => 'big_bob_checkMediaFit',
    ));
    
    $wp_customize->add_control('big_bob_opaque_top', array(
    'label' => 'Opaque Navbar and Titles',
    'section' => 'colors',
    'settings' => 'big_bob_opaque_top',
    'type' => 'radio',
    'choices' => array(
        'On' => __('On', 'big-bob'),
        'Off' => __('Off', 'big-bob'),
    ),
    'priority' => -4,
    'description' => __('This will render the navbar and title messages as opaque when they
    are at the top of the screen.', 'big-bob'),
    ));

    $wp_customize->selective_refresh->add_partial( 'big_bob_extra_dark', array(
        'render_callback' => 'big_bob_add_bright',
    ) );

    $wp_customize->add_setting('big_bob_extra_dark', array(
        'default'     => 'Off',
        'transport'   => 'refresh',
        'sanitize_callback' => 'big_bob_checkMediaFit',
    ));
    
    $wp_customize->add_control('big_bob_extra_dark', array(
    'label' => 'Extra Dark',
    'section' => 'colors',
    'settings' => 'big_bob_extra_dark',
    'type' => 'radio',
    'choices' => array(
        'On' => __('On', 'big-bob'),
        'Off' => __('Off', 'big-bob'),
    ),
    'priority' => -5,
    'description' => __('You may find that in dark (default) mode some link colors are a little difficult to read over some
    background images.  If you find this to be true, then you can turn this on to resolve the problem.', 'big-bob'),
    ));

    $wp_customize->selective_refresh->add_partial( 'big_bob_extra_dark', array(
        'render_callback' => 'big_bob_add_bright',
    ) );

    $wp_customize->add_setting('big_bob_background_shadow', array(
        'default'     => 'On',
        'transport'   => 'refresh',
        'sanitize_callback' => 'big_bob_checkMediaFit',
    ));
    
    $wp_customize->add_control('big_bob_background_shadow', array(
    'label' => 'Shadow Halo',
    'section' => 'colors',
    'settings' => 'big_bob_background_shadow',
    'type' => 'radio',
    'choices' => array(
        'On' => __('On', 'big-bob'),
        'Off' => __('Off', 'big-bob'),
    ),
    'priority' => -2,
    'description' => __('This creates a shadow effect around the different sections of your site and changes the style of shadow effect
    behind the hamburger menu site title.', 'big-bob'),
    ));

    $wp_customize->selective_refresh->add_partial( 'big_bob_background_shadow', array(
        'render_callback' => 'big_bob_add_shadow',
    ) );

    $wp_customize->add_setting('big_bob_title_shadow', array(
        'default'     => 'Off',
        'transport'   => 'refresh',
        'sanitize_callback' => 'big_bob_checkMediaFit',
    ));
    
    $wp_customize->add_control('big_bob_title_shadow', array(
    'label' => 'Title Shadow',
    'section' => 'colors',
    'settings' => 'big_bob_title_shadow',
    'type' => 'radio',
    'choices' => array(
        'On' => __('On', 'big-bob'),
        'Off' => __('Off', 'big-bob'),
    ),
    'priority' => -2,
    'description' => __('This will add or remove a shadow from behind the title if a title is displayed in the navbar.
    There is no shadow effect available if a logo is displayed.', 'big-bob'),
    ));

    $wp_customize->selective_refresh->add_partial( 'big_bob_title_shadow', array(
        'render_callback' => 'big_bob_add_shadow',
    ) );
    
    $wp_customize->add_setting('big_bob_link_color', array(
        'default'     => '#66cdaa',
		'transport'   => 'postMessage',
		'sanitize_callback' => 'sanitize_hex_color_no_hash',
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'big_bob_link_color', array(
        'label'        => __('Link Color', 'big-bob'),
        'section'    => 'colors',
		'settings'   => 'big_bob_link_color',
        'priority' => -1,
        'description'   => __('This  will change the color of all the links.', 'big-bob'),
	)));

    $wp_customize->selective_refresh->add_partial( 'big_bob_link_color', array(
        'render_callback' => 'big_bob_customizer_css',
    ) );

    $wp_customize->add_setting('big_bob_hover_on', array(
        'default'     => 'Off',
        'transport'   => 'refresh',
        'sanitize_callback' => 'big_bob_checkMediaFit',
    ));

    $wp_customize->add_control('big_bob_hover_on', array(
        'label' => 'Turn On Hover Color',
        'section' => 'colors',
        'settings' => 'big_bob_hover_on',
        'type' => 'radio',
        'choices' => array(
            'On' => __('On', 'big-bob'),
            'Off' => __('Off', 'big-bob'),
        ),
        'priority' => -1,
        'description' => __('This will turn on a hover color on screens greater than 1065px in width
        (screens that commonly use a cursor).', 'big-bob'),
    ));
    
    $wp_customize->selective_refresh->add_partial( 'big_bob_hover_on', array(
        'render_callback' => 'big_bob_customizer_css',
    ) );

    $wp_customize->add_setting('big_bob_link_hover_color', array(
        'default'     => '#66cdaa',
		'transport'   => 'refresh',
		'sanitize_callback' => 'sanitize_hex_color_no_hash',
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'big_bob_link_hover_color', array(
        'label'        => __('Link Hover Color', 'big-bob'),
        'section'    => 'colors',
		'settings'   => 'big_bob_link_hover_color',
        'priority' => -1,
        'description'   => __('This  will change the hover color of all the links.', 'big-bob'),
	)));

    $wp_customize->selective_refresh->add_partial( 'big_bob_link_hover_color', array(
        'render_callback' => 'big_bob_customizer_css',
    ) );

    $wp_customize->add_section('big_bob_header_media_options', array(
        'title'      => __('Header Media Options', 'big-bob'),
        'priority'   => 79,
    ));

    $wp_customize->add_setting('big_bob_media_to_background', array(
        'default'     => 'Off',
        'transport'   => 'postMessage',
        'sanitize_callback' => 'big_bob_checkMediaFit',
    ));
  
    $wp_customize->add_control('big_bob_media_to_background', array(
    'label' => __('Set Header Media to Background', 'big-bob'),
    'section' => 'big_bob_header_media_options',
    'settings' => 'big_bob_media_to_background',
    'type' => 'radio',
    'choices' => array(
      'On' => __('On', 'big-bob'),
      'Off' => __('Off', 'big-bob'),
	),
    'priority' => 0,
    'description' => __('Turning this on will cause the header media to stay in place and the text to scroll over the top of the media.', 'big-bob'),
	));
	
	$wp_customize->selective_refresh->add_partial( 'big_bob_media_to_background', array(
        'render_callback' => 'big_bob_media_in_background',
    ) );

    $wp_customize->add_setting('big_bob_video_on_phone', array(
        'default'     => 'On',
        'transport'   => 'postMessage',
        'sanitize_callback' => 'big_bob_checkMediaFit',
    ));
  
    $wp_customize->add_control('big_bob_video_on_phone', array(
    'label' => __('Show Header Video On Mobile', 'big-bob'),
    'section' => 'big_bob_header_media_options',
    'settings' => 'big_bob_video_on_phone',
    'type' => 'radio',
    'choices' => array(
        'On' => __('On', 'big-bob'),
        'Off' => __('Off', 'big-bob'),
	),
    'priority' => 0,
    'description' => __('Turns off the video for mobile devices with small screen sizes (a width of less than 1050 pixels).  
    The item loaded (image or video) is based on the width when the site loads.', 'big-bob'),
    ));

    $wp_customize->selective_refresh->add_partial( 'big_bob_video_on_phone', array(
        'render_callback' => 'big_bob_video_for_phone',
    ) );

    $wp_customize->add_setting('big_bob_big_header_image', array(
        'default'     => 'Off',
        'transport'   => 'refresh',
        'sanitize_callback' => 'big_bob_checkMediaFit',
    ));

    $wp_customize->add_control('big_bob_big_header_image', array(
    'label' => 'Big Header Image',
    'section' => 'big_bob_header_media_options',
    'settings' => 'big_bob_big_header_image',
    'type' => 'radio',
    'choices' => array(
        'On' => __('On', 'big-bob'),
        'Off' => __('Off', 'big-bob'),
    ),
    'priority' => 0,
    'description' => __('Fills the header image across the entire screen.  Some images may require you
    to set the header media to the background.', 'big-bob'),
    ));

    $wp_customize->add_setting('big_bob_background_copy', array(
        'default'     => 'On',
        'transport'   => 'refresh',
        'sanitize_callback' => 'big_bob_checkMediaFit',
    ));
    
    $wp_customize->add_control('big_bob_background_copy', array(
    'label' => 'Background Copy (Mobile Friendly)',
    'section' => 'background_image',
    'settings' => 'big_bob_background_copy',
    'type' => 'radio',
    'choices' => array(
        'On' => __('On', 'big-bob'),
        'Off' => __('Off', 'big-bob'),
    ),
    'priority' => 1,
    'description' => __('This sets a copy of your background image that is centered on your screen in a fixed position
    on your feed pages (like your posts page). This also turns off your legacy background image.', 'big-bob'),
    ));

    $wp_customize->selective_refresh->add_partial( 'big_bob_background_copy', array(
        'render_callback' => 'big_bob_remove_main_background',
    ) );

    $wp_customize->add_setting('big_bob_big_background_copy', array(
        'default'     => 'Off',
        'transport'   => 'refresh',
        'sanitize_callback' => 'big_bob_checkMediaFit',
    ));

    $wp_customize->add_control('big_bob_big_background_copy', array(
    'label' => 'Big Background Copy',
    'section' => 'background_image',
    'settings' => 'big_bob_big_background_copy',
    'type' => 'radio',
    'choices' => array(
        'On' => __('On', 'big-bob'),
        'Off' => __('Off', 'big-bob'),
    ),
    'priority' => 3,
    'description' => __('This transforms the background copy so that it expands across the entire screen and is centered.  However, depending
    on the window size, some of the image may be cut off.  It is distinct from the default image setting because it is 
    <u>mobile friendly</u>.  This control only works if the Background Copy control or the Background Copy All control
    (one of the two controls above) is <b>ON</b>.', 'big-bob'),
    ));

    $wp_customize->add_setting('big_bob_background_copy_all', array(
        'default'     => 'Off',
        'transport'   => 'refresh',
        'sanitize_callback' => 'big_bob_checkMediaFit',
    ));

    $wp_customize->add_control('big_bob_background_copy_all', array(
    'label' => 'Background Copy All Pages (Mobile Friendly)',
    'section' => 'background_image',
    'settings' => 'big_bob_background_copy_all',
    'type' => 'radio',
    'choices' => array(
        'On' => __('On', 'big-bob'),
        'Off' => __('Off', 'big-bob'),
    ),
    'priority' => 2,
    'description' => __('This will turn on the background copy for every page.  
    This also turns off your legacy background image.', 'big-bob'),
    ));

    $wp_customize->add_section('big_bob_navigation', array(
        'title'      => 'Navigation',
        'priority'   => 101,
    ));

    $wp_customize->add_setting('big_bob_sticky_sidebar', array(
        'default'     => 'On',
        'transport'   => 'postMessage',
        'sanitize_callback' => 'big_bob_checkMediaFit',
    ));
  
    $wp_customize->add_control('big_bob_sticky_sidebar', array(
    'label' => __('Sticky Sidebar', 'big-bob'),
    'section' => 'big_bob_navigation',
    'settings' => 'big_bob_sticky_sidebar',
    'type' => 'radio',
    'choices' => array(
        'On' => __('On', 'big-bob'),
        'Off' => __('Off', 'big-bob'),
	),
    'priority' => 1,
    'description' => __('If a sidebar is being used then turning this on will cause the sidebar to shrink in size if it is big 
    and become its own window with its own scrollbar, and it will stick into position when you scroll down the screen.', 'big-bob'),
    ));
    
    $wp_customize->selective_refresh->add_partial( 'big_bob_sticky_sidebar', array(
        'render_callback' => 'big_bob_sidebar_is_sticky',
    ) );


    $wp_customize->add_setting('big_bob_sticky_navbar_on_phone', array(
        'default'     => 'Off',
        'transport'   => 'postMessage',
        'sanitize_callback' => 'big_bob_checkMediaFit',
    ));
  
    $wp_customize->add_control('big_bob_sticky_navbar_on_phone', array(
    'label' => __('Sticky Navbar On Phone', 'big-bob'),
    'section' => 'big_bob_navigation',
    'settings' => 'big_bob_sticky_navbar_on_phone',
    'type' => 'radio',
    'choices' => array(
        'On' => __('On', 'big-bob'),
        'Off' => __('Off', 'big-bob'),
	),
    'priority' => 3,
    'description' => __('Turning this off will remove most of the navbar  (except the menu button) when scrolling down phone screens 
    (screens with a width less than 500px).  All that will remain is the menu button.', 'big-bob'),
    ));
    
    $wp_customize->selective_refresh->add_partial( 'big_bob_sticky_navbar_on_mobile', array(
        'render_callback' => 'big_bob_phone_is_sticky',
    ) );
    
    $wp_customize->add_setting('big_bob_sticky_navbar_on_mobile', array(
        'default'     => 'Off',
        'transport'   => 'postMessage',
        'sanitize_callback' => 'big_bob_checkMediaFit',
    ));
  
    $wp_customize->add_control('big_bob_sticky_navbar_on_mobile', array(
    'label' => __('Sticky Navbar On Mobile', 'big-bob'),
    'section' => 'big_bob_navigation',
    'settings' => 'big_bob_sticky_navbar_on_mobile',
    'type' => 'radio',
    'choices' => array(
        'On' => __('On', 'big-bob'),
        'Off' => __('Off', 'big-bob'),
	),
    'priority' => 2,
    'description' => __('Turning this off will remove most of the navbar  (except the menu button) when scrolling down mobile screens 
    (screens with a width less than 1065px).  All that will remain is the menu button.', 'big-bob'),
    ));
    
    $wp_customize->selective_refresh->add_partial( 'big_bob_sticky_navbar_on_phone', array(
        'render_callback' => 'big_bob_phone_is_sticky',
    ) );

    $wp_customize->add_section('big_bob_body_style', array(
        'title'      => 'Body and Sidebar Style',
        'priority'   => 101,
    ));

    $wp_customize->add_setting('big_bob_strict_body_style', array(
        'default'     => 'On',
        'transport'   => 'refresh',
        'sanitize_callback' => 'big_bob_checkMediaFit',
    ));
  
    $wp_customize->add_control('big_bob_strict_body_style', array(
    'label' => __('Strict Style', 'big-bob'),
    'section' => 'big_bob_body_style',
    'settings' => 'big_bob_strict_body_style',
    'type' => 'radio',
    'choices' => array(
        'On' => __('On', 'big-bob'),
        'Off' => __('Off', 'big-bob'),
	),
    'priority' => 0,
    'description' => __("Turning this on will create a more center aligned style within the body and sidebar of the page.
    Blocks are more compact on large screens and wider on small screens., and you should have improved compatibility with fonts.
    If you turn this on, then you may find that you don't have to meet as many style
    requirements when styling your page, however you may find that some of your existing style choices (like if you use a 
    child theme) have been overridden. New style updates may be added as they are neeeded.", 'big-bob'),
    ));
    
    $wp_customize->selective_refresh->add_partial( 'big_bob_strict_body_style', array(
        'render_callback' => 'big_bob_turn_on_strict_style',
    ) );

    $wp_customize->add_setting('big_bob_highlight_feature_image', array(
        'default'     => 'Off',
        'transport'   => 'refresh',
        'sanitize_callback' => 'big_bob_checkMediaFit',
    ));
  
    $wp_customize->add_control('big_bob_highlight_feature_image', array(
    'label' => __('Highlight Featured Images and Videos', 'big-bob'),
    'section' => 'big_bob_body_style',
    'settings' => 'big_bob_highlight_feature_image',
    'type' => 'radio',
    'choices' => array(
        'On' => __('On', 'big-bob'),
        'Off' => __('Off', 'big-bob'),
	),
    'priority' => 0,
    'description' => __("This will move the text down the width of the screen on single pages and posts
    so that feaured images and videos receive more exposure.", 'big-bob'),
    ));
    
    $wp_customize->selective_refresh->add_partial( 'big_bob_highlight_feature_image', array(
        'render_callback' => 'big_bob_turn_on_highlighted_featured_image',
    ) );

    $wp_customize->add_setting('big_bob_wide_when_centered', array(
        'default'     => 'Off',
        'transport'   => 'refresh',
        'sanitize_callback' => 'big_bob_checkMediaFit',
    ));
  
    $wp_customize->add_control('big_bob_wide_when_centered', array(
    'label' => __('Pages Wide When Centered', 'big-bob'),
    'section' => 'big_bob_body_style',
    'settings' => 'big_bob_wide_when_centered',
    'type' => 'radio',
    'choices' => array(
        'On' => __('On', 'big-bob'),
        'Off' => __('Off', 'big-bob'),
	),
    'priority' => 0,
    'description' => __("This will widen the width of the body to the full width of the screen on pages (not posts) when the 
    sidebar isn't present.", 'big-bob'),
    ));
    
    $wp_customize->selective_refresh->add_partial( 'big_bob_wide_when_centered', array(
        'render_callback' => 'big_bob_turn_on_wide_when_centered',
    ) );

    $wp_customize->add_setting('big_bob_excerpt_mode', array(
        'default'     => 'On',
        'transport'   => 'refresh',
        'sanitize_callback' => 'big_bob_checkMediaFit',
    ));
  
    $wp_customize->add_control('big_bob_excerpt_mode', array(
    'label' => __('Excerpt Mode', 'big-bob'),
    'section' => 'big_bob_body_style',
    'settings' => 'big_bob_excerpt_mode',
    'type' => 'radio',
    'choices' => array(
        'On' => __('On', 'big-bob'),
        'Off' => __('Off', 'big-bob'),
	),
    'priority' => 0,
    'description' => __("This will turrn off excerpt mode for the post and archive results pages, but it will leave it on
    for the search results page.", 'big-bob'),
    ));

    $wp_customize->add_setting('big_bob_blog_sidebar_only', array(
        'default'     => 'Off',
        'transport'   => 'refresh',
        'sanitize_callback' => 'big_bob_checkMediaFit_home',
    ));
  
    $wp_customize->add_control('big_bob_blog_sidebar_only', array(
    'label' => __('Turn Off Sidebar for Static Pages', 'big-bob'),
    'section' => 'big_bob_body_style',
    'settings' => 'big_bob_blog_sidebar_only',
    'type' => 'radio',
    'choices' => array(
        'On' => __('On', 'big-bob'),
        'Home Only' => __('Home Only', 'big-bob'),
        'Except Home' => __('Except Home', 'big-bob'),
        'Off' => __('Off', 'big-bob'),
	),
    'priority' => 0,
    'description' => __("Turning this on will turn off the sidebar for any page that is created as a page (as opposed to a post),
    but it will keep your sidebar active for all other pages of your site (posts, search results, archives, etc.).  Note that if
    you choose <u>Home Only</u> or <u>Except Home</u>, your homepage must be defined as a static page in <u>Homepage Settings</u>.", 'big-bob'),
    ));

    $wp_customize->add_section('big_bob_background_video', array(
        'title' => 'Background Video',
        'priority'   => 90,
        'description'  => __('You can use this section to set a background video.', 'big-bob'),
    ));

    $wp_customize->add_setting('big_bob_background_video_media', array(
        'type' => 'theme_mod',
        'sanitize_callback' => 'absint'
    ));

    $wp_customize->add_control(new WP_Customize_Media_Control($wp_customize, 'big_bob_background_video_media', array(
        'section' => 'big_bob_background_video',
        'settings' => 'big_bob_background_video_media',
        'label' => __('Load a Background Video to Your Feed Pages.', 'big-bob'),
        'mime_type' => 'video',
        'priority' => 0,
        'description' => __('The default setting will add a background video to your feed pages 
        like your posts page or your search results page.  If you want to add the background video to every page, then you can 
        you can turn on the Background Video All button down below.
        If you want to add a different background video to other pages, you can add a header video or a featured video.
        Please visit bigbobnetwork.com/demo for instructions on creating featured videos.', 'big-bob'),
    )));    

    $wp_customize->add_setting('big_bob_background_video_all', array(
        'default'     => 'Off',
        'transport'   => 'refresh',
        'sanitize_callback' => 'big_bob_checkMediaFit',
    ));

    $wp_customize->add_control('big_bob_background_video_all', array(
        'label' => __('Background Video All', 'big-bob'),
        'section' => 'big_bob_background_video',
        'settings' => 'big_bob_background_video_all',
        'type' => 'radio',
        'choices' => array(
            'On' => __('On', 'big-bob'),
            'Off' => __('Off', 'big-bob'),
        ),
        'priority' => 1,
        'description' => __("Turning this on will set the background video to all of your pages.", 'big-bob'),
    ));

	// Add section.
	$wp_customize->add_section( 'big_bob_footer' , array(
		'title'    => __('Social/Footer','big-bob'),
		'priority' => 102,
        'description' => __("Add the requested data (URL, email address, etc.).
        Otherwise, leave the entry forms completely blank.  You can also add widgets to the footer in
        the <i>Widgets</i> section.", 'big-bob'),
	) );
    $wp_customize->add_setting('big_bob_show_footer', array(
        'default'     => 'On',
        'transport'   => 'refresh',
        'sanitize_callback' => 'big_bob_checkMediaFit',
    ));
  
    $wp_customize->add_control('big_bob_show_footer', array(
    'label' => __('Show Footer', 'big-bob'),
    'section' => 'big_bob_footer',
    'settings' => 'big_bob_show_footer',
    'type' => 'radio',
    'choices' => array(
        'On' => __('On', 'big-bob'),
        'Off' => __('Off', 'big-bob'),
	),
    'priority' => 100,
    'description' => __("Turning this off will completely remove the footer and the back to top button.", 'big-bob'),
    ));
    $wp_customize->selective_refresh->add_partial( 'big_bob_show_footer', array(
        'render_callback' => 'big_bob_show_footer_on',
    ) );
	// Add settings
	$wp_customize->add_setting( 'big_bob_footer_url_LinkedIn', array(
		 'default'           => __( '', 'big-bob' ),
		 'sanitize_callback' => 'esc_url_raw',
	) );
    $wp_customize->add_setting( 'big_bob_footer_url_Twitter', array(
        'default'           => __( '', 'big-bob' ),
        'sanitize_callback' => 'esc_url_raw',
   ) );
   $wp_customize->add_setting( 'big_bob_footer_url_YouTube', array(
    'default'           => __( '', 'big-bob' ),
    'sanitize_callback' => 'esc_url_raw',
    ) );
   $wp_customize->add_setting( 'big_bob_footer_url_GitHub', array(
    'default'           => __( '', 'big-bob' ),
    'sanitize_callback' => 'esc_url_raw',
    ) );
    $wp_customize->add_setting( 'big_bob_footer_url_Instagram', array(
        'default'           => __( '', 'big-bob' ),
        'sanitize_callback' => 'esc_url_raw',
    ) );
    $wp_customize->add_setting( 'big_bob_footer_url_WordPress', array(
        'default'           => __( '', 'big-bob' ),
        'sanitize_callback' => 'esc_url_raw',
    ) );
    $wp_customize->add_setting( 'big_bob_footer_url_Facebook', array(
        'default'           => __( '', 'big-bob' ),
        'sanitize_callback' => 'esc_url_raw',
    ) );
    $wp_customize->add_setting( 'big_bob_footer_url_GooglePlus', array(
        'default'           => __( '', 'big-bob' ),
        'sanitize_callback' => 'esc_url_raw',
    ) );
    $wp_customize->add_setting( 'big_bob_footer_url_Yelp', array(
        'default'           => __( '', 'big-bob' ),
        'sanitize_callback' => 'esc_url_raw',
    ) );
    $wp_customize->add_setting( 'big_bob_footer_url_Pinterest', array(
        'default'           => __( '', 'big-bob' ),
        'sanitize_callback' => 'esc_url_raw',
    ) );
    $wp_customize->add_setting( 'big_bob_email_address', array(
        'default'           => __( '', 'big-bob' ),
        'sanitize_callback' => 'sanitize_email',
    ) );
    $wp_customize->add_setting( 'big_bob_address_line_1', array(
        'default'           => __( '', 'big-bob' ),
        'sanitize_callback' => 'sanitize_text_field',
    ) );
    $wp_customize->add_setting( 'big_bob_address_line_2', array(
        'default'           => __( '', 'big-bob' ),
        'sanitize_callback' => 'sanitize_text_field',
    ) );
    $wp_customize->add_setting( 'big_bob_address_line_3', array(
        'default'           => __( '', 'big-bob' ),
        'sanitize_callback' => 'sanitize_text_field',
    ) );
    $wp_customize->add_setting( 'big_bob_google_maps_address', array(
        'default'           => __( '', 'big-bob' ),
        'sanitize_callback' => 'esc_url_raw',
    ) );
	// Add controls
	$wp_customize->add_control( new WP_Customize_Control(
	    $wp_customize,
		'big_bob_footer_url_LinkedIn',
		    array(
		        'label'    => __( 'LinkedIn URL', 'big-bob' ),
		        'section'  => 'big_bob_footer',
		        'settings' => 'big_bob_footer_url_LinkedIn',
		        'type'     => 'text',
                'description' => __("If you leave the form blank, then nothing will be shown,
                but if you add the URL, then it will create a hyperlink using
                the requisite icon.", 'big-bob'),
		    )
	    )
	);
	$wp_customize->add_control( new WP_Customize_Control(
	    $wp_customize,
		'big_bob_footer_url_Twitter',
		    array(
		        'label'    => __( 'Twitter URL', 'big-bob' ),
		        'section'  => 'big_bob_footer',
		        'settings' => 'big_bob_footer_url_Twitter',
		        'type'     => 'text',
                'description' => __("If you leave the form blank, then nothing will be shown,
                but if you add the URL, then it will create a hyperlink using
                the requisite icon.", 'big-bob'),
		    )
	    )
	);
    $wp_customize->add_control( new WP_Customize_Control(
	    $wp_customize,
		'big_bob_footer_url_YouTube',
		    array(
		        'label'    => __( 'YouTube URL', 'big-bob' ),
		        'section'  => 'big_bob_footer',
		        'settings' => 'big_bob_footer_url_YouTube',
		        'type'     => 'text',
                'description' => __("If you leave the form blank, then nothing will be shown,
                but if you add the URL, then it will create a hyperlink using
                the requisite icon.", 'big-bob'),
		    )
	    )
	);
    $wp_customize->add_control( new WP_Customize_Control(
	    $wp_customize,
		'big_bob_footer_url_GitHub',
		    array(
		        'label'    => __( 'GitHub URL', 'big-bob' ),
		        'section'  => 'big_bob_footer',
		        'settings' => 'big_bob_footer_url_GitHub',
		        'type'     => 'text',
                'description' => __("If you leave the form blank, then nothing will be shown,
                but if you add the URL, then it will create a hyperlink using
                the requisite icon.", 'big-bob'),
		    )
	    )
	);
    $wp_customize->add_control( new WP_Customize_Control(
	    $wp_customize,
		'big_bob_footer_url_Instagram',
		    array(
		        'label'    => __( 'Instagram URL', 'big-bob' ),
		        'section'  => 'big_bob_footer',
		        'settings' => 'big_bob_footer_url_Instagram',
		        'type'     => 'text',
                'description' => __("If you leave the form blank, then nothing will be shown,
                but if you add the URL, then it will create a hyperlink using
                the requisite icon.", 'big-bob'),
		    )
	    )
	);
    $wp_customize->add_control( new WP_Customize_Control(
	    $wp_customize,
		'big_bob_footer_url_WordPress',
		    array(
		        'label'    => __( 'WordPress URL', 'big-bob' ),
		        'section'  => 'big_bob_footer',
		        'settings' => 'big_bob_footer_url_WordPress',
		        'type'     => 'text',
                'description' => __("If you leave the form blank, then nothing will be shown,
                but if you add the URL, then it will create a hyperlink using
                the requisite icon.", 'big-bob'),
		    )
	    )
	);
    $wp_customize->add_control( new WP_Customize_Control(
	    $wp_customize,
		'big_bob_footer_url_Facebook',
		    array(
		        'label'    => __( 'Facebook URL', 'big-bob' ),
		        'section'  => 'big_bob_footer',
		        'settings' => 'big_bob_footer_url_Facebook',
		        'type'     => 'text',
                'description' => __("If you leave the form blank, then nothing will be shown,
                but if you add the URL, then it will create a hyperlink using
                the requisite icon.", 'big-bob'),
		    )
	    )
	);
    $wp_customize->add_control( new WP_Customize_Control(
	    $wp_customize,
		'big_bob_footer_url_GooglePlus',
		    array(
		        'label'    => __( 'Google Plus URL', 'big-bob' ),
		        'section'  => 'big_bob_footer',
		        'settings' => 'big_bob_footer_url_GooglePlus',
		        'type'     => 'text',
                'description' => __("If you leave the form blank, then nothing will be shown,
                but if you add the URL, then it will create a hyperlink using
                the requisite icon.", 'big-bob'),
		    )
	    )
	);
    $wp_customize->add_control( new WP_Customize_Control(
	    $wp_customize,
		'big_bob_footer_url_Yelp',
		    array(
		        'label'    => __( 'Yelp URL', 'big-bob' ),
		        'section'  => 'big_bob_footer',
		        'settings' => 'big_bob_footer_url_Yelp',
		        'type'     => 'text',
                'description' => __("If you leave the form blank, then nothing will be shown,
                but if you add the URL, then it will create a hyperlink using
                the requisite icon.", 'big-bob'),
		    )
	    )
	);
    $wp_customize->add_control( new WP_Customize_Control(
	    $wp_customize,
		'big_bob_footer_url_Pinterest',
		    array(
		        'label'    => __( 'Pinterest URL', 'big-bob' ),
		        'section'  => 'big_bob_footer',
		        'settings' => 'big_bob_footer_url_Pinterest',
		        'type'     => 'text',
                'description' => __("If you leave the form blank, then nothing will be shown,
                but if you add the URL, then it will create a hyperlink using
                the requisite icon.", 'big-bob'),
		    )
	    )
	);
    $wp_customize->add_control( new WP_Customize_Control(
	    $wp_customize,
		'big_bob_email_address',
		    array(
		        'label'    => __( 'Email Address', 'big-bob' ),
		        'section'  => 'big_bob_footer',
		        'settings' => 'big_bob_email_address',
		        'type'     => 'text',
                'description' => __("If you leave the form blank, then nothing will be shown,
                but if you write in an email address, then it will create an email icon opening the user's
                default email app with the supplied address.", 'big-bob'),
		    )
	    )
	);
    $wp_customize->add_control( new WP_Customize_Control(
	    $wp_customize,
		'big_bob_address_line_1',
		    array(
		        'label'    => __( 'Physical Address Line 1', 'big-bob' ),
		        'section'  => 'big_bob_footer',
		        'settings' => 'big_bob_address_line_1',
		        'type'     => 'text',
                'description' => __("If you leave the form blank, then nothing will be shown,
                but if you write something, then it will print exactly what you wrote to the footer.", 'big-bob'),
		    )
	    )
	);
    $wp_customize->add_control( new WP_Customize_Control(
	    $wp_customize,
		'big_bob_address_line_2',
		    array(
		        'label'    => __( 'Physical Address Line 2', 'big-bob' ),
		        'section'  => 'big_bob_footer',
		        'settings' => 'big_bob_address_line_2',
		        'type'     => 'text',
                'description' => __("If you leave the form blank, then nothing will be shown,
                but if you write something, then it will print exactly what you wrote to the footer.", 'big-bob'),
		    )
	    )
	);
    $wp_customize->add_control( new WP_Customize_Control(
	    $wp_customize,
		'big_bob_address_line_3',
		    array(
		        'label'    => __( 'Physical Address Line 3', 'big-bob' ),
		        'section'  => 'big_bob_footer',
		        'settings' => 'big_bob_address_line_3',
		        'type'     => 'text',
                'description' => __("If you leave the form blank, then nothing will be shown,
                but if you write something, then it will print exactly what you wrote to the footer.", 'big-bob'),
		    )
	    )
	);
    $wp_customize->add_control( new WP_Customize_Control(
	    $wp_customize,
		'big_bob_google_maps_address',
		    array(
		        'label'    => __( 'Map URL', 'big-bob' ),
		        'section'  => 'big_bob_footer',
		        'settings' => 'big_bob_google_maps_address',
		        'type'     => 'text',
                'description' => __("You can use this to add the URL of an address, and a map link icon will be added.
                For example, you can look up your business on Google Maps then copy and paste 
                the address from the address bar from the page where your business is mapped.", 'big-bob'),
		    )
	    )
	);

    // Add section.
	$wp_customize->add_section( 'big_bob_fonts' , array(
		'title'    => __('Typography','big-bob'),
		'priority' => 50,
        'description' => __("You can use this to update the default fonts using the fonts
        from the google fonts api (https://fonts.google.com/).  If you want to add a new font, 
        then you need to use the exact letter casing and spacing.  You should be able to achieve this 
        by copying and pasting the name of the font directly from the google fonts site.  
        Because the Google font library is so large, you will
        find that some fonts are more compatible than others.  You may find it helpful to turn on
        strict style in the <i>body and sidebar</i> section of this customizer.", 'big-bob'),
	) );
	// Add settings
	$wp_customize->add_setting( 'big_bob_fonts_title', array(
		 'default'           => __( '', 'big-bob' ),
		 'sanitize_callback' => 'wp_filter_nohtml_kses',
	) );
    $wp_customize->add_control( new WP_Customize_Control(
	    $wp_customize,
		'big_bob_fonts_title',
		    array(
		        'label'    => __( 'Headings', 'big-bob' ),
		        'section'  => 'big_bob_fonts',
		        'settings' => 'big_bob_fonts_title',
		        'type'     => 'text',
		    )
	    )
	);
    $wp_customize->selective_refresh->add_partial( 'big_bob_fonts_title', array(
        'render_callback' => 'big_bob_change_fonts_title',
    ) );
    // Add settings
	$wp_customize->add_setting( 'big_bob_fonts_paragraph', array(
        'default'           => __( '', 'big-bob' ),
        'sanitize_callback' => 'wp_filter_nohtml_kses',
   ) );
   $wp_customize->add_control( new WP_Customize_Control(
       $wp_customize,
       'big_bob_fonts_paragraph',
           array(
               'label'    => __( 'Paragraph', 'big-bob' ),
               'section'  => 'big_bob_fonts',
               'settings' => 'big_bob_fonts_paragraph',
               'type'     => 'text',
           )
       )
   );
   $wp_customize->selective_refresh->add_partial( 'big_bob_fonts_paragraph', array(
       'render_callback' => 'big_bob_change_fonts_paragraph',
   ) );

    // Add settings
	$wp_customize->add_setting( 'big_bob_fonts_misc', array(
        'default'           => __( '', 'big-bob' ),
        'sanitize_callback' => 'wp_filter_nohtml_kses',
   ) );
   $wp_customize->add_control( new WP_Customize_Control(
       $wp_customize,
       'big_bob_fonts_misc',
           array(
               'label'    => __( 'Everything Else', 'big-bob' ),
               'section'  => 'big_bob_fonts',
               'settings' => 'big_bob_fonts_misc',
               'type'     => 'text',
           )
       )
   );
   $wp_customize->selective_refresh->add_partial( 'big_bob_fonts_misc', array(
       'render_callback' => 'big_bob_change_fonts_misc',
   ) );

   $wp_customize->add_setting('big_bob_center_nav', array(
    'default'     => 'Off',
    'transport'   => 'refresh',
    'sanitize_callback' => 'big_bob_checkMediaFit',
    ));

    $wp_customize->add_control('big_bob_center_nav', array(
    'label' => __('Center Navbar', 'big-bob'),
    'section' => 'big_bob_navigation',
    'settings' => 'big_bob_center_nav',
    'type' => 'radio',
    'choices' => array(
        'On' => __('On', 'big-bob'),
        'Off' => __('Off', 'big-bob'),
    ),
    'priority' => 100,
    'description' => __("This will center the contents of the navbar on wide screens and remove the tagline from the navbar 
    if it is being shown.  Note that the navbar will not recede when the wp admin bar is at the
    top of the screen.", 'big-bob'),
    ));
    $wp_customize->selective_refresh->add_partial( 'big_bob_center_nav', array(
        'render_callback' => 'big_bob_set_nav',
    ) );

    $wp_customize->add_setting('big_bob_menu_size', array(
        'default'     => 'Small',
        'transport'   => 'refresh',
        'sanitize_callback' => 'big_bob_checkMenuSize',
        ));
    
    $wp_customize->add_control('big_bob_menu_size', array(
    'label' => __('Menu Size', 'big-bob'),
    'section' => 'big_bob_navigation',
    'settings' => 'big_bob_menu_size',
    'type' => 'radio',
    'choices' => array(
        'Small' => __('Small', 'big-bob'),
        'Medium' => __('Medium', 'big-bob'),
        'Large' => __('Large', 'big-bob'),
    ),
    'priority' => 100,
    'description' => __("This will change the size of the menu items in your navbar.", 'big-bob'),
    ));
    $wp_customize->selective_refresh->add_partial( 'big_bob_menu_size', array(
        'render_callback' => 'big_bob_set_nav',
    ) );
    $wp_customize->add_setting('big_bob_menu_spacing', array(
        'default'     => 'Small',
        'transport'   => 'refresh',
        'sanitize_callback' => 'big_bob_checkMenuSize',
        ));
    
    $wp_customize->add_control('big_bob_menu_spacing', array(
    'label' => __('Menu Spacing', 'big-bob'),
    'section' => 'big_bob_navigation',
    'settings' => 'big_bob_menu_spacing',
    'type' => 'radio',
    'choices' => array(
        'Small' => __('Small', 'big-bob'),
        'Medium' => __('Medium', 'big-bob'),
        'Large' => __('Large', 'big-bob'),
    ),
    'priority' => 100,
    'description' => __("This will change the spacing between your menu items.", 'big-bob'),
    ));
    $wp_customize->selective_refresh->add_partial( 'big_bob_menu_spacing', array(
        'render_callback' => 'big_bob_set_nav',
    ) );

    $wp_customize->add_setting('big_bob_center_nav_with_tagline', array(
        'default'     => 'Off',
        'transport'   => 'refresh',
        'sanitize_callback' => 'big_bob_checkMediaFit',
        ));
    
    $wp_customize->add_control('big_bob_center_nav_with_tagline', array(
    'label' => __('Add Tagline When Title is Centered', 'big-bob'),
    'section' => 'big_bob_navigation',
    'settings' => 'big_bob_center_nav_with_tagline',
    'type' => 'radio',
    'choices' => array(
        'On' => __('On', 'big-bob'),
        'Off' => __('Off', 'big-bob'),
    ),
    'priority' => 100,
    'description' => __("This will add the tagline back into the navbar when the navbar title is centerd.  
    The tagline will stil appear below the navbar if a logo is used.", 'big-bob'),
    ));
    $wp_customize->selective_refresh->add_partial( 'big_bob_center_nav_with_tagline', array(
        'render_callback' => 'big_bob_set_nav',
    ) );

    function big_bob_checkMenuSize($input) {
        $valid = array(
            'Small' => 'Small',
            'Medium' => 'Medium',
            'Large' => 'Large',
        );
    
        if (array_key_exists($input, $valid)) {
            return $input;
        } else {
            return '';
        }
    }

    function big_bob_checkMediaFit($input) {
        $valid = array(
            'On' => 'On',
            'Off' => 'Off',
        );
    
        if (array_key_exists($input, $valid)) {
            return $input;
        } else {
            return '';
        }
    }

    function big_bob_checkMediaFit_home($input) {
        $valid = array(
            'On' => 'On',
            'Home Only' => 'Home Only',
            'Except Home' => 'Except Home',
            'Off' => 'Off',
        );
    
        if (array_key_exists($input, $valid)) {
            return $input;
        } else {
            return '';
        }
    }
}
add_action( 'customize_register', 'big_bob_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function big_bob_customize_preview_js() {
	wp_enqueue_script( 'big-bob-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'big_bob_customize_preview_js' );

add_action('wp_head', 'big_bob_customizer_css');
function big_bob_customizer_css()
{
    if (get_theme_mod('big_bob_hover_on', 'Off') == 'On') {
        ?>
         <style type="text/css">
            a, a:focus, a:active, a:visited { 
                 color: #<?php echo esc_attr(get_theme_mod('big_bob_link_color', '#66cdaa')); ?>; 
            }
            @media screen and (min-width: 1065px) {
                .nav-menu li a:hover, a:hover {
                    color:  #<?php echo esc_attr(get_theme_mod('big_bob_link_hover_color', '#66cdaa')); ?> !important;
                }
            }
            @media screen and (max-width: 1064px) {
                a, .nav-menu li a:hover,a:hover, a:focus, a:active, a:visited { 
                 color: #<?php echo esc_attr(get_theme_mod('big_bob_link_color', '#66cdaa')); ?>; 
                }
            }
         </style>
    <?php
    } else {
        ?>
         <style type="text/css">
             a, .nav-menu li a:hover,a:hover, a:focus, a:active, a:visited { 
                 color: #<?php echo esc_attr(get_theme_mod('big_bob_link_color', '#66cdaa')); ?>; 
                }
         </style>
    <?php
    }
}

//big_bob_set_nav
add_action('wp_head', 'big_bob_set_nav');
function big_bob_set_nav() {
    if (get_theme_mod('big_bob_center_nav', "Off") == "On") {
         ?>
			<style type="text/css">
                @media screen and (min-width: 1065px) {
                    #site-navigation ul {
                        transition: 1200ms ease;
                        margin: 0px;
                        margin-bottom: 10px;
                    }
                    #site-navigation.scrolled ul {
                        transition: 1200ms ease;
                    }
                    .custom-logo-link,
                    .bb-site-title-top {
                        clear: both;
                        display: block;
                        margin-left: auto;
                        margin-right: auto;
                        text-align: center;
                        margin-bottom: 10px !important;
                        margin-top: 10px!important;
                        padding-right: 0px
                    }
                    .bb-site-title-top {
                        font-size: 45px !important;
                    }
                    .bb-site-description-top {
                        display: none;
                    }
                    .main-navigation ul{
                        justify-content: center;
                    }
                    .nav-menu, .custom-logo-link {
                        float: none;
                        padding: 0px !important;
                    }
                    <?php
                    if (has_custom_logo() || display_header_text()) {
                    ?>
                        @media screen and (min-width: 1065px) {
                            #site-navigation.scrolled {
                                top: -80px;
                            }
                        }
                    <?php
                    } else {
                        ?>
                            #site-navigation {
                                padding-top: 10px;
                            }
                        <?php
                    }
                    ?>
                }
            </style>
        <?php
        if ((get_theme_mod('big_bob_menu_size', "Small") == "Medium") || (get_theme_mod('big_bob_menu_size', "Small") == "Large")) {
            ?>
            <style type="text/css">
                @media screen and (min-width: 1065px) {
                    #site-navigation ul {
                        font-size: 23px;
                    }
                    #site-navigation.scrolled ul {
                        font-size: 18px;
                    }
                    .no-results .sideStick,
                    .search-results .sideStick,
                    .error404 .sideStick,
                    .search-no-results .sideStick{
                        top: 150px;
                    }
                }
            </style>
            <?php
            if (get_theme_mod('big_bob_menu_size', "Small") == "Large") {
                ?>
                <style type="text/css">
                    @media screen and (min-width: 1065px) {
                        #site-navigation ul {
                            font-size: 30px;
                        }
                    }
                </style>
            <?php
            }
            if ((get_theme_mod( 'big_bob_highlight_feature_image', 'Off' ) == 'Off') && !is_front_page() && (is_page() || is_single()) ) {
                ?>
                <style type="text/css">
                @media screen and (min-width: 1065px) {
                    .page .sideStick,
                    .single .sideStick{
                        top: 150px;
                    }
                }
                </style>
                <?php
            }
            $big_bob_description = get_bloginfo( 'description', 'display' );
            if (!is_front_page() && !(!get_header_image() && !has_header_video() && !display_header_text() && !is_front_page() && !((get_theme_mod( 'big_bob_highlight_feature_image', 'Off' ) == 'On') && !is_front_page() && (is_page() || is_single()) ) )){
                ?>
                <style type="text/css">
                @media screen and (min-width: 1065px) {
                    .bb-top-padding{
                        margin: 300px;
                    }
                }
                </style>
                <?php
                if (!display_header_text()) {
                    ?>
                    <style type="text/css">
                    @media screen and (min-width: 1065px) {
                        .bb-top-padding{
                            margin: 180px;
                        }
                    }
                    </style>
                    <?php
                }
            }
        }
        //Add the tagline back
        $big_bob_description = get_bloginfo( 'description', 'display' );
        if ((get_theme_mod( 'big_bob_center_nav_with_tagline', 'Off' ) == 'On') && !has_custom_logo() && $big_bob_description) {
            ?>
            <style type="text/css">
            @media screen and (min-width: 1065px) {
                .bb-site-title-top {
                    font-size: 30px !important;
                    margin-top: 0px !important;
                    margin-bottom: 5px !important;
                }
                .bb-site-description-top {
                    font-size: 15px !important;
                    display: block;
                    clear: both;
                    display: block;
                    margin-left: auto;
                    margin-right: auto;
                    text-align: center;
                    padding-right: 0px;
                }
            }
            </style>
            <?php
            big_bob_change_fonts_title();
        }
    } else {//not centered
        ?>
        <style type="text/css">
            @media screen and (min-width: 1065px) {
                #site-navigation ul {
                    margin-bottom: 0px;
                    transition: 1200ms ease;
                }
                #site-navigation.scrolled ul {
                    transition: 1200ms ease;
                }
                #site-navigation.scrolled .custom-logo-link {
                    padding-top: 10px;
                    padding-bottom: 10px;
                    transition: 1200ms ease;
                }

                #site-navigation .custom-logo-link {
                    padding-top: 25px;
                    padding-bottom: 25px;
                    transition: 1200ms ease;
                }
            }
        </style>
        <?php
        if (get_theme_mod('big_bob_menu_size', "Small") == "Small") {
            $big_bob_description = get_bloginfo( 'description', 'display' );
            if ($big_bob_description && !has_custom_logo()) {
                ?>
			    <style type="text/css">
                    @media screen and (min-width: 1065px) {
                        #site-navigation.scrolled ul {
                                margin-top: -15px !important;
                        }
                        #site-navigation.scrolled ul ul {
                                margin-top: 0px !important;
                        }
                    }
                </style>
                <?php
            } else {
                ?>
			    <style type="text/css">
                    @media screen and (min-width: 1065px) {
                        #site-navigation.scrolled ul {
                                margin-top: -12px !important;
                        }
                        #site-navigation.scrolled ul ul {
                                margin-top: 0px !important;
                        }
                    }
                </style>
                <?php
            }
        } else if (get_theme_mod('big_bob_menu_size', "Small") == "Medium") {
            ?>
            <style type="text/css">
                @media screen and (min-width: 1065px) {
                    #site-navigation ul {
                        margin-top: -4px !important;
                        font-size: 23px;
                    }
                    #site-navigation.scrolled ul {
                        font-size: 18px;
                    }
                    #site-navigation.scrolled ul ul {
                         margin-top: 0px !important;
                    }
                }
            </style>
            <?php
            $big_bob_description = get_bloginfo( 'description', 'display' );
            if ($big_bob_description && !has_custom_logo()) {
                ?>
			    <style type="text/css">
                    @media screen and (min-width: 1065px) {
                        #site-navigation.scrolled ul {
                            margin-top: -18px !important;
                        }
                        #site-navigation.scrolled ul ul {
                                margin-top: 0px !important;
                        }
                    }
                </style>
                <?php
            } else {
                ?>
			    <style type="text/css">
                    @media screen and (min-width: 1065px) {
                        #site-navigation.scrolled ul {
                                margin-top: -15px !important;
                        }
                        #site-navigation.scrolled ul ul {
                                margin-top: 0px !important;
                        }
                    }
                </style>
                <?php
            }
        } else if (get_theme_mod('big_bob_menu_size', "Small") == "Large") {
            ?>
            <style type="text/css">
                @media screen and (min-width: 1065px) {
                    #site-navigation ul {
                        margin-top: -7px !important;
                        font-size: 30px;
                    }
                    #site-navigation.scrolled ul {
                        font-size: 18px;
                    }
                    #site-navigation.scrolled ul ul {
                        margin-top: 0px !important;
                    }
                }
            </style>
            <?php
            $big_bob_description = get_bloginfo( 'description', 'display' );
            if ($big_bob_description && !has_custom_logo()) {
                ?>
			    <style type="text/css">
                    @media screen and (min-width: 1065px) {
                        #site-navigation.scrolled ul {
                            margin-top: -18px !important;
                        }
                        #site-navigation.scrolled ul ul {
                            margin-top: 0px !important;
                        }
                    }
                </style>
                <?php
            } else {
                ?>
			    <style type="text/css">
                    @media screen and (min-width: 1065px) {
                        #site-navigation.scrolled ul {
                                margin-top: -15px !important;
                        }
                        #site-navigation.scrolled ul ul {
                            margin-top: 0px !important;
                        }
                    }
                </style>
                <?php
            }
        }
    }
    if (get_theme_mod('big_bob_menu_spacing', "Small") == "Small") {
        if (get_theme_mod('big_bob_center_nav', "Off") == "On") {
            ?>
            <style type="text/css">
                .main-navigation li {
                    margin-left: 5px;
                    margin-right: 5px;
                }
            </style>
            <?php
        } else {
            ?>
            <style type="text/css">
                .main-navigation li {
                    margin-left: 10px;
                }
            </style>
            <?php
        }
    } else if (get_theme_mod('big_bob_menu_spacing', "Small") == "Medium") {
        if (get_theme_mod('big_bob_center_nav', "Off") == "On") {
            ?>
            <style type="text/css">
                .main-navigation li {
                    margin-left: 9px;
                    margin-right: 9px;
                }
            </style>
            <?php
        } else {
            ?>
            <style type="text/css">
                .main-navigation li {
                    margin-left: 18px;
                }
            </style>
            <?php
        }
    } else {
        if (get_theme_mod('big_bob_center_nav', "Off") == "On") {
            ?>
            <style type="text/css">
                .main-navigation li {
                    margin-left: 18px;
                    margin-right: 18px;
                }
            </style>
            <?php
        } else {
            ?>
            <style type="text/css">
                .main-navigation li {
                    margin-left: 25px;
                }
            </style>
            <?php
        }
    }
}

add_action('wp_head', 'big_bob_show_footer_on');
function big_bob_show_footer_on() {
    if (get_theme_mod('big_bob_show_footer', "On") == "Off") {
         ?>
			<style type="text/css">
                .site-footer {
                    display: none;
                }
            </style>
        <?php
    }
}

add_action('wp_head', 'big_bob_change_fonts_title');
function big_bob_change_fonts_title() {
    if (get_theme_mod('big_bob_fonts_title') != "") {
        $big_bob_url = get_theme_mod('big_bob_fonts_title'); ?>
			<style type="text/css">
                h1, h2, h3, h4, h5, h6, .site-description {
                    font-family: "<?php echo esc_html($big_bob_url); ?>", RobotoCondensed-Bold, Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif;
                }
            </style>
        <?php
    }
}

add_action('wp_head', 'big_bob_change_fonts_paragraph');
function big_bob_change_fonts_paragraph() {
    if (get_theme_mod('big_bob_fonts_paragraph') != "") {
        $big_bob_url = get_theme_mod('big_bob_fonts_paragraph'); ?>
			<style type="text/css">
                p, pre {
                    font-family: "<?php echo esc_html($big_bob_url); ?>", Abel-Regular, 'Times New Roman', Times, serif;
                }
            </style>
        <?php
    }
}

add_action('wp_head', 'big_bob_change_fonts_misc');
function big_bob_change_fonts_misc() {
    if (get_theme_mod('big_bob_fonts_misc') != "") {
        $big_bob_url = get_theme_mod('big_bob_fonts_misc'); ?>
			<style type="text/css">
                body,
                button,
                input,
                select,
                optgroup,
                textarea {
                    font-family: "<?php echo esc_html($big_bob_url); ?>", RobotoCondensed-Bold, Arial, Helvetica, sans-serif;
                }
            </style>
        <?php
    }
}

add_action('wp_head', 'big_bob_add_bright');
function big_bob_add_bright() {
    if (get_theme_mod('big_bob_bright_mode', 'Off') == 'On') {
        ?>
			<style type="text/css">
                .site-branding {
                    background: rgba(250, 250, 250, 0.8);
                }
                .bb-scroll-down {
                    background: rgba(250, 250, 250, 1);
                }
                .bb-back-to-top {
                    background: rgba(250, 250, 250, 1);
                }
                #bb-site-description-top,
                .site-description {
                    color: rgba(0, 0, 0, 1);
                }
                #site-navigation {
                    background: rgba(250, 250, 250, 0.8) !important;
                }
                #site-navigation.scrolled {
                    transition: 1200ms ease;
                    background: rgba(250, 250, 250, 1) !important;
                }
                p, pre {
                    color: rgba(0, 0, 0, 1);
                }
                .main-navigation ul ul,
                figcaption,
                .bb-alignleftstyle,
                .bb-alignrightstyle,
                .bb-aligncenterstyle,
                .posts-navigation, .post-navigation, .pagination,
                .no-sidebar .no-results {
                    background: rgba(250, 250, 250, 0.8);
                }
                @media screen and (max-width: 1064px) {
                    #bb-popout {
                        background: rgba(250, 250, 250, 0.8);
                    }
                    .nav-menu li {
                        border-bottom: 1px solid #000;
                    }
                }
                body,h1, h2, h3, h4, h5, h6  {
                    color: rgba(0,0,0,1);
                }
                #bb-preloader {
                    background: #fff;
                    color: #000;
                }
                #bb-preloader:before {
                    border: 6px solid #fff;
	                border-top: 6px solid #000;
                }
                .widget_search .search-form .search-submit, .form-submit .submit, .widget_search .search-form #submit,
                .error-404 .search-submit,
                .no-results .search-submit {
                    border: 1px solid #000;
                    background-color: transparent;
                    color: #000;
                }
                input[type="text"], input[type="email"], input[type="url"], input[type="password"], input[type="search"], input[type="number"], input[type="tel"], input[type="range"], input[type="date"], input[type="month"], input[type="week"], input[type="time"], input[type="datetime"], input[type="datetime-local"], input[type="color"], textarea {
                    border: 1px solid #000;
                }
			</style>
		<?php
    } else if ( get_theme_mod( 'big_bob_extra_dark', 'Off' ) == 'On' ) {//bright mode is off
        ?>
        <style type="text/css">
            .site-branding {
                    background: rgba(0, 0, 0, 0.9);
                }
            .bb-scroll-down {
                background: rgba(0, 0, 0, 0.9);
            }
            .bb-back-to-top {
                background: rgba(0, 0, 0, 0.9);
            }
            #site-navigation {
                background: rgba(0, 0, 0, 0.9) !important;
            }
            #site-navigation.scrolled {
                transition: 1200ms ease;
                background: rgba(0, 0, 0, 1) !important;
            }
            .main-navigation ul ul,
            figcaption,
            .bb-alignleftstyle,
            .bb-alignrightstyle,
            .bb-aligncenterstyle,
            .posts-navigation, .post-navigation, .pagination,
            .no-sidebar .no-results {
                background: rgba(0, 0, 0, .9);
            }
            @media screen and (max-width: 1064px) {
                #bb-popout {
                    background: rgba(0, 0, 0, .9);
                }
            }
        </style>
        <?php
    }
    if( get_theme_mod( 'big_bob_opaque_body', 'Off' ) == 'On' ) {
        if (get_theme_mod('big_bob_bright_mode', 'Off') == 'On') {
            ?>
            <style type="text/css">
                .main-navigation ul ul,
                figcaption,
                .bb-alignleftstyle,
                .bb-alignrightstyle,
                .bb-aligncenterstyle,
                .posts-navigation, .post-navigation, .pagination,
                .no-sidebar .no-results {
                    background: rgba(250, 250, 250, 1);
                }
                @media screen and (max-width: 1064px) {
                    #bb-popout {
                        background: rgba(250, 250, 250, 1);
                    }
                }
            </style>
            <?php
        } else {
            ?>
            <style type="text/css">
                .main-navigation ul ul,
                figcaption,
                .bb-alignleftstyle,
                .bb-alignrightstyle,
                .bb-aligncenterstyle,
                .posts-navigation, .post-navigation, .pagination,
                .no-sidebar .no-results {
                    background: rgba(0, 0, 0, 1);
                }
                #site-navigation.scrolled {
                    background: rgba(0, 0, 0, 1) !important;
                }
                @media screen and (max-width: 1064px) {
                    #bb-popout {
                        background: rgba(0, 0, 0, 1);
                    }
                }
            </style>
            <?php
        }
    }
    if (get_theme_mod('big_bob_opaque_top', 'Off') == 'On') {
        if (get_theme_mod('big_bob_bright_mode', 'Off') == 'On') {
            ?>
            <style type="text/css">
                #site-navigation,
                .site-branding {
                    background: rgba(250, 250, 250, 1) !important;
                }
            </style>
            <?php
        } else {
            ?>
            <style type="text/css">
                #site-navigation,
                .site-branding {
                    background: rgba(0, 0, 0, 1) !important;
                }
            </style>
            <?php
        }
    }
}

add_action('wp_head', 'big_bob_add_shadow');
function big_bob_add_shadow() {
    if( get_theme_mod( 'big_bob_background_shadow', 'On' ) == 'On' ) {
		?>
			<style type="text/css">
                .bb-site-title-top {
                    text-shadow: 0rem 0.8rem 0.8rem rgba(0, 0, 0, 1);
                    transition: 1200ms ease;
                }
                .bb-alignleftstyle,
                .bb-alignrightstyle,
                .bb-aligncenterstyle,
                .posts-navigation, .post-navigation, .pagination,
                .site-branding,
                .bb-scroll-down,
                #bb-toggle,
                .bb-back-to-top,
                #site-navigation,
                #site-navigation.scrolled,
                .no-sidebar .no-results
                {
                    box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 1);
                }
			</style>
		<?php
    } 
    if (get_theme_mod('big_bob_title_shadow', 'Off') == 'Off') {
		?>
			<style type="text/css">
                .bb-site-title-top {
                    text-shadow: none !important;
                }
			</style>
		<?php
    }
}

add_action('wp_head', 'big_bob_turn_on_strict_style');
function big_bob_turn_on_strict_style() {
    if( get_theme_mod( 'big_bob_strict_body_style', 'On' ) == 'On' ) {
		?>
			<style type="text/css">
                .entry-title {
                    width:75%;
                    clear: both;
                    display: block;
                    margin-left: auto;
                    margin-right: auto;
                }

                .bb-center-image img {
                    width: 75%;
                    max-width: 58rem;
                }
                .wp-block-video video {
                    width: 75%;
                }
                .wp-block-video video,
                #player {
                    max-width: 58rem;
                }
                .wp-block-cover{
                    margin-top: 10px;
                }
                .wp-block-button,
                .wp-block-button__link {
                    margin: 5px;
                    text-align: center;
                }
                .wp-block-embed,
                .wp-block-image,
                .wp-block-image img,
                .wp-block-video figcaption,
                .wp-block-embed iframe,
                .wp-block-embed figcaption,
                .twitter-tweet,
                .fb-post,
                .fb_iframe_widget,
                .fb_iframe_widget_fluid,
                .fb-post iframe,
                p iframe,
                .wp-block-file,
                #player,
                .player {
                    width: 75%;
                    clear: both;
                    display: block;
                    margin-left: auto;
                    margin-right: auto;
                    text-align: center;
                    max-width: 58rem;
                }

                .jetpack-video-wrapper iframe,
                .wp-block-embed-instagram,
                .instagram-media {
                    margin-left: auto !important;
                    margin-right: auto !important;
                }

                .wp-block-embed figcaption,
                .wp-block-video figcaption {
                    text-align: center; 
                }

                .wp-block-embed iframe,
                .wp-block-embed span {
                    max-width: 100%;
                }

                .wp-block-video,
                .wp-block-video video,
                #player{
                    clear: both;
                    display: block;
                    margin-left: auto;
                    margin-right: auto;
                }
                .home .bb-fv,
                .home .bb-fv video {
                    width:75%;
                    max-width: 58rem;
                    clear: both;
                    display: block;
                    margin-left: auto;
                    margin-right: auto;
                }

                .entry-meta,
                .entry-footer,
                .page-links {
                    width:75%;
                    float: none;
                    text-align: center;
                    clear: both;
                    display: block;
                    margin-left: auto;
                    margin-right: auto;
                }
                /*This is also in the main style sheet*/
                @media screen and (max-width: 500px) {
                    .archive-description p,
                    .entry-content p,
                    .search-results p,
                    .entry-title,
                    .bb-center-image img,
                    .home .bb-fv,
                    .home .bb-fv video,
                    code,
                    h2, h3, h4, h5, h6,
                    .wp-block-embed,
                    .wp-block-image,
                    .wp-block-image img,
                    .wp-block-video figcaption,
                    .wp-block-embed iframe,
                    .wp-block-embed figcaption,
                    .twitter-tweet,
                    .fb-post,
                    .fb_iframe_widget,
                    .fb_iframe_widget_fluid,
                    .fb-post iframe,
                    p iframe,
                    .wp-block-file {
                            width: 100%;
                        }
                    .wp-block-embed,
                    .wp-block-video video,
                    .wp-block-video figcaption,
                    #player,
                    p iframe {
                        width: 100%;
                        max-width: 100%;
                    }
                    
                    .wp-block-image,
                    .wp-block-image img{
                        max-width: 100%;
                    }
                    .entry-content ul,
                    .entry-content ol{
                        width: 100%;
                    }
                    
                    .entry-meta,
                    .page-links {
                        width: 100%;
                    }

                    .entry-footer {
                        width: 95%;
                    }
                }
                .nav-links {
                    font-size: 15px;
                }
                .post-navigation, .pagination {
                    padding-left: 5px;
                    padding-right: 5px;
                    width: 85%;
                }
                @media screen and (max-width: 1050px) {
                    .nav-links {
                        font-size: 15px;
                    }
                    .widget_search .search-form .search-submit, .widget_search .search-form #submit, .error-404 .search-submit, .no-results .search-submit {
                        width: 32%
                    }
                }
                @media screen and (max-width: 600px) {
                    .nav-links,
                    .page-header{
                        font-size: 13px;
                    }
                    .post-navigation, .pagination {
                        padding-left: 3x;
                        padding-right: 3px;
                    }
                }

                input {
                    font-family: RobotoCondensed-Bold, Arial, Helvetica, sans-serif;
                }
			</style>
		<?php
    } 
}

add_action('wp_head', 'big_bob_turn_on_highlighted_featured_image');
function big_bob_turn_on_highlighted_featured_image() {
    if( get_theme_mod( 'big_bob_highlight_feature_image', 'Off' ) == 'On' ) {
        if (is_page() && !is_front_page()) {
            ?>
			<style type="text/css">
                .entry-header {
                    display: none;
                }
			</style>
		<?php
        } else if (is_single()) {
            ?>
			<style type="text/css">
                .entry-title {
                    display: none;
                }
			</style>
		<?php
        }
        if (!is_front_page() && is_page() || is_single()) {
            ?>
			<style type="text/css">
            .site-title {
                display: none;
            }
            .site-branding {
                right: 30vw;
                text-align: left;
                width: 30%;
                bottom:  65vh;
                margin-bottom: auto;
            }
            .bb-page-or-post-title {
                font-size: 35px;
                font-weight: bold;
            }

            @media screen and (min-width: 1250px) {
                .site-branding {
                    width: 28%;
                }
            }

            @media screen and (max-width: 1050px) {
                .site-branding {
                    width: 33%;
                    right: 30vw;
                    bottom:  68vh;
                }
            }

            @media screen and (max-width: 900px) {
                .site-branding {
                    width: 38%;
                }
            }

            @media screen and (max-width: 800px) {
                .bb-page-or-post-title {
                    font-size: 30px;
                }
            }

            @media screen and (max-width: 750px) {
                .site-branding {
                    right: 0vw;
                    text-align: center;
                    width: 92%;
                }
            }

            @media screen and (max-width: 600px) {
                .bb-page-or-post-title {
                    font-size: 25px;
                }
            }

            @media screen and (max-height: 450px) {
                .site-branding {
                    right: 0vw;
                    text-align: center;
                    width: 52%;
                }
            }
            </style>
		<?php
        }
    } 
}

add_action('wp_head', 'big_bob_turn_on_wide_when_centered');
function big_bob_turn_on_wide_when_centered() {
    if (get_theme_mod('big_bob_wide_when_centered', 'Off') == 'On') {
        ?>
        <style type="text/css">
        /*begin wide*/
        .page .entry-content.bb-aligncenterstyle {
            width: 100%;
            border-radius: 0px;
        }
        @media screen and (min-width: 1064px) {
            .page .entry-content.bb-aligncenterstyle p,
            .page .entry-content.bb-aligncenterstyle pre,
            .page .entry-content.bb-aligncenterstyle ul,
            .page .entry-content.bb-aligncenterstyle ol,
            .page .entry-content.bb-aligncenterstyle dl,
            .page .entry-content.bb-aligncenterstyle cite,
            .page .entry-content.bb-aligncenterstyle address {
                width: 55%;
            }
            .page .entry-content.bb-aligncenterstyle code {
                width: auto;
            }
        }
        .page .bb-aligncenterstyle .blocks-gallery-grid {
            max-width: 100%;
            width: 100% !important;
        }
        .page .entry-header.bb-aligncenterstyle {
            width: 100%;
            border-radius: 0px;
        }
        .page .comments-area.bb-aligncenterstyle {
            width: 100%;
            border-radius: 0px;
        }
        .page .bb-wide-footer {
            width: 100%;
            max-width: 100%;
            border-radius: 0px;
            margin-bottom: -25px;
        }
        /*end wide*/
        </style>
        <?php
    }
}

add_action('wp_head', 'big_bob_remove_main_background');
function big_bob_remove_main_background() {
    if ((get_theme_mod('big_bob_background_copy', 'On') == 'On') || (get_theme_mod('big_bob_background_copy_all', 'Off') == 'On')) {
        ?>
            <style type="text/css">
                body {
                    background-image: none !important;
                }
			</style>
		<?php
    } else {
        $BIURL = get_background_image();
        if ($BIURL) {
            ?>
            <style type="text/css">
                body {
                    background-image: url("<?php echo esc_url($BIURL)?>") !important;
                }
			</style>
		<?php
        }
    }
}

add_action('wp_head', 'big_bob_turn_on_big_description');
function big_bob_turn_on_big_description() {
    if( get_theme_mod( 'big_bob_big_description_only', 'On' ) == 'On' ) {
		?>
			<style type="text/css">
                .site-title {
                    display: none;
                }
                .site-branding {
                    right: 35vw;
                    text-align: left;
                    width: 20%;
                }
                .site-description {
                    font-size: 45px;
                    font-weight: bold;
                }

                @media screen and (min-width: 1250px) {
                    .site-branding {
                        width: 18%;
                     }
                }

                @media screen and (max-width: 1050px) {
                    .site-branding {
                        width: 23%;
                        right: 30vw;
                     }
                }

                @media screen and (max-width: 900px) {
                    .site-branding {
                        width: 28%;
                     }
                }

                @media screen and (max-width: 750px) {
                    .site-branding {
                        right: 0vw;
                        text-align: center;
                        width: 52%;
                    }
                }
                
                @media screen and (max-width: 600px) {
                    .site-branding {
                        width: 85%;
                    }
                }

                @media screen and (max-width: 500px) {
                    .site-description {
                        font-size: 42px;
                    }
                }

                @media screen and (max-height: 450px) {
                    .site-branding {
                        right: 0vw;
                        text-align: center;
                        width: 85%;
                    }
                }
			</style>
		<?php
        if( get_theme_mod( 'big_bob_big_descrip_small_text', 'On' ) == 'On' ) {
            ?>
			<style type="text/css">
                .site-description {
                    font-size: 35px;
                }
                @media screen and (max-width: 500px) {
                    .site-description {
                        font-size: 32px;
                    }
                }
                </style>
		<?php
         }
    } 
    big_bob_turn_on_highlighted_featured_image();//overrides if necessary.
}

add_action('wp_head', 'big_bob_sidebar_is_sticky');
function big_bob_sidebar_is_sticky() {
    if( get_theme_mod( 'big_bob_sticky_sidebar', 'On' ) == 'Off' ) {
		?>
			<style type="text/css">
				.sideStick {
                    position: static;
                    top: auto;
                    right: auto;
                }
                @media screen and (min-width: 750px) {
                    #secondary {
                        max-height: none;
                    }
                }
                @media screen and (min-height: 1000px) {
                    #secondary {
                        max-height: none;
                    }
                }
			</style>
		<?php
    } else {
        ?>
			<style type="text/css">
                .bb-indie-left {
                    min-height: 68vh;
                }
				.sideStick {
                    position: fixed;
                    top: 130px;
                    right: 0;
                    overflow: auto;
                    overflow-x:  hidden;
                }
                @media screen and (max-width: 1300px) {
                    .site-footer {
                        max-width: 400px;
                    }
                }
                @media screen and (max-width: 1000px) {
                    .site-footer {
                        max-width: 300px;
                    }
                }
                @media screen and (min-width: 750px) {
                    #secondary {
                        max-height: 60vh;
                        overflow: auto;
                        overflow-x: hidden;
                        scrollbar-width: thin;
                        scrollbar-color: #fff #000;
                    }
                }
                @media screen and (min-height: 1000px) {
                    #secondary {
                        max-height: 75vh;
                    }
                    .bb-indie-left {
                        min-height: 78vh;
                    }
                }
			</style>
		<?php
    }
}

add_action('wp_head', 'big_bob_phone_is_sticky');
function big_bob_phone_is_sticky() {
    if( get_theme_mod( 'big_bob_sticky_navbar_on_mobile', 'Off' ) == 'Off' ) {
		?>
			<style type="text/css">
                @media screen and (max-width: 1065px) {
                    .bb-fixed-top {
                        position: absolute;
                    }
                }
			</style>
		<?php
    } else if( get_theme_mod( 'big_bob_sticky_navbar_on_phone', 'Off' ) == 'Off' ) {
		?>
			<style type="text/css">
                @media screen and (max-width: 500px) {
                    .bb-fixed-top {
                        position: absolute;
                    }
                }
			</style>
		<?php
    } else {
        ?>
			<style type="text/css">
                @media screen and (max-width: 1065px) {
                    .bb-fixed-top {
                        position: fixed;
                    }
                }
				@media screen and (max-width: 500px) {
                    .bb-fixed-top {
                        position: fixed;
                    }
                }
			</style>
		<?php
    }
}

add_action('wp_head', 'big_bob_media_in_background');
function big_bob_media_in_background() {
    if( get_theme_mod( 'big_bob_media_to_background', 'Off' ) == 'On' ) {
		?>
            <style type="text/css">
            
                .wp-custom-header video,
                .wp-custom-header img,
                .wp-custom-header iframe {
                    position: fixed;
                    z-index: -999;
                }
            
			</style>
		<?php
    } else {
        ?>
            <style type="text/css">

                .wp-custom-header,
				.wp-custom-header video,
                .wp-custom-header img,
                .wp-custom-header iframe {
                    position: relative;
                    z-index: auto;
                }
            
			</style>
		<?php
    }
}
add_action('wp_head', 'big_bob_video_for_phone');
function big_bob_video_for_phone() {
    if( get_theme_mod( 'big_bob_video_on_phone', 'On' ) == 'Off' ) {
		add_filter( 'header_video_settings', function( $args ) {

            $args['minWidth'] = 1050;
        
            return $args;
        
        } );
    } else {
        add_filter( 'header_video_settings', function( $args ) {

            $args['minWidth'] = 0;
        
            return $args;
        
        } );
    }
}

