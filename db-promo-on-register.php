<?php
/**
 * Plugin Name:     DB register on popup
 * Plugin URI:      PLUGIN SITE HERE
 * Description:     Register on popup
 * Author:          Daniil Borovkov
 * Author URI:      https://daniilborovkov.site
 * Text Domain:     db-promo-on-register
 * Domain Path:     /languages
 * Version:         0.1.0
 *
 * @package         Db_Promo_On_Register
 */

require plugin_dir_path( __FILE__ ) . 'inc/functions.php';


/**
 * Register plugin scripts
 * @return [type] [description]
 */
function db_promo_on_register_enqueue_script()
{
    // wp_enqueue_script('micromodal', plugin_dir_url(__FILE__) . 'micromodal.min.js', array('jquery'));
    wp_enqueue_script('db-promo-on-register-script', plugin_dir_url(__FILE__) . 'build/bundle.js', array('jquery'));
}
add_action('wp_enqueue_scripts', 'db_promo_on_register_enqueue_script');