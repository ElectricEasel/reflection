<div class="four columns">
	<div class="blog-sidebar">
		<?php

		$sidebar = get_post_meta($post->ID, "incr_sidebar_set", $single = true);
		//echo "$post->ID";
		$about_pages = array(424,761,765,767,769,771,787);
		$service_pages = array(631,635,644,646,648,650,652,661,663,665,667,669,671);
		$caregiver_pages = array(736,738,740,747,749);
		$why_reflection_pages = array(21,794,799,804);
		if (in_array($post->ID, $about_pages))
		{
			$sidebar_page = 'sidebar-about';
		}
		else if (in_array($post->ID, $service_pages))
		{
			$sidebar_page = 'sidebar-services';
		}
		else if (in_array($post->ID, $caregiver_pages))
		{
			$sidebar_page = 'sidebar-caregivers';
		}
		else if (in_array($post->ID, $why_reflection_pages))
		{
			$sidebar_page = 'sidebar-why-reflection';
		}
		else
		{
			$sidebar_page = $sidebar;
		}
		
		if ($sidebar) {
			if (!function_exists('dynamic_sidebar') || !dynamic_sidebar($sidebar_page)) :
				?>
			<?php
			endif;
		}?>

		<?php
		if (!$sidebar) {
			if (!dynamic_sidebar('sidebar')) :
				?>
			<?php endif;
		    } // end primary widget area   
		    ?>
		</div>
	</div>

