<?php $instance = \Styx\ComponentsRepository::getActiveComponent() ?>


<div class=" <?php echo esc_attr($instance->getRootClasses()); ?>">
    <div id="navbarSupportedContent" class="collapse navbar-collapse ">


        <?php

        wp_nav_menu(array(
                'theme_location' => 'primary_menu',
                'depth' => 2,
                'container' => 'div',
                'container_class' => '',
                'container_id' => 'styx-menu-container',
                'menu_class' => 'navbar-nav mr-auto',
                 'menu-id' => 'styx-menu',
                'fallback_cb' => 'wp_bootstrap_navwalker::fallback',
                'walker' => new wp_bootstrap_navwalker()
            )
        );
        ?>
    </div>
</div>
