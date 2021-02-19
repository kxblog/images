<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }
get_header(); ?>

<style type="text/css">
#primary {
	width: 100%;
}
#main {
	background: transparent;
	margin: 0 0 10px 0;
}
.post {
	margin: 0;
	padding: 0;
	border: none;
	box-shadow: none;
    border-radius: 0;
}

.archive-list {
	margin: 0 0 -1px;
	padding: 0 20px;
	border: 1px solid #dadada;
}
.list-title {
	width: 80%;
	font-weight: normal;
	line-height: 280%;
	white-space: nowrap;
	overflow: hidden;
	text-overflow: ellipsis;
}
.archive-list-inf {
	float: right;
	color: #999;
	line-height: 280%;
}
.ias-trigger-next, .ias-spinner {
	margin: 15px 0 0 5px;
}
.night .post {
	border: none;
}

.night .archive-list {
	border: 1px solid #262626;
	margin: 0 0 -1px;
}

@media screen and (max-width: 420px) {
	.list-title {
		width: 99%;
	}
	.archive-list-inf {
		display: none;
	}
}
</style>

<section id="primary" class="content-area">
	<main id="main" class="site-main" role="main">
		<?php if ((zm_get_option('no_child')) && is_category() ) { ?>
			<?php 
				$paged = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;
				query_posts(array('category__in' => array(get_query_var('cat')), 'paged' => $paged,));
			?>
		<?php } ?>
		<?php if ( have_posts() ) : ?>
		<?php while ( have_posts() ) : the_post(); ?>
		<article id="post-<?php the_ID(); ?>" <?php post_class('wow fadeInUp'); ?>>
			<div class="archive-list">
				<span class="archive-list-inf"><?php the_time( 'm/d' ) ?></span>
				<?php if ( get_post_meta($post->ID, 'mark', true) ) { ?>
					<?php the_title( sprintf( '<h2 class="list-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a><span class="t-mark">' . $mark = get_post_meta($post->ID, 'mark', true) . '</span></h2>' ); ?>
				<?php } else { ?>
					<?php the_title( sprintf( '<h2 class="list-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
				<?php } ?>
			</div>
		</article>
		<?php endwhile; ?>
		<?php else : ?>
			<?php get_template_part( 'template/content', 'none' ); ?>
		<?php endif; ?>
	</main><!-- .site-main -->
	<?php begin_pagenav(); ?>
</section><!-- .content-area -->
<?php get_footer(); ?>