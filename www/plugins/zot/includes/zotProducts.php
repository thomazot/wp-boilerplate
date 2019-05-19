<?php
include_once "zotFunctions.php";

function zotProducts($limit= -1, $order='ASC', $tax=false)
{   
    $args = array(
        'posts_per_page' => $limit,
        'post_status' => 'publish',
        'post_type' => 'products',
        'order' => $order,
        'orderby'       => 'ordernumber',
        'meta_query' => array(
            'ordernumber' => array( 'key' => 'order', 'type' => 'NUMERIC')
        )
    );

    if($tax) {
        $args = array(
            'posts_per_page' => $limit,
            'post_status' => 'publish',
            'post_type' => 'products',
            'order' => $order,
            'orderby'       => 'ordernumber',
            'tax_query' => array($tax),
            'meta_query' => array(
                'ordernumber' => array( 'key' => 'order', 'type' => 'NUMERIC')
            )
        );
    }

    $query = new WP_Query($args);

    if ($query->have_posts()):
        ?>
        <div class="product-list__list">
        <?php 
        while ($query->have_posts()): $query->the_post();
            get_template_part( 'template-parts/content', 'products' );
        endwhile;
        ?>
            <div class="product-list__item product-list__item--empty"></div>
            <div class="product-list__item product-list__item--empty"></div>
            <div class="product-list__item product-list__item--empty"></div>
        </div>
        <?php 
    endif;
    wp_reset_query();

}