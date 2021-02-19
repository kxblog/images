<?php 
if ( ! defined( 'ABSPATH' ) ) { exit; }
get_header(); ?>

<style type="text/css">
.tao-goods {
}
.tao-img {
	float: left;
	max-width: 261px;
	height: auto;
	margin: 0 30px 30px 0;
    overflow: hidden;
	transition-duration: .3s;
}
.tao-img a img {
	width: auto;
	height: auto;
	max-width: 100%;
	-webkit-transition: -webkit-transform .3s linear;
	-moz-transition: -moz-transform .3s linear;
	-o-transition: -o-transform .3s linear;
	transition: transform .3s linear
}
.tao-img:hover a img {
	transition: All 0.7s ease;
	-webkit-transform: scale(1.1);
	-moz-transform: scale(1.1);
	-ms-transform: scale(1.1);
	-o-transform: scale(1.1);
}
.brief {
	float: left;
	width: 50%;
	margin: 0;
	padding: 0 10px 10px 10px;
}
.product-m {
	font-size: 15px;
	display: block;
	margin: 0 0 15px 0;
}
.pricex {
	font-size: 16px;
	color: #ff4400;
	display: block;
}

.tao-goods ul li {
 	font-size: 14px;
	font-weight: normal;
	list-style:none;
	border: none;
    line-height: 180%;
    margin: 0;
	box-shadow: none;
}
.taourl a {
	float: left;
	background: #ff4400;
	color: #fff !important;
	line-height: 35px;
	margin: 40px 20px 0 0;
	padding: 0 15px;
	border: 1px solid #ff4400;
	border-radius: 2px;
}
.taourl a:hover {
	background: #7ab951;
	border: 1px solid #7ab951;
}
.discount a {
	float: left;
	background: #fff;
	color: #444 !important;
	line-height: 35px;
	margin: 40px 20px 0 0;
	padding: 0 15px;
	border: 1px solid #ddd;
	border-radius: 2px;
}
.discount a:hover {
	color: #fff !important;
	background: #7ab951;
	border: 1px solid #7ab951;
}

@media screen and (max-width: 640px) {
	.brief {
		width: 100%;
	}
	.tao-img {
		float: inherit;
		margin: 0 auto 0;
	}
}
</style>

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
						<div class="tao-goods">
							<figure class="tao-img">
								<?php tao_thumbnail(); ?>
							</figure>

							<div class="brief">
								<span class="product-m"><?php $price = get_post_meta($post->ID, 'product', true);{ echo $price; }?></span>
								<span class="pricex"><strong>￥<?php $price = get_post_meta($post->ID, 'pricex', true);{ echo $price; }?>元</strong></span>
								<?php if ( get_post_meta($post->ID, 'pricey', true) ) : ?>
									<span class="pricey"><del>市场价:<?php $price = get_post_meta($post->ID, 'pricey', true);{ echo $price; }?>元</del></span>
								<?php endif; ?>

								<?php if ( get_post_meta($post->ID, 'discount', true) ) : ?>
									<?php
										$discount = get_post_meta($post->ID, 'discount', true);
										$url = get_post_meta($post->ID, 'discounturl', true);
										echo '<span class="discount"><a href='.$url.' rel="external nofollow" target="_blank" class="url">'.$discount.'</a></span>';
									 ?>
								<?php endif; ?>

								<?php if ( get_post_meta($post->ID, 'taourl', true) ) : ?>
									<?php
										$url = get_post_meta($post->ID, 'taourl', true);
										echo '<span class="taourl"><a href='.$url.' rel="external nofollow" target="_blank" class="url">直接购买</a></span>';
									 ?>
								<?php endif; ?>

								<!-- 
								<?php if ( get_post_meta($post->ID, 'discount', true) ) : ?>
									<?php
										$discount = get_post_meta($post->ID, 'discount', true);
										$url = get_post_meta($post->ID, 'discounturl', true);
										echo "<div class='discount'><a href='$url' rel='external nofollow' target='_blank' class='url'>$discount</a></div>";
									 ?>
								<?php endif; ?>

								<?php
									$url = get_post_meta($post->ID, 'taourl', true);
									echo "<div class='taourl'><a href='$url' rel='external nofollow' target='_blank' class='url'>直接购买</a></div>";
								 ?>
					 			-->

							</div>
							<div class="clear"></div>
						</div>

						<div class="clear"></div>

						<?php the_content(); ?>
						<div class="clear"></div>
						<?php begin_link_pages(); ?>
					</div>

						<?php if (zm_get_option('zm_like')) { ?><?php share_poster(); ?><?php } ?>
						<?php if (zm_get_option('single_weixin')) { ?>
							<?php get_template_part( 'template/weixin' ); ?>
						<?php } ?>
						<div class="content-empty"></div>

						<footer class="single-footer">
							<div class="single-cat-tag">
								<div class="single-cat">分类：<?php echo get_the_term_list( $post->ID,  'taobao', '' ); ?>
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
				<?php get_template_part( 'template/single-tao' ); ?>
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