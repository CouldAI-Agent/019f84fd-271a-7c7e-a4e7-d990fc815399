<?php
get_header();
?>

    <main id="primary" class="site-main">
        <div class="container">
            <?php
            if ( have_posts() ) :

                if ( is_home() && ! is_front_page() ) :
                    ?>
                    <header>
                        <h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
                    </header>
                    <?php
                endif;

                echo '<div class="post-grid">';
                while ( have_posts() ) :
                    the_post();
                    ?>
                    <article id="post-<?php the_ID(); ?>" <?php post_class( 'article-card' ); ?>>
                        <?php if ( has_post_thumbnail() ) : ?>
                            <div class="article-thumbnail">
                                <a href="<?php the_permalink(); ?>">
                                    <?php the_post_thumbnail( 'large' ); ?>
                                </a>
                                <?php
                                $categories = get_the_category();
                                if ( ! empty( $categories ) ) {
                                    echo '<span class="category-badge"><a href="' . esc_url( get_category_link( $categories[0]->term_id ) ) . '">' . esc_html( $categories[0]->name ) . '</a></span>';
                                }
                                ?>
                            </div>
                        <?php endif; ?>

                        <div class="article-content">
                            <header class="entry-header">
                                <?php
                                if ( is_singular() ) :
                                    the_title( '<h1 class="entry-title">', '</h1>' );
                                else :
                                    the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
                                endif;
                                ?>
                                
                                <div class="entry-meta">
                                    <span class="posted-on"><?php echo get_the_date(); ?></span>
                                    <span class="byline"><?php esc_html_e( 'by', 'nexanews' ); ?> <?php the_author_posts_link(); ?></span>
                                </div>
                            </header>

                            <div class="entry-summary">
                                <?php the_excerpt(); ?>
                            </div>
                        </div>
                    </article>
                    <?php
                endwhile;
                echo '</div>';

                the_posts_navigation();

            else :

                ?>
                <section class="no-results not-found">
                    <header class="page-header">
                        <h1 class="page-title"><?php esc_html_e( 'Nothing Found', 'nexanews' ); ?></h1>
                    </header>
                    <div class="page-content">
                        <?php if ( is_search() ) : ?>
                            <p><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'nexanews' ); ?></p>
                            <?php get_search_form(); ?>
                        <?php else : ?>
                            <p><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'nexanews' ); ?></p>
                            <?php get_search_form(); ?>
                        <?php endif; ?>
                    </div>
                </section>
                <?php

            endif;
            ?>
        </div>
    </main>

<?php
get_footer();