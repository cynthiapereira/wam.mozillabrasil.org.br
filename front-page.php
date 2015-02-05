<?php get_header(); ?>

	<?php $slideshow = new WP_Query( array( 'post_type' => 'slideshow', 'post_status' => 'publish', 'orderby' => 'date', 'order' => 'DESC' ) ); ?>
	<!-- intro -->
	<div id="intro" class="carousel slide site-head" data-ride="carousel" data-interval="false">
		<?php if( $slideshow->have_posts() ): ?>

		<div class="carousel-inner">
			<?php $c = 0; while ( $slideshow->have_posts() ) : $slideshow->the_post(); $c++; ?>
			<article class="item<?php echo ($c == 1) ? ' active' : ''; ?>">
				<?php $thumbnail_src = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), "full" );  ?>
				<img src="<?php echo $thumbnail_src[0]; ?>" alt="<?php the_title(); ?>">
				<div class="overlay"></div>
				<div class="carousel-caption jumbotron text-uppercase">
					<h1 class="title"><?php the_title(); ?></h1>
					<p class="lead"><?php the_excerpt(); ?></p>
					<p class="text-uppercase"><a class="btn btn-orange btn-lg" href="<?php echo rwmb_meta('wam_slideshow_url') ?>" <?php echo ( rwmb_meta('wam_slideshow_url_tipo') == 1 ) ? 'target="_blank"' : ''; ?>><?php echo rwmb_meta('wam_slideshow_button'); ?></a></p>
				</div>
			</article>
			<?php endwhile; ?>
		</div>
		<ol class="carousel-indicators">
			<?php $ci = 0; while ( $slideshow->have_posts() ) : $slideshow->the_post(); ?>
			<li data-target="#intro" data-slide-to="<?php echo $ci; ?>"<?php echo ($ci == 0) ? ' class="active"' : ''; ?>></li>
			<?php $ci++; endwhile; ?>
		</ol>

		<?php else: ?>

		<div class="carousel-inner">
			<article class="item active">
				<img src="http://placehold.it/1920x700" alt="Slideshow Exemplo">
				<div class="overlay"></div>
				<div class="carousel-caption jumbotron text-uppercase">
					<h1 class="title"><?php _e( 'Exemplo', 'wam' ); ?></h1>
					<p class="lead"><?php _e( 'Não nenhum slideshow cadastrado. =(', 'wam' ); ?></p>
				</div>
			</article>
		</div>
		<ol class="carousel-indicators">
			<li data-target="#intro" data-slide-to="0" class="active"></li>
		</ol>
		<?php endif; ?>

		<a class="left carousel-control" href="#intro" role="button" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
      <span class="sr-only"><?php _e( 'Anterior', 'wam' ); ?></span>
    </a>
    <a class="right carousel-control" href="#intro" role="button" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
      <span class="sr-only"><?php _e( 'Próximo', 'wam' ); ?></span>
    </a>
	</div>
	<!-- //intro -->

	<?php $produtos = new WP_Query( array( 'post_type' => 'produtos', 'post_status' => 'publish', 'post_per_page' => 3, 'orderby' => 'date', 'order' => 'DESC' ) ); ?>
	<!-- produtos-mozilla -->
	<section class="mozilla-products padding-bottom-60">
		<div class="container">
			<div class="row">

			<?php if( $produtos->have_posts() ):

				while ( $produtos->have_posts() ) : $produtos->the_post(); ?>
				<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 text-center prod">
					<?php the_post_thumbnail( '740-620', array( 'class' => 'img-responsive border' ) ) ?>
					<div class="box">
						<h3 class="text-uppercase title"><?php the_title(); ?></h3>
						<p class="lead"><?php the_excerpt(); ?></p>
						<p class="text-uppercase"><a class="btn btn-orange" href="<?php the_permalink(); ?>" role="button"><?php _e( 'Quero saber mais', 'wam' ); ?></a></p>
					</div>
				</div>
				<?php endwhile; ?>

			<?php else: ?>

				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<div class="box">
						<p class="lead"><?php _e( 'Não há nenhum produto em destaque. =(', 'wam' ); ?></p>
					</div>
				</div>

			<?php endif; ?>
			</div>
		</div>
	</section>
	<!-- //produtos-mozilla -->

	<!-- wam-eventos -->
	<section class="wam-events padding-top-bottom-120">
		<div class="container">
			<div class="row">
				<div class="col-lg-5 col-md-5 col-sm-5 col-xs-12 col-lg-push-7 description">
					<h3 class="title"><?php _e( 'Nossos Eventos', 'wam' ); ?></h3>
					<p class="lead"><?php _e( 'Frequentemente a comunidade proporciona eventos inspiradores.', 'wam' ) ?></p>
					<p class="lead"><?php _e( 'Saiba onde será o próximo e junte-se a nós!', 'wam' ) ?></p>
					<p class="text-uppercase"><a class="btn btn-orange btn-lg" href="<?php echo home_url(); ?>/eventos/" role="button"><?php _e( 'Ver agenda', 'wam' ); ?></a></p>
				</div>
				<div class="col-lg-7 col-md-7 col-sm-7 col-xs-12 col-lg-pull-5">
					<img class="img-responsive" src="http://localhost/wam/wp-content/uploads/2015/02/14860930514_262bc51d33_o.jpg" alt="WAM - Eventos">
					<small><?php _e( 'Crédito:', 'wam' ); ?> <a href="https://www.flickr.com/photos/webmakerbrasil/14860930514/" target="_blank" rel="nofollow"> Webmaker Brasil</a></small>
				</div>
			</div>
		</div>
	</section>
	<!-- //wam-eventos -->

	<?php $recents = new WP_Query( array( 'post_type' => 'post', 'post_status' => 'publish', 'posts_per_page' => 3, 'orderby' => 'date', 'order' => 'DESC' ) ); ?>
	<!-- wam-posts -->
	<section class="wam-posts padding-top-bottom-120">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 margin-bottom-20">
					<h2 class="title"><?php _e( 'Novidades', 'wam' ); ?></h2>
					<p class="lead"><?php _e( 'Confira as últimas postagens dos colaboradores da Comunidade Mozilla Brasil.', 'wam' ); ?></p>
				</div>

				<?php if( $recents->have_posts() ):

				while ( $recents->have_posts() ) : $recents->the_post(); ?>
				<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 margin-bottom-20">
					<div class="post-container">
						<?php if ( has_post_thumbnail() ) : ?>
						<div class="post-image">
							<?php the_post_thumbnail( 'full', array('class' => 'img-responsive') ); ?>
						</div>
						<?php else : ?>
						<div class="post-image">
							<img class="img-responsive" src="http://placehold.it/740x620&text=Sem Imagem" alt="<?php the_title(); ?>">
						</div>
						<?php endif; ?>
						<div class="post-title">
							<h4 class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
						</div>
						<div class="post-meta clearfix">
							<p class="date pull-left"><i class="fa fa-calendar"></i> <?php the_time(get_option('date_format')); ?></p>
							<div class="share pull-right">
								<a href="#"><i class="fa fa-thumbs-o-up"></i> Curtir</a>
								<a href="#"><i class="fa fa-twitter"></i>Tweet</a>
							</div>
						</div>
						<div class="post-content">
							<p><?php the_excerpt(); ?></p>
						</div>
						<div class="post-more clearfix">
							<a href="#" class="pull-left"><i class="fa fa-comments"></i> <?php _e( 'Comentar', 'wam' ); ?></a>
							<a href="<?php the_permalink(); ?>" class="pull-right" title="Continue Lendo"><i class="fa fa-long-arrow-right"></i></a>
						</div>
					</div>
				</div>
				<?php endwhile; else: ?>
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<p class="lead"><?php _e( 'Não há nenhuma postagem cadstrada. =(', 'wam' ); ?></p>
					</div>
				<?php endif; ?>
			</div>
		</div>
	</section>
	<!-- //wam-posts -->

<?php get_footer(); ?>
