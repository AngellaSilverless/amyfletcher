<?php
/**
 * ============== Template Name: Terms and Privacy
 *
 * @package amy-fletcher
 */
get_header();

while(have_posts()): the_post(); ?> 

<!-- ******************* Hero Content ******************* -->

<?php get_template_part("template-parts/hero"); ?>

<!-- ******************* Hero Content END ******************* -->

<div class="container container-wrapper pt5 pb5 cols-12">
	
	<div class="col">
		
		<div class="text brand-text"><p><?php the_content(); ?></p></div>
		
	</div>
	
</div>

<?php endwhile;
	
get_footer(); ?>