<?php
/**
 * ============== Template Name: Artisan
 *
 * @package amy-fletcher
 */
get_header();?>

<!-- ******************* Hero Content ******************* -->

<?php get_template_part("template-parts/hero"); ?>

<!-- ******************* Hero Content END ******************* -->

<!-- Text Block -->

<?php set_query_var("text_block", get_field("text_block")); get_template_part("template-parts/text-block"); ?>

<?php
	
$artisans = get_posts(array(
	'post_type' => 'artisan',
	'posts_per_page' => -1,
));

if($artisans && sizeof($artisans) > 0): ?>

<div class="container-artisan container container-wrapper container-md cols-4 cols-xl-6 cols-md-12 pt5">
	
	<?php foreach($artisans as $artisan): ?>
	
	<a href="<?php echo get_permalink($artisan->ID); ?>" class="col info-wrapper mb5">
		
		<?php $image = get_field("hero_background_image", $artisan->ID); $url = $image["sizes"]["medium_large"];?>
		
		<div class="img mb3" style="background-image: url(<?php echo $url; ?>);"></div>
		
		<div class="heading heading__sm heading__primary-color spacing2 font200 mb1"><?php
			$location = get_the_terms($artisan->ID, "location")[0];
			$location_parent = get_term($location->parent, "location");
			echo $location->name . ", " . $location_parent->name;
		?></div>
		
		<div class="heading heading__lg heading__brand title"><?php echo $artisan->post_title; ?></div>
		
		<?php get_template_part("inc/img/tilde"); ?>
		
		<div class="container cols-1-10 cols-xl-12 mb2">
			
			<div class="col text brand-text"><p><?php the_field("introduction", $artisan->ID); ?></p></div>
		
		</div>
		
		<?php get_template_part("inc/img/arrow"); ?>
		
	</a>
	
	<?php endforeach; ?>
	
</div>

<?php endif; ?>

<?php get_footer();?>