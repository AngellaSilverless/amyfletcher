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

<!-- Signature Block -->
<div class="signature-block slide-up slow">
    <?php echo file_get_contents(get_field("logo_standard", "options")["url"]); ?>
</div>

<!-- Information Block -->

<?php $info = get_field("information_block"); ?>

<div class="container container-wrapper pt5 pb5 cols-1-4-1-5 cols-md-12">

	<div class="col"></div>

	<div class="col">
		<?php set_query_var("gallery", $info["gallery"]); set_query_var("class", "gallery__about"); get_template_part("template-parts/gallery"); ?>

        <div class="summary-block mt1">
            <?php the_field('summary');?>
        </div>
	</div>

    <div class="col"></div>

    <div class="col block block-info">

		<h2 class="heading heading__md spacing1 font700 mb0 mt0"><?php echo $info["heading"]; ?></h2>

		<div class="text mb3"><?php echo $info["copy"]; ?></div>

        <a href="/interior/" class="button arrow">See Some Of Our Work</a>

	</div>

</div>

</div>

<!-- Services Block -->

<?php get_template_part("template-parts/services"); ?>

<!-- Brands we've worked with Block -->

<?php $brands = get_field("brands"); if($brands): ?>

<div class="brands background-white center pt5 pb5">

	<div class="container">

		<div class="col small-col">

			<h2 class="heading heading__md spacing1"><?php echo $brands["heading"]; ?></h2>

			<div class="items-wrapper container no-gutter cols-2 cols-lg-3 cols-md-4 cols-sm-6">

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

<!-- Quote Block -->


<div class="container pt3 pb3">
    <div class="col">
        <div class="quote-block single">
        <?php the_field('quote');?>
        </div>
    </div>
</div>


<!-- Instagram Gallery -->

<?php get_template_part("template-parts/gallery", "instagram"); ?>

<?php get_footer();?>
