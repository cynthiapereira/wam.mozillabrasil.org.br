<?php
/* Sidebar
---------------------------------------------------------------------------*/
register_sidebar( array(
	'name'   => 'Sidebar',
	'id' => 'sidebar',
	'description' => __('Conteúdo da Sidebar'),
	'before_widget' => "\n",
	'after_widget' => "\n",
	'before_title' => '<h3>',
	'after_title' => "</h3>\n"
));

/* Rodapé
---------------------------------------------------------------------------*/
register_sidebar( array(
	'name'   => 'Rodapé Social',
	'id' => 'rodape-social',
	'description' => __('Widget com Redes Sociais para o rodapé.'),
	'before_widget' => "<!-- widget -->\n",
	'after_widget' => "\n<!-- /widget -->",
	'before_title' => '<h4 class="title no-margin-top">',
	'after_title' => "</h4>\n"
));

register_sidebar( array(
	'name'   => 'Rodapé Newsletter',
	'id' => 'rodape-news',
	'description' => __('Widget com Newsletter para o rodapé.'),
	'before_widget' => "<!-- widget -->\n",
	'after_widget' => "\n<!-- /widget -->",
	'before_title' => '<h4 class="title no-margin-top">',
	'after_title' => "</h4>\n"
));

register_sidebar( array(
	'name'   => 'Rodapé',
	'id' => 'rodape',
	'description' => __('Widgets para o rodapé.'),
	'before_widget' => "<!-- widget -->\n<div class='col-lg-4 col-md-4 col-sm-6 col-xs-12'>\n",
	'after_widget' => "</div>\n<!-- /widget -->",
	'before_title' => '<h3 class="title margin-bottom-20">',
	'after_title' => "</h3>\n<hr>\n"
));


/* Class
---------------------------------------------------------------------------*/
class My_Recent_Posts_Widget extends WP_Widget_Recent_Posts {
	function widget($args, $instance) {

		extract( $args );
		$title = apply_filters('widget_title', empty($instance['title']) ? __('Posts recentes') : $instance['title'], $instance, $this->id_base);

		if( empty( $instance['number'] ) || ! $number = absint( $instance['number'] ) )
			$number = 5;
		$r = new WP_Query( apply_filters( 'widget_posts_args', array( 'posts_per_page' => $number, 'no_found_rows' => true, 'post_status' => 'publish', 'orderby' => 'date', 'order' => 'DESC', 'ignore_sticky_posts' => true ) ) );

		if( $r->have_posts() ) :
			$before_title = '<h3 class="title margin-bottom-20">';
		$after_title = '</h3>';
		echo $before_widget;

		if( $title ) echo $before_title  . $title . $after_title; ?>
		<div class="widget recent-posts">
			<?php while( $r->have_posts() ) : $r->the_post(); ?>
				<div class="media">
					<?php if ( has_post_thumbnail() ) : ?>
						<a class="media-left" href="<?php the_permalink() ?>"><?php the_post_thumbnail( 'thumb'); ?></a>
					<?php else: ?>
						<a class="media-left" href="<?php the_permalink() ?>"><img src="http://placehold.it/80x80&amp;text=sem imagem" alt="Sem Imagem"></a>
					<?php endif; ?>
					<div class="media-body">
						<h4 class="media-heading"><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h4>
						<p><i class="fa fa-calendar"></i> <?php the_time(get_option('date_format')); ?></p>
					</div>
				</div>
			<?php endwhile; ?>
		</div>
		<?php
		echo $after_widget;
		wp_reset_postdata();
		endif;
	}
}
function my_recent_widget_registration() {
	unregister_widget( 'WP_Widget_Recent_Posts' );
	register_widget( 'My_Recent_Posts_Widget' );
}
add_action('widgets_init', 'my_recent_widget_registration');


/* Class
---------------------------------------------------------------------------*/
class Social_Icons_Widget extends WP_Widget {

	public function __construct() {
		parent::__construct(
			'wam_social_icons',
			__( 'Social Icons', 'wam' ),
			array( 'description' => __( 'Exibe os ícones das redes sociais.', 'wam' ), )
			);
	}

	public function form( $instance ) {
		$title 				= isset( $instance['title'] ) ? $instance['title'] : '';
		$facebook     = isset( $instance['facebook'] ) ? $instance['facebook'] : '';
		$twitter     	= isset( $instance['twitter'] ) ? $instance['twitter'] : '';
		$googleplus 	= isset( $instance['googleplus'] ) ? $instance['googleplus'] : '';
		$youtube     	= isset( $instance['youtube'] ) ? $instance['youtube'] : '';
		$flickr     	= isset( $instance['flickr'] ) ? $instance['flickr'] : '';
		$instagram    = isset( $instance['instagram'] ) ? $instance['instagram'] : '';
		$github    		= isset( $instance['github'] ) ? $instance['github'] : '';
		$rss    			= isset( $instance['rss'] ) ? $instance['rss'] : '';

		?>

		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>">
				<?php _e( 'Título:', 'wam' ); ?>
				<input id="<?php echo $this->get_field_id( 'title' ); ?>" class="widefat" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
			</label>
		</p>

		<p><small>Insira a URL correspondente em cada campo. Somente os campos preenchidos serão exibidos.</small></p>

		<p>
			<label for="<?php echo $this->get_field_id('facebook'); ?>">
				<?php _e('Facebook:'); ?>
				<input id="<?php echo $this->get_field_id('facebook'); ?>" class="widefat"  name="<?php echo $this->get_field_name('facebook'); ?>" type="text" value="<?php echo $facebook; ?>" />
			</label>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('twitter'); ?>">
				<?php _e('Twitter:'); ?>
				<input class="widefat" id="<?php echo $this->get_field_id('twitter'); ?>" name="<?php echo $this->get_field_name('twitter'); ?>" type="text" value="<?php echo $twitter; ?>" />
			</label>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('googleplus'); ?>">
				<?php _e('Google+:'); ?>
				<input class="widefat" id="<?php echo $this->get_field_id('googleplus'); ?>" name="<?php echo $this->get_field_name('googleplus'); ?>" type="text" value="<?php echo $googleplus; ?>" />
			</label>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('youtube'); ?>">
				<?php _e('YouTube:'); ?>
				<input class="widefat" id="<?php echo $this->get_field_id('youtube'); ?>" name="<?php echo $this->get_field_name('youtube'); ?>" type="text" value="<?php echo $youtube; ?>" />
			</label>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('flickr'); ?>">
				<?php _e('Flickr:'); ?>
				<input class="widefat" id="<?php echo $this->get_field_id('flickr'); ?>" name="<?php echo $this->get_field_name('flickr'); ?>" type="text" value="<?php echo $flickr; ?>" />
			</label>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('instagram'); ?>">
				<?php _e('Instagram:'); ?>
				<input class="widefat" id="<?php echo $this->get_field_id('instagram'); ?>" name="<?php echo $this->get_field_name('instagram'); ?>" type="text" value="<?php echo $instagram; ?>" />
			</label>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('github'); ?>">
				<?php _e('GitHub:'); ?>
				<input class="widefat" id="<?php echo $this->get_field_id('github'); ?>" name="<?php echo $this->get_field_name('github'); ?>" type="text" value="<?php echo $github; ?>" />
			</label>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('rss'); ?>">
				<?php _e('RSS:'); ?>
				<input class="widefat" id="<?php echo $this->get_field_id('rss'); ?>" name="<?php echo $this->get_field_name('rss'); ?>" type="text" value="<?php echo $rss; ?>" />
			</label>
		</p>

		<?php
	}

	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] 	= ( ! empty( $new_instance['title'] ) ) ? sanitize_text_field( $new_instance['title'] ) : '';
		$instance['facebook'] = ( ! empty( $new_instance['facebook'] ) ) ? esc_url( $new_instance['facebook'] ) : '';
		$instance['twitter'] = ( ! empty( $new_instance['twitter'] ) ) ? esc_url( $new_instance['twitter'] ) : '';
		$instance['googleplus'] = ( ! empty( $new_instance['googleplus'] ) ) ? esc_url( $new_instance['googleplus'] ) : '';
		$instance['youtube'] = ( ! empty( $new_instance['youtube'] ) ) ? esc_url( $new_instance['youtube'] ) : '';
		$instance['flickr'] = ( ! empty( $new_instance['flickr'] ) ) ? esc_url( $new_instance['flickr'] ) : '';
		$instance['instagram'] = ( ! empty( $new_instance['instagram'] ) ) ? esc_url( $new_instance['instagram'] ) : '';
		$instance['github'] = ( ! empty( $new_instance['github'] ) ) ? esc_url( $new_instance['github'] ) : '';
		$instance['rss'] = ( ! empty( $new_instance['rss'] ) ) ? esc_url( $new_instance['rss'] ) : '';

		return $instance;
	}

	public function widget( $args, $instance ) {
		$title = apply_filters( 'widget_title', $instance['title'] );

		echo $args['before_widget'];
		if ( ! empty( $title ) ) {
			echo $args['before_title'] . $title . $args['after_title'];
		}

		echo sprintf(
			'<div class="btn-group social-icons">
				<a href="%1$s" class="btn btn-facebook" title="Facebook" target="_blank" rel="publisher"><i class="fa fa-facebook"></i></a>
				<a href="%2$s" class="btn btn-twitter" title="Twitter" target="_blank" rel="publisher"><i class="fa fa-twitter"></i></a>
				<a href="%3$s" class="btn btn-google-plus" title="Google+" target="_blank" rel="publisher"><i class="fa fa-google-plus"></i></a>
				<a href="%4$s" class="btn btn-youtube" title="YouTube" target="_blank" rel="publisher"><i class="fa fa-youtube"></i></a>
				<a href="%5$s" class="btn btn-flickr" title="Flickr" target="_blank" rel="publisher"><i class="fa fa-flickr"></i></a>
				<a href="%6$s" class="btn btn-instagram" title="Instagram" target="_blank" rel="publisher"><i class="fa fa-instagram"></i></a>
				<a href="%7$s" class="btn btn-github" title="GitHub" target="_blank" rel="publisher"><i class="fa fa-github"></i></a>
				<a href="%8$s" class="btn btn-rss" title="RSS" target="_blank" rel="publisher"><i class="fa fa-rss"></i></a>
			</div>',
			$instance['facebook'],
			$instance['twitter'],
			$instance['googleplus'],
			$instance['youtube'],
			$instance['flickr'],
			$instance['instagram'],
			$instance['github'],
			$instance['rss']
		);

		echo $args['after_widget'];
	}
}
function wam_social_icons_widget() {
	register_widget( 'Social_Icons_Widget' );
}
add_action( 'widgets_init', 'wam_social_icons_widget' );