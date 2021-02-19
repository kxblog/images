<?php 
if ( ! defined( 'ABSPATH' ) ) { exit; }
get_header(); ?>

<section id="primary" class="content-area">
	<main id="main" class="site-main<?php if (zm_get_option('post_no_margin')) { ?> domargin<?php } ?>" role="main">
		<?php if ( have_posts() ) : ?>
		<?php while ( have_posts() ) : the_post(); ?>
			<?php if (zm_get_option('post_no_margin')) { ?>
			<article id="post-<?php the_ID(); ?>" <?php post_class('wow fadeInUp post ms bk doclose'); ?>>
			<?php } else { ?>
			<article id="post-<?php the_ID(); ?>" <?php post_class('wow fadeInUp post ms bk'); ?>>
			<?php } ?>

				<?php 
					$content = $post->post_content;
					preg_match_all('/<img.*?(?: |\\t|\\r|\\n)?src=[\'"]?(.+?)[\'"]?(?:(?: |\\t|\\r|\\n)+.*?)?>/sim', $content, $strResult, PREG_PATTERN_ORDER);
					$n = count($strResult[1]);
					if($n > 0) { ?>
					<figure class="thumbnail">
						<?php zm_thumbnail(); ?>
						<?php if (zm_get_option('no_thumbnail_cat')) { ?><span class="cat cat-roll"><?php } else { ?><span class="cat"><?php } ?><?php echo get_the_term_list( $post->ID,  'notice', '' ); ?></span>
					</figure>
				<?php } ?>

				<?php header_title(); ?>
					<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
				</header><!-- .entry-header -->

				<div class="entry-content">
						<div class="archive-content">
							<?php begin_trim_words(); ?>
						</div>
						<div class="clear"></div>
						<span class="title-l"></span>

							<?php 
								$content = $post->post_content;
								preg_match_all('/<img.*?(?: |\\t|\\r|\\n)?src=[\'"]?(.+?)[\'"]?(?:(?: |\\t|\\r|\\n)+.*?)?>/sim', $content, $strResult, PREG_PATTERN_ORDER);
								$n = count($strResult[1]);
								if( $n > 0 || get_post_meta($post->ID, 'thumbnail', true) ) : ?>
								<span class="entry-meta">
									<?php begin_entry_meta(); ?>
								</span>
							<?php else : ?>
								<span class="entry-meta-no">
									<?php begin_format_meta(); ?>
								</span>
							<?php endif; ?>

					<div class="clear"></div>
				</div>

				<?php if ( ! is_single() ) : ?>
					<?php if ( get_post_meta($post->ID, 'direct', true) ) { ?>
					<?php $direct = get_post_meta($post->ID, 'direct', true); ?>
					<?php if (zm_get_option('more_hide')) { ?><span class="entry-more more-roll"><?php } else { ?><span class="entry-more"><?php } ?><a href="<?php echo $direct ?>" target="_blank" rel="external nofollow"><?php echo zm_get_option('direct_w'); ?></a></span>
					<?php } else { ?>
					<?php if (zm_get_option('more_hide')) { ?><span class="entry-more more-roll"><?php } else { ?><span class="entry-more"><?php } ?><a href="<?php the_permalink(); ?>" rel="external nofollow"><?php echo zm_get_option('more_w'); ?></a></span>
					<?php } ?>
				<?php endif; ?>
			</article>

		<?php endwhile; ?>

		<?php else : ?>
			<?php get_template_part( 'template/content', 'none' ); ?>

		<?php endif; ?>

	</main><!-- .site-main -->

	<div class="pagenav-clear"><?php begin_pagenav(); ?></div>

</section><!-- .content-area -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>