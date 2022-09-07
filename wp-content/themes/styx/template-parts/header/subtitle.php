<?php $instance = \Styx\ComponentsRepository::getActiveComponent() ?>
<p class="position-relative header-subtitle lead <?php echo esc_attr($instance->getRootClasses()) ?>">
    <span><?php echo esc_html($instance->getData('content')) ?></span>
</p>