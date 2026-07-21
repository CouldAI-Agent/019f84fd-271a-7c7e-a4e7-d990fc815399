<?php
/**
 * The template for displaying 404 pages (not found)
 */
get_header(); ?>

<main id="primary" class="site-main">
    <div class="container">
        <section class="error-404 not-found">
            <header class="page-header">
                <h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'nexanews' ); ?></h1>
            </header>

            <div class="page-content">
                <p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'nexanews' ); ?></p>
                <?php get_search_form(); ?>
                
                <div class="recent-posts-404">
                    <h2 class="widget-title"><?php esc_html_e( 'Recent Posts', 'nexanews' ); ?></h2>
                    <ul>
                        <?php
                        $recent_posts = wp_get_recent_posts( array(
                            'numberposts' => 5,
                            'post_status' => 'publish'
                        ) );
                        foreach ( $recent_posts as $post ) {
                            printf( '<li><a href="%1$s">%2$s</a></li>',
                                esc_url( get_permalink( $post['ID'] ) ),
                                esc_html( $post['post_title'] )
                            );
                        }
                        ?>
                    </ul>
                </div>
            </div>
        </section>
    </div>
</main>

<?php get_footer(); ?>