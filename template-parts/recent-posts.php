<?php

$all_posts = get_posts(array(
	'post_type' => 'post',
	'posts_per_page' => 3,
	'post__not_in' => array(get_the_ID())
));
				
if($all_posts && sizeof($all_posts) > 0): ?>

<div class="background-light pt5 pb5">
	
	<div class="container">
	
		<div class="col">
			
			<h2 class="heading heading__md spacing1 font200 pb1">Blog posts</h2>
			
			<div class="other-posts container cols-4">
				
				<?php
					
				$all_posts = get_posts(array(
					'post_type' => 'post',
					'posts_per_page' => 3,
					'post__not_in' => array(get_the_ID())
				));
				
				foreach($all_posts as $single): ?>
				
				<div class="col container cols-1-10">
					
					<div class="col">
					
					<a class="single-post" href="<?php echo get_permalink($single->ID); ?>">
						
						<div class="img mb1" style="background-image:url(<?php echo get_field("hero_background_image", $single->ID)["sizes"]["medium_large"]; ?>);"></div>
						<div class="heading heading__sm heading__body-color spacing2 font400 pb1 title"><?php echo get_field("hero_heading", $single->ID); ?></div>
					</a>
					
					</div>
					
				</div>
				
				<?php endforeach; ?>
			
			</div>
			
		</div>
	
	</div>

</div>

<?php endif; ?>

