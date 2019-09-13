<?php
/**
 * ============== Template Name: Home
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

<!-- Properties Block -->

<div class="properties center pt5 pb5">
	
	<div class="container">
	
		<div class="col">
			
			<h2 class="heading heading__md spacing1 pb3">Properties</div>
			
		</div>
	
	</div>

</div>

<!-- Hospitality Design Block -->

<?php $section_link = get_field("section_link"); if($section_link): ?>

<div class="hospitality-design primary-overlay center pt5 pb5" style="background-image: url(<?php echo $section_link["background_image"]; ?>)">
	
	<div class="container cols-3-11 pr5 pl5">
	
		<div class="col">
			
			<h2 class="heading heading__md heading__secondary-color spacing1 pb3"><?php echo $section_link["heading"]; ?></h2>
			
			<div class="heading heading__lg heading__brand heading__light slow-fade mb1"><?php echo $section_link["copy"]; ?></div>
			
			<a href="<?php echo $section_link["button_target"]; ?>" class="button button__light"><?php echo $section_link["button_label"]; ?></a>
			
		</div>
	
	</div>

</div>

<?php endif; ?>

<!-- Artisans Block -->

<div class="artisans center pt5 pb5">
	
	<div class="container">
	
		<div class="col">
			
			<h2 class="heading heading__md spacing1 pb3">Artisans</h2>
			
		</div>
	
	</div>

</div>

<!-- As seen in Block -->

<?php $seen = get_field("section_as_seen"); if($seen): ?>

<div class="as-seen background-light center pt5 pb5">
	
	<div class="container">
	
		<div class="col small-col">
			
			<h2 class="heading heading__md spacing1 pb1"><?php echo $seen["heading"]; ?></h2>
			
			<div class="items-wrapper container cols-3">
				
				<?php $i = 0; foreach($seen["gallery"] as $img): $i++ ?>
					
				<div class="col">
					<?php echo file_get_contents($img["url"]); ?>
				</div>
					
				<?php endforeach; ?>
			
			</div>
			
		</div>
	
	</div>

</div>

<?php endif; ?>

<!-- Brands we've worked with Block -->

<?php $brands = get_field("brands"); if($brands): ?>

<div class="brands background-white center pt5 pb5">
	
	<div class="container">
	
		<div class="col small-col">
			
			<h2 class="heading heading__md spacing1 pb1"><?php echo $brands["heading"]; ?></h2>
			
			<div class="items-wrapper container no-gutter cols-2">
				
				<?php foreach($brands["gallery"] as $img): ?>
					
				<div class="col pr1 pl1">
					<img src="<?php echo $img["url"]; ?>" alt="<?php echo $img["alt"]; ?>" title="<?php echo $img["title"]; ?>">
				</div>
					
				<?php endforeach; ?>
			
			</div>
			
		</div>
	
	</div>

</div>

<?php endif; ?>

<!-- Instagram Gallery -->

<?php get_template_part("template-parts/gallery", "instagram"); ?>

<?php get_footer();?>