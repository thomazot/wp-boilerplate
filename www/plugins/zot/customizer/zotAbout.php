<?php 
function zotAbout(){
    $title = get_theme_mod('about_title');
    $text = get_theme_mod('about_text');
    $image = get_theme_mod('about_image');

    if($title && $text):
    ?>
    <section class="about" id="quem-somos">
        <div class="about__container">
            <div class="about__inner">
                <div class="about__content">
                    <h1 class="about__title"><?php echo $title; ?></h1>
                    <div class="about__text"><?php echo $text; ?></div>
                </div>
                <?php if ($image): ?>
                <figure class="about__figure">
                    <img src="<?php echo $image; ?>" alt="<?php echo $title; ?>">
                </figure>
                <?php endif; ?>
            </div>
        </div>
    </section>
    <?php 
    endif;
}