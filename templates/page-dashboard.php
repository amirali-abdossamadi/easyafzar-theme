<?php
/*
Template Name: Dashboard Page
*/
get_header();

// چک کردن اگر کاربر لاگین نکرده، به صفحه ورود ریدایرکت بشه
if (!is_user_logged_in()) {
    wp_redirect(home_url('/login'));
    exit;
}

$current_user = wp_get_current_user();
?>
<main>
    <section class="dashboard-section">
        <h2 class="dashboard-title"><?php _e('Welcome, ', 'easyafzar'); ?><?php echo esc_html($current_user->display_name); ?>!</h2>
        <p class="dashboard-subtitle"><?php _e('Manage your digital products and licenses here.', 'easyafzar'); ?></p>
        <div class="dashboard-content">
            <div class="dashboard-card">
                <h3><?php _e('Your Profile', 'easyafzar'); ?></h3>
                <p><strong><?php _e('Username:', 'easyafzar'); ?></strong> <?php echo esc_html($current_user->user_login); ?></p>
                <p><strong><?php _e('Email:', 'easyafzar'); ?></strong> <?php echo esc_html($current_user->user_email); ?></p>
                <a href="#" class="dashboard-button"><?php _e('Edit Profile', 'easyafzar'); ?></a>
            </div>
            <div class="dashboard-card">
                <h3><?php _e('Your Licenses', 'easyafzar'); ?></h3>
                <p><?php _e('No licenses available yet. Coming soon!', 'easyafzar'); ?></p>
            </div>
        </div>
    </section>
</main>
<?php get_footer(); ?>
<?php
if (isset($_POST['save_product']) && check_admin_referer('easyafzar_save_product', '_wpnonce')) {
    error_log('Form submitted');
    $new_product = [
        'name' => sanitize_text_field($_POST['product_name'] ?? ''),
        'description' => sanitize_textarea_field($_POST['product_description'] ?? ''),
        'type' => sanitize_text_field($_POST['product_type'] ?? ''),
        'price' => floatval($_POST['product_price'] ?? 0),
        'code' => sanitize_text_field($_POST['product_code'] ?? ''),
        'date_added' => current_time('mysql'),
        'status' => 'active'
    ];
    error_log(print_r($new_product, true));

    $products = get_option('easyafzar_products', []);
    if (!is_array($products)) {
        $products = [];
    }
    $products[] = $new_product;
    $result = update_option('easyafzar_products', $products);
    error_log('Update option result: ' . ($result ? 'true' : 'false'));

    // اضافه کردن پیام موفقیت
    echo '<div class="notice notice-success is-dismissible"><p>' . __('Product added successfully!', 'easyafzar') . '</p></div>';
}