<?php
/**
 * The template for displaying the footer
 * @package amy-fletcher
 */
?>

</main>

<footer class="footer" style="background-image: url(<?php echo get_field("cta_contact_background", "options")["url"]; ?>);">

	<div class="pre-socket">
		
		<div class="container container-wrapper cols-4-8 cols-md-12">
			
			<?php
				
			$email   = get_field("email", "options");
			$skype   = get_field("skype", "options");
			$socials = get_field("social_links", "options");
			$contact = get_field("contact_footer", "options");
			
			?>
			
			<div class="col info">
				<div class="contact-wrapper"><a class="email" href="mail:<?php echo $email; ?>"><?php echo $email; ?></a></div>
				
				<?php foreach($contact as $con): ?>
					<div class="contact-wrapper">
						<div class="country"><?php echo $con["country"]; ?></div>
						<div class="address"><?php echo $con["address"]; ?></div>
						<a class="phone" href="tel:<?php echo $con["phone"]; ?>">Tel: <?php echo $con["phone"]; ?></a>
					</div>
				<?php endforeach ?>
				
				<div class="socials">
					<?php foreach($socials as $social): ?>
					<a href="<?php echo $social["link"]; ?>"><i class="fab fa-<?php echo $social["social_network"]; ?>"></i></a>
					<?php endforeach; ?>
					<a href="skype:<?php echo $skype; ?>?userinfo"><i class="fab fa-skype"></i></a>
				</div>
			</div>
			
			<div class="col form"><?php echo do_shortcode('[contact-form-7 id="143" title="Contact Footer" html_id="contact-form-footer"]'); ?></div>
			
		</div>
		
	</div><!--pre-socket-->
	
	<div class="socket">
	
		<div class="container container-wrapper cols-4">
			
			<div class="col colophon">Copyright &copy; <?php echo date ('Y');?> Amy Fletcher Design</div>
			
			<div class="col silverless">
				<a href="https://silverless.co.uk"><?php get_template_part('inc/img/silverless', 'logo');?></a>
			</div>
			
			<div class="col mandatory">
				<a href="<?php echo home_url() . '/terms-conditions'; ?>">Terms</a>
				<span class="divider">|</span>
				<a href="<?php echo home_url() . '/privacy-policy'; ?>">Privacy</a>
			</div>
			
		</div>
	
	</div>
	
	</div><!--socket-->

</footer>

</div><!-- #page -->

<?php wp_footer(); ?>

</body>

</html>
