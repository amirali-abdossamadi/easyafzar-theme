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