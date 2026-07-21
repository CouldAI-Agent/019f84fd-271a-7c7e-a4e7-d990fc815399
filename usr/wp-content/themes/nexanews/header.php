<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<div id="page" class="site">
    <a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'nexanews' ); ?></a>

    <header id="masthead" class="site-header">
        <div class="top-bar">
            <div class="container">
                <div class="top-bar-left">
                    <span class="current-date"><?php echo date_i18n( 'l, F j, Y' ); ?></span>
                    <div class="breaking-news">
                        <span class="breaking-label"><?php esc_html_e( 'Breaking:', 'nexanews' ); ?></span>
                        <div class="breaking-ticker">
                            <!-- Ticker content would be generated dynamically -->
                            <span><?php esc_html_e( 'Welcome to NexaNews - Your Premium News Source', 'nexanews' ); ?></span>
                        </div>
                    </div>
                </div>
                <div class="top-bar-right">
                    <?php if ( has_nav_menu( 'top' ) ) : ?>
                        <nav class="top-navigation" aria-label="<?php esc_attr_e( 'Top Menu', 'nexanews' ); ?>">
                            <?php
                            wp_nav_menu(
                                array(
                                    'theme_location' => 'top',
                                    'menu_class'     => 'top-menu',
                                    'depth'          => 1,
                                )
                            );
                            ?>
                        </nav>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <div class="header-main">
            <div class="container">
                <div class="header-inner">
                    <div class="header-left">
                        <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
                            <span class="hamburger-icon"></span>
                            <span class="screen-reader-text"><?php esc_html_e( 'Primary Menu', 'nexanews' ); ?></span>
                        </button>
                    </div>

                    <div class="site-branding">
                        <?php
                        if ( has_custom_logo() ) {
                            the_custom_logo();
                        } else {
                            ?>
                            <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                            <?php
                            $nexanews_description = get_bloginfo( 'description', 'display' );
                            if ( $nexanews_description || is_customize_preview() ) :
                                ?>
                                <p class="site-description"><?php echo $nexanews_description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p>
                            <?php endif;
                        }
                        ?>
                    </div>

                    <div class="header-right">
                        <button class="header-search-toggle" aria-label="<?php esc_attr_e( 'Search', 'nexanews' ); ?>">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
                        </button>
                        <a href="<?php echo esc_url( wp_login_url() ); ?>" class="header-signin-btn"><?php esc_html_e( 'Sign In', 'nexanews' ); ?></a>
                    </div>
                </div>
            </div>
        </div>

        <div class="header-navigation">
            <div class="container">
                <nav id="site-navigation" class="main-navigation">
                    <?php
                    wp_nav_menu(
                        array(
                            'theme_location' => 'primary',
                            'menu_id'        => 'primary-menu',
                            'menu_class'     => 'primary-menu',
                        )
                    );
                    ?>
                </nav>
            </div>
        </div>
    </header>
