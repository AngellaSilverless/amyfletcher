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
<div class="grey-block">
<?php set_query_var("text_block", get_field("text_block")); get_template_part("template-parts/text-block"); ?>
</div>

<?php

$artisans = get_posts(array(
	'post_type' => 'artisan',
	'posts_per_page' => -1,
));

if($artisans && sizeof($artisans) > 0): ?>

<div class="container-artisan container container-wrapper container-md container__medium cols-4 cols-xl-6 cols-md-12 pt5 pb5">

	<?php foreach($artisans as $artisan): ?>

	<div class="col">
        <div class="info-wrapper">
		<?php $image = get_field("hero_background_image", $artisan->ID); $url = $image["sizes"]["medium_large"];?>

		<a href="<?php echo get_permalink($artisan->ID); ?>" class="col">
    		<div class="img" style="background-image: url(<?php echo $url; ?>);"></div>
        </a>

        <div class="content">
		    <div class="heading heading__sm heading__brand title"><?php echo $artisan->post_title; ?></div>
            <div class="tilde"></div>
            <p><?php the_field("introduction", $artisan->ID); ?></p>
            <a href="<?php echo get_permalink($property->ID); ?>" class="button-general">Read More</a>
        </div>
        </div>
	</div>

	<?php endforeach; ?>

</div>

<?php endif; ?>

<?php get_footer();?>
