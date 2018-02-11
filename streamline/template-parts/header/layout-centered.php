<?php
/**
 * Template part for centered Header layout.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package streamline
 */
?>

<div class="site-branding">
	<div class="row">
    <div class="col-xs-12 col-md-7 col-xl-4  col-xl-offset-4 ">
      <div class="site-branding__logo">
        <?php streamline_site_description(); ?>
      </div>
    </div>
    <div class="col-xs-12 col-md-5 col-xl-4 ">
      <?php streamline_social_list( 'header' ); ?>
    </div>
  </div>
</div>


<?php streamline_main_menu(); ?>