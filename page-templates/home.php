<?php 
/**
 * ============== Template Name: Home
 *
 * @package amy-fletcher
 */
get_header();
$ID = get_the_ID();  
$heading = get_field("hero_heading", $ID);?>

<!-- ******************* Hero Content ******************* -->
<div class="slider-wrapper">
    <div class="static-elements">
        <?php if( is_front_page() ) :
				echo file_get_contents(get_field("logo", "options")["url"]);
				endif;
			?>
			<h1 class="heading heading__xl heading__brand heading__light slow-fade"><?php echo $heading; ?></h1>
    </div>

    <div class="large-carousel owl-carousel owl-theme">
<?php if( have_rows('slider_images') ):
    while ( have_rows('slider_images') ) : the_row(); 
    $heroImage = get_sub_field("image");
    ?>    
        <div class="large-carousel__item"style="background-image: url(<?php echo $heroImage; ?>);"></div>            
<?php endwhile; endif;?>        
    </div>
</div>
          


<!-- Text Block -->

<?php set_query_var("text_block", get_field("text_block")); get_template_part("template-parts/text-block"); ?>

<!-- Services Block -->

<?php get_template_part("template-parts/services"); ?>

<!-- Properties Block -->

<?php get_template_part("template-parts/interior"); ?>

<div class="border-separator"></div>

<!-- As seen in Block -->

<?php $seen = get_field("section_as_seen"); if($seen): ?>

<div class="as-seen background-light center pt5 pb5">

	<div class="container">

		<div class="col small-col">

			<h2 class="heading heading__md spacing1 pb1"><?php echo $seen["heading"]; ?></h2>

			<div class="items-wrapper container cols-3 cols-md-6">

				<?php $i = 0; foreach($seen["gallery"] as $img): $i++ ?>

				<div class="col">
					<?php echo file_get_contents($img["url"]); ?>
				</div>

				<?php endforeach; ?>

			</div>

		</div>

	</div>

</div>

<?php endif; ?>

<?php get_footer();?>
