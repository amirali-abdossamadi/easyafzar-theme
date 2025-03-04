<?php
/*
Template Name: Products Page
*/
get_header();

// فراخوانی محصولات از گزینه ذخیره‌شده
$products = get_option('easyafzar_products', []);
?>
<main>
    <section class="products-section">
        <h2 class="products-title"><?php _e('Explore Our WordPress Themes & Plugins', 'easyafzar'); ?></h2>
        <p class="products-subtitle"><?php _e('Enhance your website with our premium products.', 'easyafzar'); ?></p>
        <div class="products-grid">
            <?php if (!empty($products)) : ?>
                <?php foreach ($products as $product) : ?>
                    <div class="product-card">
                        <h3><?php echo esc_html($product['name']); ?></h3>
                        <p class="product-type"><?php echo $product['type'] === 'theme' ? __('Theme', 'easyafzar') : __('Plugin', 'easyafzar'); ?></p>
                        <p class="product-description"><?php echo esc_html($product['description']); ?></p>
                        <p class="product-price">$<?php echo number_format($product['price'], 2); ?></p>
                        <a href="#" class="product-button"><?php _e('View Details', 'easyafzar'); ?></a>
                    </div>
                <?php endforeach; ?>
            <?php else : ?>
                <p><?php _e('No products available yet.', 'easyafzar'); ?></p>
            <?php endif; ?>
        </div>
    </section>
</main>
<?php get_footer(); ?>