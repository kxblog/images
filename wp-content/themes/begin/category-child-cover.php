<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }
get_header(); ?>

<style type="text/css">
#primary {
	width: 100%;
}
</style>

<section id="primary-cover" class="content-area">
	<main id="main" class="site-main" role="main">
		<?php child_cover(); ?>
	</main>
	<div class="clear"></div>
</section>

<?php get_footer(); ?>