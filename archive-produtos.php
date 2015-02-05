<?php get_header(); ?>

		<!-- header -->
		<header class="site-head">
			<div class="jumbotron text-center text-uppercase" style="background-image: url(<?php echo get_template_directory_uri(); ?>/assets/images/intro/news_big.jpg);">
				<div class="caption">
					<div class="container">
						<h1 class="title"><?php _e( 'Produtos Mozilla', 'wam' ); ?></h1>
						<p class="lead"><?php _e( 'Saiba quais produtos da Mozilla a comunidade está ativamente envolvida!', 'wam' ); ?></p>
					</div>
				</div>
			</div>
		</header>
		<!-- //header -->

		<!-- mozilla-produtos -->
		<section class="page-content mozilla-products margin-top-bottom-60">
			<div class="container">
				<div class="row">
					<?php $produtos = new WP_Query( array( 'post_type' => 'produtos', 'posts_per_page' => '-1' ) ); ?>
					<?php while ( $produtos->have_posts() ) : $produtos->the_post(); ?>

					<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 text-center prod">
						<?php the_post_thumbnail( '740-620', array( 'class' => 'img-responsive border' ) ) ?>
						<div class="box">
							<h3 class="text-uppercase title"><?php the_title(); ?></h3>
							<p class="lead"><?php the_excerpt(); ?></p>
							<p class="text-uppercase"><a class="btn btn-orange" href="<?php the_permalink(); ?>" role="button"><?php _e( 'Quero saber mais', 'wam' ); ?></a></p>
						</div>
					</div>

					<?php endwhile; ?>

				</div>
			</div>
		</section>
		<!-- mozilla-produtos -->


<?php get_footer(); ?>
