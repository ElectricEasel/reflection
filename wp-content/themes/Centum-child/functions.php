<?php
function myplugin_session_start(){
	if( !isset($_SESSION)) {
		session_regenerate_id();
		session_start();
	}            
}
add_action('init', 'myplugin_session_start', 1);

include_once( 'meta-boxes.php' );
    
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

add_filter("gform_field_value_email", "populate_email");
function populate_email($value) {
	if (isset($_SESSION['email'])) {
		$email = $_SESSION['email'];
		unset($_SESSION['email']);
		return $email;
	}
	else {
		return "";
	}
}
add_filter("gform_field_value_interest", "populate_interest");
function populate_interest($value) {
	if (isset($_SESSION['interest'])) {
		$care_type = $_SESSION['interest'];
		unset($_SESSION['interest']);
		return $care_type;
	}
	else {
		return "";
	}
}
add_action("gform_after_submission_3", "redirect_submission", 10, 2);
function redirect_submission($entry, $form){
	session_start();
	if (isset($_POST['input_1'])) {
		$_SESSION['email'] = $_POST['input_1'];
	}
	if (isset($_POST['input_4'])) {
		$_SESSION['interest'] = $_POST['input_4'];
	}
}

function form_tag($form_tag, $form){
    if ($form["id"] != 3){
        //not the form whose tag you want to change, return the unchanged tag
        return $form_tag;
    }
    $form_tag = preg_replace("|action='(.*?)'|", "action='custom_handler.php'", $form_tag);
    return $form_tag;
}

add_filter('gform_register_init_scripts', 'gform_add_placeholder');
function gform_add_placeholder($form) {
    $script = '(function($){' .
        '$(".gfield.email input").attr("placeholder","Enter Email Address*");' .
    '})(jQuery);';
    
    GFFormDisplay::add_init_script(3, 'add_placeholder', GFFormDisplay::ON_PAGE_RENDER, $script);
    
    return $form;
}

?>