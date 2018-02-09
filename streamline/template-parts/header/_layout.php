<?php
/**
 * Template part for default Header layout.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package streamline
 */
?>


<div class="row">

  <div class="col-xs-12 col-md-12 col-lg-3 ">
    <div class="site-branding">
      <?php streamline_header_logo() ?>
      <?php streamline_site_description(); ?>
    </div>
  </div>

  <div class="col-xs-12 col-md-12 col-lg-6">
    <?php streamline_main_menu(); ?>
  </div>

  <div class="col-xs-12 col-md-12 col-lg-3">
    <?php streamline_social_list( 'header' ); ?>
  </div>
</div>
