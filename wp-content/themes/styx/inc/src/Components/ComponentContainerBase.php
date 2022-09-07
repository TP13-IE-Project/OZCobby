<?php

namespace Styx\Components;

use Styx\ComponentsRepository;

abstract class ComponentContainerBase extends ComponentBase
{

    public function getPartialRefreshSelector() {
        return sprintf('[data-partial-refresh-setting="%s"] > .styx-partial-refresh-meta', $this::$prefix);
    }

    public function renderPartialRefreshContainer() {
        ?>
        <div class="position-relative customize-partial-edit-shortcut__right"
             data-partial-refresh-setting="<?php echo esc_attr($this::$prefix) ?>">
            <div class="styx-partial-refresh-meta">
                 <?php $this->renderCSS() ?>
                 <?php $this->renderBackgroundPartialRefresh(); ?>
            </div>
            <?php $this->renderTemplate(); ?>
        </div>
        <?php
    }

    public function getPartialRefreshContent() {
        static::$oldActiveComponent = ComponentsRepository::getActiveComponent();

        ComponentsRepository::setActiveComponent($this);

        ob_start();
        ?>
        <div class="styx-partial-refresh-meta">
            <?php
            $this->renderCSS();
            $this->renderBackgroundPartialRefresh();
            ?>
        </div>
        <?php
        $data = ob_get_clean();


        ComponentsRepository::setActiveComponent(static::$oldActiveComponent);
        return $data;
    }

    public function renderBackgroundPartialRefresh() {
        ?>
        <div class="styx-partial-refresh-background-container <?php echo esc_attr($this->getRootClasses()) ?>">
            <?php $this->renderBackgroundContent(); ?>
        </div>
        <?php
    }

    public function renderBackground() {
        if (!is_customize_preview()) {
            $this->renderBackgroundContent();
        }
    }

    public function renderBackgroundContent() {
        if ($this->getData('background.overlay.enabled')) {
            $temp = 4;
            ?>
            <div class="styx-background-layer">
                <div class="styx-overlay-layer"></div>
            </div>
            <?php
        }
    }
}