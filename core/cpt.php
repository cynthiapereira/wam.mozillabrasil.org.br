<?php

// Register Custom Post Type Apps
function wam_apps_post_type() {

	$labels = array(
		'name'                => _x( 'Apps', 'Post Type General Name', 'wam' ),
		'singular_name'       => _x( 'App', 'Post Type Singular Name', 'wam' ),
		'menu_name'           => __( 'Apps', 'wam' ),
		'parent_item_colon'   => __( 'App Parente:', 'wam' ),
		'all_items'           => __( 'Todos os apps', 'wam' ),
		'view_item'           => __( 'Visualizar app', 'wam' ),
		'add_new_item'        => __( 'Adicionar novo app', 'wam' ),
		'add_new'             => __( 'Adicionar novo', 'wam' ),
		'edit_item'           => __( 'Editar app', 'wam' ),
		'update_item'         => __( 'Atualizar app', 'wam' ),
		'search_items'        => __( 'Pesquisar app', 'wam' ),
		'not_found'           => __( 'Nenhum app encontrado', 'wam' ),
		'not_found_in_trash'  => __( 'Nenhum app encontrado na Lixeira', 'wam' ),
	);

	$args = array(
		'label'               => __( 'apps', 'wam' ),
		'description'         => __( 'Apps do WoMoz', 'wam' ),
		'labels'              => $labels,
		'supports'            => array( 'title', 'thumbnail', ),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => false,
		'show_in_admin_bar'   => true,
		'menu_position'       => 25,
		'menu_icon'           => 'dashicons-media-code',
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'page',
	);

	register_post_type( 'apps', $args );
}
add_action( 'init', 'wam_apps_post_type', 0 );

// Register Custom Post Type Produtos
function wam_produtos_post_type() {

	$labels = array(
		'name'                => _x( 'Produtos', 'Post Type General Name', 'wam' ),
		'singular_name'       => _x( 'Produto', 'Post Type Singular Name', 'wam' ),
		'menu_name'           => __( 'Produtos', 'wam' ),
		'parent_item_colon'   => __( 'Produto Parente:', 'wam' ),
		'all_items'           => __( 'Todos os produtos', 'wam' ),
		'view_item'           => __( 'Visualizar produto', 'wam' ),
		'add_new_item'        => __( 'Adicionar novo produto', 'wam' ),
		'add_new'             => __( 'Adicionar novo', 'wam' ),
		'edit_item'           => __( 'Editar produto', 'wam' ),
		'update_item'         => __( 'Atualizar produto', 'wam' ),
		'search_items'        => __( 'Pesquisar produto', 'wam' ),
		'not_found'           => __( 'Nenhum produto encontrado', 'wam' ),
		'not_found_in_trash'  => __( 'Nenhum produto encontrado na Lixeira', 'wam' ),
	);

	$args = array(
		'label'               => __( 'produtos', 'wam' ),
		'description'         => __( 'Produtos em Destaque', 'wam' ),
		'labels'              => $labels,
		'supports'            => array( 'title', 'editor', 'excerpt', 'thumbnail', ),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => false,
		'show_in_admin_bar'   => true,
		'menu_position'       => 25,
		'menu_icon'           => 'dashicons-awards',
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'page',
	);

	register_post_type( 'produtos', $args );
}
add_action( 'init', 'wam_produtos_post_type', 0 );

// Register Custom Post Type Slideshow
function wam_slideshow_post_type() {

	$labels = array(
		'name'                => _x( 'Slideshow', 'Post Type General Name', 'wam' ),
		'singular_name'       => _x( 'Slideshow', 'Post Type Singular Name', 'wam' ),
		'menu_name'           => __( 'Slideshow', 'wam' ),
		'parent_item_colon'   => __( 'Slideshow Parente:', 'wam' ),
		'all_items'           => __( 'Todos os slideshows', 'wam' ),
		'view_item'           => __( 'Visualizar slideshow', 'wam' ),
		'add_new_item'        => __( 'Adicionar novo slideshow', 'wam' ),
		'add_new'             => __( 'Adicionar novo', 'wam' ),
		'edit_item'           => __( 'Editar slideshow', 'wam' ),
		'update_item'         => __( 'Atualizar slideshow', 'wam' ),
		'search_items'        => __( 'Pesquisar slideshow', 'wam' ),
		'not_found'           => __( 'Nenhum slideshow encontrado', 'wam' ),
		'not_found_in_trash'  => __( 'Nenhum slideshow encontrado na Lixeira', 'wam' ),
	);

	$args = array(
		'label'               => __( 'slideshow', 'wam' ),
		'description'         => __( 'Apps do WoMoz', 'wam' ),
		'labels'              => $labels,
		'supports'            => array( 'title', 'excerpt', 'thumbnail', ),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => false,
		'show_in_admin_bar'   => true,
		'menu_position'       => 25,
		'menu_icon'           => 'dashicons-format-gallery',
		'can_export'          => true,
		'has_archive'         => false,
		'exclude_from_search' => true,
		'publicly_queryable'  => true,
		'capability_type'     => 'page',
	);

	register_post_type( 'slideshow', $args );
}
add_action( 'init', 'wam_slideshow_post_type', 0 );
