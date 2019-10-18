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
			
			<div class="items-wrapper container align-center cols-3 cols-xl-3 cols-sm-6">
				
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
	
<!-- Quote Block -->

<div class="container background-light pt8 pb5">
    <div class="col">
        <div class="quote-block single">
        <?php the_field('quote');?>
        </div>
    </div>
</div>   

<?php get_footer();?>