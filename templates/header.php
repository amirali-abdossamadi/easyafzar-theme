<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <link href="https://cdn.fontcdn.ir/Font/Persian/Vazir/Vazir.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
    <header>
        <div class="header-container">
            <div class="logo">
                <h1>
                    <a href="<?php echo home_url(); ?>" class="easyafzar-logo">
                        <span class="letter">E</span>
                        <span class="letter">A</span>
                        <span class="letter">S</span>
                        <span class="letter">Y</span>
                        <span class="letter">A</span>
                        <span class="letter">F</span>
                        <span class="letter">Z</span>
                        <span class="letter">A</span>
                        <span class="letter">R</span>
                    </a>
                </h1>
            </div>
            <nav>
                <a href="<?php echo home_url('/login'); ?>" class="grok-button"><?php _e('Try Now', 'easyafzar'); ?></a>
            </nav>
        </div>
    </header>