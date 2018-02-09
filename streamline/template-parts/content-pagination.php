<?php
/**
 * Template part for posts pagination.
 *
 * @package streamline
 */
the_posts_pagination(
	array(
		'prev_text' => '<i class="material-icons">navigate_before</i>' . esc_html__( 'Prev', 'streamline' ),
		'next_text' => esc_html__( 'Next', 'streamline' ) . '<i class="material-icons">navigate_next</i>'
	)
);
