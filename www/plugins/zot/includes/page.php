<?php

include_once 'functions.php';

function zotPage($slug_page)
{
    $slug = slug($slug_page);
    $query = new WP_Query(array(
        'post_type' => 'page',
        'pagename' => $slug_page
    ));

    $return = array(
        'title' => '',
        'short-description' => '',
        'image' => ''
    );

    if ($query->have_posts()):
        while ($query->have_posts()) : $query->the_post(); 
            $return['title'] = get_the_title();
            $return['short-description'] = get_field('short-description');
            $return['image'] = get_field('image');
        endwhile;
    endif;
    
    wp_reset_query();
    return $return;
}