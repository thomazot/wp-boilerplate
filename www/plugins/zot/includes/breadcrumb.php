<?php
function breadcrumb() {

$showOnHome = 0; // 1 - show breadcrumbs on the homepage, 0 - don't show
$delimiter = '<span class="breadcrumb__sep">-</span>'; // delimiter between crumbs
$home = 'Página Inicial'; // text for the 'Home' link
$showCurrent = 1; // 1 - show current post/page title in breadcrumbs, 0 - don't show
$before = '<strong class="breacrumb__current">'; // tag before the current crumb
$after = '</strong>'; // tag after the current crumb

global $post;
$homeLink = get_bloginfo('url');

if (is_home() || is_front_page()) {

    if ($showOnHome == 1) echo '<div id="breadcrumb" class="breadcrumb"><a class="breadcrumb__link" href="' . $homeLink . '">' . $home . '</a></div>';

} else {

    echo '<div id="breadcrumb" class="breadcrumb"><a class="breadcrumb__link" href="' . $homeLink . '">' . $home . '</a> ' . $delimiter . ' ';

    if ( is_category() ) {
        $thisCat = get_category(get_query_var('cat'), false);
        if ($thisCat->parent != 0) echo get_category_parents($thisCat->parent, TRUE, ' ' . $delimiter . ' ');
        echo $before . single_cat_title('', false) . $after;

    } elseif ( is_search() ) {
        echo $before . 'Resultado de busca para:  "' . get_search_query() . '"' . $after;

    } elseif ( is_day() ) {
        echo '<a class="breadcrumb__link" href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
        echo '<a class="breadcrumb__link" href="' . get_month_link(get_the_time('Y'),get_the_time('m')) . '">' . get_the_time('F') . '</a> ' . $delimiter . ' ';
        echo $before . get_the_time('d') . $after;

    } elseif ( is_month() ) {
        echo '<a class="breadcrumb__link" href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
        echo $before . get_the_time('F') . $after;

    } elseif ( is_year() ) {
        echo $before . get_the_time('Y') . $after;

    } elseif ( is_single() && !is_attachment() ) {
        if ( get_post_type() != 'post' ) {
            $post_type = get_post_type_object(get_post_type());
            $slug = $post_type->rewrite;
            echo '<a class="breadcrumb__link" href="' . $homeLink . '/' . $slug['slug'] . '/">' . $post_type->labels->singular_name . '</a>';
            if ($showCurrent == 1) echo ' ' . $delimiter . ' ' . $before . get_the_title() . $after;
        } else {
            $cat = get_the_category(); $cat = $cat[0];
            $cats = get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
            if ($showCurrent == 0) $cats = preg_replace("#^(.+)\s$delimiter\s$#", "$1", $cats);
            echo $cats;
            if ($showCurrent == 1) echo $before . get_the_title() . $after;
        }

    } elseif ( !is_single() && !is_page() && get_post_type() != 'post' && !is_404() ) {
        $post_type = get_post_type_object(get_post_type());
        echo $before . $post_type->labels->singular_name . $after;

    } elseif ( is_attachment() ) {
        $parent = get_post($post->post_parent);
        $cat = get_the_category($parent->ID); $cat = $cat[0];
        echo get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
        echo '<a class="breadcrumb__link" href="' . get_permalink($parent) . '">' . $parent->post_title . '</a>';
        if ($showCurrent == 1) echo ' ' . $delimiter . ' ' . $before . get_the_title() . $after;

    } elseif ( is_page() && !$post->post_parent ) {
        if ($showCurrent == 1) echo $before . get_the_title() . $after;

    } elseif ( is_page() && $post->post_parent ) {
        $parent_id  = $post->post_parent;
        $breadcrumbs = array();
        while ($parent_id) {
            $page = get_page($parent_id);
            $breadcrumbs[] = '<a class="breadcrumb__link" href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a>';
            $parent_id  = $page->post_parent;
        }
        $breadcrumbs = array_reverse($breadcrumbs);
        for ($i = 0; $i < count($breadcrumbs); $i++) {
            echo $breadcrumbs[$i];
            if ($i != count($breadcrumbs)-1) echo ' ' . $delimiter . ' ';
        }
        if ($showCurrent == 1) echo ' ' . $delimiter . ' ' . $before . get_the_title() . $after;

    } elseif ( is_tag() ) {
        echo $before . 'Posts tagged "' . single_tag_title('', false) . '"' . $after;

    } elseif ( is_author() ) {
        global $author;
        $userdata = get_userdata($author);
        echo $before . 'Articles posted by ' . $userdata->display_name . $after;

    } elseif ( is_404() ) {
        echo $before . 'Error 404' . $after;
    }

    if ( get_query_var('paged') ) {
        if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ' (';
        echo __('Page') . ' ' . get_query_var('paged');
        if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ')';
    }

    echo '</div>';

}
} // end wp_custom_breadcrumbs()

/* Taxonomy Breadcrumb */
function taxonomy_breadcrumb() {
// Get the current term
    $term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );
    $pipe = '<span class="breadcrumb__sep"> - </span>';

    // Create a list of all the term's parents
    $parent = $term->parent;
    while ($parent):
        $parents[] = $parent;
        $new_parent = get_term_by( 'id', $parent, get_query_var( 'taxonomy' ));
        $parent = $new_parent->parent;
    endwhile;

    echo '<div class="breadcrumb">';
    echo '<a class="breadcrumb__link" href="/"> Página Inicial </a>' . $pipe;

    echo '<a class="breadcrumb__link" href="/produtos"> Produtos </a>' . $pipe;

    // if(!empty($parents)):
    //     $parents = array_reverse($parents);
    //     // For each parent, create a breadcrumb item
    //     foreach ($parents as $parent):
    //         $item = get_term_by( 'id', $parent, get_query_var( 'taxonomy' ));
    //         $url = get_bloginfo('url').'/'.$item->taxonomy.'/'.$item->slug;
    //         echo '<a class="breadcrumb__link" href="'.$url.'">'.$item->name.'</a>' . $pipe;
    //     endforeach;
    // endif;

    // Display the current term in the breadcrumb
    echo '<strong class="breadcrumb__current"> '.$term->name.' </strong></div>';
}