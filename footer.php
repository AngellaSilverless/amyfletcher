<?php
/**
 * The template for displaying the footer
 * @package amy-fletcher
 */
?>

</main>

<div class="border-separator"></div>

<footer class="footer">

	<div class="pre-socket">

		<div class="container container-wrapper cols-12">

			<?php

			$email   = get_field("email", "options");
			$skype   = get_field("skype", "options");
			$socials = get_field("social_links", "options");
			$contact = get_field("contact_footer", "options");

			?>
			<div class="col"></div>
			<div class="col align-center pt2 pb3">
    			<div class="heading heading__lg heading__brand title spacing1 mb1">Follow Us</div>
				<div class="socials">
					<a href="/blog"><i class="far fa-newspaper"></i><span>News</span></a>
					<?php foreach($socials as $social): ?>
					<a href="<?php echo $social["link"]; ?>" target="_blank"><i class="fab fa-<?php echo $social["social_network"]; ?>"></i><span><?php echo $social["title"]; ?></span></a>
					<?php endforeach; ?>
					<a href="skype:<?php echo $skype; ?>?userinfo"><i class="fab fa-skype"></i><span>Skype</span></a>
				</div>
			</div>

		</div>

	</div><!--pre-socket-->

<div class="border-separator"></div>

	<div class="socket">

		<div class="container container-wrapper cols-4">

			<div class="col colophon">Copyright &copy; Amy Fletcher Design <?php echo date ('Y');?></div>

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
