<div class="inner widget-new-smart-inner-big-before-content">
	<figure class="widget-new-smart-main">
		<?php echo $image; ?>

		<figcaption >
			<div class="post__cats"><?php echo $terms_line; ?></div>
			<div></div>


			<div class="widget-new-smart__footer">
				<h3 class="widget-new-smart__title">
					<?php echo $title ?>
				</h3>

				<div class="widget-new-smart__footer-2">
					<span class="widget-new-smart__post__date">
						<?php
							streamline_meta_date( 'loop', array(
								'before' => '<i class="material-icons">access_time</i>',
							) );
						?>
					</span>
					<?php streamline_share_buttons( 'loop' ); ?>
				</div>
			</div>

		</figcaption>
	</figure>
</div>



<div class="inner widget-new-smart-inner-big-after-content">
	<div class="inner">
		<header class="entry-header">
			<?php echo $image; ?>
		</header>
		<div class="entry-content">
			<h3 class="widget-new-smart__title widget-new-smart__title-small">
				<?php echo $title; ?>
			</h3>


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
				</div><!-- .entry-meta-sharing -->



			<p><?php streamline_blog_content(100); ?></p>

		</div>
			<footer class="entry-footer">
				<?php streamline_read_more(); ?>
				<?php streamline_share_buttons( 'loop' ); ?>
			</footer><!-- .entry-footer -->
	</div>
</div>

