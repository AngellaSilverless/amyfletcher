<?php

$block_info = get_field("interior_section");
	
$properties = get_posts(array(
	'post_type'      => 'interior',
	'posts_per_page' => 3,
));

if($block_info && $properties && sizeof($properties) > 0): ?>

<div class="interior-block pt5">
	
	<div class="container container-wrapper">
	
		<div class="col">
			
			<h2 class="center heading heading__md spacing1 pb3">A Look AT Our Most Recent Projects</h2>
			
			<div class="container container-lg">
	
				<?php foreach($properties as $property): ?>
				
				<div class="col info-wrapper mb5 container cols-7-5 cols-lg-12">
					
					<?php $image = get_field("hero_background_image", $property->ID); $url = $image["sizes"]["medium_large"];?>
					
					<div class="col img" style="background-image: url(<?php echo $url; ?>);"></div>
					
					<div class="col info">
					
						<div class="heading heading__sm spacing2 font200 mb1"><?php
							$location = get_the_terms($property->ID, "location")[0];
							$location_parent = get_term($location->parent, "location");
							echo $location->name . ", " . $location_parent->name;
						?></div>
						
						<div class="heading heading__lg heading__brand title"><?php echo $property->post_title; ?></div>
						
						<?php get_template_part("inc/img/tilde"); ?>
						
						<p class="mb1"><?php the_field("introduction", $property->ID); ?></p>
											
						<a href="<?php echo get_permalink($property->ID); ?>" class="button-general">View <?php echo $property->post_title; ?></a>
						
					</div>
					
				</div>
				
				<?php endforeach; ?>
				
			</div>
			
		</div>
	
	</div>

</div>

<?php endif; ?>