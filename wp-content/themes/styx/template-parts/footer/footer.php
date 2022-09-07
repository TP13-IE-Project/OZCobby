<?php $instance = \Styx\ComponentsRepository::getActiveComponent() ?>
<div  id="footer" class="jumbotron text-center mb-0 <?php echo esc_attr($instance->getRootClasses()) ?>">
    <?php $instance->renderFooter()?>
</div>