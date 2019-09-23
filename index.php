<?php
/**
 * Template for displaying all single posts
 *
 * @package amy-fletcher
 */
get_header();?>

<!-- ******************* Hero Content ******************* -->

<?php get_template_part("template-parts/hero"); ?>

<!-- ******************* Hero Content END ******************* -->

<?php $ID = get_option("page_for_posts"); ?>

<!-- Text Block -->

<?php set_query_var("text_block", get_field("text_block", $ID)); get_template_part("template-parts/text-block"); ?>

<div class="container container-wrapper cols-4 cols-lg-12 pb10">

	<?php while (have_posts()): the_post(); ?>

	<a class="col post-wrapper" href="<?php echo get_permalink(); ?>">
		
		<?php $image = get_field("hero_background_image"); $url = $image["sizes"]["medium_large"];?>
		
		<div class="img" style="background-image: url(<?php echo $url; ?>);"></div>
		
		<div class="post-info">
			
			<h2 class="heading heading__sm heading__primary-color spacing2 font400 mb1"><?php the_title(); ?></h2>
			
			<div class="col date"><?php echo get_the_date("F j Y"); ?></div>
			
			<div class="text brand-text"><p><?php the_field("introduction"); ?> [...]</p></div>
				
			<div class="read-more-text">Read more</div>
		
			<?php get_template_part("inc/img/arrow"); ?>
			
		</div>
		
	</a>

	<?php endwhile; ?>

</div>

<!-- Instagram Gallery -->

<?php get_template_part("template-parts/gallery", "instagram"); ?>

<div class="pinterest" style="height:10em; background: wheat;">PINTEREST BLOCK</div>

<?php get_footer();?>