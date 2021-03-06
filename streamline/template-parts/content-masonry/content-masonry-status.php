<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package streamline
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class( 'posts-list__item card' ); ?>>

	<div class="post-list__item-content">
		<?php streamline_meta_categories( 'loop' ); ?>
		<?php streamline_sticky_label(); ?>

		<header class="entry-header">
			<?php
				if ( is_single() ) {
					the_title( '<h1 class="entry-title">', '</h1>' );
				} else {
					the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
				}
			?>
		</header><!-- .entry-header -->

		<div class="entry-content">
			<?php

				$embed_args = array(
					'fields' => array( 'twitter', 'facebook' ),
					'height' => 300,
					'width'  => 300,
				);
				$embed_content = apply_filters( 'cherry_get_embed_post_formats', false, $embed_args );

				if ( false === $embed_content ) {
					streamline_blog_content();
				} else {
					printf( '<div class="embed-wrapper">%s</div>', $embed_content );
				}
			?>
		</div><!-- .entry-content -->

		<?php if ( 'post' === get_post_type() ) : ?>

			<div class="entry-meta">
				<?php
					streamline_meta_date( 'loop', array(
						'before' => '<i class="material-icons">event</i>',
					) );

					streamline_meta_comments( 'loop', array(
						'before' => '<i class="material-icons">mode_comment</i>',
						'zero'   => esc_html__( 'Leave a comment', 'streamline' ),
						'one'    => '1',
						'plural' => '%',
					) );

					streamline_meta_tags( 'loop', array(
						'before'    => '<i class="material-icons">folder_open</i>',
						'separator' => ', ',
					) );
				?>
			</div><!-- .entry-meta -->

		<?php endif; ?>

	</div>
	<footer class="entry-footer">
		<?php streamline_share_buttons( 'loop' ); ?>
		<?php streamline_read_more(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
