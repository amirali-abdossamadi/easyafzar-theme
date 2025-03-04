<?php
/*
Template Name: Licenses Page
*/
get_header();

// فراخوانی محصولات
$products = get_option('easyafzar_products', []);

// فراخوانی تاریخچه لایسنس‌های کاربر
$current_user_id = get_current_user_id();
$user_licenses = get_user_meta($current_user_id, 'easyafzar_licenses', true);
if (!is_array($user_licenses)) {
    $user_licenses = [];
}

// پردازش درخواست لایسنس
if (isset($_POST['purchase_license']) && check_admin_referer('easyafzar_purchase_license')) {
    $product_id = intval($_POST['product_id']);
    $duration = intval($_POST['license_duration']);
    $product = $products[$product_id] ?? null;

    if ($product) {
        $license_key = wp_generate_uuid4();
        $license = [
            'product_name' => $product['name'],
            'license_key' => $license_key,
            'duration_days' => $duration,
            'price' => $product['price'],
            'purchase_date' => current_time('mysql'),
            'status' => 'active'
        ];
        $user_licenses[] = $license;
        update_user_meta($current_user_id, 'easyafzar_licenses', $user_licenses);

        echo '<div class="license-message license-message--success">' . __('License purchased successfully!', 'easyafzar') . '</div>';
    } else {
        echo '<div class="license-message license-message--error">' . __('Error purchasing license. Product not found.', 'easyafzar') . '</div>';
    }
}
?>
<main>
    <section class="licenses-section">
        <h2 class="licenses-title"><?php _e('Purchase a License', 'easyafzar'); ?></h2>
        <p class="licenses-subtitle"><?php _e('Choose a product and duration to get a license.', 'easyafzar'); ?></p>

        <!-- دکمه برای باز کردن پاپ‌آپ -->
        <div class="license-action">
            <button class="license-button license-button--open"><?php _e('Purchase License', 'easyafzar'); ?></button>
        </div>

        <!-- پاپ‌آپ فرم خرید لایسنس -->
        <div class="license-modal-overlay" style="display: none;">
            <div class="license-modal-content">
                <h2><?php _e('Purchase a License', 'easyafzar'); ?></h2>
                <form method="post" action="">
                    <?php wp_nonce_field('easyafzar_purchase_license'); ?>
                    <div class="form-group">
                        <label for="product_id"><?php _e('Select Product', 'easyafzar'); ?></label>
                        <div class="select-wrapper">
                            <select name="product_id" id="product_id" required>
                                <option value=""><?php _e('Choose a product...', 'easyafzar'); ?></option>
                                <?php if (!empty($products) && is_array($products)) : ?>
                                    <?php foreach ($products as $index => $product) : ?>
                                        <option value="<?php echo esc_attr($index); ?>" data-price="<?php echo esc_attr($product['price']); ?>">
                                            <?php echo esc_html($product['name'] ?? 'Unnamed Product'); ?>
                                            (<?php echo isset($product['type']) && $product['type'] === 'theme' ? __('Theme', 'easyafzar') : __('Plugin', 'easyafzar'); ?>)
                                        </option>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="license_duration"><?php _e('License Duration (Days)', 'easyafzar'); ?></label>
                        <div class="select-wrapper">
                            <select name="license_duration" id="license_duration" required>
                                <option value="30">30 Days</option>
                                <option value="90">90 Days</option>
                                <option value="180">180 Days</option>
                                <option value="365">365 Days</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="license_price"><?php _e('Price (USD)', 'easyafzar'); ?></label>
                        <input type="text" id="license_price" value="$0.00" readonly class="price-display">
                    </div>

                    <div class="form-group modal-actions">
                        <button type="submit" name="purchase_license" class="license-button"><?php _e('Confirm Purchase', 'easyafzar'); ?></button>
                        <button type="button" class="license-cancel-modal"><?php _e('Cancel', 'easyafzar'); ?></button>
                    </div>
                </form>
            </div>
        </div>

        <!-- تاریخچه لایسنس‌ها -->
        <div class="license-history">
            <h2 class="history-title"><?php _e('Your License History', 'easyafzar'); ?></h2>
            <?php if (!empty($user_licenses)) : ?>
                <div class="license-history__table">
                    <table class="license-history-table">
                        <thead>
                            <tr>
                                <th><?php _e('Product', 'easyafzar'); ?></th>
                                <th><?php _e('License Key', 'easyafzar'); ?></th>
                                <th><?php _e('Duration (Days)', 'easyafzar'); ?></th>
                                <th><?php _e('Price (USD)', 'easyafzar'); ?></th>
                                <th><?php _e('Purchase Date', 'easyafzar'); ?></th>
                                <th><?php _e('Status', 'easyafzar'); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($user_licenses as $license) : ?>
                                <tr>
                                    <td><?php echo esc_html($license['product_name']); ?></td>
                                    <td><?php echo esc_html($license['license_key']); ?></td>
                                    <td><?php echo esc_html($license['duration_days']); ?></td>
                                    <td>$<?php echo number_format(floatval($license['price']), 2); ?></td>
                                    <td><?php echo esc_html($license['purchase_date']); ?></td>
                                    <td><?php echo esc_html($license['status']); ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            <?php else : ?>
                <p class="license-history__empty"><?php _e('You have not purchased any licenses yet.', 'easyafzar'); ?></p>
            <?php endif; ?>
        </div>
    </section>
</main>
<?php get_footer(); ?>