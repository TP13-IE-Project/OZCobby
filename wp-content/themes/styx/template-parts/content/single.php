<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div id="styx-single-content__container" class="container mb-4">
        <div class="row">
            <div class="col-md-9 col-12 styx-content">

                <div class="card mb-4">
                    <div class="card-body">
                        <?php
                        if (have_posts()) :
                        while (have_posts()) :
                        the_post();

                        styx_render_featured_image();

                        styx_render_post_tags();

                        styx_render_post_title();

                        styx_render_post_meta();

                        the_content();


                        ?>
                    </div>
                </div>
                <?php
                wp_link_pages(array(
                    'before' => '<div class="page-links"><span class="page-links-title">' . esc_html__('Pages:',
                            'styx') . '</span>',
                    'after' => '</div>',
                    'link_before' => '<span>',
                    'link_after' => '</span>',
                    'pagelink' => '<span class="screen-reader-text">' . esc_html__('Page', 'styx')
                        . ' </span>%',
                    'separator' => '<span class="screen-reader-text">,&nbsp;</span>',
                ));


                styx_render_post_navigation();

                styx_render_post_comments();

                endwhile;
                endif;
                ?>
            </div>
            <div class="styx-sidebar col-md-3 col-12">
                <?php styx_widget_area('styx-sidebar-1'); ?>
            </div>
        </div>
    </div>
</div>

