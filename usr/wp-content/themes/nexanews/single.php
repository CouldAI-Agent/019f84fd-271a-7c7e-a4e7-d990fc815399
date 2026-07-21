<?php
/**
 * The template for displaying all single posts
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
					
					<article id="post-<?php the_ID(); ?>" <?php post_class('single-article'); ?>>
						<header class="entry-header">
							<div class="post-categories">
								<?php the_category(' '); ?>
							</div>
							<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
							
							<div class="entry-meta single-meta">
								<span class="byline">By <?php the_author_posts_link(); ?></span>
								<span class="posted-on"><?php echo get_the_date(); ?></span>
								<span class="comments-link"><?php comments_number('0 Comments', '1 Comment', '% Comments'); ?></span>
							</div>
						</header>

						<?php if ( has_post_thumbnail() ) : ?>
							<div class="post-thumbnail single-thumbnail">
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

						<footer class="entry-footer">
							<div class="post-tags">
								<?php the_tags('<span class="tag-links">', ' ', '</span>'); ?>
							</div>
						</footer>
					</article>

					<?php
					// If comments are open or we have at least one comment, load up the comment template.
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
