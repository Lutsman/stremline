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
	<header class="entry-header">


		<?php streamline_meta_categories( 'loop' ); ?>

		<?php
			if ( is_single() ) {
				the_title( '<h2 class="entry-title">', '</h2>' );
			} else {
				the_title( '<h5 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h5>' );
			}
		?>

		<?php do_action( 'cherry_post_format_audio' ); ?>
	</header><!-- .entry-header -->

	<div class="entry-meta-sharing">


		<?php if ( 'post' === get_post_type() ) : ?>

			<div class="entry-meta">
				<?php
					streamline_meta_author(
						'loop',
						array(
							'before' => esc_html__( 'By', 'streamline' ) . ' ',
						)
					);
				?>
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
			<?php streamline_share_buttons( 'loop' ); ?>
		</div><!-- .entry-meta-sharing -->

	<?php endif; ?>
	</div>
	<footer class="entry-footer">
		<?php streamline_share_buttons( 'loop' ); ?>
		<?php streamline_read_more(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
