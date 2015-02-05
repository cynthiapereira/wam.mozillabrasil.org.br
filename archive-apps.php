<?php get_header(); ?>

		<!-- header -->
		<header class="site-head">
			<div class="jumbotron text-center text-uppercase" style="background-image: url(<?php echo get_template_directory_uri(); ?>/assets/images/intro/news_big.jpg);">
				<div class="caption">
					<div class="container">
						<h1 class="title"><?php _e( 'Aplicativos', 'wam' ); ?></h1>
						<p class="lead"><?php _e( 'Conheça os aplicativos criados por brasileiros', 'wam' ); ?></p>
					</div>
				</div>
			</div>
		</header>
		<!-- //header -->

		<!-- wam-apps -->
		<section class="page-content wam-apps margin-top-bottom-60">
			<div class="container">
				<div class="row">
					<?php $apps = new WP_Query( array( 'post_type' => 'apps', 'posts_per_page' => '-1' ) ); ?>
					<?php $c = 0; while ( $apps->have_posts() ) : $apps->the_post(); $c++; ?>

					<!-- <script type="text/javascript">
						jQuery.getJSON("https://marketplace.firefox.com/api/v1/apps/search/?q=<?php //echo rwmb_meta( 'wam_apps_slug' ); ?>&icons&format=JSON",
							function(data) {
								console.log( data.objects[0].icons[128] );
						});
					</script> -->

					<div class="col-lg-4 col-md-4 col-sm-6 col-xs-6 margin-bottom-20 text-center">
						<div class="box">
							<img alt="<?php the_title() ?>" src="http://placehold.it/128x128&amp;text=Imagem" class="img-responsive img-thumbnail text-center">
							<h4 class="text-uppercase title name"><?php the_title() ?></h4>
							<p class="font-light author"><?php _e( 'Autor:', 'wam' ); ?> <a href="https://marketplace.firefox.com/search?author=<?php echo rwmb_meta( 'wam_apps_autor' ) ?>" target="_blank"><?php echo rwmb_meta( 'wam_apps_autor' ) ?></a></p>
							<p class="text-uppercase button"><a role="button" href="https://marketplace.firefox.com/app/<?php echo rwmb_meta( 'wam_apps_slug' ); ?>" target="_blank" class="btn btn-orange"><?php _e( 'Quero saber mais', 'wam' ); ?></a></p>
						</div>
					</div>

					<?php if ( 0 == $c%3 ) { echo '<div class="clearfix visible-lg-block visible-md-block visible-sm-block"></div>'; } ?>

					<?php endwhile; ?>

				</div>
			</div>
		</section>
		<!-- //wam-apps -->


<?php get_footer(); ?>
