<?php
include_once "zotFunctions.php";

function zotBanner($local='full-banner')
{

    $query = new WP_Query(array(
        'numberposts'   => -1,
        'post_status'   => 'publish',
        'post_type'     => 'banner',
        'orderby'       => 'ordernumber',
        'order'         => 'ASC',
        'meta_query' => array(
            'local' => array( 'key' => 'local', 'value' => $local ),
            'ordernumber' => array( 'key' => 'order', 'type' => 'NUMERIC')
        )
    ));

    // echo $query->request;

    if ($query->have_posts()):
        ?>
        <section class="banner banner--<?php echo slug($local); ?>" role="banner">
            <div data-carousel="<?php echo slug($local); ?>" class="banner__container">
            <?php
            while ($query->have_posts()) : $query->the_post();
                $title          = get_the_title();
                $description    = get_field('description');
                $banner         = get_field('banner');
                $video          = get_field('video');
                $type           = get_field('type');
                $link           = get_field('link');

            ?>

            <div class="banner__item <?php echo $type == 'video' ? "banner__item--video" : "banner__item--image" ?>">
                <?php if ($link): ?>
                <a class="banner__link" href="<?php echo $link; ?>"></a>
                <?php endif; ?>
                <?php if($type == 'video'): ?>
                    <?php if ($video): 
                        preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $video, $match);
                        $youtube_id = $match[1];
                        ?>
                        <iframe width="100%" height="315" src="<?php echo $video; ?>?version=3&autoplay=1&mute=1&loop=1&playlist=<?php echo $youtube_id; ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    <?php endif; ?>
                <?php else: ?>
                    <?php if ($banner): ?>
                        <img src="<?php echo $banner; ?>" alt="<?php echo $title; ?>">
                    <?php endif; ?>
                <?php endif; ?>
                <div class="banner__content">
                    <h2 class="banner__title"><?php echo $title; ?></h2>
                    <h3 class="banner__description"><?php echo $description; ?></h3>
                </div>
            </div>
            <?php endwhile; ?>
            </div>
        </section>
    <?php
    endif;
    wp_reset_query();

}