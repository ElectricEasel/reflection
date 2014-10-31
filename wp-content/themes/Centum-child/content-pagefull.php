<?php
/**
 * The loop that displays posts.
 *
 * The loop displays the posts and the post content.  See
 * http://codex.wordpress.org/The_Loop to understand it and
 * http://codex.wordpress.org/Template_Tags to understand
 * the tags used in it.
 *
 * This can be overridden in child themes with loop.php or
 * loop-template.php, where 'template' is the loop context
 * requested by a template. For example, loop-index.php would
 * be used if it exists and we ask for the loop with:
 * <code>get_template_part( 'loop', 'index' );</code>
 *
 * @package WordPress
 * @subpackage purepress
 * @since purepress 1.0
 */
?>

<?php while (have_posts()) : the_post(); ?>
</div>
<!-- wrapper1 end -->

<?php
global $post;
$banner_type = get_post_meta($post->ID,'incr_banner_set',true);
if ($banner_type) :
	$banner_title = ucwords(str_replace('-',' ',$banner_type));
	switch ($banner_type)
	{
		case 'why-reflection' :
			$banner_bg = 'why-reflection-header.jpg';
			break;
		case 'about-home-care' :
			$banner_bg = 'about-header.jpg';
			break;
		case 'home-care-services' :
			$banner_bg = 'home-care-header.jpg';
			break;
		case 'our-caregivers' :
			$banner_bg = 'caregivers-header.jpg';
			break;
		case 'areas-served' :
			$banner_bg = 'areas-header.jpg';
			break;
		case 'contact-us' :
			$banner_bg = 'contact-header.jpg';
			break;
		default :
			$banner_bg = '';
	}
?>
	
<!--  Page Banner -->
	<!-- 960 Container Start -->
	<div id="wrapper3" class="services-banner" style="background-image: url('/wp-content/uploads/2014/08/<?=$banner_bg?>')">
		<img src="http://reflection.eebeta.com/wp-content/uploads/2014/08/slider-heart.png" alt="">
		<h1><?=$banner_title?></h1>
	</div>
	<!-- 960 Container End -->

<!-- Page Banner End -->
<?php endif; ?>

<div id="wrapper2">

	<!-- 960 Container -->
	<div class="container content-full">

		<!-- Post -->

		<div <?php post_class(''); ?> id="post-<?php the_ID(); ?>" >
			<div class="sixteen columns">
				<?php the_content() ?>
			</div>
		</div>
	<?php
	if(ot_get_option('centum_page_comments','on') == 'off') {
		if ( comments_open() || '0' != get_comments_number() ) {
			echo '<div class="sixteen columns">';
				comments_template('', true);
			echo '</div>';
		}
	} ?>
		<!-- Post -->
	<?php endwhile; // End the loop. Whew.  ?>




