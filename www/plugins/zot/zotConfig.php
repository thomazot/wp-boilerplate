<?php 


// Remove css adm
add_action('get_header', 'remove_admin_login_header');
function remove_admin_login_header() {
    remove_action('wp_head', '_admin_bar_bump_cb');
}

add_filter( 'get_the_archive_title', function ($title) {
    if ( is_category() ) {
        $title = single_cat_title( '', false ); 
    } elseif ( is_tag() ) {
        $title = single_tag_title( '', false ); 
    } elseif ( is_author() ) {
        $title = '<span class="vcard">' . get_the_author() . '</span>' ; 
    } elseif( is_tax('product_categories') ) {
        $title = single_cat_title( '', false ); 
    }

    return $title;
});

function hide_admin_bar(){ return false; }
add_filter( 'show_admin_bar', 'hide_admin_bar' );

// add_theme_support( 'post-formats', array( 'aside', 'gallery', 'teste') );


function revcon_change_post_label() {
    global $menu;
    global $submenu;
    $menu[5][0] = 'Serviços';
    $submenu['edit.php'][5][0] = 'Serviços';
    $submenu['edit.php'][10][0] = 'Adicionar Serviços';
    $submenu['edit.php'][16][0] = 'Serviços Tags';
}
function revcon_change_post_object() {
    global $wp_post_types;
    $labels = &$wp_post_types['post']->labels;
    $labels->name = 'Serviços';
    $labels->singular_name = 'Serviços';
    $labels->add_new = 'Adicionar Serviços';
    $labels->add_new_item = 'Adicionar Serviços';
    $labels->edit_item = 'Editar Serviços';
    $labels->new_item = 'Serviços';
    $labels->view_item = 'View Serviços';
    $labels->search_items = 'Search Serviços';
    $labels->not_found = 'No Serviços found';
    $labels->not_found_in_trash = 'No Serviços found in Trash';
    $labels->all_items = 'All Serviços';
    $labels->menu_name = 'Serviços';
    $labels->name_admin_bar = 'Serviços';
}

add_action('admin_menu', 'my_remove_sub_menus');

function my_remove_sub_menus() {
    remove_submenu_page('edit.php', 'edit-tags.php?taxonomy=category');
    remove_submenu_page('edit.php', 'edit-tags.php?taxonomy=post_tag');
}

add_action( 'admin_menu', 'revcon_change_post_label' );
add_action( 'init', 'revcon_change_post_object' );