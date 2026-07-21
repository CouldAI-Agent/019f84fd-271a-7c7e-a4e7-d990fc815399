    <footer id="colophon" class="site-footer">
        <div class="footer-widgets">
            <div class="container">
                <div class="footer-widgets-inner">
                    <div class="footer-widget-area footer-about">
                        <div class="site-branding-footer">
                            <?php
                            if ( has_custom_logo() ) {
                                the_custom_logo();
                            } else {
                                ?>
                                <h2 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h2>
                                <?php
                            }
                            ?>
                        </div>
                        <p class="footer-description">
                            <?php esc_html_e( 'NexaNews is your premium source for breaking news, comprehensive analysis, and in-depth reporting across business, technology, sports, and more.', 'nexanews' ); ?>
                        </p>
                        <div class="footer-social">
                            <a href="#" aria-label="Facebook"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path></svg></a>
                            <a href="#" aria-label="Twitter"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z"></path></svg></a>
                            <a href="#" aria-label="Instagram"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line></svg></a>
                        </div>
                    </div>

                    <?php if ( is_active_sidebar( 'footer-1' ) ) : ?>
                        <div class="footer-widget-area">
                            <?php dynamic_sidebar( 'footer-1' ); ?>
                        </div>
                    <?php endif; ?>

                    <?php if ( is_active_sidebar( 'footer-2' ) ) : ?>
                        <div class="footer-widget-area">
                            <?php dynamic_sidebar( 'footer-2' ); ?>
                        </div>
                    <?php endif; ?>

                    <?php if ( is_active_sidebar( 'footer-3' ) ) : ?>
                        <div class="footer-widget-area">
                            <?php dynamic_sidebar( 'footer-3' ); ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <div class="site-info">
            <div class="container">
                <div class="site-info-inner">
                    <div class="copyright">
                        &copy; <?php echo date_i18n( 'Y' ); ?> <?php bloginfo( 'name' ); ?>. <?php esc_html_e( 'All rights reserved.', 'nexanews' ); ?>
                    </div>
                    <?php if ( has_nav_menu( 'footer' ) ) : ?>
                        <nav class="footer-navigation" aria-label="<?php esc_attr_e( 'Footer Menu', 'nexanews' ); ?>">
                            <?php
                            wp_nav_menu(
                                array(
                                    'theme_location' => 'footer',
                                    'menu_class'     => 'footer-menu',
                                    'depth'          => 1,
                                )
                            );
                            ?>
                        </nav>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        
        <button id="back-to-top" class="back-to-top" aria-label="<?php esc_attr_e( 'Back to top', 'nexanews' ); ?>">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="18 15 12 9 6 15"></polyline></svg>
        </button>
    </footer>
</div>

<?php wp_footer(); ?>
</body>
</html>