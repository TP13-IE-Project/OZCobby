<?php $instance = \Styx\ComponentsRepository::getActiveComponent() ?>
<h1 class="position-relative header-title jumbotron-heading <?php echo esc_attr($instance->getRootClasses()) ?>">
    <span><?php echo esc_html($instance->getData('content')) ?></span>
</h1>