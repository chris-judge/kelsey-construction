<?php get_header(); ?>
<?php if ( have_posts() ) : ?>
<?php while ( have_posts() ) : the_post(); ?>

<?php 
	$image_id = get_post_thumbnail_id();
	$img_src = wp_get_attachment_image_src($image_id,'medium');
?>

<main class="page-contact page">

		<?php if( have_rows('hero') ): ?>
		<?php while( have_rows('hero') ): the_row(); ?>

			<section class="hero half image-bg top img-op txt-white tac txt-shadow" img-full="<?=wp_get_attachment_url($image_id);?>" img-large="<?=$img_src[0];?>">
				<div class="overlay">
					<div class="flex center">
						<div class="ce-wrap nop">
							<h1><?php the_sub_field('headline'); ?></h1>
							<?php the_sub_field('description'); ?>
						</div>
					</div>
				</div>
			</section>

		<?php endwhile; ?>
		<?php endif; ?>	

		<?php if( have_rows('form') ): ?>
		<?php while( have_rows('form') ): the_row(); ?>
			<section class="form box-shadow por">
				<div class="flex center">
					<?php $form_object = get_sub_field('gravity_form'); ?>
					<?php gravity_form($form_object->id, true, true, false, '', true, 1);  ?>
				</div>
			</section>
		<?php endwhile; ?>
		<?php endif; ?>

		<?php if( have_rows('map') ): ?>
		<?php while( have_rows('map') ): the_row(); ?>
			<section class="map map-container por">
				<?php echo get_sub_field('map_code'); ?>
			</section>
		<?php endwhile; ?>
		<?php endif; ?>   
	
</main>

<?php endwhile; ?>
<?php endif; ?>	
<?php get_footer(); ?>
