<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package streamline
 */

while ( have_posts() ) : the_post();?>

 <div class="post-left-column">
	 <?php streamline_share_buttons( 'single' ); ?>
</div>
		
	<div class="post-right-column"><?php
		get_template_part( 'template-parts/content', 'single' );
		streamline_post_author_bio();
	?></div><?php

	the_post_navigation( array(
		'next_text' => '<span class="meta-nav" aria-hidden="true">' . esc_html__( 'Next Post', 'streamline' ) .'</span> ' .
										'<span class="screen-reader-text">' . esc_html__( 'Next Post', 'streamline' ) .'</span> ' .
										'<span class="post-title">%title</span>',
		'prev_text' => '<span class="meta-nav" aria-hidden="true">' . esc_html__( 'Previous Post', 'streamline' ) .'</span> ' .
										'<span class="screen-reader-text">' . esc_html__( 'Previous Post', 'streamline' ) .'</span> ' .
										'<span class="post-title">%title</span>',
	) );

	// If comments are open or we have at least one comment, load up the comment template.
	if ( comments_open() || get_comments_number() ) :
		comments_template();
	endif;

endwhile; // End of the loop.
