<?php 

function zot_create_post_partner() {

    $supports = array( 'title', 'editor' );

	// Parceiros

	$labels = array(
		'name'                => __( 'Parceiros', THEMENAME ),
		'singular_name'       => __( 'Parceiro', THEMENAME ),
		'add_new'             => __( 'Adicionar Novo', THEMENAME ),
		'add_new_item'        => __( 'Adicionar Novo', THEMENAME ),
		'edit_item'           => __( 'Editar', THEMENAME ),
		'new_item'            => __( 'Novo', THEMENAME ),
		'all_items'           => __( 'Todos', THEMENAME ),
		'view_item'           => __( 'Ver', THEMENAME ),
		'search_items'        => __( 'Pesquisar', THEMENAME ),
		'not_found'           => __( 'Nenhum Parceiro encontrada', THEMENAME ),
		'not_found_in_trash'  => __( 'Nenhum Parceiro no Lixo', THEMENAME ),
		'menu_name'           => __( 'Parceiros', THEMENAME ),
	);

	$slug = get_theme_mod( 'partner_permalink' );
	$slug = ( empty( $slug ) ) ? 'partner' : $slug;

	$args = array(
		'labels'              => $labels,
		'public'              => true,
		'publicly_queryable'  => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'query_var'           => true,
		'rewrite'             => array( 'slug' => $slug ),
		'capability_type'     => 'post',
		'has_archive'         => true,
		'hierarchical'        => true,
		'menu_position'       => 4,
		'supports'            => $supports,
		'menu_icon'           => 'dashicons-text-page',
	);

    register_post_type( 'partner', $args );
    
}

add_action( 'init', 'zot_create_post_partner' );