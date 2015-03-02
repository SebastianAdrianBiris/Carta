<?php
/**
 * Plugin Name: biler
 * Description: plugin for creating car sales page
 * version:1.0
 * Author: TotC
 *

 */


function bp_enqueue_main_css()
{
    $file_dir = plugin_dir_url(__FILE__) . 'style.css';
    wp_enqueue_style('style.css', $file_dir, false, "1.0", "all");
}

add_action('wp_print_styles', 'bp_enqueue_main_css');

if (is_admin()) {

    require_once(dirname(__FILE__) . '/includes/Biladmin.php');
}
global $current_user;

$user_roles = $current_user->roles;
$user_role = array_shift($user_roles);
if($user_role=='administratorc'||$user_role=='subscriber') {
    require_once(dirname(__FILE__) . '/includes/Biladmin.php');
}
function create_post_type()
{
    register_post_type('Cars',
        array(
            'labels' => array(
                'name' => __('Cars'),
                'label' => __('Cars'),
                'singular_name' => __('Car')
            ),
            'public' => false,
            'has_archive' => true,
            'rewrite' => array('slug' => 'cars'),
            'show_in_admin_bar' => false,
            'supports' => array(
                'title',
                'editor',
                'custom-fields',
            )
        )
    );
}

// Hooking up our function to theme setup
add_action('init', 'create_post_type');



?>