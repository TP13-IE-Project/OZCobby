<?php


namespace Styx\Components;


use Styx\ComponentsRepository;
use Styx\Defaults;
use Styx\Style\StyleParser;

abstract class ComponentBase
{

    protected static $prefix = null;
    protected static $rootClass = null;
    protected $styledComponents = null;
    protected static $template = null;
    protected static $oldActiveComponent = null;
    protected $separatorIndex = 0;
    abstract public function getPropsSettings();

    abstract public function getStyleSettings();

    abstract public function getStyledComponents();

    public function __construct() {

        $this->styledComponents = $this->getStyledComponents();
    }


    public function getSelector() {
        return '#styx .' . static::$rootClass;
    }

    public function getSections() {
        return [];
    }

    public function getRootClasses() {
        return implode(' ', [static::$rootClass]);
    }

    protected function getSectionId() {
        return static::$rootClass;
    }

    public function settingPath($setting) {
        return static::$prefix . $setting;
    }

    public function getSettings() {
        return array_merge($this->getStyleSettings(), $this->getPropsSettings());
    }

    public function getData($path, $defaultValue = null, $usePrefix = true) {
        if ($usePrefix) {
            $path = static::$prefix . $path;
        }
        if ($defaultValue === null) {
            $defaultValue = Defaults::get($path);
        }

        $data = get_theme_mod($path, $defaultValue);
        return $data;
    }

    public function getPartialRefreshSelector() {
        return sprintf('[data-partial-refresh-setting="%s"]', $this::$prefix);
    }



    public function getCSS() {
        $params = [
            'settings' => $this->getStyleSettings(),
            'styledComponents' => $this->styledComponents,
            'rootSelector' => static::getSelector(),
        ];
        $data = StyleParser::getInstance()->parseSettingsToCss($params);
        return $data;
    }

    public function renderCSS() {
        ?>
        <style type="text/css">
            <?php
            // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
            echo $this->getCSS();
            ?>
        </style>
        <?php
    }

    public function rightPencil() {
        return false;
    }

    public function renderPartialRefreshContainer() {

        $classes = ['position-relative'];

        if($this->rightPencil()) {
            $classes[] = 'customize-partial-edit-shortcut__right';
        }

        ?>
        <div data-partial-refresh-setting="<?php echo esc_attr($this::$prefix) ?>" class="<?php echo esc_attr(implode(' ', $classes));?>">
                 <?php $this->renderCSS() ?>
                 <?php $this->renderTemplate(); ?>
        </div>
        <?php
    }

    public function renderTemplate() {
        get_template_part('template-parts/' . static::$template);
    }

    public function getPartialRefreshContent() {
        static::$oldActiveComponent = ComponentsRepository::getActiveComponent();

        ComponentsRepository::setActiveComponent($this);

        ob_start();
        $this->renderCSS();
        $this->renderTemplate();
        $data = ob_get_clean();


        ComponentsRepository::setActiveComponent(static::$oldActiveComponent);
        return $data;
    }

    public function renderFrontEnd() {
        $this->renderCSS();
        $this->renderTemplate();
    }

    public function renderCustomizer() {
        $this->renderPartialRefreshContainer();
    }

    public function render() {
        static::$oldActiveComponent = ComponentsRepository::getActiveComponent();

        ComponentsRepository::setActiveComponent($this);

        if (is_customize_preview()) {
            $this->renderCustomizer();
        } else {
            $this->renderFrontEnd();
        }

        ComponentsRepository::setActiveComponent(static::$oldActiveComponent);
    }


    public function isEnabled() {
        return true;
    }
}