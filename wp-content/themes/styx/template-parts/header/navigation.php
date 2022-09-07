<?php $instance = \Styx\ComponentsRepository::getActiveComponent() ?>
<nav class="navbar navbar-expand-lg position-relative navbar-light position-relative   d-flex  align-items-center <?php echo esc_attr($instance->getRootClasses()) ?>">
    <div class="container d-flex justify-content-between align-items-center flex-wrap px-2 px-md-0">

            <?php Styx\ComponentsRepository::render('logo') ?>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
            <?php Styx\ComponentsRepository::render('menu') ?>
    </div>
</nav>

