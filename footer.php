  	<!-- footer -->
  	<footer class="footer">
  		<!-- social -->
  		<div class="social">
  			<div class="container">
  				<div class="row">
  					<div class="col-lg-7 col-md-7 col-sm-7 col-xs-12 margin-bottom-20">
  						<?php if ( is_active_sidebar( 'rodape' ) ) : ?>
								<?php dynamic_sidebar( 'rodape-social' ); ?>
							<?php endif; ?>
  					</div>

  					<div class="col-lg-5 col-md-5 col-sm-5 col-xs-12 margin-bottom-20">
							<?php if ( is_active_sidebar( 'rodape' ) ) : ?>
								<?php dynamic_sidebar( 'rodape-news' ); ?>
							<?php endif; ?>

  						<h4 class="title no-margin-top">Receba nossas atualizações</h4>
							<form method="post" action="" class="row" id="newsletter-form" role="form">
								<div class="col-lg-12">
									<div class="input-group">
										<input type="email" name="news_email" id="email_newsletter" class="form-control" placeholder="Digite o seu e-mail">
										<span class="input-group-btn"><button type="submit" id="submit-button-newsletter" class="btn btn-orange"><i class="fa fa-paper-plane"></i></button></span>
									</div>
								</div>
							</form>
  					</div>

		  		</div>
		  	</div>
  		</div>
  		<!-- //social -->

			<!-- widget -->
  		<div class="widget padding-top-20 padding-bottom-20">
  			<div class="container">
  				<div class="row">

						<?php if ( is_active_sidebar( 'rodape' ) ) : ?>
								<?php dynamic_sidebar( 'rodape' ); ?>
						<?php endif; ?>

						<?php $eventos = new WP_Query( array( 'post_type' => 'tribe_events', 'post_status' => 'publish', 'posts_per_page' => 3, 'eventDisplay' => 'past', 'orderby' => 'date', 'order' => 'DESC' ) ); ?>
						<!-- wam-eventos -->
						<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
							<h3 class="title margin-bottom-20"><?php _e( 'Eventos Realizados', 'wam' ); ?></h3>

							<div class="recent-events">

							<?php if( $eventos->have_posts() ):

								while ( $eventos->have_posts() ) : $eventos->the_post(); ?>
								<div class="media">
									<a class="media-left" href="<?php the_permalink(); ?>">
										<?php if ( has_post_thumbnail() ) : ?>
										<?php the_post_thumbnail( 'thumb', array('class' => 'img-responsive') ); ?>
										<?php else : ?>
										<img src="http://placehold.it/80x80&text=Imagem" alt="<?php the_title(); ?>">
										<?php endif; ?>
									</a>
									<div class="media-body">
										<h4 class="media-heading"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
										<p class="no-margin-bottom"><i class="fa fa-map-marker"></i> <?php echo tribe_get_city() .' - '. tribe_get_province(); ?></p>
										<p><i class="fa fa-calendar"></i> <?php echo tribe_get_start_date( null, false, 'd/m/Y' ); ?></p>
									</div>
								</div>
							<?php endwhile; else: ?>

								<div class="media">
									<div class="media-body">
										<p><?php _e( 'Não há nenhum evento anterior cadastrado. =(', 'wam' ); ?></p>
									</div>
								</div>

							<?php endif; ?>
							</div>
						</div>
						<!-- //wam-eventos -->

						<!-- wam-galeria -->
						<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
							<h3 class="title margin-bottom-20"><?php _e( 'Nossa Galeria', 'wam' ); ?></h3>
							<div id="nanoGallery"></div>
						</div>
						<!-- //wam-galeria -->
  				</div>
  			</div>
  		</div>
  		<!-- //widget -->

			<!-- copyleft -->
  		<div class="copyleft">
  			<div class="container">
  				<div class="row">

  					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
		  				<div class="btn-group dropup language">
								<button type="button" class="btn btn-xs btn-grey dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><?php _e( 'Selecionar Idioma', 'wam' ); ?> <span class="caret"></span></button>
								<ul class="dropdown-menu" role="menu">
									<li><a href="#">Inglês</a></li>
									<li><a href="#">Português</a></li>
								</ul>
							</div>
		  			</div>

		  			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
							<p class="no-margin-bottom"><small><i class="fa fa-heart-o"></i> <?php _e( 'We Are Mozillians', 'wam' ); ?> <i class="fa fa-heart-o"></i> <br> <?php _e( 'Fazer o bem está em nosso código!', 'wam' ); ?></small></p>
		  			</div>

		  		</div>
		  	</div>
  		</div>
  		<!-- //copyleft -->
  	</footer>
  	<!-- //footer -->

  	<!-- JS -->
  	<?php wp_footer(); ?>
  </body>
</html>