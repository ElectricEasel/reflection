<?php
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

function my_wpcf7_form_elements($html) {
	$text = 'Please Select';
	$html = str_replace('<option value="">---</option>', '<option value="">' . $text . '</option>', $html);
	return $html;
}
add_filter('wpcf7_form_elements', 'my_wpcf7_form_elements');

function my_wpcf7_form_prepopulate_checkbox($post_item) {
	if (isset($_POST[$post_item])) {
		$box_value = sanitize_text_field($_POST[$post_item]);
		$box_value = str_replace('-',' ',$box_value);
		$box_value = strtolower($box_value);
		$input_type = $post_item . '[]';
$script = <<<SCRIPT
<script type="text/javascript">
jQuery( document ).ready(function($) {
    var boxVals = $("input[name='$input_type']");
    boxVals.each(function(){
    console.log($(this).val());
	    if($(this).val().toLowerCase() == "$box_value") {
		    $(this).prop("checked","checked");
	    }
    });
});
</script>
SCRIPT;
		return $script;
	} 
}
function my_wpcf7_form_prepopulate_select($post_item) {
	if (isset($_POST[$post_item])) {
		$opt_value = sanitize_text_field($_POST[$post_item]);
		$opt_value = str_replace('-',' ',$opt_value);
		$opt_value = strtolower($opt_value);
$script = <<<SCRIPT
<script type="text/javascript">
jQuery( document ).ready(function($) {
    var optVals = $("select[name='$post_item'] option");
    optVals.each(function(){
    console.log($(this).val());
	    if($(this).val().toLowerCase() == "$opt_value") {
		    $(this).attr("selected","selected");
		    $(".chosen").trigger("chosen:updated");
	    }
    });
});
</script>
SCRIPT;
		return $script;
	} 
}

?>