<?php
/**
 * ============== Template Name: Brand
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

<?php $services = get_field("section_services"); if($services): ?>

<div class="services background-mid center pt3 pb5">
	
	<div class="container align-center">
	
		<div class="col">
			
			<h2 class="heading heading__md heading__light spacing1 pb2"><?php echo $services["heading"]; ?></h2>
			
			<div class="items-wrapper container cols-3-2-2-2-3 cols-xl-2 cols-sm-6">
				<div class="col"></div>
				<?php foreach($services["items"] as $service): ?>
					
				<div class="col pr2 pl2">
					<div class="icon"><?php echo file_get_contents($service["icon"]); ?></div>
					<div class="label"><?php echo $service["label"]; ?></div>
				</div>
					
				<?php endforeach; ?>
			
			</div>
		
		</div>
		
	</div>

</div>

<?php endif; ?>

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

<div class="container pt5 pb5">
    <div class="col">
        <div class="quote-block single">
        <?php the_field('quote');?>
        </div>
    </div>
</div>   

<!-- Image Block -->
<div class="background-light">
<div class="container container__narrow background-light pt5 pb5">
    <div class="col">
        <div class="large-brand-image">
        <img src="<?php the_field('lower_image');?>" />
        </div>
    </div>
</div>  
</div>



<?php get_footer();?>