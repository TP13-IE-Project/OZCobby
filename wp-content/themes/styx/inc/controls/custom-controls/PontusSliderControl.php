<?php

class StyxSliderControl extends WP_Customize_Control  {
    public $type = 'styx-slider';


//    public function enqueue() {
//        parent::enqueue();
//
//        // Enqueue the script.
//        wp_enqueue_script(
//            'styx-wp-control-color',
//            get_theme_file_uri( 'assets/customizer/js/index.js' ),
//            array( 'customize-controls', 'jquery', 'customize-base', 'wp-color-picker' ),
//            (string) filemtime( get_theme_file_path( 'assets/js/palette-colorpicker.js' ) ),
//            false
//        );
//    }
    public function render_content() {

    }

    protected function content_template() {
        ?>
        <label>
            <# if ( data.label ) { #>
            <span class="customize-control-title">{{{ data.label }}}</span>
            <# } #>
            <# if ( data.description ) { #>
            <span class="description customize-control-description">{{{ data.description }}}</span>
            <# } #>
            <div class="customize-control-content styx-slider-control">
                <input type="range" min="0" max="100"/>
            </div>
        </label>
        <?php
    }
}