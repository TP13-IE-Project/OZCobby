<?php $instance = \Styx\ComponentsRepository::getActiveComponent() ?>
<div class="position-relative navbar-brand <?php echo esc_attr($instance->getRootClasses()) ?>">
        <?php $instance->renderLogo()?>
</div>