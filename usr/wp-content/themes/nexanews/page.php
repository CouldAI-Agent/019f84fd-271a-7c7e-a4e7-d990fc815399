<?php
/**
 * The template for displaying all pages
 *
 * @package NexaNews
 */

get_header();
?>

<div class="site-content">
	<div class="container">
		<div class="content-sidebar-wrap">
			<main id="primary" class="site-main">

				<?php
				while ( have_posts() ) :
					the_post();
					?>
					
					<article id="post-<?php the_ID(); ?>" <?php post_class('page-article'); ?>>
						<header class="entry-header">
							<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
						</header>

						<?php if ( has_post_thumbnail() ) : ?>
							<div class="post-thumbnail page-thumbnail">
								<?php the_post_thumbnail('large'); ?>
							</div>
						<?php endif; ?>

						<div class="entry-content">
							<?php
							the_content();

							wp_link_pages(
								array(
									'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'nexanews' ),
									'after'  => '</div>',
								)
							);
							?>
						</div>
					</article>

					<?php
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;

				endwhile; // End of the loop.
				?>

			</main>

			<?php get_sidebar(); ?>
		</div>
	</div>
</div>

<?php
get_footer();
