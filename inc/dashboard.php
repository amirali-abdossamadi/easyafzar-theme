<?php
// نصب دیتابیس هنگام فعال‌سازی قالب
function easyafzar_install_db() {
    global $wpdb;
    $table_users = $wpdb->prefix . 'easyafzar_users';
    $table_plans = $wpdb->prefix . 'easyafzar_plans';
    $charset_collate = $wpdb->get_charset_collate();

    $sql_users = "CREATE TABLE $table_users (
        id BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT,
        user_id BIGINT(20) UNSIGNED NOT NULL,
        phone VARCHAR(20) NOT NULL,
        license_key VARCHAR(50),
        license_duration INT,
        license_start DATETIME,
        PRIMARY KEY (id)
    ) $charset_collate;";

    $sql_plans = "CREATE TABLE $table_plans (
        id BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT,
        plan_name VARCHAR(100) NOT NULL,
        duration_days INT NOT NULL,
        price_usd DECIMAL(10,2) NOT NULL,
        PRIMARY KEY (id)
    ) $charset_collate;";

    require_once ABSPATH . 'wp-admin/includes/upgrade.php';
    dbDelta($sql_users);
    dbDelta($sql_plans);
}
register_activation_hook(__FILE__, 'easyafzar_install_db');