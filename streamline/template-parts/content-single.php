<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package streamline
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php
			streamline_meta_categories( 'single' );
			the_title( '<h1 class="entry-title">', '</h1>' );
		?>

		<?php if ( 'post' === get_post_type() ) : ?>

			<div class="entry-meta">

				<?php
					streamline_meta_author(
						'single',
						array(
							'before' => esc_html__( 'By', 'streamline' ) . ' ',
						)
					);

					streamline_meta_date( 'single', array(
						'before' => '<i class="material-icons">access_time</i>',
					) );

					streamline_meta_comments( 'single', array(
						'before' => '<i class="material-icons">chat_bubble_outline</i>',
						'zero'   => esc_html__( 'Leave a comment', 'streamline' ),
						'one'    => '1',
						'plural' => '%',
					) );
				?>

			</div><!-- .entry-meta -->

		<?php endif; ?>

	</header><!-- .entry-header -->

	<figure class="post-thumbnail">
		<?php streamline_post_thumbnail( false ); ?>
	</figure><!-- .post-thumbnail -->

	<div class="entry-content">
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'streamline' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php
			streamline_meta_tags( 'single', array(
				'before'    => '<i class="material-icons">folder_open</i>Tagged in: ',
				'separator' => ', ',
			) );
		?>
		
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
