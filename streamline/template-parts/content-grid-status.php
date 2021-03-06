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
	

			<figure class="grid-view-main2">

				<?php
					if ( is_single() ) {
						the_title( '<h2 class="entry-title">', '</h2>' );
					} else {
						echo '<h3 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . streamline_get_short_title(50) . '</a></h3>';
					}
				?>

				<div class="grid-view__footer-2">
					<div class="grid-view__author-date">
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
						?>
					</div>
				</div>


				<div class="iframe-content">
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
				</div>

				<figcaption class="grid-view-figcaption">
					<span></span>

					<div class="grid-view__footer">
						<?php streamline_share_buttons( 'loop' ); ?>
					</div>

				</figcaption>

				<footer class="entry-footer">
					<?php streamline_read_more(); ?>
					<?php streamline_share_buttons( 'loop' ); ?>
				</footer><!-- .entry-footer -->
			</figure>



		</div>

</article><!-- #post-## -->
