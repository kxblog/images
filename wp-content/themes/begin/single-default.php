<?php 
if ( ! defined( 'ABSPATH' ) ) { exit; }
get_header(); ?>

	<?php begin_primary_class(); ?>

		<main id="main" class="site-main<?php if (zm_get_option('p_first') ) { ?> p-em<?php } ?>" role="main">

			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'template/content', get_post_format() ); ?>

				<?php if (zm_get_option('copyright')) { ?>
					<?php get_template_part( 'template/copyright' ); ?>
				<?php } ?>

				<?php if (zm_get_option('single_tao')) { ?>
					<?php get_template_part( 'template/single-tao' ); ?>
				<?php } ?>

				<?php if (zm_get_option('related_img')) { ?>
					<?php get_template_part( 'template/related-img' ); ?>
				<?php } ?>

				<?php get_template_part( 'template/single-widget' ); ?>

				<?php if (zm_get_option('single_tab')) { ?>
					<?php get_template_part( '/template/cat-tab' ); ?>
				<?php } ?>

				<?php get_template_part('ad/ads', 'comments'); ?>

				<?php nav_single(); ?>

				<?php begin_comments(); ?>

			<?php endwhile; ?>

		</main><!-- .site-main -->
	</div><!-- .content-area -->

<?php if ( get_post_meta($post->ID, 'no_sidebar', true) ) { ?>
<?php } else { ?>
<?php get_sidebar(); ?>
<?php } ?>
<?php get_footer(); ?>