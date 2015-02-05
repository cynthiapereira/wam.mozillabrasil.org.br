<?php

add_filter( 'rwmb_meta_boxes', 'wam_register_meta_boxes' );

function wam_register_meta_boxes( $meta_boxes ){
	$prefix = 'wam_';

	// Páginas - Subtítulo
	$meta_boxes[] = array(
		'id' 					=> 'paginas-subtitulo',
		'title' 			=> __( 'Detalhes da Página', 'wam' ),
		'post_types'	=> array( 'page' ),
		'context' 		=> 'normal',
		'priority' 		=> 'high',
		'autosave' 		=> true,
		'fields' 			=> array(
			// Subtítulo
			array(
				'name' 	=> __( 'Subtítulo', 'wam' ),
				'id' 		=> "{$prefix}pagina_subtitulo",
				'desc' 	=> __( 'Digite o subtítulo da página que aparecerá acima do conteúdo.', 'wam' ),
				'type' 	=> 'text',
			),
			// Imagem
			array(
				'name' 	=> __( 'Imagem de Fundo', 'wam' ),
				'id' 		=> "{$prefix}pagina_background",
				'desc' 	=> __( 'Insira a imagem de fundo que aparecerá acima do conteuo.', 'wam' ),
				'type' 	=> 'image_advanced',
				'max_file_uploads' => 1,
			),
		)
	);

	// Apps
	$meta_boxes[] = array(
		'id' 					=> 'aplicativos',
		'title' 			=> __( 'Informações do Aplicativo', 'wam' ),
		'post_types'	=> array( 'apps' ),
		'context' 		=> 'normal',
		'priority' 		=> 'high',
		'autosave' 		=> true,
		'fields' 			=> array(
			// Autor
			array(
				'name' 	=> __( 'Autor do App', 'wam' ),
				'id' 		=> "{$prefix}apps_autor",
				'desc' 	=> __( 'Digite o nome do autor do aplicativo.', 'wam' ),
				'type' 	=> 'text',
			),
			// SLUG
			array(
				'name' 	=> __( 'Slug no Marketplace', 'wam' ),
				'id' 		=> "{$prefix}apps_slug",
				'desc' 	=> __( 'Insira o slug do aplicativo no marketplace.', 'wam' ),
				'type' 	=> 'text',
			),
		)
	);

	// Slideshow
	$meta_boxes[] = array(
		'id' 					=> 'slideshow',
		'title' 			=> __( 'Configurações do Slideshow', 'wam' ),
		'post_types'	=> array( 'slideshow' ),
		'context' 		=> 'normal',
		'priority' 		=> 'high',
		'autosave' 		=> true,
		'fields' 			=> array(
			// Autor
			array(
				'name' 	=> __( 'Texto do Botão', 'wam' ),
				'id' 		=> "{$prefix}slideshow_button",
				'desc' 	=> __( 'Insira o texto do botão.', 'wam' ),
				'type' 	=> 'text',
			),
			// URL
			array(
				'name' 	=> __( 'URL do Botão', 'wam' ),
				'id' 		=> "{$prefix}slideshow_url",
				'desc' 	=> __( 'Insira o link correspondente ao slideshow.', 'wam' ),
				'type' 	=> 'url',
			),
			//
			array(
				'name' 	=> __( 'Abrir link em uma nova aba?', 'wam' ),
				'id' 		=> "{$prefix}slideshow_url_tipo",
				'type' 	=> 'checkbox',
				'std' => 1,
			),
		)
	);

	return $meta_boxes;
}