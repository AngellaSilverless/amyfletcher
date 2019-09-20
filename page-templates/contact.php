<?php
/**
 * ============== Template Name: Contact
 *
 * @package amy-fletcher
 */
get_header();?>

<!-- ******************* Hero Content ******************* -->

<?php get_template_part("template-parts/hero"); ?>

<!-- ******************* Hero Content END ******************* -->

<!-- Contact Links -->

<div class="container cols-4">
	
	<div class="col">
		
		<div class="icon">
			
		</div>
		
	</div>
	
</div>

<!-- Text Block -->

<?php set_query_var("text_block", get_field("text_block")); get_template_part("template-parts/text-block"); ?>

<!-- Contact Form -->

<div class="container cols-4-10 pb5">
	
	<div class="col"><?php echo do_shortcode('[contact-form-7 id="560" title="Contact Page" html_id="main-contact-form"]'); ?></div>
	
</div>

<!-- Studio -->

<?php $studio = get_field("studio"); if($studio): ?>

<div class="container center pb5">
	
	<div class="col studio-info">
		
		<h2 class="heading heading__md spacing1 mb0"><?php echo $studio["heading"]; ?></h2>
		
		<?php
			
		$contact_info = get_field("contact_footer", "options");
		foreach($contact_info as $info) {
			if($info["contact_page"] == "show") {
				$show_info = $info;
				break;
			}
		}
		
		if(isset($show_info)): ?>
		
		<div class="info">
			<div class="address brand-text"><?php echo $show_info["address"]; ?></div>
			<div class="phone brand-text"><?php echo $show_info["phone"]; ?></div>
		</div>
		
		<?php endif; ?>
		
	</div>

</div>

<!-- Gallery -->

<?php $gallery = $studio["gallery"]; if($gallery): ?>

<div class="owl-carousel gallery-contact">
	
	<?php foreach($gallery as $image): ?>
		
		<div class="img-wrapper">
			<a href="<?php echo $image["url"]; ?>" title="<?php echo $image["title"]; ?>" alt="<?php echo $image["alt"]; ?>" style="background-image: url(<?php echo $image["url"]; ?>);"></a>
		</div>
	
		<?php endforeach; ?>
		
	</div>
	
</div>

<?php endif; endif; ?>

<!-- Map -->

<div style="height: 30em; background: wheat;">MAP BLOCK</div>

<!-- Follow us -->

<div class="center pt5 pb5">
	
	<div class="container">
	
		<div class="col small-col">
			
			<h2 class="heading heading__md spacing1 pb1">Follow us</h2>
			
			<div class="items-wrapper container no-gutter cols-2">
				
				<?php foreach($brands["gallery"] as $img): ?>
					
				<div class="col pr1 pl1">
					<img src="<?php echo $img["url"]; ?>" alt="<?php echo $img["alt"]; ?>" title="<?php echo $img["title"]; ?>">
				</div>
					
				<?php endforeach; ?>
			
			</div>
			
		</div>
	
	</div>

</div>

<?php get_footer();?>