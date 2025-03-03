<?php
// اضافه کردن صفحه لیست کاربران به پیشخوان ادمین
function easyafzar_admin_users_page() {
    add_menu_page(
        __('Users List', 'easyafzar'), // عنوان صفحه
        __('Users List', 'easyafzar'), // عنوان منو
        'manage_options', // دسترسی (فقط ادمین)
        'easyafzar-users', // اسلاگ صفحه
        'easyafzar_render_users_page', // تابع رندر
        'dashicons-groups', // آیکون
        6 // موقعیت منو
    );
}
add_action('admin_menu', 'easyafzar_admin_users_page');

// تابع رندر صفحه کاربران
function easyafzar_render_users_page() {
    $users = get_users();
    ?>
    <div class="wrap easyafzar-admin">
        <h1><?php _e('Users List', 'easyafzar'); ?></h1>
        <table class="easyafzar-users-table">
            <thead>
                <tr>
                    <th><?php _e('Username', 'easyafzar'); ?></th>
                    <th><?php _e('Email', 'easyafzar'); ?></th>
                    <th><?php _e('Role', 'easyafzar'); ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $user) : ?>
                    <tr>
                        <td><?php echo esc_html($user->user_login); ?></td>
                        <td><?php echo esc_html($user->user_email); ?></td>
                        <td><?php echo esc_html(implode(', ', $user->roles)); ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <?php
}

// اضافه کردن صفحه مدیریت محصولات به پیشخوان ادمین
function easyafzar_admin_products_page() {
    add_menu_page(
        __('Products Management', 'easyafzar'),
        __('Products', 'easyafzar'),
        'manage_options',
        'easyafzar-products',
        'easyafzar_render_products_page',
        'dashicons-products',
        7
    );
}
add_action('admin_menu', 'easyafzar_admin_products_page');

// تابع رندر صفحه محصولات
function easyafzar_render_products_page() {
    // ذخیره محصول جدید
    if (isset($_POST['save_product']) && check_admin_referer('easyafzar_save_product', '_wpnonce')) {
        error_log('Form submitted'); // دیباگ
        $new_product = [
            'name' => sanitize_text_field($_POST['product_name'] ?? ''),
            'description' => sanitize_textarea_field($_POST['product_description'] ?? ''),
            'type' => sanitize_text_field($_POST['product_type'] ?? ''),
            'price' => floatval($_POST['product_price'] ?? 0),
            'code' => sanitize_text_field($_POST['product_code'] ?? ''),
            'date_added' => current_time('mysql'),
            'status' => 'active'
        ];
        error_log(print_r($new_product, true)); // دیباگ

        $products = get_option('easyafzar_products', []);
        if (!is_array($products)) {
            $products = [];
        }
        $products[] = $new_product;
        $result = update_option('easyafzar_products', $products);
        error_log('Update option result: ' . ($result ? 'true' : 'false')); // دیباگ
    }

    // حذف محصول
    if (isset($_GET['action']) && $_GET['action'] === 'delete' && isset($_GET['product_id']) && check_admin_referer('easyafzar_delete_product_' . $_GET['product_id'])) {
        $products = get_option('easyafzar_products', []);
        $product_id = intval($_GET['product_id']);
        if (isset($products[$product_id])) {
            unset($products[$product_id]);
            $products = array_values($products);
            update_option('easyafzar_products', $products);
        }
    }

    $products = get_option('easyafzar_products', []);
    ?>
    <div class="wrap easyafzar-admin">
        <h1><?php _e('Manage Products', 'easyafzar'); ?></h1>
        <button class="button-primary add-product-btn"><?php _e('Add New Product', 'easyafzar'); ?></button>

        <!-- پاپ‌آپ فرم اضافه کردن محصول -->
        <div class="modal-overlay" style="display: none;">
            <div class="modal-content">
                <h2><?php _e('Add New Product', 'easyafzar'); ?></h2>
                <form method="post" action="">
                    <?php wp_nonce_field('easyafzar_save_product'); ?>
                    <table class="form-table">
                        <tr>
                            <th><label for="product_name"><?php _e('Product Name', 'easyafzar'); ?></label></th>
                            <td><input type="text" name="product_name" id="product_name" class="regular-text" required></td>
                        </tr>
                        <tr>
                            <th><label for="product_description"><?php _e('Description', 'easyafzar'); ?></label></th>
                            <td><textarea name="product_description" id="product_description" rows="5" class="large-text" required></textarea></td>
                        </tr>
                        <tr>
                            <th><label for="product_type"><?php _e('Type', 'easyafzar'); ?></label></th>
                            <td>
                                <select name="product_type" id="product_type" required>
                                    <option value="theme"><?php _e('Theme', 'easyafzar'); ?></option>
                                    <option value="plugin"><?php _e('Plugin', 'easyafzar'); ?></option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <th><label for="product_price"><?php _e('Price (USD)', 'easyafzar'); ?></label></th>
                            <td><input type="number" step="0.01" name="product_price" id="product_price" class="regular-text" required></td>
                        </tr>
                        <tr>
                            <th><label for="product_code"><?php _e('Product Code', 'easyafzar'); ?></label></th>
                            <td><input type="text" name="product_code" id="product_code" class="regular-text" required></td>
                        </tr>
                    </table>
                    <p class="submit">
                        <input type="submit" name="save_product" class="button-primary" value="<?php _e('Add Product', 'easyafzar'); ?>">
                        <button type="button" class="button cancel-modal"><?php _e('Cancel', 'easyafzar'); ?></button>
                    </p>
                </form>
            </div>
        </div>

        <!-- جدول محصولات -->
        <h2><?php _e('Existing Products', 'easyafzar'); ?></h2>
        <?php if (!empty($products)) : ?>
            <table class="easyafzar-products-table">
                <thead>
                    <tr>
                        <th><?php _e('Name', 'easyafzar'); ?></th>
                        <th><?php _e('Code', 'easyafzar'); ?></th>
                        <th><?php _e('Price (USD)', 'easyafzar'); ?></th>
                        <th><?php _e('Date Added', 'easyafzar'); ?></th>
                        <th><?php _e('Status', 'easyafzar'); ?></th>
                        <th><?php _e('Actions', 'easyafzar'); ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($products as $index => $product) : ?>
                        <tr>
                            <td><?php echo esc_html($product['name']); ?></td>
                            <td><?php echo esc_html($product['code']); ?></td>
                            <td><?php echo number_format($product['price'], 2); ?></td>
                            <td><?php echo esc_html($product['date_added']); ?></td>
                            <td><?php echo esc_html($product['status']); ?></td>
                            <td>
                                <a href="#" class="button view-product"><?php _e('View', 'easyafzar'); ?></a>
                                <a href="#" class="button view-details"><?php _e('Details', 'easyafzar'); ?></a>
                                <a href="#" class="button edit-product"><?php _e('Edit', 'easyafzar'); ?></a>
                                <a href="<?php echo wp_nonce_url(admin_url('admin.php?page=easyafzar-products&action=delete&product_id=' . $index), 'easyafzar_delete_product_' . $index); ?>" class="button delete-product"><?php _e('Delete', 'easyafzar'); ?></a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else : ?>
            <p><?php _e('No products added yet.', 'easyafzar'); ?></p>
        <?php endif; ?>
    </div>
    <?php
} 