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
						<ul class="cat-menu">
						<?php foreach ($categories as $category): ?>
							<?php if(get_cat_name($category) == 'Grocery'): ?>
								<?php $grocery_cat = $category; ?>
							<?php endif; ?>
							<li class="btn sm hide" data-cat="<?=$category;?>"><?=get_cat_name($category);?></li>
						<?php endforeach; ?>
						</ul>
					<?php endwhile; ?>
					<?php endif; ?>
					<div class="map-wrap" data-cat="<?=$grocery_cat;?>" data-iframe="<?php the_sub_field('grocery_map'); ?>"></div>
					<div class="loading">
						<div class="loader loader--style3" title="2">
						  <svg version="1.1" id="loader-1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
						     width="40px" height="40px" viewBox="0 0 50 50" style="enable-background:new 0 0 50 50;" xml:space="preserve">
						  <path fill="#000" d="M43.935,25.145c0-10.318-8.364-18.683-18.683-18.683c-10.318,0-18.683,8.365-18.683,18.683h4.068c0-8.071,6.543-14.615,14.615-14.615c8.072,0,14.615,6.543,14.615,14.615H43.935z">
						    <animateTransform attributeType="xml"
						      attributeName="transform"
						      type="rotate"
						      from="0 25 25"
						      to="360 25 25"
						      dur="0.6s"
						      repeatCount="indefinite"/>
						    </path>
						  </svg>
						</div>
					</div>
					<div class="grid flex">
						<?php $query = new WP_Query( array( 'post_type' => 'projects', 'posts_per_page' => '16' ) ); ?>
						<?php if ( $query->have_posts() ) : ?>
						    <?php while ( $query->have_posts() ) : $query->the_post(); ?>   
						    	<?php 
									$image_id = get_post_thumbnail_id();
									$img_src = wp_get_attachment_image_src($image_id,'medium');
									$category_list = get_the_category();
								?>
						        <div class="tile txt-white" data-cat="<?php foreach ($category_list as $category){ echo $category->term_id.','; } ?>" data-title="<?php the_title(); ?>" data-location="<?php the_field('location'); ?>" data-img="<?=$img_src[0];?>">
						        	<div class="image-bg top" style="background-image:url(<?=$img_src[0];?>);">
							        	<div class="overlay flex">
							        		<div class="inner-wrap">
									            <h2><?php the_title(); ?></h2>
									            <h3><?php the_field('location'); ?></h3>
									            <div class="description dn">
									            	<?php the_content(); ?>
									            </div>
												<?php if( have_rows('gallery_images') ): ?>
												<div class="gallery-images dn">
													<?php while( have_rows('gallery_images') ): the_row(); ?>
														<div class="img" data-url="<?php the_sub_field('image'); ?>"></div>
													<?php endwhile; ?>
												</div>
												<?php endif; ?>   
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

		<div class="light-box">
			<div class="light-box-wrap">
				<div class="light-box-nav txt-white">
					<div class="btn sm prev"><i class="fa fa-angle-left" aria-hidden="true"></i> <span>Prev. Project</span></div>
					<div class="btn sm next"><span>Next Project</span> <i class="fa fa-angle-right" aria-hidden="true"></i></div>
					<div class="btn sm close"><span>Close</span> <i>&times;</i></div>
				</div>
				<div class="side prev txt-white"><i class="fa fa-angle-left" aria-hidden="true"></i></div>
				<div class="content-wrap txt-white">
					<div class="image-wrap image-bg top"></div>
					<div class="description-wrap">
						<hgroup><h2></h2><h3 class="txt-orange"></h3></hgroup>
						<div class="text-wrap"></div>
					</div>
				</div>
				<div class="side next txt-white"><i class="fa fa-angle-right" aria-hidden="true"></i></div>
			</div>
		</div>
	
</main>

<?php endwhile; ?>
<?php endif; ?>	
<?php get_footer(); ?>
