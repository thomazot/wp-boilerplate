<?php

function zotWidget($name){

    ?>
    
    <?php if ( is_active_sidebar( $name ) ): ?>
		<section id="<?php echo $name; ?>" class="widget widget--<?php echo $name; ?> <?php echo $name; ?>">
			<div class="widget__container <?php echo $name; ?>__container">
				<div class="widget__border">
					<?php dynamic_sidebar( $name ); ?>
				</div>
			</div>
		</section>	
	<?php endif; ?>
    
    <?php

}