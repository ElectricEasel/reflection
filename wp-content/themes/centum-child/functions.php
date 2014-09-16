<?php
    
// Add Menu Locations
function register_my_menus() {
	register_nav_menus(
		array(
			'mini' => __( 'Mini' )
		)
	);
}
add_action( 'init', 'register_my_menus' );

function default_mini() { //HTML markup for a default message in menu location
	echo "<ul class='nav'>
			<li>Create the Mini Navigation</li>
	</ul>";
}

?>