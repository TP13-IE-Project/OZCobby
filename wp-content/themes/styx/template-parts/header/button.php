<?php $instance = \Styx\ComponentsRepository::getActiveComponent() ?>
<a href="<?php echo esc_url($instance->getLink()); ?>"
   target="_blank"
   class="btn btn-primary <?php echo esc_attr($instance->getRootClasses()) ?>">
    <?php echo esc_html($instance->getData('content')); ?>
</a>
