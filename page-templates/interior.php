<?php
/**
 * ============== Template Name: Interior
 *
 * @package amy-fletcher
 */
get_header();?>

<!-- ******************* Hero Content ******************* -->

<?php get_template_part("template-parts/hero"); ?>

<!-- ******************* Hero Content END ******************* -->

<div class="border-separator"></div>

<!-- Text Block -->
<div class="grey-block">
    <?php set_query_var("text_block", get_field("text_block")); get_template_part("template-parts/text-block"); ?>
</div>
<!-- Recent Projects -->


<!-- Properties Block -->

<?php get_template_part("template-parts/interior"); ?>
	
<!-- Quote Block -->
<div class="background-light">
<div class="container pt8 pb5">
    <div class="col">
        <div class="quote-block single">
        <?php the_field('quote');?>
        </div>
    </div>
</div>   
</div>

<!-- Previous Projects -->

<div class="container align-center pt3">
    <div class="col">
    	<h2 class="heading heading__md spacing1 mb2	"><?php echo get_field("labels")["previous_projects"]; ?></h2>
    </div>
</div>

<div class="container container-wrapper container__narrow center cols-4 cols-md-6 cols-sm-12 pb5">

		<?php
			
		$interiors = get_posts(array(
			'post_type' => 'interior',
			'posts_per_page' => 3,
			'post__not_in' => $recent_ids,
			'offset' => 3
		));
		
		if($interiors && sizeof($interiors) > 0): ?>
			
			<?php foreach($interiors as $interior): ?>
			<div class="col project-block">
    		<!--<a href="<?php echo get_permalink($interior->ID); ?>">	-->
    		<div class="project-block__img" style="background-image: url(<?php echo get_field("hero_background_image", $interior)["sizes"]["medium_large"]; ?>);"></div>	
			<div class="project-block-small">
				<div class="heading heading__brand heading__sm spacing2 font200"><?php echo $interior->post_title; ?></div>
				<div class="tilde"></div>
				<div class="heading heading__xs spacing2 font200"><?php
					$location = get_the_terms($interior->ID, "location")[0];
					$location_parent = get_term($location->parent, "location");
					echo $location->name . ", " . $location_parent->name;
				?></div>
			</div>
			<!--</a>-->
    		</div>
			<?php endforeach; ?>
			
</div>

<?php endif; ?>

<?php get_footer();?>