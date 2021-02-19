<?php 
if ( ! defined( 'ABSPATH' ) ) { exit; }
get_header(); ?>

	<?php begin_primary_class(); ?>
		<main id="main" class="site-main<?php if (zm_get_option('p_first') ) { ?> p-em<?php } ?>" role="main">

			<?php while ( have_posts() ) : the_post(); ?>
				<article id="post-<?php the_ID(); ?>" <?php post_class('wow fadeInUp post ms bk da'); ?>>

					<?php header_title(); ?>
						<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
					</header><!-- .entry-header -->

					<?php begin_single_meta(); ?>

					<div class="entry-content">
						<div class="single-content">
							<?php begin_abstract(); ?>
							<?php get_template_part('ad/ads', 'single'); ?>

							<?php the_content(); ?>
							<?php get_template_part( 'inc/file' ); ?>
						</div>

						<?php begin_link_pages(); ?>

						<?php if (zm_get_option('zm_like')) { ?><?php share_poster(); ?><?php } ?>
						<?php if (zm_get_option('single_weixin')) { ?>
							<?php get_template_part( 'template/weixin' ); ?>
						<?php } ?>
						<div class="content-empty"></div>

						<?php get_template_part('ad/ads', 'single-b'); ?>

						<footer class="single-footer">
							<div class="single-cat-tag">
								<div class="single-cat"><i class="be be-sort"></i><?php echo get_the_term_list( $post->ID,  'gallery', '' ); ?>
								</div>
							</div>
						</footer><!-- .entry-footer -->

						<div class="clear"></div>
					</div><!-- .entry-content -->

				</article><!-- #post -->

				<?php if (zm_get_option('copyright')) { ?>
					<?php get_template_part( 'template/copyright' ); ?>
				<?php } ?>

				<?php if (zm_get_option('related_img')) { ?>
					<?php get_template_part( 'template/related-picture' ); ?>
				<?php } ?>

				<?php get_template_part('ad/ads', 'comments'); ?>

				<?php type_nav_single(); ?>

				<?php begin_comments(); ?>

			<?php endwhile; ?>

		</main><!-- .site-main -->
	</div><!-- .content-area -->

<?php if ( get_post_meta($post->ID, 'no_sidebar', true) ) { ?>
<?php } else { ?>
<?php get_sidebar(); ?>
<?php } ?>
<?php get_footer(); ?>