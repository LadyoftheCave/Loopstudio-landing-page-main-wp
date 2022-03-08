<?php
//
// Footer
//
// @package      reef-theme
// @author       Daniël R.
// @since        1.0.0
//
?>

<footer class="site-footer" role="contentinfo">
	<div class="wrap">

	<?php tha_footer_top(); ?>

		<div class="footer-menu">
				<?php dynamic_sidebar('footer-1'); ?>
		</div>

	<?php tha_footer_bottom(); ?>

	<div class="madebywa">Deze website wordt u aangeboden door <a href="https://www.websiteaanbieder.nl">Websiteaanbieder</a></div>
	
	</div> <!-- .wrap -->

	<!-- <div class="sub-footer">
		<div class="wrap">
			<div class="sub-footer-menu">
				<?php // dynamic_sidebar('footer-2'); ?>
			</div>
		</div>
	</div> -->

</footer>

<?php

tha_footer_after();
echo '</div>'; // .site-container
tha_body_bottom();

wp_footer();

echo '</body></html>';