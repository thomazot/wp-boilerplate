<?php 
    function zotLogo() { ?>
    
        <div class="logo">
        
            <?php 
            the_custom_logo();
            if ( is_front_page() && is_home() ) :
            ?>
                <h1 class="logo__title"><a class="logo__link" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" itemprop="name"><?php bloginfo( 'name' ); ?></a></h1>
            <?php else : ?>
                <div class="logo__title"><a class="logo__link" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" itemprop="name"><?php bloginfo( 'name' ); ?></a></div>
            <?php endif; ?>

            </div>
        <?php 
    }