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

<?php get_template_part("template-parts/interior"); ?>

<!-- Hospitality Design Block -->

<?php $section_link = get_field("section_link"); if($section_link): ?>

<div class="hospitality-design primary-overlay center pt5 pb5" style="background-image: url(<?php echo $section_link["background_image"]; ?>)">

	<div class="container container-wrapper cols-3-11 cols-xl-2-12 pr5 pl5">

		<div class="col">

			<h2 class="heading heading__md heading__secondary-color spacing1 pb3"><?php echo $section_link["heading"]; ?></h2>

			<div class="heading heading__lg heading__brand heading__light slow-fade mb1"><?php echo $section_link["copy"]; ?></div>

			<a href="<?php echo $section_link["button_target"]; ?>" class="button button__light"><?php echo $section_link["button_label"]; ?></a>

		</div>

	</div>

</div>

<?php endif; ?>

<!-- Artisans Block -->

<?php get_template_part("template-parts/artisans"); ?>

<!-- As seen in Block -->

<?php $seen = get_field("section_as_seen"); if($seen): ?>

<div class="as-seen background-light center pt5 pb5">

	<div class="container">

		<div class="col small-col">

			<h2 class="heading heading__md spacing1 pb1"><?php echo $seen["heading"]; ?></h2>

			<div class="items-wrapper container cols-3 cols-md-6">

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



<!-- Instagram Gallery -->


<?php get_template_part("template-parts/gallery", "instagram"); ?>

<?php get_footer();?>
