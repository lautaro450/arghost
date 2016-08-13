<?php
/**
 * InHost-Child functions and definitions
 *
 * @package InHost
 */

add_action( 'after_setup_theme', 'inhost_child_theme_setup' );
function inhost_child_theme_setup() {
    load_child_theme_textdomain( 'inwavethemes', get_stylesheet_directory() . '/languages' );
}