<div class="sidebar">
	<div class="sidebar__header">
		<h3 class="sidebar__title">Мастер-классы:</h3>
	</div>
	<div class="sidebar__content">
		<?php
			wp_nav_menu( array(
				'theme_location' => 'sidebar',
				'container'      => false,
				'menu_class'     => 'sidebar__nav'
			 ) );
		?>
	</div>
</div>
