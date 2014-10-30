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

register_sidebar( array (
		'name' => 'Sidebar About',
		'id' => 'sidebar-about',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => "</div>",
		'before_title' => '<div class="headline no-margin"><h4>',
		'after_title' => '</h4></div>'
	)
);
register_sidebar( array (
		'name' => 'Sidebar Services',
		'id' => 'sidebar-services',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => "</div>",
		'before_title' => '<div class="headline no-margin"><h4>',
		'after_title' => '</h4></div>'
	)
);
register_sidebar( array (
		'name' => 'Sidebar Caregivers',
		'id' => 'sidebar-caregivers',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => "</div>",
		'before_title' => '<div class="headline no-margin"><h4>',
		'after_title' => '</h4></div>'
	)
);
register_sidebar( array (
		'name' => 'Sidebar Why Reflection',
		'id' => 'sidebar-why-reflection',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => "</div>",
		'before_title' => '<div class="headline no-margin"><h4>',
		'after_title' => '</h4></div>'
	)
);

function php_execute($html){
	if (strpos($html,"<"."?php")!==false) {
		ob_start();
		eval("?".">".$html);
		$html=ob_get_contents();
		ob_end_clean();
	}
	return $html;
}
add_filter('widget_text','php_execute',100);

function my_wpcf7_form_elements($html) {
	$text = 'Please Select';
	$html = str_replace('<option value="">---</option>', '<option value="">' . $text . '</option>', $html);
	return $html;
}
add_filter('wpcf7_form_elements', 'my_wpcf7_form_elements');

?>