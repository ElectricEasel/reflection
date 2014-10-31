<?php
/**
 * Initialize the meta boxes.
 */
add_action( 'admin_init', '_custom_meta_boxes_child' );

/**
 * Meta Boxes demo code.
 *
 * You can find all the available option types
 * in demo-theme-options.php.
 *
 * @return    void
 *
 * @access    private
 * @since     2.0
 */
function _custom_meta_boxes_child() {

  /**
   * Create a custom meta boxes array that we pass to
   * the OptionTree Meta Box API Class.
   */
   
	$banners_array = array(
		array (
			'label' => "None",
			'value' => '0'
		),
		array (
			'label' => "Why Reflection",
			'value' => 'why-reflection'
		),
		array (
			'label' => "About Home Care",
			'value' => 'about-home-care'
		),
		array (
			'label' => "Home Care Services",
			'value' => 'home-care-services'
		),
		array (
			'label' => "Our Caregivers",
			'value' => 'our-caregivers'
		),
		array (
			'label' => "Areas Served",
			'value' => 'areas-served'
		),
		array (
			'label' => "Contact Us",
			'value' => 'contact-us'
		)
	);
  
	$my_meta_box_child = array(
	'id'        => 'incr_metabox_banner',
	'title'     => 'Banner',
	'desc'      => 'Select the banner to be displayed on this page above the content.',
	'pages'     => array( 'post','page' ),
	'context'   => 'normal',
	'priority'  => 'high',
	'fields'    => array(
	  array(
	    'id'          => 'incr_banner_set',
	    'label'       => 'Banner',
	    'desc'        => '',
	    'std'         => '0',
	    'type'        => 'select',
	    'class'       => '',
	    'choices'    => $banners_array
	    )
	  )
	);






  /**
   * Register our meta boxes using the
   * ot_register_meta_box() function.
   */
  ot_register_meta_box( $my_meta_box_child );

}