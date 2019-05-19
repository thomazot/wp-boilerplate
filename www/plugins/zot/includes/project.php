<?php
include_once "functions.php";

function project($limit = 6, $order = 'desc')
{
    $args = array(
        'numberposts' => $limit,
        'post_status' => 'publish',
        'post_type' => 'projeto',
        'order' => $order
    );

    $query = new WP_Query($args);

    if ($query->have_posts()):
        ?>
        <section id="projects" class="projects">
            <div class="projects__container">
                <h3 class="projects__title">Ultimos Projetos</h3>
                <div class="projects__list">
                <?php
                while ($query->have_posts()) : $query->the_post();

                    $title       = get_the_title();
                    $client      = get_field('client');
                    $location    = get_field('location');
                    $description = get_field('description');
                    $image       = get_field('image');
                    $link        = get_the_permalink();

                ?>

                <article class="projects__item" >
                    <div class="projects__border">

                        <?php if($image): ?>
                            <figure class="projects__figure">
                                <img class="projects__image" src="<?php echo $image ?>" alt="<?php echo $title ?>">
                            </figure>
                        <?php endif ?>
                        <div class="projects__content">
                            <?php if($title): ?>
                            <h4 class="projects__name"><?php echo $title; ?></h4>
                            <?php endif; ?>
                            
                            <?php if($client): ?>
                            <div class="projects__client"><strong>Cliente: </strong> <?php echo $client; ?> </div>
                            <?php endif; ?>
                            <?php if($location): ?>
                            <div class="projects__client"><strong>Localização: </strong> <?php echo $location; ?></div>
                            <?php endif; ?>

                            <?php if($description): ?>
                            <div class="projects__description"><?php echo $description; ?></div>
                            <?php endif; ?>

                            <div class="projects__actions">
                                <a class="projects__link" href="<?php echo $link?>">
                                    Leia mais
                                </a>
                            </div>
                        </div>

                    </div>
                </article>
                <?php endwhile; ?>
                </div>
                <div class="projects__footer">
                    <a href="<?php echo get_site_url() ?>/projetos" class="projects__more">Veja todos os Projetos</a>
                    <a href="#simulator" id="simulator" class="projects__more projects__more--simulator">Faça sua simulação</a>
                </div>
            </div>
        </section>
    <?php
    endif;
    wp_reset_query();

}