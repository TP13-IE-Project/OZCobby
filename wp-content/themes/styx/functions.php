<?php
function styx_dir($path) {
    return get_template_directory() . '/' . $path;
}

function styx_url($path) {
    return get_template_directory_uri() . '/' . $path;
}


function styx_in_customizer() {
    global $wp_customize;
    return isset($wp_customize);
}
require_once styx_dir('inc/functions.php');


function styx_load_assets() {
    wp_enqueue_style('style', get_stylesheet_uri());
    wp_enqueue_style('bootstrap', styx_url('/assets/css/bootstrap.min.css'), false, '1.1');
    wp_enqueue_style('styx-style', styx_url('/assets/css/style.min.css'), false, '1.1');

    wp_enqueue_script('bootstrap', styx_url('/assets/js/bootstrap.min.js'), array('jquery'), 1.1, true);
    if (is_singular()) {
        wp_enqueue_script("comment-reply");
    }
}

function styx_load_customizer_assets() {
    wp_enqueue_style('kirki-library-style', styx_url('/includes/kirki/controls/css/styles.css'), false, '1.1');
    wp_enqueue_style('styx-customizer-style', styx_url('/assets/css/customizer.min.css'), false, '1.1');
}
add_action('wp_enqueue_scripts', 'styx_load_assets');
add_action('customize_controls_enqueue_scripts', 'styx_load_customizer_assets');
function styx_register_nav_menu() {
    register_nav_menus(array(
        'primary_menu' => __('Primary Menu', 'styx'),
        'footer_menu' => __('Footer Menu', 'styx'),
    ));
}

add_action('after_setup_theme', 'styx_register_nav_menu', 0);

function styx_the_posts_navigation() {
    the_posts_pagination(
        array(
            'before_page_number' => esc_html__('Page', 'styx') . ' ',
            'mid_size' => 0,
            'prev_text' => sprintf(
                '<span class="nav-prev-text">%s</span>',
                wp_kses(
                    __('Newer <span class="nav-short">posts</span>', 'styx'),
                    array(
                        'span' => array(
                            'class' => array(),
                        ),
                    )
                )
            ),
            'next_text' => sprintf(
                '<span class="nav-next-text">%s</span>',
                wp_kses(
                    __('Older <span class="nav-short">posts</span>', 'styx'),
                    array(
                        'span' => array(
                            'class' => array(),
                        ),
                    )
                )
            ),
        )
    );
}

function styx_init() {
    add_theme_support('automatic-feed-links');
    add_theme_support('customize-selective-refresh-widgets');
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('custom-logo', array(
        'flex-height' => true,
        'flex-width' => true,
        'width' => 150,
        'height' => 70,
    ));

    global $content_width;
    $content_width = 1200;

    \Styx\StyxTheme::init();

}

styx_init();
