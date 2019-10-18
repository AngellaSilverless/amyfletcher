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

<?php

$email = get_field("email", "options");
$skype = get_field("skype", "options");
$contact_info = get_field("contact_footer", "options");

foreach($contact_info as $info) {
	if($info["contact_page"] == "show") {
		$show_info = $info;
		break;
	}
}

?>

<!-- Contact Links -->
<div class="grey-block">
<div class="container container-wrapper contact-links cols-4 cols-sm-12 center pt3 pb5">
	
	<?php if(isset($show_info)): ?>
	
	<div class="col">
		
		<a href="tel:<?php echo $show_info["phone"]; ?>">
		
			<div class="icon"><?php get_template_part("inc/img/contact", "phone"); ?></div>
			
			<div class="label"><?php echo $show_info["phone"]; ?></div>
		
		</a>
		
	</div>
	
	<div class="col">
		
		<a href="mail:<?php echo $email; ?>">
		
			<div class="icon mail"><?php get_template_part("inc/img/contact", "email"); ?></div>
			
			<div class="label"><?php echo $email; ?></div>
		
		</a>
		
	</div>
	
	<div class="col">
		
		<a href="skype:<?php echo $skype; ?>?call">
		
			<div class="icon"><?php get_template_part("inc/img/contact", "skype"); ?></div>
			
			<div class="label">Skype</div>
		
		</a>
		
	</div>
	
	<?php endif; ?>
	
</div>
</div>

<div class="arrow-down center">
	
<?php get_template_part("inc/img/arrow"); ?>

</div>

<!-- Text Block -->

<?php set_query_var("text_block", get_field("text_block")); get_template_part("template-parts/text-block"); ?>

<!-- Contact Form -->

<div class="container container-wrapper cols-4-10 cols-md-2-12 cols-sm-12 pb5">
	
	<div class="col contact-form-wrapper">
		<?php
		
		get_template_part("inc/img/leaf");
			
		echo do_shortcode('[contact-form-7 id="560" title="Contact Page" html_id="main-contact-form"]');
		
		get_template_part("inc/img/leaf");
		
		?>
	</div>
	
</div>

<!-- Studio -->

<?php $studio = get_field("studio"); if($studio): ?>

<div class="container container-wrapper center pb5">
	
	<div class="col studio-info">
		
		<h2 class="heading heading__md spacing1 mb0"><?php echo $studio["heading"]; ?></h2>
		
		<?php
		
		if(isset($show_info)): ?>
		
		<div class="info">
			<div class="address brand-text"><?php echo $show_info["address"]; ?></div>
			<div class="phone brand-text"><?php echo $show_info["phone"]; ?></div>
		</div>
		
		<?php endif; ?>
		
	</div>

</div>

<div class="border-separator"></div>

<?php echo do_shortcode('[wp_mapbox_gl_js map_id="752"]');?>

<?php endif; ?>

<?php get_footer();?>