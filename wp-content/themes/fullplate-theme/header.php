<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Tillader wp mulighed for at indsætte ting i head delen -->
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <header class="header">
        <?php
        /* Hvis det er en single side, køres progress baren */
        /* Fundet her: https://developer.wordpress.org/reference/classes/WP_Query/is_single/ */
        if (is_singular('recipe') || is_singular('story') || is_singular('tool')) {
        ?>
            <div class="progress"></div>
        <?php } ?>

        <nav class="nav">
            <!-- Logo -->
            <a href="<?php echo site_url('/'); ?>" class="logo">
                <img src="<?php echo get_theme_file_uri('/images/fullplate-logo-offwhite.svg'); ?>" alt="Full Plate logo">
            </a>

            <!-- Navigation -->
            <ul class="nav-links">
                <li
                    <?php
                    if (get_post_type() == 'recipe') {
                        echo 'class="current-menu-item"';
                    } ?>>
                    <a href="<?php echo get_post_type_archive_link('recipe'); ?>">Recipes</a>
                </li>

                <li
                    <?php
                    if (get_post_type() == 'story') {
                        echo 'class="current-menu-item"';
                    }
                    ?>>
                    <a href="<?php echo get_post_type_archive_link('story'); ?>"> Stories</a>
                </li>

                <li
                    <?php
                    if (get_post_type() == 'tool') {
                        echo 'class="current-menu-item"';
                    }
                    ?>>
                    <a href="<?php echo get_post_type_archive_link('tool'); ?>"> Tools</a>
                </li>

                <li

                    <?php
                    if (is_page('about')) {
                        echo 'class="current-menu-item"';
                    }
                    ?>>

                    <a href="<?php echo site_url('/'); ?>"> About</a>
                </li>
            </ul>

            <!-- Search + account -->
            <div class="nav-actions">

                <!-- Søgefelt i navigationen -->
                <div class="header-search js-search-trigger">
                    <input
                        type="text"
                        placeholder="Search"
                        readonly
                        aria-label="Open search">
                    <!-- Readonly findes her: https://www.w3schools.com/TAgs/att_readonly.asp  -->
                    <button type="button" aria-label="Open search">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </button>
                </div>

                <!-- Brugerikon -->
                <button
                    class="user-login"
                    type="button"
                    aria-label="Open account panel"
                    aria-expanded="false">
                    <i class="fa-regular fa-user"></i>
                </button>
            </div>
        </nav>
    </header>

    <!-- Login/account popup -->
    <div class="account-overlay"></div>

    <aside
        class="account-panel"
        aria-hidden="true"
        aria-label="Account panel">
        <div class="account-panel-header">
            <h2>CREATE YOUR OWN ACCOUNT</h2>

            <button
                class="close-account"
                type="button"
                aria-label="Close account panel">
                <i class="fa-solid fa-xmark"></i>
            </button>
        </div>

        <p>
            Join a community that cooks, shares and celebrates good food.
        </p>

        <form class="account-form">
            <label>
                NAME
                <input type="text" name="name" placeholder="Your Name">
            </label>

            <label>
                EMAIL
                <input type="email" name="email" placeholder="Your Email">
            </label>

            <label>
                PASSWORD
                <input type="password" name="password" placeholder="Your Password">
            </label>

            <fieldset class="cook-level">
                <label>
                    <input type="radio" name="level" value="home-cook" checked>
                    HOME COOK
                </label>

                <label>
                    <input type="radio" name="level" value="amateur">
                    AMATEUR
                </label>

                <label>
                    <input type="radio" name="level" value="professional">
                    PRO. CHEF
                </label>
            </fieldset>

            <button class="create-account" type="button">
                CREATE ACCOUNT
            </button>

            <a href="#" class="account-login">
                Already have an account?
                <i class="fa-solid fa-arrow-right"></i>
            </a>
        </form>
    </aside>
    <!-- Search overlay -->
    <div class="search-overlay" aria-hidden="true">
        <div class="search-overlay-top">

            <form
                class="search-overlay-form"
                method="get"
                action="<?php echo esc_url(home_url('/')); ?>">

                <i
                    class="fa-solid fa-magnifying-glass search-overlay-icon"
                    aria-hidden="true">
                </i>

                <input
                    type="search"
                    id="search-term"
                    class="search-term"
                    name="s"
                    placeholder="What are you looking for?"
                    autocomplete="off">

                <button
                    type="button"
                    class="search-overlay-close"
                    aria-label="Close search">
                    <i class="fa-solid fa-xmark"></i>
                </button>

            </form>
        </div>

    </div>