<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package streamline
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="profile" href="http://gmpg.org/xfn/11">
  <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

  <?php wp_head(); ?>
</head>

<?php
$sidebar_position = get_theme_mod('sidebar_position');
?>

<body <?php body_class($sidebar_position); ?>>
<?php streamline_get_page_preloader(); ?>
<div id="page" class="site">
  <a class="skip-link screen-reader-text" href="#content"><?php esc_html_e('Skip to content', 'streamline'); ?></a>
  <header id="masthead" <?php streamline_header_class(); ?> role="banner">
    <div class="top-panel">
      <img src="http://newgamanoid.bn5.ru/wp-content/uploads/2018/02/age.png" alt="18+"
           style="float:right;width:30px;height:30px;margin-right:3%;margin-top:20px;">
      <div <?php streamline_content_class(); ?> >
        <div <?php echo streamline_get_container_classes(array('top-panel__wrap')); ?>><?php
          streamline_top_message('<div class="top-panel__message">%s</div>');
          streamline_header_logo();
          ?>
          <div class="top-panel__controls"><?php streamline_top_sign_register();
            streamline_top_search('<div class="top-panel__search">%s</div>');
            ?></div><?php
          streamline_top_menu();
          ?></div>
      </div><!-- .container -->
    </div><!-- .top-panel -->

    <div class="header-container">
      <div <?php echo streamline_get_container_classes(array('header-container_wrap')); ?>>
        <div class="header-container_inner">
          <?php get_template_part('template-parts/header/layout', get_theme_mod('header_layout_type')); ?>
        </div><!-- .header-container_inner -->
      </div><!-- .header-container_wrap -->
    </div><!-- .header-container -->
  </header><!-- #masthead -->

  <div id="content" <?php streamline_content_class(); ?>>
