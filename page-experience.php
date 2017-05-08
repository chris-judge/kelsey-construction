<?php get_header(); ?>
<?php if ( have_posts() ) : ?>
<?php while ( have_posts() ) : the_post(); ?>

<?php 
	$image_id = get_post_thumbnail_id();
	$img_src = wp_get_attachment_image_src($image_id,'medium');
?>

<main class="page-experience page">

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

			<section class="introduction box-shadow por tac">
				<div class="content-wrap">
					<div class="ce-wrap">
						<?php the_sub_field('description'); ?>
					</div>
				</div>
			</section>

		<?php endwhile; ?>
		<?php endif; ?>	

		<?php if( have_rows('client_logos') ): ?>
		<?php while( have_rows('client_logos') ): the_row(); ?>

			<?php $image_id = get_sub_field('background_image'); ?>

			<section class="client-logos image-bg top img-op txt-white tac txt-shadow" img-full="<?=$image_id['url'];?>" img-large="<?=$image_id['sizes']['medium'];?>">
				<div class="overlay half">
				<h2><?php the_sub_field('headline'); ?></h2>
				<?php if( have_rows('logos') ): ?>
					<div class="flex center">
						<?php while( have_rows('logos') ): the_row(); ?>
							<div class="logo">
								<?php $logo_id = get_sub_field('logo'); ?>
								<?php echo wp_get_attachment_image($logo_id['id'], 'full'); ?>
							</div>
						<?php endwhile; ?>
					</div>
				<?php endif; ?>	
				</div>
			</section>
			
		<?php endwhile; ?>
		<?php endif; ?>

		<?php if( have_rows('projects') ): ?>
		<?php while( have_rows('projects') ): the_row(); ?>

			<section class="projects tac">
				<div class="content-wrap">
					<h2><?php the_sub_field('headline'); ?></h2>
					<hr class="bg-black">
					<p class="upper">Filter</p>
					<?php if( have_rows('categories') ): ?>
					<?php while( have_rows('categories') ): the_row(); ?>
						<?php $categories = get_sub_field('category'); ?>
						<ul>
						<?php foreach ($categories as $category): ?>
							<li class="btn sm hide" data-cat="<?=get_cat_name($category);?>"><?=get_cat_name($category);?></li>
						<?php endforeach; ?>
						</ul>
					<?php endwhile; ?>
					<?php endif; ?>
					<div class="grid flex">
						<?php $query = new WP_Query( array( 'post_type' => 'projects', 'posts_per_page' => '16' ) ); ?>
						<?php if ( $query->have_posts() ) : ?>
						    <?php while ( $query->have_posts() ) : $query->the_post(); ?>   
						    	<?php 
									$image_id = get_post_thumbnail_id();
									$img_src = wp_get_attachment_image_src($image_id,'medium');
								?>
						        <div class="tile txt-white">
						        	<div class="image-bg top" style="background-image:url(<?=$img_src[0];?>);">
							        	<div class="overlay flex">
							        		<div class="inner-wrap">
									            <h2><?php the_title(); ?></h2>
									            <h3><?php the_field('location'); ?></h3>
									            <div class="btn">View Project</div>
								            </div>
							            </div>
							         </div>
						        </div>
						    <?php endwhile; wp_reset_postdata(); ?>
						<?php else : ?>
						    <h3>Sorry, no projects were found.</h3>
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
