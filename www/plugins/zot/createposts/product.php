<?php 

function zot_create_post_produto() {

    $supports = array( 'title', 'editor' );

	// Produtos

	$labels = array(
		'name'                => __( 'Produtos', THEMENAME ),
		'singular_name'       => __( 'Produto', THEMENAME ),
		'add_new'             => __( 'Adicionar Novo', THEMENAME ),
		'add_new_item'        => __( 'Adicionar Novo', THEMENAME ),
		'edit_item'           => __( 'Editar', THEMENAME ),
		'new_item'            => __( 'Novo', THEMENAME ),
		'all_items'           => __( 'Todos', THEMENAME ),
		'view_item'           => __( 'Ver', THEMENAME ),
		'search_items'        => __( 'Pesquisar', THEMENAME ),
		'not_found'           => __( 'Nenhum Produto encontrada', THEMENAME ),
		'not_found_in_trash'  => __( 'Nenhum Produto no Lixo', THEMENAME ),
		'menu_name'           => __( 'Produtos', THEMENAME ),
	);

	$slug = get_theme_mod( 'products_permalink' );
	$slug = ( empty( $slug ) ) ? 'products' : $slug;

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
		'menu_icon'           => 'dashicons-welcome-add-page'
	);

	register_post_type( 'products', $args );
	
	//  Categorias
	$labels = array(
		'name' => __( 'Categorias do Produto', 'taxonomy general name' ),
		'singular_name' => __( 'Categoria do Produto', 'taxonomy singular name' ),
		'search_items' =>  __( 'Buscar Categorias do Produto' ),
		'all_items' => __( 'Todas Categorias do Produto' ),
		'parent_item' => __( 'Categoria Pai do Produto' ),
		'parent_item_colon' => __( 'Categoria Pai do Produto:' ),
		'edit_item' => __( 'Editar Categoria do Produto' ), 
		'update_item' => __( 'Atualizar  Categoria do Produto' ),
		'add_new_item' => __( 'Adicionar Categoria do Produto' ),
		'new_item_name' => __( 'Nova Categoria do Produto' ),
		'menu_name' => __( 'Categorias do Produto' )
	);    
	
	register_taxonomy('product_categories',array('products'), array(
		'hierarchical' => true,
		'labels' => $labels,
		'query_var' => true,
		'show_ui' => true
	));
    
}

add_action( 'init', 'zot_create_post_produto' );