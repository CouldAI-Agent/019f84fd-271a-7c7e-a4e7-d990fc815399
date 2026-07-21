<?php
/**
 * The template for displaying archive pages
 */
get_header(); ?>

<main id="primary" class="site-main">
    <div class="container">
        <div class="main-content-wrapper">
            <div class="main-content">
                <?php if ( have_posts() ) : ?>
                    <header class="page-header">
                        <?php
                        the_archive_title( '<h1 class="page-title">', '</h1>' );
                        the_archive_description( '<div class="archive-description">', '</div>' );
                        ?>
                    </header>

                    <div class="post-grid">
                        <?php
                        while ( have_posts() ) :
                            the_post();
                            get_template_part( 'template-parts/content', get_post_type() );
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