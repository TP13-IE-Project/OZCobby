<?php

require_once styx_dir('includes/kirki/kirki.php');

function styx_kirki_configuration() {
    return array('url_path' => styx_url('includes/kirki/'));
}
Kirki::add_config( 'my_typography', array(
    'option_type' => 'theme_mod',
) );
add_filter('kirki/config', 'styx_kirki_configuration');
