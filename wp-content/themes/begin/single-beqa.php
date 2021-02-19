<?php 
if ( ! defined( 'ABSPATH' ) ) { exit; }
get_header(); ?>

	<?php begin_primary_class(); ?>

		<main id="main" class="qa-main site-main<?php if (zm_get_option('p_first') ) { ?> p-em<?php } ?>" role="main">
			<?php while ( have_posts() ) : the_post(); ?>
				<article id="post-<?php the_ID(); ?>" <?php post_class('wow fadeInUp ms bk'); ?>>
					<?php header_title(); ?>
						<?php if ( get_post_meta($post->ID, 'header_img', true) || get_post_meta($post->ID, 'header_bg', true) ) { ?>
						<?php } else { ?>
							<?php if ( get_post_meta($post->ID, 'mark', true) ) { ?>
								<?php the_title( '<h1 class="entry-title">', '<span class="t-mark">' . $mark = get_post_meta($post->ID, 'mark', true) . '</span></h1>' ); ?>
							<?php } else { ?>
								<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
							<?php } ?>
						<?php } ?>
					</header>

					<div class="entry-content">
						<?php begin_single_meta(); ?>

						<div class="single-content">
							<?php the_content(); ?>
						</div>

						<div class="qa-related">
							<h3><?php _e( '您可能喜欢', 'begin' ); ?></h3>
							<ul>
								<?php 
									global $post;
									$cat = get_the_category();
									foreach($cat as $key=>$category){
										$catid = $category->term_id;
									}
									$q = new WP_Query( array(
										'showposts' => 10,
										'post_type' => 'post',
										'cat' => @$catid,
										'post__not_in' => array($post->ID),
										'order' => 'orderby',
										'ignore_sticky_posts' => 1
									) );
								?>
								<?php while ($q->have_posts()) : $q->the_post(); ?>

									<li class="cat-title">
									<?php the_title( sprintf( '<a href="%s" rel="bookmark"><i class="be be-arrowright"></i>', esc_url( get_permalink() ) ), '</a>' ); ?>
									</li>
								<?php endwhile; ?>
								<?php wp_reset_query(); ?>
							</ul>
							<div class="clear"></div>
						</div>

						<?php if (zm_get_option('zm_like')) { ?><?php share_poster(); ?><?php } ?>

						<div class="content-empty"></div>
						<?php get_template_part('ad/ads', 'single-b'); ?>
						<footer class="single-footer">
							<?php begin_single_cat(); ?>
						</footer>
						<div class="clear"></div>
					</div>
				</article>

				<div class="beqa-comments-title wow fadeInUp ms bk">
					<?php comments_popup_link( '' . sprintf(__( '回复', 'begin' )) . ' 0', '' . sprintf(__( '回复', 'begin' )) . ' 1 ', '' . sprintf(__( '回复', 'begin' )) . ' %' ); ?>
				</div>

				<div class="qa-comments-box"><?php begin_comments(); ?></div>

			<?php endwhile; ?>
		</main>
	</div>

<?php if ( get_post_meta($post->ID, 'no_sidebar', true) ) { ?>
<?php } else { ?>
<?php get_sidebar(); ?>
<?php } ?>
<?php get_footer(); ?>