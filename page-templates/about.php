<?php
/**
 * ============== Template Name: About
 *
 * @package amy-fletcher
 */
get_header();?>

<!-- ******************* Hero Content ******************* -->

<?php get_template_part("template-parts/hero"); ?>

<!-- ******************* Hero Content END ******************* -->

<!-- Text Block -->

<?php set_query_var("text_block", get_field("text_block")); get_template_part("template-parts/text-block"); ?>

<!-- Services Block -->

<?php get_template_part("template-parts/services"); ?>

<!-- Gallery Block -->

<?php $gallery = get_field("gallery"); if($gallery): ?>

<div class="container cols-12 pt8 pb3">
	
	<div class="col gallery gallery__about">
		
		<?php foreach($gallery as $image): ?>
		
		<div class="img-wrapper">
			<a href="<?php echo $image["url"]; ?>" title="<?php echo $image["title"]; ?>" alt="<?php echo $image["alt"]; ?>" style="background-image: url(<?php echo $image["url"]; ?>);"></a>
		</div>
	
		<?php endforeach; ?>
		
	</div>

</div>

<?php endif; ?>

<!-- Testimonials Block -->

<?php $testimonials = get_posts(array("post_type" => "testimonial", "posts_per_page" => -1)); if($testimonials && sizeof($testimonials) > 0): ?>

<div class="center pt5 pb5">
	
	<div class="container">
	
		<div class="col">
			
			<div class="heading heading__md heading__caps font600 spacing1 pb3"><?php echo get_field("testimonials")["heading"]; ?></div>
			
			<div class="testimonials container cols-4">
				
				<?php foreach($testimonials as $testimonial): $company = get_field("company_name", $testimonial->ID); ?>
				
				<div class="col">
					
					<div class="text"><p><?php the_field("testimonial", $testimonial->ID); ?></p></div>
					
					<div class="author"><?php echo $company ? $testimonial->post_title . ",<br>" . $company : $testimonial->post_title; ?></div>
					
				</div>
				
				<?php endforeach; ?>
				
			</div>
			
		</div>
	
	</div>

</div>

<?php endif; ?>

<?php get_footer();?>