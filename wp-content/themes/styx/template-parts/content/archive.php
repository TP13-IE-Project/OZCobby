<div id="styx-archive-content__container" class="container mb-4">
    <div class="row">
        <div class="col styx-content">
            <div class="row">
                <?php
                if (have_posts()) {
                    while (have_posts()) {
                        the_post();
                        get_template_part('template-parts/content/archive-item');
                    }

                }
                ?>
                <div class="col-12 styx-archive-pagination__container">
                    <?php styx_the_posts_navigation(); ?>
                </div>
            </div>
        </div>

            <?php
            $sidebarIsActive = \is_active_sidebar( 'styx-sidebar-1' );
                ob_start();
                if($sidebarIsActive):
            ?>
        <div class="styx-sidebar col-md-3 col-12">
                <?php styx_widget_area('styx-sidebar-1'); ?>
        </div>
        <?php
            endif;
            $sidebar = ob_get_clean();
            // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
            echo $sidebar
        ?>
    </div>
</div>
