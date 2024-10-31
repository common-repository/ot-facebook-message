<?php
/*
Plugin Name: Facebook Message
Plugin URI: https://www.omegatheme.com/
Description: Facebook Message is a Wordpress plugin allow put your facebook live chat box on your website, visitors can chat with you via Facebook Message. This is easy way to support your customers.
Author: Omegatheme
Version: 1.2.1
Company: XIPAT Flexible Solutions 
Author URI: http://www.omegatheme.com
*/

define('OTFBMSG_PLUGIN_NAME', 'Facebook Message');
define('OTFBMSG_PLUGIN_VERSION', '1.2.1');
define('OTFBMSG_PLUGIN_URL',plugins_url(basename(plugin_dir_path(__FILE__ )), basename(__FILE__)));

include_once("functions.php");
include_once("otfbmsg-shortcode.php");

function otfbmsg_scripts_required(){
    wp_enqueue_script('otfbmsg_chat',plugins_url('assets/js/chat.js', __FILE__));
} 
add_action('wp_enqueue_scripts', 'otfbmsg_scripts_required');

add_action( 'admin_init', 'otfbmsg_admin_style_scripts' );
function otfbmsg_admin_style_scripts(){
    wp_enqueue_script('jquery');

    wp_enqueue_script('otfbmsg_admin_js', plugins_url('/assets/js/bootstrap.min.js', __FILE__));
    wp_enqueue_style('otfbmsg_admin_css', plugins_url('/assets/css/bootstrap.min.css', __FILE__));
    wp_enqueue_style('otfbmsg_setting_css', plugins_url('/assets/css/otfbmsg-setting.css', __FILE__));
}

/*-------------------------------- Links --------------------------------*/
function otfbmsg_plugin_action_links($links, $file) {
    $plugin_file = basename(__FILE__);
    if (basename($file) == $plugin_file) {
        $settings_link = '<a href="' . admin_url('options-general.php?page=otfbmsg') . '">' . otfbmsg_e('Settings') . '</a>';
        array_unshift($links, $settings_link);
    }
    return $links;
}
add_filter('plugin_action_links', 'otfbmsg_plugin_action_links', 10, 2);

function otfbmsg_e($text, $params=null) {
    if (!is_array($params)) {
        $params = func_get_args();
        $params = array_slice($params, 1);
    }
    return vsprintf(__($text, 'otfbmsg'), $params);
}

/*-------------------------------- Menu --------------------------------*/
function otfbmsg_setting_menu() {
     add_submenu_page(
         'options-general.php',
         'OT Facebook Message',
         'OT Facebook Message',
         'moderate_comments',
         'otfbmsg',
         'otfbmsg_setting'
     );
}
add_action('admin_menu', 'otfbmsg_setting_menu', 10);

function otfbmsg_setting() {
    include_once(dirname(__FILE__) . '/otfbmsg-setting.php');
}
