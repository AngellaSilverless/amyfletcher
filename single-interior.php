<?php
/**
 * The template for displaying interior posts
 *
 * @package amy-fletcher
 */
get_header();?>

<!-- ******************* Hero Content ******************* -->

<?php get_template_part("template-parts/hero"); ?>

<!-- ******************* Hero Content END ******************* -->

<!-- Text Block -->

<?php set_query_var("text_block", get_field("text_block")); get_template_part("template-parts/text-block"); ?>

<!-- Gallery Block -->

<?php set_query_var("gallery", get_field("gallery")); set_query_var("class", "gallery__interior"); get_template_part("template-parts/gallery", "interior"); ?>

<!-- Text Block -->

<div class="background-white">

<?php set_query_var("text_block", get_field("text_block_2")); get_template_part("template-parts/text-block"); ?>

<!-- Gallery Block -->

<div class="gallery-interior pb10">
	
	<?php $gallery = get_field("gallery_2"); if($gallery): ?>
	
	<div class="container cols-12 gallery-working">
		
		<img class="tape tl" src="<?php echo get_template_directory_uri()."/inc/img/tape.svg"; ?>">
		<img class="tape tr" src="<?php echo get_template_directory_uri()."/inc/img/tape.svg"; ?>">
		<img class="tape bl" src="<?php echo get_template_directory_uri()."/inc/img/tape.svg"; ?>">
		<img class="tape br" src="<?php echo get_template_directory_uri()."/inc/img/tape.svg"; ?>">
		
		<div class="col gallery gallery__working">
			
			<?php foreach($gallery as $image): ?>
			
			<div class="img-wrapper">
				<a href="<?php echo $image["url"]; ?>" title="<?php echo $image["title"]; ?>" alt="<?php echo $image["alt"]; ?>" style="background-image: url(<?php echo $image["url"]; ?>);"></a>
			</div>
		
			<?php endforeach; ?>
			
		</div>
	
	</div>
	
	<?php endif; ?>
	
	</div>

</div>

<!-- Recent Projects -->

<?php get_template_part("template-parts/recent", "projects"); ?>

<?php get_footer();?>