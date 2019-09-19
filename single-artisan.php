<?php
/**
 * The template for displaying artisan posts
 *
 * @package amy-fletcher
 */
get_header();?>

<!-- ******************* Hero Content ******************* -->

<?php get_template_part("template-parts/hero"); ?>

<!-- ******************* Hero Content END ******************* -->

<div class="container cols-5-7 pb5 pt5">
	
	<!-- Info Block -->
	
	<div class="col artisan-info">
		
	<?php $info = get_field("information"); if($info): ?>
	
		<?php foreach ($info as $item): ?>
	
		<div>
			<div class="label heading heading__md spacing1 mb0"><?php echo $item["label"]; ?></div>
			<div class="value"><?php echo $item["value"]; ?></div>
		</div>
			
		<?php endforeach; ?>
	
	<?php endif; ?>
	
	</div>
	
	<div class="col artisan-description">
		
		<?php $description = get_field("description"); if($description): ?>
		
		<div class="heading heading__md spacing1 mb0"><?php echo $description["heading"]; ?></div>
		
		<div class="text brand-text"><p><?php echo $description["copy"]; ?></p></div>
		
		<?php endif; ?>
	</div>
	
</div>

<?php $sections = get_field("section"); if($sections): $i = 0; foreach($sections as $section): ?>

<div class="artisan-section">

	<?php $gallery = $section["gallery"]; if($gallery): 
		
		$amount = sizeof($gallery);
		$class = "img-3";
		
		if($amount % 5 == 0) $class = "img-5"; else
		if($amount % 4 == 0) $class = "img-4"; else
		if($amount % 3 == 0) $class = "img-3"; else
		if($amount % 2 == 0) $class = "img-2"; else
		if($amount == 1)     $class = "img-1";
		
	?>

	<div class="container cols-12 pb5">
		
		<div class="col gallery gallery__artisan <?php echo $class; ?>">
			
			<?php foreach($gallery as $image): ?>
			
			<div class="img-wrapper">
				<a href="<?php echo $image["url"]; ?>" title="<?php echo $image["title"]; ?>" alt="<?php echo $image["alt"]; ?>" style="background-image: url(<?php echo $image["url"]; ?>);"></a>
			</div>
		
			<?php endforeach; ?>
			
		</div>
	
	</div>
	
	<?php endif; ?>
	
	<div class="container cols-3-9-13 pb5">
		
		<div class="col text brand-text"><p><?php echo $section["copy"]; ?></p></div>
		
		<div class="col quotation quotation-artisan container cols-3-13">
		
			<div class="quote-wrapper col">
				
				<div>
				
					<?php get_template_part("inc/img/quotes-open"); ?>
					
					<p><?php echo $section["quotation"]; ?></p>
				
				</div>
				
			</div>
			
		</div>
		
	</div>
	
</div>
	
<?php endforeach; endif; ?>

<div class="wrapper-button center pt5 pb5">
	
	<a href="/artisan" class="button view-slideshow">Back to Artisans</a>
	
</div>

<?php get_footer();?>