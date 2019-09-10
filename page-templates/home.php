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
			
			<div class="heading heading__md heading__caps font600 spacing1 pb3">Properties</div>
			
		</div>
	
	</div>

</div>

<!-- As seen in Block -->

<?php $seen = get_field("section_as_seen"); if($seen): ?>

<div class="as-seen dark-background center pt5 pb5">
	
	<div class="container">
	
		<div class="col">
			
			<div class="heading heading__md heading__caps font600 spacing1 pb3"><?php echo $seen["heading"]; ?></div>
			
			<div class="items-wrapper container cols-1">
				
				<?php $i = 0; foreach($seen["gallery"] as $img): $i++ ?>
					
				<div class="col pr1 pl1">
					<img src="<?php echo $img["url"]; ?>" alt="<?php echo $img["alt"]; ?>" title="<?php echo $img["title"]; ?>">
				</div>
					
				<?php endforeach; ?>
			
			</div>
			
		</div>
	
	</div>

</div>

<?php endif; ?>

<!-- Brands we've worked with Block -->

<?php $brands = get_field("brands"); if($brands): ?>

<div class="brands white-background center pt5 pb5">
	
	<div class="container">
	
		<div class="col small-col">
			
			<div class="heading heading__md heading__caps font600 spacing1 pb1"><?php echo $brands["heading"]; ?></div>
			
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


<?php get_footer();?>