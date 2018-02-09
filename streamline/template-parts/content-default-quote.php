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




		<div class="post-body-right">


			<div class="entry-content">
				<?php streamline_sticky_label(); ?>
				<a href="<?php echo get_permalink() ?>" class="quote-link" rel="bookmark">
					<?php do_action( 'cherry_post_format_quote' ); ?>
				</a>
			</div><!-- .entry-content -->

			<?php if ( 'post' === get_post_type() ) : ?>

				<div class="entry-meta-sharing">
					<div class="entry-meta">
						<?php
							streamline_meta_author(
								'loop',
								array(
									'before' => esc_html__( 'by', 'streamline' ) . ' ',
								)
							);
						?>

						<?php
							streamline_meta_date( 'loop', array(
								'before' => '<i class="material-icons">access_time</i>',
							) );

							streamline_meta_comments( 'loop', array(
								'before' => '<i class="material-icons">chat_bubble_outline</i>',
								'after' => '',
								'zero'   => esc_html__( 'Leave a comment', 'streamline' ),
								'one'    => '1 comment',
								'plural' => '% comments',
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


		<footer class="entry-footer">
			<?php streamline_read_more(); ?>
			<?php streamline_share_buttons( 'loop' ); ?>
		</footer><!-- .entry-footer -->
	</div><!-- .post-body-right -->
</article><!-- #post-## -->
