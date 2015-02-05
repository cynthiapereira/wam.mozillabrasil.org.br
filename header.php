<!DOCTYPE html>
<html <?php language_attributes(); ?>>
  <head>
  	<!-- Metas -->
    <meta charset="<?php get_bloginfo( 'charset' ); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="keywords" content="">

    <!-- Favicons -->


    <?php wp_head(); ?>

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body <?php body_class(); ?>>
  	<!-- navbar -->
  	<div class="navbar-wrapper">
			<div class="navbar navbar-inverse navbar-static-top no-margin-bottom" role="navigation">
				<div class="container">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
							<span class="sr-only">Menu</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<a class="navbar-brand" href="<?php echo home_url(); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ) ?></a>
					</div>
					<div class="navbar-collapse collapse">
						<?php
						wp_nav_menu(
							array(
								'theme_location' => 'main-menu',
								'depth' => 2,
								'container' => false,
								'menu_class' => 'nav navbar-nav navbar-right text-uppercase',
								'fallback_cb' => 'Odin_Bootstrap_Nav_Walker::fallback',
								'walker' => new Odin_Bootstrap_Nav_Walker()
							)
						);
						?>
					</div>
				</div>
			</div>
  	</div>
  	<!-- //navbar -->