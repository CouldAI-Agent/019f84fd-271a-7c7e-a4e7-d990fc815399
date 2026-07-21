<?php
/**
 * The template for displaying the front page.
 *
 * @package NexaNews
 */

get_header();
?>

<div class="site-content">
	<div class="container">
		<main id="primary" class="site-main">

			<section class="hero-section">
				<div class="hero-grid">
					<div class="hero-featured">
						<?php
						$featured_args = array(
							'posts_per_page'      => 1,
							'ignore_sticky_posts' => 1,
							'meta_key'            => '_is_ns_featured_post',
							'meta_value'          => 'yes'
						);
						$featured_query = new WP_Query( $featured_args );
						if ( $featured_query->have_posts() ) :
							while ( $featured_query->have_posts() ) : $featured_query->the_post();
								get_template_part( 'template-parts/content', 'hero-featured' );
							endwhile;
							wp_reset_postdata();
						else:
							// Fallback to latest post if no featured
							$latest_args = array(
								'posts_per_page' => 1,
								'ignore_sticky_posts' => 1,
							);
							$latest_query = new WP_Query( $latest_args );
							if ( $latest_query->have_posts() ) :
								while ( $latest_query->have_posts() ) : $latest_query->the_post();
									?>
									<article class="post-card hero-card">
										<?php if ( has_post_thumbnail() ) : ?>
											<a href="<?php the_permalink(); ?>" class="post-thumbnail">
												<?php the_post_thumbnail('large'); ?>
											</a>
										<?php endif; ?>
										<div class="post-content">
											<div class="post-categories">
												<?php the_category(' '); ?>
											</div>
											<h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
											<div class="entry-meta">
												<span class="posted-on"><?php echo get_the_date(); ?></span>
											</div>
										</div>
									</article>
									<?php
								endwhile;
								wp_reset_postdata();
							endif;
						endif;
						?>
					</div>
					
					<div class="hero-latest">
						<h3 class="section-title">Latest News</h3>
						<div class="latest-news-list">
							<?php
							$latest_news_args = array(
								'posts_per_page'      => 4,
								'ignore_sticky_posts' => 1,
								'offset'              => 1 // skip the one used in hero if fallback
							);
							$latest_news_query = new WP_Query( $latest_news_args );
							if ( $latest_news_query->have_posts() ) :
								while ( $latest_news_query->have_posts() ) : $latest_news_query->the_post();
									?>
									<article class="latest-news-item">
										<?php if ( has_post_thumbnail() ) : ?>
											<a href="<?php the_permalink(); ?>" class="post-thumbnail-small">
												<?php the_post_thumbnail('thumbnail'); ?>
											</a>
										<?php endif; ?>
										<div class="latest-news-content">
											<h4 class="entry-title-small"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
											<div class="entry-meta">
												<span class="posted-on"><?php echo get_the_date(); ?></span>
											</div>
										</div>
									</article>
									<?php
								endwhile;
								wp_reset_postdata();
							endif;
							?>
						</div>
					</div>
				</div>
			</section>

			<div class="content-sidebar-wrap">
				<div class="main-content-area">
					<section class="category-section">
						<h2 class="section-title">Trending Now</h2>
						<div class="post-grid grid-2-col">
							<?php
							$trending_args = array(
								'posts_per_page'      => 4,
								'ignore_sticky_posts' => 1,
							);
							$trending_query = new WP_Query( $trending_args );
							if ( $trending_query->have_posts() ) :
								while ( $trending_query->have_posts() ) : $trending_query->the_post();
									?>
									<article id="post-<?php the_ID(); ?>" <?php post_class('post-card'); ?>>
										<?php if ( has_post_thumbnail() ) : ?>
											<a href="<?php the_permalink(); ?>" class="post-thumbnail">
												<?php the_post_thumbnail('medium_large'); ?>
											</a>
										<?php endif; ?>
										
										<div class="post-content">
											<div class="post-categories">
												<?php the_category(' '); ?>
											</div>
											<h3 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
											<div class="entry-meta">
												<span class="byline">By <?php the_author_posts_link(); ?></span>
												<span class="posted-on"><?php echo get_the_date(); ?></span>
											</div>
											<div class="entry-excerpt">
												<?php the_excerpt(); ?>
											</div>
										</div>
									</article>
									<?php
								endwhile;
								wp_reset_postdata();
							endif;
							?>
						</div>
					</section>
				</div>
				
				<?php get_sidebar(); ?>
			</div>

		</main>
	</div>
</div>

<?php
get_footer();
