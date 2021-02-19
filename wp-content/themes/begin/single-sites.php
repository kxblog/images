<?php 
if ( ! defined( 'ABSPATH' ) ) { exit; }
get_header(); ?>

<style type="text/css">
.single-sites #primary {
	width: 100%;
} 
</style>

<?php get_header(); ?>
	<?php begin_primary_class(); ?>
		<main id="main" class="site-main<?php if (zm_get_option('p_first') ) { ?> p-em<?php } ?>" role="main">

			<?php while ( have_posts() ) : the_post(); ?>
				<article id="post-<?php the_ID(); ?>" <?php post_class('wow fadeInUp post ms bk da'); ?>>

					<?php header_title(); ?>
						<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
					</header>
					<div class="entry-content">
						<div class="single-content">
							<?php get_template_part('ad/ads', 'single'); ?>
							<?php the_content(); ?>
						</div>

						<div class="content-empty"></div>

						<?php get_template_part('ad/ads', 'single-b'); ?>

						<footer class="single-footer">

							<div class="single-cat-tag">
								<div class="single-cat">日期：<?php the_time( 'Y年m月d日' ) ?> 分类：<?php echo get_the_term_list( $post->ID,  'favorites', '' ); ?></div>
							</div>
						</footer><!-- .entry-footer -->

						<div class="clear"></div>
					</div>
				</article>
			<?php endwhile; ?>
		</main>
	</div>
<?php get_footer(); ?>