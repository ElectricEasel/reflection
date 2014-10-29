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
</div>
<!-- wrapper1 end -->

<?php global $post;
// array of page ids that show this banner
$services_pages = array(631,635,644,646,648,650,652,661,663,665,667,669,671);
if (in_array($post->ID,$services_pages)) : ?>

<!--  Page Banner -->
	<!-- 960 Container Start -->
	<div id="wrapper3" class="services-banner">
		<img src="http://reflection.eebeta.com/wp-content/uploads/2014/08/slider-heart.png" alt="">
		<h1>Home Care Services</h1>
	</div>
	<!-- 960 Container End -->

<!-- Page Banner End -->
<?php endif; ?>

<div id="wrapper2">

<!-- 960 Container -->
<div class="container services-content">
	<?php

	$sidebar_side = get_post_meta($post->ID, 'incr_sidebar_layout', true);

	?>
<!-- Blog Posts
	================================================== -->
	<div class="twelve columns tooltips <?php if($sidebar_side == "left-sidebar") { echo "left-sb"; } ?>">

		<?php while (have_posts()) : the_post(); ?>
		<!-- Post -->
		<div <?php post_class('post'); ?> id="post-<?php the_ID(); ?>" >
			<?php the_content() ?>
		</div>
		<!-- Post -->
	<?php endwhile; // End the loop. Whew.  ?>
	<?php
	if(ot_get_option('centum_page_comments','on') == 'off') {
		if ( comments_open() || '0' != get_comments_number() ) { comments_template('', true); }
	}
	?>
	</div> <!-- eof eleven column -->

