<?php
/**
 * The template for displaying the default footer layout.
 *
 * @package streamline
 */

?>
<div class="footer-area-wrap invert--">
	<div <?php streamline_content_class(); ?> >
		<div class="footer-inner-line">
			<?php do_action( 'streamline_render_widget_area', 'footer-area' ); ?>
		</div><!-- .footer-inner-line -->
	</div>
</div>

<div class="footer-container">
	<div <?php echo streamline_get_container_classes( array( 'site-info' ) ); ?>>
		<div class="footer-inner">
			<div class="site-info__flex">
				<?php streamline_footer_logo(); ?>
				<div class="site-info__mid-box"><?php
					streamline_footer_copyright();
					streamline_footer_menu();
				?></div>
				<?php streamline_social_list( 'footer' ); ?>
			</div>
		</div><!-- .footer-inner -->
	</div><!-- .site-info -->
</div><!-- .container -->