<?php if( have_rows('button') ): ?>
<?php while( have_rows('button') ): the_row(); ?>
	<div class="button-wrap">
		<a class="btn" href="<?php the_sub_field('link'); ?>"><?php the_sub_field('text'); ?></a>
	</div>
<?php endwhile; ?>
<?php endif; ?>	