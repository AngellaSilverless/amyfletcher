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
<div class="container__narrow container__narrow-center">
<?php set_query_var("gallery", get_field("gallery")); set_query_var("class", "gallery__interior"); get_template_part("template-parts/gallery", "interior"); ?>
</div>
<!-- Text Block -->

<div class="background-white">

<?php set_query_var("text_block", get_field("text_block_2")); get_template_part("template-parts/text-block"); ?>

<!-- Gallery Block -->

<div class="container__narrow container__narrow-center">

<?php $gallery = get_field("gallery_2"); if($gallery): ?>

<div class="gallery-interior pb5">

	<div class="container cols-12 gallery-working mb5">

		<!--<img class="tape tl" src="<?php echo get_template_directory_uri()."/inc/img/tape.svg"; ?>">
		<img class="tape tr" src="<?php echo get_template_directory_uri()."/inc/img/tape.svg"; ?>">
		<img class="tape bl" src="<?php echo get_template_directory_uri()."/inc/img/tape.svg"; ?>">
		<img class="tape br" src="<?php echo get_template_directory_uri()."/inc/img/tape.svg"; ?>">_-->

		<div class="col gallery gallery__working">

			<?php foreach($gallery as $image): ?>
				<div class="img-wrapper">
					<a href="<?php echo $image["url"]; ?>" title="<?php echo $image["title"]; ?>" alt="<?php echo $image["alt"]; ?>" style="background-image: url(<?php echo $image["url"]; ?>);">
					<div class="item" style="background-image: url(<?php echo $image["url"]; ?>);"></div></a>
	 			</div>


			<?php endforeach; ?>

		</div>

	</div>

</div>

<?php endif; ?>

</div>

</div>

<div class="grey-block pt5 pb5 align-center">
    <a href="/interior"><button class="read-more button mt1">View Other Recent Projects</button></a>
</div>

<?php get_footer();?>
