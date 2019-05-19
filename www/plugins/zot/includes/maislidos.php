<?php
if ( ! function_exists( 'tutsup_session_start' ) ) {
    function tutsup_session_start() {
        if ( ! session_id() ) session_start();
    }
    add_action( 'init', 'tutsup_session_start' );
}


if ( ! function_exists( 'tp_count_post_views' ) ) {
    function tp_count_post_views () {
        if ( is_single() ) {
            global $post;

            if ( empty( $_SESSION[ 'tp_post_counter_' . $post->ID ] ) ) {

                $_SESSION[ 'tp_post_counter_' . $post->ID ] = true;

                $key = 'tp_post_counter';
                $key_value = get_post_meta( $post->ID, $key, true );

                if ( empty( $key_value ) ) {
                    $key_value = 1;
                    update_post_meta( $post->ID, $key, $key_value );
                } else {
                    $key_value += 1;
                    update_post_meta( $post->ID, $key, $key_value );
                }

            }

        }

        return;

    }
    add_action( 'get_header', 'tp_count_post_views' );
}


function maislidos() {
    $nova_consulta = new WP_Query(
        array(
            'posts_per_page'      => 5,                 // Máximo de 5 artigos
            'post_type'           => 'Post',
            'no_found_rows'       => true,              // Não conta linhas
            'post_status'         => 'publish',         // Somente posts publicados
            'ignore_sticky_posts' => true,              // Ignora posts fixos
            'orderby'             => 'meta_value_num',  // Ordena pelo valor da post meta
            'meta_key'            => 'tp_post_counter', // A nossa post meta
            'order'               => 'DESC'             // Ordem decrescente
        )
    );
    ?>

    <?php if ( $nova_consulta->have_posts() ): ?>
    <section class="mais-vistos">
        <header class="mais-vistos__header">
            <h4 class="title">Notícias mais lidas</h4>
        </header>
        <div class="mais-vistos__main">
            <?php while ( $nova_consulta->have_posts() ):  $nova_consulta->the_post(); ?>
                <?php
                $count  = get_post_meta( $post->ID, 'tp_post_counter', true );
                $count  = $count ? $count : 0;
                $data   = get_field('data');
                ?>

                <div class="mais-visto__item">
                    <h4 class="mais-visto__title">
                        <a href="<?php the_permalink(); ?>">
                            <?php if($data): ?>
                            <span class="mais-visto__data"><?php echo $data; ?></span>
                            <?php endif; ?>
                            <?php the_title(); ?>
                        </a>
                    </h4>
                </div>

            <?php endwhile; ?>
        </div>

    </section> <!-- .mais-vistos -->
    <?php endif; // have_posts ?>

    <?php wp_reset_postdata(); ?>
<?php
}