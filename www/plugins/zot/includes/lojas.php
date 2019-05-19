<?php
include_once "functions.php";

function zotLojas($limit = -1, $order = 'desc', $tax)
{
    $args = array(
        'numberposts' => $limit,
        'post_status' => 'publish',
        'post_type' => 'lojas',
        'order' => $order
    );

    if($tax) {
        $args = array(
            'numberposts' => $limit,
            'post_status' => 'publish',
            'post_type' => 'shop',
            'order' => $order,
            'tax_query' => array($tax)
        );
    }

    $query = new WP_Query($args);

    if ($query->have_posts()):
        ?>
        <div class="shop">
            <div class="shop__container">
                <div data-carousel="shop" class="shop__list">
                <?php
                while ($query->have_posts()) : $query->the_post();

                    $name          = get_the_title();
                    $address       = get_field('address');
                    $phone         = get_field('phone');
                    $googlemaps    = get_field('googlemaps');
                    $lat           = $googlemaps['latitude'];
                    $long          = $googlemaps['longitude'];
                    $type          = get_field('type');


                ?>

                <article data-type="<?php echo $type; ?>" class="shop__item" data-latitude="<?php echo $lat; ?>" aria-hidden="false" data-longitude="<?php echo $long; ?>">
                    <div class="shop__border" >
                        <h2 class="shop__name"><?php echo $name; ?></h2>
                        <div class="shop__address"><?php echo $address; ?></div>
                        <div class="shop__phone"><?php echo $phone; ?></div>
                    </div>
                </article>
                <?php endwhile; ?>
                </div>
            </div>
        </div>
    <?php
    endif;
    wp_reset_query();

}