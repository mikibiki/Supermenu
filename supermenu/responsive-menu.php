<?php
/**
 * Plugin Name: Responsive Auto-Hiding Menu
 * Plugin URI: https://casinohub888.com/
 * Description: A fully automated, responsive navigation menu that dynamically hides items based on window width.
 * Version: 1.0
 * Author: CasinoHub888
 * Author URI: https://casinohub888.com/
 * License: MIT
 */

if (!defined('ABSPATH')) {
    exit; // Prevent direct access
}

// Enqueue styles and scripts
function responsive_menu_assets() {
    wp_enqueue_style('responsive-menu-style', plugin_dir_url(__FILE__) . 'assets/styles.css');
    wp_enqueue_script('responsive-menu-script', plugin_dir_url(__FILE__) . 'assets/scripts.js', array('jquery'), null, true);
}
add_action('wp_enqueue_scripts', 'responsive_menu_assets');

// Register the navigation menu
function responsive_register_menu() {
    register_nav_menu('responsive-menu', __('Responsive Menu', 'responsive-menu'));
}
add_action('after_setup_theme', 'responsive_register_menu');

// Display the responsive menu
function responsive_menu_output() {
    if (!has_nav_menu('responsive-menu')) return;

    ?>
    <nav id="site-navigation" class="main-navigation">
        <div class="nav-wrapper">
            <div class="menu-container">
                <?php
                wp_nav_menu(array(
                    'theme_location' => 'responsive-menu',
                    'container' => false,
                    'menu_class' => 'nav-items',
                ));
                ?>
                <button class="nav-toggler" aria-controls="mobile-menu" aria-expanded="false">
                    <span class="menu-icon"></span>
                </button>
            </div>
        </div>
    </nav>
    <?php
}
add_action('wp_body_open', 'responsive_menu_output');
?>