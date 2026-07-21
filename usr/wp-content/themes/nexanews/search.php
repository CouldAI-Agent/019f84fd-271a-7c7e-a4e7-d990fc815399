<?php
/**
 * The template for displaying search results pages
 */
get_header(); ?>

<main id="primary" class="site-main">
    <div class="container">
        <div class="main-content-wrapper">
            <div class="main-content">
                <?php if ( have_posts() ) : ?>
                    <header class="page-header">
                        <h1 class="page-title">
                            <?php
                            /* translators: %s: search query. */
                            printf( esc_html__( 'Search Results for: %s', 'nexanews' ), '<span>' . get_search_query() . '</span>' );
                            ?>
                        </h1>
                    </header>

                    <div class="post-grid">
                        <?php
                        while ( have_posts() ) :
                            the_post();
                            get_template_part( 'template-parts/content', 'search' );
                        endwhile;
                        ?>
                    </div>
                    <?php
                    the_posts_pagination( array(
                        'prev_text' => __( 'Previous', 'nexanews' ),
                        'next_text' => __( 'Next', 'nexanews' ),
                    ) );
                else :
                    get_template_part( 'template-parts/content', 'none' );
                endif;
                ?>
            </div>
            <?php get_sidebar(); ?>
        </div>
    </div>
</main>

<?php get_footer(); ?>