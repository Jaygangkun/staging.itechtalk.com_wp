<nav id="site-navigation" class="main-navigation" role="navigation">
	<?php 
		if(has_nav_menu('vce_main_navigation_menu')) {
				$nav_args = array(
					'theme_location' => 'vce_main_navigation_menu',
					'menu' => 'vce_main_navigation_menu',
					'menu_class' => 'nav-menu',
					'menu_id' => 'vce_main_navigation_menu',
					'container' => false,
					'walker' => new Voice_Menu_Walker
				); 
				wp_nav_menu( $nav_args );
		} else { if( current_user_can('manage_options') ){ ?>
			<ul id="vce_header_nav" class="nav-menu"><li>
				<a href="<?php echo admin_url('nav-menus.php'); ?>"><?php esc_html_e('Click here to add navigation menu', 'voice'); ?></a>
			</li></ul>
			
		<?php } }
	?>
</nav>