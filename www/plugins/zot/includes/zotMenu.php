<?php
include_once 'zotFunctions.php';

function zotMenu($menu_name='Menu Principal', $nofollow=false) {
    $locations  = wp_get_nav_menu_object($menu_name);
    $menu_id    = $locations->term_id;
    $menuitems  = wp_get_nav_menu_items( $menu_id, array( 'order' => 'DESC' ) );
    $name       = $locations->name;
    $slug       = slug($name);

    echo '<nav data-menu-name="'. $name. '" id="'. $slug .'" class="menu menu--'. $slug .'"><ul class="menu__container">';

    zotMenuItem($menuitems, $nofollow);

    echo '</ul></nav>';
}

function zotMenuItem($menuitems, $nofollow=false) {
    $count = 0;
    $submenu = false;
    $rel = $nofollow ? ' rel="nofollow" ' : '';

    if($menuitems) {
        foreach ( $menuitems as $item ):
            $title  = $item->title;
            $link   = $item->url;
            $slug   = slug($title);

            if ( !$item->menu_item_parent ):
                $parent_id = $item->ID;
            ?>

            <li class="menu__item menu__item--<?php echo $slug; ?> menu__item--<?php echo $item->menu_item_parent; ?>">
                <a <?php echo $rel; ?> data-menu-title="<?php echo $slug; ?>" href="<?php echo $link; ?>" class="menu__link menu__link--first">
                    <span class="menu__name"><?php echo $title; ?></span>
                </a>

            <?php endif; ?>
            <?php if ( $parent_id == $item->menu_item_parent ): ?>
                <?php if ( !$submenu ): $submenu = true; ?>
                    <ul class="menu__sub">
                <?php endif; ?>
                        <li class="menu__item menu__item--<?php echo $slug; ?>">
                            <a <?php echo $rel; ?> data-menu-title="<?php echo $slug; ?>"  href="<?php echo $link; ?>" class="menu__link menu__link--sub">
                                <span class="menu__name"><?php echo $title; ?></span>
                            </a>
                        </li>
                <?php if ( $menuitems[ $count + 1 ]->menu_item_parent != $parent_id && $submenu ): ?>
                    </ul>
                <?php $submenu = false; endif; ?>

            <?php endif; ?>
            <?php if ( $menuitems[ $count + 1 ]->menu_item_parent != $parent_id ): ?>
            </li>
            <?php $submenu = false; endif; ?>

        <?php $count++; endforeach; 
    }
}