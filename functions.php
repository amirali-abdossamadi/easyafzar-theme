<?php
// لود فایل‌های اصلی
require_once get_template_directory() . '/inc/core.php';
require_once get_template_directory() . '/inc/database.php';
require_once get_template_directory() . '/inc/forms.php';
require_once get_template_directory() . '/inc/dashboard.php';
require_once get_template_directory() . '/inc/license.php';

// تنظیمات قالب
function easyafzar_setup() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    load_theme_textdomain('easyafzar', get_template_directory() . '/languages');
}
add_action('after_setup_theme', 'easyafzar_setup');

// ثبت استایل و اسکریپت برای فرانت‌اند
function easyafzar_scripts() {
    wp_enqueue_style('easyafzar-frontend', get_template_directory_uri() . '/assets/css/frontend.css');
    wp_enqueue_script('easyafzar-frontend-js', get_template_directory_uri() . '/assets/js/frontend.js', array('jquery'), '1.0', true);
}
add_action('wp_enqueue_scripts', 'easyafzar_scripts');

// ثبت استایل و اسکریپت برای ادمین
function easyafzar_admin_scripts() {
    wp_enqueue_style('easyafzar-admin', get_template_directory_uri() . '/assets/css/admin.css');
    wp_enqueue_script('easyafzar-admin-js', get_template_directory_uri() . '/assets/js/frontend.js', array('jquery'), '1.0', true);
}
add_action('admin_enqueue_scripts', 'easyafzar_admin_scripts');

// حذف متن "proudly powered by WordPress"
remove_action('wp_footer', 'wp_footer_powered_by');
function wp_footer_powered_by() {
    // خالی می‌ذاریم تا متن حذف بشه
}

