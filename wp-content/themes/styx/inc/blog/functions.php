<?php


function styx_render_post_title() {
    ?>
    <h2>
        <a class="styx-post-title" href="<?php echo esc_url(get_the_permalink()); ?>">
            <?php echo esc_html(get_the_title()); ?>
        </a>
    </h2>
    <?php
}

function styx_render_featured_image() {
    if (has_post_thumbnail()) {
        ?>
        <div class="styx-featured-image__container">

            <?php the_post_thumbnail('post-thumbnail',
                array("class" => "styx-featured-image space-bottom-small space-bottom-xs")); ?>

        </div>
        <?php

    }
}

function styx_render_post_tags() {
    ?>
    <div class="styx-post-tags"><?php the_tags(''); ?></div>
    <?php
}

function styx_render_post_excerpt() {
    ?>
    <p class="card-text styx-post-excerpt"><?php echo esc_html(get_the_excerpt()); ?></p>
    <?php
}

function styx_render_post_author() {
    ?>
    <span class="styx-post-author">
        <label class="styx-post-author__label">By</label>
        <a href="<?php echo esc_attr(get_author_posts_url(get_the_author_meta('ID'))); ?>">
            <?php echo esc_html(get_the_author_meta('display_name', get_the_author_meta('ID'))); ?>
        </a>
    </span>
    <?php
}

function styx_get_post_meta_date_url() {
    $id = get_the_ID();
    $link = get_day_link(get_post_time('Y', false, $id, true),
        get_post_time('m', false, $id, true),
        get_post_time('j', false, $id, true));

    return $link;
}

function styx_render_post_date() {
    ?>
    <a href="<?php echo esc_attr(styx_get_post_meta_date_url()); ?>">
        <?php  echo esc_html(get_the_date('F j, Y')); ?>
    </a>
    <?php
}

function styx_render_post_sticky() {
    if(is_sticky()) {
        ?> <span> <?php esc_html_e('Sticky post', 'styx'); ?> </span> <?php
    }
}

function styx_render_post_meta() {
    ?>
    <div class="styx-post-meta-container">
        <?php styx_render_post_author() ?>
        <?php styx_render_post_date() ?>
        <?php styx_render_post_sticky() ?>
    </div>
    <?php
}

function styx_render_post_read_more() {
    ?>
    <a href="<?php echo esc_url(get_the_permalink()); ?>">
        Read More
    </a>
    <?php
}

function styx_render_post_navigation() {
    ?>
    <div class="mb-4">
        <?php
        the_post_navigation(array(
            'next_text' => '<span class="meta-nav" aria-hidden="true">' . esc_html__('Next:',
                    'styx')
                . '</span> ' .
                '<span class="screen-reader-text">' . esc_html__('Next post:',
                    'styx') . '</span> ' .
                '<span class="post-title">%title</span><i class="font-icon-post fa fa-angle-double-right"></i>',
            'prev_text' => '<i class="font-icon-post fa fa-angle-double-left"></i>' .
                '<span class="meta-nav" aria-hidden="true">' . esc_html__('Previous:',
                    'styx')
                . '</span> ' .
                '<span class="screen-reader-text">' . esc_html__('Previous post:', 'styx')
                . '</span> ' .
                '<span class="post-title">%title</span>',
        ));

        ?>
    </div>
    <?php
}

function styx_render_post_comments() {
    if (comments_open() || get_comments_number()) {
        comments_template();
    }
}