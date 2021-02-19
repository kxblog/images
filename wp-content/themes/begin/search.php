<?php 
if ( ! defined( 'ABSPATH' ) ) { exit; }
get_header(); ?>
<?php if (!zm_get_option('search_the') || (zm_get_option("search_the") == 'search_list')){ ?>
<!-- list -->
	<section id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<?php if ( have_posts() ) : ?>
				<ul class="search-page bk">
					<?php while ( have_posts() ) : the_post(); ?>
						<li class="search-inf">
							<?php time_ago( $time_type ='post' ); ?>
						</li>
						<?php the_title( sprintf( '<li class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></li>' ); ?>

					<?php endwhile; ?>
				</ul>
			<?php else : ?>
				<div class="search-page bk">
					<?php get_template_part( 'template/content', 'none' ); ?>
				</div>
			<?php endif; ?>
		</main>
		<?php begin_pagenav(); ?>
	</section>
<?php } ?>

<?php if (zm_get_option('search_the') == 'search_img'){ ?>
<!-- img -->
<?php if ( have_posts() ) : ?>
	<section id="picture" class="content-area">
		<main id="main" class="site-main" role="main">
				<?php while ( have_posts() ) : the_post(); ?>
				<article class="picture wow fadeInUp">
					<div class="picture-box ms bk">
						<figure class="picture-img">
							<?php if (zm_get_option('hide_box')) { ?>
								<a rel="bookmark" href="<?php echo esc_url( get_permalink() ); ?>"><div class="hide-box"></div></a>
								<a rel="bookmark" href="<?php echo esc_url( get_permalink() ); ?>"><div class="hide-excerpt"><?php if (has_excerpt('')){ echo wp_trim_words( get_the_excerpt(), 62, '...' ); } else { echo wp_trim_words( get_the_content(), 72, '...' ); } ?></div></a>
							<?php } ?>
							<?php zm_thumbnail(); ?>
						</figure>
						<?php the_title( sprintf( '<h2 class="grid-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
						<span class="grid-inf">
							<span class="g-cat"><i class="be be-folder"></i> <?php zm_category(); ?></span>
							<span class="grid-inf-l">
								<span class="date"><i class="be be-schedule"></i> <?php the_time( 'm/d' ); ?></span>
								<?php if( function_exists( 'the_views' ) ) { the_views( true, '<span class="views"><i class="be be-eye"></i> ','</span>' ); } ?>
								<?php if ( get_post_meta($post->ID, 'zm_like', true) ) : ?><span class="grid-like"><span class="be be-thumbs-up-o">&nbsp;<?php zm_get_current_count(); ?></span></span><?php endif; ?>
							</span>
			 			</span>
			 			<div class="clear"></div>
					</div>
				</article>
				<?php endwhile;?>
		</main>
		<?php begin_pagenav(); ?>
	</section>
<?php else : ?>
	<section id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
		<div class="search-page bk">
			<?php get_template_part( 'template/content', 'none' ); ?>
		</div>
		</main>
	</section>
<?php endif; ?>
<?php } ?>

<?php if (zm_get_option('search_the') == 'search_normal'){ ?>
<!-- normal -->
	<section id="primary" class="content-area">
		<?php if ( have_posts() ) : ?>
			<main id="main" class="site-main" role="main">
				<?php while ( have_posts() ) : the_post(); ?>
					<?php get_template_part( 'template/content', get_post_format() ); ?>
					<?php get_template_part('ad/ads', 'archive'); ?>
				<?php endwhile; ?>
			</main>
		<?php else : ?>
			<div class="search-page bk">
				<?php get_template_part( 'template/content', 'none' ); ?>
			</div>
		<?php endif; ?>
		<div class="pagenav-clear"><?php begin_pagenav(); ?></div>
	</section>
<?php } ?>
<?php get_footer(); ?>