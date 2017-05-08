<?php get_header(); ?>
<?php if ( have_posts() ) : ?>
<?php while ( have_posts() ) : the_post(); ?>

<?php 
	$image_id = get_post_thumbnail_id();
	$img_src = wp_get_attachment_image_src($image_id,'medium');
?>

<main class="single page">

		<section class="hero half image-bg top img-op txt-white tac txt-shadow" img-full="<?=wp_get_attachment_url($image_id);?>" img-large="<?=$img_src[0];?>">
			<div class="overlay">
				<div class="flex center">
					<div class="ce-wrap nop">
						<h1><?php the_title(); ?></h1>
					</div>
				</div>
			</div>
		</section>

		<section class="content-area">
			<div class="content-wrap">
				<div class="ce-wrap nop">
					<?php the_content(); ?>
				</div>
			</div>
		</section>
	
</main>

<?php endwhile; ?>
<?php endif; ?>	
<?php get_footer(); ?>
