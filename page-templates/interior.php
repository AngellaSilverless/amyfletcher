<?php
/**
 * ============== Template Name: Interior
 *
 * @package amy-fletcher
 */
get_header();?>

<!-- ******************* Hero Content ******************* -->

<?php get_template_part("template-parts/hero"); ?>

<!-- ******************* Hero Content END ******************* -->

<!-- Text Block -->

<?php set_query_var("text_block", get_field("text_block")); get_template_part("template-parts/text-block"); ?>

<!-- Recent Projects -->

<div class="container center pb5">
	
	<div class="col">
		
		<h2 class="heading heading__md spacing1 mb2	"><?php echo get_field("labels")["recent_projects"]; ?></h2>
		
		<?php
			
		$interiors = get_posts(array(
			'post_type' => 'interior',
			'posts_per_page' => 3,
		));
		
		if($interiors && sizeof($interiors) > 0): ?>
		
		<div class="container cols-4">
			
			<?php foreach($interiors as $interior): ?>
			
			<a href="<?php echo get_permalink($interior->ID); ?>" class="col project-block" style="background-image: url(<?php echo get_field("hero_background_image", $interior)["sizes"]["medium_large"]; ?>);">
				
				<div class="project-wrapper primary-overlay">
				
					<div class="heading heading__sm heading__secondary-color spacing2 font200 mb1">Okavango, Botswana</div>
			
					<h3 class="heading heading__lg heading__brand heading__light slow-fade title"><?php echo $interior->post_title; ?></h3>
					
				</div>
			
			</a>
			
			<?php endforeach; ?>
			
		</div>
		
		<?php endif; ?>
		
	</div>
	
</div>

<!-- Previous Projects -->

<div class="container center pb5">
	
	<div class="col">
		
		<h2 class="heading heading__md spacing1 mb2	"><?php echo get_field("labels")["previous_projects"]; ?></h2>
		
		<?php
			
		$interiors = get_posts(array(
			'post_type' => 'interior',
			'posts_per_page' => 3,
		));
		
		if($interiors && sizeof($interiors) > 0): ?>
		
		<div class="container cols-3">
			
			<?php foreach($interiors as $interior): ?>
			
			<a href="<?php echo get_permalink($interior->ID); ?>" class="col project-block-small" style="background-image: url(<?php echo get_field("hero_background_image", $interior)["sizes"]["medium_large"]; ?>);">
				
				<div class="heading heading__sm heading__light spacing2 font200">Okavango, Botswana</div>
		
				<div class="heading heading__sm heading__light spacing2 font200"><?php echo $interior->post_title; ?></div>
					
			</a>
			
			<?php endforeach; ?>
			
		</div>
		
		<?php endif; ?>
		
	</div>
	
</div>

<?php get_footer();?>