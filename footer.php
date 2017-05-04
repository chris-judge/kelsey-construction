		<footer class="box-shadow por">
			<div class="bg-orange">
				<div class="flex center txt-white">
					<?php if(get_field('address','options')): ?>
						<div class="address contact">
							<a target="_blank" href="https://www.google.com/maps/search/<?php the_field('address','options'); ?>"><i class="fa dib fa-map-marker" aria-hidden="true"></i> <span class="dib"><?php the_field('address','options'); ?></span></a>
						</div>
					<?php endif; ?>
					<?php if(get_field('email','options')): ?>
						<div class="email contact">
							<a target="_blank" href="mailto:<?php the_field('email','options'); ?>"><i class="fa dib fa-envelope-o" aria-hidden="true"></i> <span class="dib"><?php the_field('email','options'); ?></span></a>
						</div>
					<?php endif; ?>
					<?php if(get_field('phone','options')): ?>
						<?php $phone = get_field('phone','options'); ?>
						<div class="phone contact">
							<a target="_blank" href="tel:<?=$phone;?>"><i class="fa dib fa-phone" aria-hidden="true"></i> <span class="dib"><?php the_field('phone','options'); ?></span></a>
						</div>
					<?php endif; ?>
					<?php if(get_field('fax','options')): ?>
						<?php $fax = get_field('fax','options'); ?>
						<div class="phone contact">
							<a target="_blank" href="tel:<?=$fax;?>"><i class="fa dib fa-fax" aria-hidden="true"></i> <span class="dib"><?php the_field('fax','options'); ?></span></a>
						</div>
					<?php endif; ?>
				</div>
			</div>
			<div class="ce-wrap tac">
				<?php the_field('copyright','options'); ?>
			</div>
		</footer>
		<?php wp_footer(); ?>
	</body>
</html>