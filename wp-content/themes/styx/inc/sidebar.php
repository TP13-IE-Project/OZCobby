<?php
add_action( 'widgets_init', function() {
    register_sidebars(1, array(
            'name'          => esc_html__( 'Blog sidebar widget area', 'styx' ),
            'id'            => 'styx-sidebar-1',
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'before_title'  => '<h5 class="widgettitle">',
            'after_title'   => '</h5>',
            'after_widget'  => '</div>',
        )
    );
} );

function styx_widget_area( $id ) {
    dynamic_sidebar( $id );
}