<?php
/**
 * Template part for minimal Header layout.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package streamline
 */
?>
<div class="header-container__flex">
	<?php streamline_social_list( 'header' ); ?>
	<div class="site-branding">
		<?php streamline_header_logo() ?>
		<?php streamline_site_description(); ?>
	</div>
	<?php streamline_main_menu(); ?>
</div>
