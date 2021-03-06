<div class="widget-taxonomy-tiles__holder invert col-xs-6 col-sm-6 col-md-6 col-xl-<?php echo $grid; ?>">
	<figure class="widget-taxonomy-tiles__inner" <?php echo $inline_style; ?> >
		<a href="<?php echo $permalink; ?>" title="<?php echo $title; ?>"><?php echo $image; ?></a>
		<figcaption class="widget-taxonomy-tiles__content">
			<h3 class="widget-taxonomy-tiles__title">
				<a href="<?php echo $permalink; ?>" title="<?php echo $title; ?>"><?php echo $title; ?></a>
			</h3>
			<?php echo $description; ?>
			<?php echo $count; ?>
			<a href="<?php echo $permalink; ?>" title="<?php echo $title; ?>">
				<i class="material-icons">arrow_forward</i>
			</a>
		</figcaption>
	</figure>
</div>