<?php 

/**
 * Personalizados
 */

// include 'widgets/zotLogo.php';


function zot_widgets_init() {
	// register_sidebar( array(
	// 	'name'          => esc_html__( 'Soluções', THEMENAME ),
	// 	'id'            => 'solutions',
	// 	'description'   => esc_html__( 'Adicione os widget da Soluções', THEMENAME ),
	// 	'before_widget' => '',
	// 	'after_widget'  => '',
	// 	'before_title'  => '',
	// 	'after_title'   => '',
	// ) );
	// register_sidebar( array(
	// 	'name'          => esc_html__( 'Produtos', THEMENAME ),
	// 	'id'            => 'products',
	// 	'description'   => esc_html__( 'Adicione os widget da Produtos', THEMENAME ),
	// 	'before_widget' => '',
	// 	'after_widget'  => '',
	// 	'before_title'  => '',
	// 	'after_title'   => '',
	// ) );
}
add_action( 'widgets_init', 'zot_widgets_init' );