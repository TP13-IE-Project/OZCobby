<div id="page-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div id="styx-page-content__container mb-4" class="container">
        <div class="row">
            <div class="col-12 styx-content">
                <div class="card mb-4">
                    <div class="card-body">
                        <?php
                        if (have_posts()) {
                            while (have_posts()) {
                                the_post();
                                the_content();
                            }

                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>