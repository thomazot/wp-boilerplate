<?php
include_once "functions.php";

function zotPosts($limit = -1, $order = 'desc')
{
    $args = array(
        'numberposts' => $limit,
        'post_status' => 'publish',
        'post_type' => 'post',
        'order' => $order
    );

    $query = new WP_Query($args);

    if ($query->have_posts()):
        ?>
        <section class="blog-list">
            <div class="blog-list__container">
                <div data-carousel="blog-list" data-carousel="blog-list" class="blog-list__list">
                <?php
                while ($query->have_posts()) : $query->the_post();

                    $title          = get_the_title();
                    $date           = get_field('date');
                    $description    = get_field('description');
                    $image          = get_field('image');
                    $link           = get_the_permalink();

                ?>

                <article class="blog-list__item" >
                    <div class="blog-list__border">

                        <?php if($image): ?>
                            <figure class="blog-list__figure">
                                <img class="blog-list__image" src="<?php echo $image ?>" alt="<?php echo $title ?>">
                            </figure>
                        <?php endif ?>

                        <?php if($title): ?>
                        <h2 class="blog-list__name"><?php echo $title; ?></h2>
                        <?php endif; ?>
                        
                        <?php if($date): ?>
                        <div class="blog-list__date"><?php echo $date; ?></div>
                        <?php endif; ?>

                        <?php if($description): ?>
                        <div class="blog-list__description"><?php echo $description; ?></div>
                        <?php endif; ?>

                        <div class="blog-list__actions">
                            <a class="blog-list__link" href="<?php echo $link?>">
                                Leia mais
                            </a>
                        </div>

                    </div>
                </article>
                <?php endwhile; ?>
                </div>
            </div>
        </section>
    <?php
    endif;
    wp_reset_query();

}