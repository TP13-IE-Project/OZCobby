<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <?php wp_head(); ?>
</head>

<body id="styx" <?php body_class(); ?>>
<?php
if ( function_exists( 'wp_body_open' ) ) {
    wp_body_open();
} else {
    do_action( 'wp_body_open' );
}
?>
<div class="site">
    <a class="skip-link" href="#main-content"><?php
        // phpcs:ignore WordPress.Security.EscapeOutput.UnsafePrintingFunction
        _e( 'Skip to main content', 'styx' );
        ?></a>
    <?php get_template_part( 'template-parts/header/header' ); ?>

<div id="main-content">