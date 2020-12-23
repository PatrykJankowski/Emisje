<!DOCTYPE html>
<html lang="pl-PL">

<head>
    <meta charset="<?php bloginfo('charset'); ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#163963">
    <meta name="description" content="SoftCraft">
    <link rel="stylesheet" type="text/css" href="/wp-content/themes/emisje/style.css"/>

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src=""></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }

        gtag('js', new Date());

        gtag('config', '');
    </script>

    <?php wp_head(); ?>
</head>


<body <?php body_class(); ?>>

    <header class="navbar">
        <div class="container container--flex">
            <a href="/blog">
                <!--<img src="" alt="Emisje" class="navbar__logo">-->
                EMISJE
            </a>
            <nav class="navbar__nav">
                <?php wp_nav_menu(array('theme_location' => 'nav-menu', 'container' => false)); ?>
            </nav>
        </div>
    </header>

    <main>
