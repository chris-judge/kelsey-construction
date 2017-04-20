<?php get_header(); ?>
<?php if ( have_posts() ) : ?>
<?php while ( have_posts() ) : the_post(); ?>

<?php 
	$image_id = get_post_thumbnail_id();
	$img_src = wp_get_attachment_image_src($image_id,'medium');
?>

<main class="page-home page">

		<?php if( have_rows('hero') ): ?>
		<?php while( have_rows('hero') ): the_row(); ?>

			<?php if( have_rows('images') ): ?>
			<section class="hero image-bg top txt-white tac">
				<div class="slides">
					<div class="slide image-bg top active img-op" data-index="1" img-full="<?=wp_get_attachment_url($image_id);?>" img-large="<?=$img_src[0];?>"></div>
				<?php $counter = 1; ?>
				<?php while( have_rows('images') ): the_row(); ?>
					<?php $counter++; ?>
					<div class="slide image-bg top img-op" data-index="<?php echo $counter; ?>" img-full="<?=wp_get_attachment_url($image_id);?>" img-large="<?=$img_src[0];?>"></div>
				<?php endwhile; ?>
				</div>
			<?php else: ?>

			<section class="hero image-bg top img-op txt-white tac" img-full="<?=wp_get_attachment_url($image_id);?>" img-large="<?=$img_src[0];?>">

			<?php endif; ?>	

				<div class="overlay">
					<div class="flex center">
						<h1><?php the_sub_field('headline'); ?></h1>
					</div>
				</div>

				<?php if( have_rows('images') ): ?>
					<div class="dots">
					<?php $counter = 0; ?>
					<?php while( have_rows('images') ): the_row(); ?>
						<?php $counter++; ?>
						<div class="dot" data-index="<?php $counter; ?>"></div>
					<?php endwhile; ?>
					</div>
				<?php endif; ?>	
			</section>

		<?php endwhile; ?>
		<?php endif; ?>	

		<?php if( have_rows('introduction') ): ?>
		<?php while( have_rows('introduction') ): the_row(); ?>

			<section class="introduction tac box-shadow por">
				<div class="content-wrap">
					<h2><?php the_sub_field('headline'); ?></h2>
					<div class="ce-wrap">
						<?php the_sub_field('description'); ?>
					</div>
				</div>
			</section>

		<?php endwhile; ?>
		<?php endif; ?>	

		<?php if( have_rows('services') ): ?>
		<?php while( have_rows('services') ): the_row(); ?>

			<?php $image_id = get_sub_field('background_image'); ?>

			<section class="services image-bg top img-op txt-white tac" img-full="<?=$image_id['url'];?>" img-large="<?=$image_id['sizes']['medium'];?>">
				<div class="overlay half">
				<div class="content-wrap">
					<h2><?php the_sub_field('headline'); ?></h2>
					<p class="tagline"><?php the_sub_field('tagline'); ?></p>
					<hr>
					<?php if( have_rows('service_list') ): ?>
						<ul class="flex center wrap txt-lg">
						<?php while( have_rows('service_list') ): the_row(); ?>
							<li><strong><?php the_sub_field('service'); ?></strong></li>
						<?php endwhile; ?>
						</ul>
					<?php endif; ?>	
					<?php include('_/partials/button.php'); ?>
				</div>
				</div>
			</section>
			
		<?php endwhile; ?>
		<?php endif; ?>	

		<?php if( have_rows('legacy') ): ?>
		<?php while( have_rows('legacy') ): the_row(); ?>

			<section class="legacy">
				<div class="flex center">
					<div class="image-wrap">
						<?php $logo_id = get_sub_field('image'); ?>
						<?php echo wp_get_attachment_image($logo_id['id'], 'full'); ?>
					</div>
					<div class="description-wrap">
						<h2><?php the_sub_field('headline'); ?></h2>
						<h3><?php the_sub_field('tagline'); ?></h3>
						<div class="ce-wrap">
							<?php the_sub_field('description'); ?>
						</div>
						<?php include('_/partials/button.php'); ?>
					</div>
				</div>
			</section>
			
		<?php endwhile; ?>
		<?php endif; ?>	

		<?php if( have_rows('conclusion') ): ?>
		<?php while( have_rows('conclusion') ): the_row(); ?>

			<?php $image_id = get_sub_field('background_image'); ?>

			<section class="conclusion image-bg top img-op tac box-shadow por" img-full="<?=$image_id['url'];?>" img-large="<?=$image_id['sizes']['medium'];?>">
				<div class="content-wrap">
					<h2><?php the_sub_field('headline'); ?></h2>
					<?php include('_/partials/button.php'); ?>
				</div>
			</section>
			
		<?php endwhile; ?>
		<?php endif; ?>	
	
</main>

<?php endwhile; ?>
<?php endif; ?>	
<?php get_footer(); ?>
