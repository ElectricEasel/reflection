</div>
</div>
<!-- Wrapper / End -->


<!-- Footer Start -->
<div id="footer">

	<!-- 960 Container -->
	<div class="container">

		<div class="one-third column">
			 <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Footer 1st Column')) : endif; ?>
		</div>

		<div class="one-third column">
			<?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Footer 2nd Column')) : endif; ?>
		</div>


		<div class="one-third column">
			<?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Footer 3rd Column')) : endif; ?>
		</div>

	</div>
	<!-- 960 Container End -->

</div>
<!-- Footer End -->
<div class="sub-foot copyright">
	<div class="container">
		<div class="sixteen columns">
			<div id="footer-bottom">
				<span><?php $copyrights = '&copy; ' . date("Y") . ' ' . ot_get_option('copyrights' );  echo $copyrights?></span>
				<span class="right"><a href="/privacy-policy/">Privacy Policy / Terms of Use</a></span>
			</div>
		</div>
	</div>
</div>


<?php wp_footer();

?>

</body>
</html>