<?php

function styx_search_form( $html ) {

    $html = str_replace( 'id="s"', 'id="s" placeholder="Search ... "', $html );

    return $html;
}
add_filter( 'get_search_form', 'styx_search_form' );