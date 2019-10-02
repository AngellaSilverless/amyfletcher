<?php
/**
 * The template for displaying single posts
 *
 * @package amy-fletcher
 */
get_header();?>

<!-- ******************* Hero Content ******************* -->

<?php get_template_part("template-parts/hero"); ?>

<!-- ******************* Hero Content END ******************* -->

<div class="container container-wrapper no-gutter cols-12 post-title center pt5 pb5">

	<h1 class="col mb0"><?php get_template_part("inc/img/quotes-open");  the_field("hero_heading"); ?></h1>

	<div class="col date mt1"><?php echo get_the_date("F j Y"); ?></div>

</div>


<?php $sections = get_field("section"); if($sections): ?>

<div class="post-content pb5">

<?php $i = 0; foreach($sections as $section): ?>

	<div class="pb5">

		<div class="container container-wrapper cols-12">

			<div class="col container cols-4-10 cols-xl-3-11 cols-lg-2-12 cols-sm-12 center">

				<div class="col">

					<div class="heading heading__md spacing1 mb0"><?php echo $section["heading"]; ?></div>

					<div class="text brand-text"><p><?php echo $section["copy"]; ?></p></div>

				</div>

			</div>

			<?php $gallery = $section["gallery"];  if($gallery):

			$amount = sizeof($gallery);
			$class = "img-3";

			if($amount % 5 == 0) $class = "img-5"; else
			if($amount % 4 == 0) $class = "img-4"; else
			if($amount % 3 == 0) $class = "img-3"; else
			if($amount % 2 == 0) $class = "img-2"; else
			if($amount == 1)     $class = "img-1";

			?>

			<div class="col gallery gallery__artisan pt2 <?php echo $class; ?>">

				<?php foreach($gallery as $image): ?>

				<div class="img-wrapper">
					<a href="<?php echo $image["url"]; ?>" title="<?php echo $image["title"]; ?>" alt="<?php echo $image["alt"]; ?>" style="background-image: url(<?php echo $image["url"]; ?>);"></a>
				</div>

				<?php endforeach; ?>

			</div>

			<?php endif; ?>

		</div>

	</div>

	<?php endforeach; ?>

</div>

<?php endif; ?>

<div class="newsletter-signup background-primary pt5 pb2">

	<div class="container container-wrapper center cols-12">

		<div class="col">

			<div class="heading heading__md heading__secondary-color spacing1 mb1"><?php the_field("newsletter_heading", "options"); ?></div>

			<?php echo do_shortcode('[contact-form-7 id="382" title="Newsletter" html_id="contact-form-newsletter"]'); ?>

		</div>

	</div>

</div>

<!-- Other Posts -->

<?php get_template_part("template-parts/other", "posts"); ?>

<?php get_footer();?>
