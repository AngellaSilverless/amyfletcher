<?php

$block_info = get_field("artisans_section");
	
$artisans = get_posts(array(
	'post_type' => 'artisan',
	'posts_per_page' => 3,
));

if($block_info && $artisans && sizeof($artisans) > 0): ?>

<div class="artisans-block pt5 pb5">
	
	<div class="container container-wrapper ">
	
		<div class="col">
			
			<h2 class="center heading heading__md spacing1 pb3"><?php echo $block_info["heading"]; ?></h2>
			
			<div class="container container-lg cols-4 cols-xl-6 cols-lg-12">
	
				<?php foreach($artisans as $artisan): ?>
				
				<a href="<?php echo get_permalink($artisan->ID); ?>" class="col info-wrapper artisan-item mb5">
					
					<?php $image = get_field("hero_background_image", $artisan->ID); $url = $image["sizes"]["medium_large"];?>
					
					<div class="img" style="background-image: url(<?php echo $url; ?>);"></div>
					
					<div class="content pt3 pb3">
    					<div class="heading heading__sm spacing2 font200 mb1"><?php
    						$location = get_the_terms($artisan->ID, "location")[0];
    						$location_parent = get_term($location->parent, "location");
    						echo $location->name . ", " . $location_parent->name;
    					?></div>
    					
    					<div class="heading heading__lg heading__brand title"><?php echo $artisan->post_title; ?></div>
            			<?php get_template_part("inc/img/tilde"); ?>
					</div>
					
					
				</a>
				
				<?php endforeach; ?>
				
			</div>
			
			<div class="wrapper-button center pt2 pb3">
	
				<a href="<?php echo $block_info["button_target"]; ?>" class="button"><?php echo $block_info["button_label"]; ?></a>
				
			</div>
			
		</div>
	
	</div>

</div>

<?php endif; ?>