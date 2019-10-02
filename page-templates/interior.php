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


<!-- Properties Block -->

<?php get_template_part("template-parts/interior"); ?>
	
<!-- CTA Block -->

<div class="cta-block">
    <a href="/contact/">
    <i class="fas fa-phone"></i>
    <p><?php the_field('call_to_action');?></p>
    <p class="link">Get In Touch</p>
    </a>		
</div>    

<!-- Previous Projects -->

<div class="container container-wrapper center pb8">
	
	<div class="col">
		
		<h2 class="heading heading__md spacing1 mb2	"><?php echo get_field("labels")["previous_projects"]; ?></h2>
		
		<?php
			
		$interiors = get_posts(array(
			'post_type' => 'interior',
			'posts_per_page' => 3,
			'post__not_in' => $recent_ids
		));
		
		if($interiors && sizeof($interiors) > 0): ?>
		
		<div class="container cols-3 cols-xl-4 cols-md-6 cols-sm-12">
			
			<?php foreach($interiors as $interior): ?>
			
			<a href="<?php echo get_permalink($interior->ID); ?>" class="col project-block-small" style="background-image: url(<?php echo get_field("hero_background_image", $interior)["sizes"]["medium_large"]; ?>);">
				
				<div class="heading heading__sm heading__light spacing2 font200"><?php
					$location = get_the_terms($interior->ID, "location")[0];
					$location_parent = get_term($location->parent, "location");
					echo $location->name . ", " . $location_parent->name;
				?></div>
		
				<div class="heading heading__sm heading__light spacing2 font200"><?php echo $interior->post_title; ?></div>
					
			</a>
			
			<?php endforeach; ?>
			
		</div>
		
		<?php endif; ?>
		
	</div>
	
</div>

<?php get_footer();?>