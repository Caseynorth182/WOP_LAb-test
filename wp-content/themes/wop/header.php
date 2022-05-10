<?php

/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Wop_Lab
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

    <header>

        <div class="navbar navbar-light bg-light shadow-sm">
            <div class="container">
                <?php the_custom_logo(); ?>

                <span class="header__phone">
                    phone-number: <a
                        href="tel:<?php echo sanitize_text_field(get_theme_mod('phone_code')) ?>"><?php echo sanitize_text_field(get_theme_mod('phone_code')) ?></a>
                </span>
            </div>
        </div>
    </header>

    <main></main>