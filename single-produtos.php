<?php get_header(); ?>

		<?php while ( have_posts() ) : the_post(); ?>

		<?php $thumbnail_src = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), "full" ); ?>

		<!-- header -->
		<header class="site-head">
			<div class="jumbotron text-center text-uppercase" style="background-image: url(<?php echo $thumbnail_src[0]; ?>);">
				<div class="caption">
					<div class="container">
						<h1 class="title"><?php the_title(); ?></h1>
						<p class="lead"><?php the_excerpt(); ?></p>
					</div>
				</div>
			</div>
		</header>
		<!-- //header -->

		<!-- wam-produtos -->
		<section class="page-content wam-apps margin-top-bottom-60">
			<div class="container">
				<div class="row">
						<?php the_content() ?>
				</div>
			</div>
		</section>
		<!-- //wam-produtos -->

		<?php endwhile; ?>


<?php get_footer(); ?>
