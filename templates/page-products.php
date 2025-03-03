<?php
/*
Template Name: Products Page
*/
get_header();

// فراخوانی محصولات (فعلاً به صورت استاتیک)
$products = [
    [
        'name' => __('Minimal Theme', 'easyafzar'),
        'description' => __('A clean and modern WordPress theme for portfolios.', 'easyafzar'),
        'type' => 'theme',
        'price' => 39.99,
        'code' => 'MT123'
    ],
    [
        'name' => __('SEO Plugin', 'easyafzar'),
        'description' => __('Boost your site’s SEO with advanced features.', 'easyafzar'),
        'type' => 'plugin',
        'price' => 29.99,
        'code' => 'SP456'
    ],
    [
        'name' => __('Business Theme', 'easyafzar'),
        'description' => __('A professional theme for corporate websites.', 'easyafzar'),
        'type' => 'theme',
        'price' => 59.99,
        'code' => 'BT789'
    ]
];
?>
<main>
    <section class="products-section">
        <h2 class="products-title"><?php _e('Explore Our WordPress Themes & Plugins', 'easyafzar'); ?></h2>
        <p class="products-subtitle"><?php _e('Enhance your website with our premium products.', 'easyafzar'); ?></p>
        <div class="products-grid">
            <?php foreach ($products as $product) : ?>
                <div class="product-card">
                    <h3><?php echo esc_html($product['name']); ?></h3>
                    <p class="product-type"><?php echo $product['type'] === 'theme' ? __('Theme', 'easyafzar') : __('Plugin', 'easyafzar'); ?></p>
                    <p class="product-description"><?php echo esc_html($product['description']); ?></p>
                    <p class="product-price">$<?php echo number_format($product['price'], 2); ?></p>
                    <a href="#" class="product-button"><?php _e('View Details', 'easyafzar'); ?></a>
                </div>
            <?php endforeach; ?>
        </div>
    </section>
</main>
<?php get_footer(); ?>