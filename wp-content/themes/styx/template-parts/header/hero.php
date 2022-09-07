<?php $instance = \Styx\ComponentsRepository::getActiveComponent() ?>
<div class="position-relative <?php echo esc_attr($instance->getRootClasses()) ?>">
    <?php $instance->renderBackground()?>
    <div id="hero" class="jumbotron styx-hero__inner">
        <div class="container">
            <?php Styx\ComponentsRepository::render('front-title') ?>
            <?php Styx\ComponentsRepository::render('front-subtitle') ?>
            <div>
                <div class="styx-button-group">
                    <?php Styx\ComponentsRepository::render('primary-button') ?>
                    <?php Styx\ComponentsRepository::render('secondary-button') ?>
                </div>

            </div>
        </div>
    </div>
</div>