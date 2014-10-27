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
<div class="sub-foot partners">
	<div class="container">
		<div id="footer-logos">
			<div class="seven columns">
				<div class="module">
					<img src="/wp-content/uploads/2014/10/NPDA.jpg" />
					NPDA Believes the principle that quality private duty home care has one model of care and that model is to employ, train, monitor and supervise caregivers, the planning of care for the client and work toward a safe and secure environment for the person at home.
				</div>
			</div>
			<div class="seven columns">
				<div class="module short">
					<img src="/wp-content/uploads/2014/10/IDPH.jpg" />
					IDPH is responsible for health promotion and disease prevention, health care regulation, and health care delivery services in Illinois. Illinois Department of Public Health: license #3000353
				</div>
			</div>
			<div class="two columns">
				<a class="bbb" target="_blank" href="http://www.bbb.org/chicago/business-reviews/home-health-services/reflection-home-care-in-crystal-lake-il-88376684"></a>
			</div>
		</div>
	</div>
</div>
<div class="sub-foot copyright">
	<div class="container">
		<div class="sixteen columns">
			<div id="footer-bottom">
				<?php $copyrights = '&copy; ' . date("Y") . ' ' . ot_get_option('copyrights' );  echo $copyrights?>
				<!--<div id="scroll-top-top"><a href="#"></a></div>-->
			</div>
		</div>
	</div>
</div>


<?php wp_footer();

?>

</body>
</html>