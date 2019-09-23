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

<!-- Information Block -->

<?php $info = get_field("information_block"); ?>

<div class="container container-wrapper pt5 pb5 cols-1-7-13 cols-xl-1-7-13 cols-lg-12">
	
	<div class="col block block-info">
		
		<h2 class="heading heading__md spacing1 mb0"><?php echo $info["heading"]; ?></h2>
		
		<div class="text"><p><?php echo $info["copy"]; ?></p></div>
		
	</div>
	
	<div class="col">
		<?php set_query_var("gallery", $info["gallery"]); set_query_var("class", "gallery__about"); get_template_part("template-parts/gallery"); ?>
	</div>
	
</div>

<!-- Services Block -->

<?php get_template_part("template-parts/services"); ?>

<!-- Section Link -->

<?php $section = get_field("section_link"); ?>

<div class="container container-wrapper section-link pt5 pb5 cols-6 cols-md-12">
	
	<a href="<?php echo $section["page"]; ?>" class="col primary-overlay section-wrapper" style="background-image: url(<?php echo $section["background_image"]; ?>)">
		
		<div class="heading heading__md heading__secondary-color spacing1 font200 mb1"><?php echo $section["heading"]; ?></div>
		
		<div class="heading heading__lg heading__brand heading__light slow-fade title"><?php echo $section["copy"]; ?></div>
		
	</a>
	
	<div class="col gallery gallery__single">
		
		<div class="img-wrapper">
			
			<a class="side-image" href="<?php echo $section["side_image"]["url"]; ?>" style="background-image: url(<?php echo $section["side_image"]["url"]; ?>);"></a>
		
		</div>
	</div>
	
</div>

<!-- Qualification and Career -->

<div class="container container-wrapper qualification pb10 no-gutter cols-6 cols-md-12">
	
	<!-- Qualification -->
	
	<?php $qualifications = get_field("qualifications"); ?>
	
	<div class="col col-flex background-secondary pb3 pt3 pr1 pl1">
		
		<div class="heading heading__lg heading__brand heading__light slow-fade title"><?php echo $qualifications["heading"]; ?></div>
		
		<div class="text">
			
			<?php foreach($qualifications["education"] as $education): ?>
			
				<div class="education-wrapper">
					
					<div class="heading font200"><p><?php echo $education["heading"]; ?></p></div>
					
					<div class="description font400"><p><?php echo $education["copy"]; ?></p></div>
					
				</div>
			
			<?php endforeach; ?>
			
		</div>
		
	</div>
	
	<div class="col quotation container cols-3-11">
		
		<div class="quote-wrapper col">
			
			<div>
			
				<?php get_template_part("inc/img/quotes-open"); ?>
				
				<p><?php echo $qualifications["quotation"]; ?></p>
			
			</div>
			
		</div>
		
	</div>
	
	<!-- Career -->
	
	<?php $career = get_field("career_history"); ?>
	
	<div class="col quotation career-quote container cols-3-11">
		
		<div class="quote-wrapper col">
			
			<div>
			
				<?php get_template_part("inc/img/quotes-open"); ?>
				
				<p><?php echo $career["quotation"]; ?></p>
			
			</div>
			
		</div>
		
		<?php if($career["quotation_background"]["subtype"] == "svg+xml"): 
			
			echo file_get_contents($career["quotation_background"]["url"]);
		
		else: ?>
		
		<img src="<?php echo $career["quotation_background"]["url"]; ?>" alt="<?php echo $career["quotation_background"]["alt"]; ?>" title="<?php echo $career["quotation_background"]["title"]; ?>">
		
		<?php endif; ?>
		
	</div>
	
	<div class="col col-flex background-secondary pb3 pt3 pr1 pl1 career-history">
		
		<div class="heading heading__lg heading__brand heading__light slow-fade title"><?php echo $career["heading"]; ?></div>
		
		<div class="text container cols-3-11 cols-lg-12"><div class="col"><?php echo $career["description"]; ?></div></div>
		
		<div class="image-wrapper container cols-3-11 cols-lg-12">
			
			<div class="col">
			
			<?php foreach($career["gallery"] as $img):
				
				if($img["subtype"] == "svg+xml"):
				
					echo file_get_contents($img["url"]);
					
				else: ?>
					
					<img src="<?php echo $img["url"]; ?>" alt="<?php echo $img["alt"]; ?>" title="<?php echo $img["title"]; ?>">
					
				<?php endif;
				
			endforeach; ?>
			
			</div>
		
		</div>
		
	</div>
	
</div>

<!-- Recent Posts -->

<?php get_template_part("template-parts/recent", "posts"); ?>

<!-- Instagram Gallery -->

<?php get_template_part("template-parts/gallery", "instagram"); ?>

<?php get_footer();?>