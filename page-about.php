<?php get_header(); ?>
<?php if ( have_posts() ) : ?>
<?php while ( have_posts() ) : the_post(); ?>

<?php 
	$image_id = get_post_thumbnail_id();
	$img_src = wp_get_attachment_image_src($image_id,'medium');
?>

<main class="page-about page">

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

		<?php if( have_rows('introduction') ): ?>
		<?php while( have_rows('introduction') ): the_row(); ?>

			<section class="introduction box-shadow por">
				<div class="flex center">
					<div class="content-wrap">
						<h2><?php the_sub_field('headline'); ?></h2>
						<h3 class="txt-orange"><?php the_sub_field('tagline'); ?></h3>
						<div class="ce-wrap nop">
							<?php the_sub_field('description'); ?>
						</div>
					</div>
					<div class="image-wrap tac por">
						<div class="box-shadow"></div>
						<?php $logo_id = get_sub_field('image'); ?>
						<?php echo wp_get_attachment_image($logo_id['id'], 'full'); ?>
					</div>
				</div>
			</section>

		<?php endwhile; ?>
		<?php endif; ?>	

		<?php if( have_rows('statistics') ): ?>
		<?php while( have_rows('statistics') ): the_row(); ?>

			<?php $image_id = get_sub_field('background_image'); ?>

			<section class="statistics image-bg top img-op txt-white tac txt-shadow" img-full="<?=$image_id['url'];?>" img-large="<?=$image_id['sizes']['medium'];?>">
				<div class="overlay half">
				<?php if( have_rows('statistic') ): ?>
					<div class="flex center">
						<?php while( have_rows('statistic') ): the_row(); ?>
							<div class="statistic">
								<p class="num"><?php the_sub_field('number'); ?></p>
								<p class="txt-space"><?php the_sub_field('text'); ?></p>
							</div>
						<?php endwhile; ?>
					</div>
				<?php endif; ?>	
				</div>
			</section>
			
		<?php endwhile; ?>
		<?php endif; ?>	


		<?php if( have_rows('conclusion') ): ?>
		<?php while( have_rows('conclusion') ): the_row(); ?>

			<?php $image_id = get_sub_field('background_image'); ?>

			<section class="conclusion image-bg top img-op tac box-shadow por txt-white txt-shadow" img-full="<?=$image_id['url'];?>" img-large="<?=$image_id['sizes']['medium'];?>">
				<div class="overlay half">
				<div class="flex center">
						<?php if( have_rows('block') ): ?>
						<?php $counter = 1; ?>
						<?php while( have_rows('block') ): the_row(); ?>
							<?php if($counter > 1): ?>
								<div class="block-divider bg-white"></div>
							<?php endif; ?>
							<div class="block">
								<h2><?php the_sub_field('headline'); ?></h2>
								<?php include('_/partials/button.php'); ?>
							</div>
						<?php $counter++; ?>
						<?php endwhile; ?>
						<?php endif; ?>	
					</div>
				</div>
			</section>
			
		<?php endwhile; ?>
		<?php endif; ?>	
	
</main>

<?php endwhile; ?>
<?php endif; ?>	
<?php get_footer(); ?>
