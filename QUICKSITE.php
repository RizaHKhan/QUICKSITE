<?php 
/*
* Plugin Name: QUICKSITE
* Description: Transfering or adding content to your website quickly
* Version: 1.0.0
* Author: Riza Khan
* Author: khanriza.com
* Author URI: khanriza.com
*/

if(!defined('ABSPATH')) {
    die;
}

class QuickSite {

    function register() {
        // The "admin" refers to the administration area, changing it to "wp" will allow access to the css file in the public area.
        add_action('admin_enqueue_scripts', array($this, 'enqueue'));
        add_action('admin_menu', array($this, 'add_admin_pages'));
    }

    public function add_admin_pages() {
        add_menu_page('QUICKSITE', 'QUICKSITE', 'manage_options', 'quicksite_plugin', array($this, 'main_menu'), 'dashicons-paperclip', 110);
        add_submenu_page('quicksite_plugin', 'QUICKSITE UPLOAD', 'UPLOAD', 'manage_options', 'upload_quicksite', array($this, 'sub_menu_upload'));
        add_submenu_page('quicksite_plugin', 'QUICKSITE DOWNLOAD', 'DOWNLOAD', 'manage_options', 'download_quicksite', array($this, 'sub_menu_download'));
    }

    public function main_menu() {
        require_once plugin_dir_path(__FILE__) . 'template/home.php';        
    }

    public function sub_menu_upload() {
        require_once plugin_dir_path(__FILE__) . 'template/upload.php';        
    }

    public function sub_menu_download() {
        require_once plugin_dir_path(__FILE__) . 'template/download.php';        
    }

    function activate() {
        
    }

    function deactivate() {

    }
    
    function enqueue() {
        // enqueue all of our scripts
        wp_enqueue_style('QUICKSITE_STYLE', plugins_url('/css/QUICKSITE-style.css', __FILE__));
    }
}

if (class_exists('QuickSite')) {
    $quicksitePlugin = new QuickSite();
    $quicksitePlugin->register();
}

// Activation
register_activation_hook(__FILE__, array($quicksitePlugin, 'activate'));

// Deactivation 
register_deactivation_hook(__FILE__, array($quicksitePlugin, 'deactivate'));
