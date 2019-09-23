<?php
	
$currID = get_the_ID();

$projects = get_posts(array(
	'post_type' => 'interior',
	'posts_per_page' => 3
));

if($projects && sizeof($projects) > 0): ?>

<div class="recent-posts background-brand pt5 pb5">
	
	<div class="container container-wrapper">
	
		<div class="col">
			
			<h2 class="heading heading__md spacing1 font200 pb1">Recent projects</h2>
			
			<div class="items-wrapper container cols-4-spaced cols-xl-4 cols-md-12">
				
				<?php foreach($projects as $project): if($project->ID != $currID): ?>
				
				<a href="<?php echo get_permalink($project->ID); ?>" class="col">
					
					<div class="project-background" style="background-image: url(<?php echo get_field("hero_background_image", $project->ID)["sizes"]["medium_large"]; ?>);"></div>
					
					<div class="heading heading__md heading__brand title mt1">
						<span><?php echo $project->post_title;?></span>
						<?php get_template_part("inc/img/arrow"); ?>
					</div>
					
				</a>
				
				<?php endif; endforeach; ?>
			
			</div>
			
		</div>
	
	</div>

</div>

<?php endif; ?>
