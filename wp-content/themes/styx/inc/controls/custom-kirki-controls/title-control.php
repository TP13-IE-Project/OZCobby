<?php
add_action('customize_register', function ($wp_customize) {
    /**
     * The custom control class
     */
    class Kirki_Controls_Title_Control extends Kirki_Control_Base
    {
        public $type = 'title';

        public function render_content() {
            ?>

            <div class="kirki-controls-title-control"><?php echo esc_html($this->label) ?></div>
            <?php
        }
    }

    // Register our custom control with Kirki
    add_filter('kirki_control_types', function ($controls) {
        $controls['title'] = 'Kirki_Controls_Title_Control';
        return $controls;
    });

});
?>