<?php
include_once "zotFunctions.php";

function zotPosts($limit= -1, $order='desc', $tax=false, $pagination=false)
{   
    $args = array(
        'posts_per_page' => $limit,
        'post_status' => 'publish',
        'post_type' => 'post',
        'paged'   => max( 1, get_query_var('paged') ),
        'order' => $order
    );

    if($tax) {
        $args = array(
            'posts_per_page' => $limit,
            'post_status' => 'publish',
            'post_type' => 'post',
            'paged'   => max( 1, get_query_var('paged') ),
            'order' => $order,
            'tax_query' => array($tax)
        );
    }

    $query = new WP_Query($args);

    if ($query->have_posts()):
        ?>
        <div class="post-list__list" data-list="grid">
        <?php 
        while ($query->have_posts()): $query->the_post();
            get_template_part( 'template-parts/content', 'post' );
        endwhile;
        ?>
            <div class="post-list__item post-list__item--empty"></div>
            <div class="post-list__item post-list__item--empty"></div>
            <div class="post-list__item post-list__item--empty"></div>
        </div>
        <?php if($pagination): zotPagination($query); endif; ?>
        <?php 
    endif;
    wp_reset_query();

}