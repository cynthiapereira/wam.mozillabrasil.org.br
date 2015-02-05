<?php get_header(); ?>

		<!-- header -->
		<header class="site-head">
			<div class="jumbotron text-center text-uppercase" style="background-image: url(<?php echo get_template_directory_uri(); ?>/assets/images/intro/news_big.jpg);">
				<div class="caption">
					<div class="container">
						<h1 class="title"><?php _e( 'Blog', 'wam' ); ?></h1>
						<p class="lead"><?php _e( 'Lorem ipsum dolor sit amet', 'wam' ); ?></p>
					</div>
				</div>
			</div>
		</header>
		<!-- //header -->


		<!-- page-content -->
		<section class="page-content margin-top-bottom-60">
			<div class="container">
				<div class="row">
					<?php while ( have_posts() ) : the_post(); ?>
					<div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
						<?php the_content(); ?>
					</div>
					<?php endwhile; ?>

					<?php get_sidebar(); ?>
				</div>
			</div>
		</section>
		<!-- //page-content -->



<?php get_footer(); ?>
