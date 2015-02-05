<?php get_header(); ?>

<?php while ( have_posts() ) : the_post(); ?>

		<!-- header -->
		<header class="site-head">
			<?php /* $images = rwmb_meta( 'wam_pagina_background', 'type=image'); foreach ( $images as $image ) {
				echo '<div class="jumbotron text-center text-uppercase" style="background-image: url('.$image['full_url'].')">';
			}*/ ?>
			<div class="jumbotron text-center text-uppercase" style="background-image: url(<?php echo get_template_directory_uri(); ?>/assets/images/intro/news_big.jpg);">
				<div class="caption">
					<div class="container">
						<?php if( is_page() ): ?>
						<h1 class="title"><?php the_title(); ?></h1>
						<p class="lead"><?php echo rwmb_meta( 'wam_pagina_subtitulo'); ?></p>
						<?php else: ?>
						<h1 class="title"><?php _e( 'Eventos', 'wam' ); ?></h1><?php _e( '', 'wam' ); ?>
						<p class="lead"><?php _e( 'Confira o nosso calendário e escolha um evento para participar!', 'wam' ); ?></p>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</header>
		<!-- //header -->

		<!-- page-content -->
		<section class="page-content margin-top-bottom-60">
			<div class="container">
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<?php the_content(); ?>
					</div>
				</div>
			</div>
		</section>
		<!-- //page-content -->

<?php endwhile; ?>


<?php get_footer(); ?>
