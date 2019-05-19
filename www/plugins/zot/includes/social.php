<?php
include_once "functions.php";

function zotSocial($limit = -1, $order = 'desc')
{
    $args = array(
        'numberposts' => $limit,
        'post_status' => 'publish',
        'post_type' => 'redes-sociais',
        'order' => $order
    );

    $query = new WP_Query($args);

    if ($query->have_posts()):
        ?>
        <div class="social">
            <div class="social__container">
                <div data-carousel="social" class="social__list">
                <?php
                while ($query->have_posts()) : $query->the_post();

                    $title          = get_the_title();
                    $image          = get_field('image');
                    $svg            = get_field('svg');
                    $link           = get_field('link');

                ?>

                <div class="social__item" >
                    <div class="social__border">
                        <?php if($link): ?>
                        <a href="<?php echo link; ?>" title="<?php echo $title?>" class="social__link">
                        <?php endif; ?>
                            <?php if($image): ?>
                                <figure class="social__figure social__figure--image">
                                    <img class="social__image" src="<?php echo $image ?>" alt="<?php echo $title ?>">
                                </figure>
                            <?php endif ?>
                            <?php if($svg): ?>
                                <figure class="social__figure social__figure--svg">
                                    <?php echo $svg; ?>
                                </figure>
                            <?php endif ?>

                            <?php if($title): ?>
                                <div class="social__label"><?php echo $title; ?></div>
                            <?php endif; ?>
                        <?php if($link): ?>
                        </a>
                        <?php endif; ?>
                    </div>
                </div>
                <?php endwhile; ?>
                </div>
            </div>
        </div>
    <?php
    endif;
    wp_reset_query();

}