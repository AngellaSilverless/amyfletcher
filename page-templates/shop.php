<?php
/**
 * ============== Template Name: Shop
 *
 * @package amy-fletcher
 */
get_header();?>

<!-- ******************* Hero Content ******************* -->

<?php get_template_part("template-parts/hero"); ?>

<!-- ******************* Hero Content END ******************* -->

<!-- Text Block -->

<?php set_query_var("text_block", get_field("text_block")); get_template_part("template-parts/text-block"); ?>

<!-- Shop -->

<?php
$categories = get_terms( 'type' );
foreach ( $categories as $category ):
    $services = new WP_Query(
        array(
            'post_type' => 'furniture',
            'showposts' => -1,
            'tax_query' => array(
                array(
                    'taxonomy'  => 'type',
                    'terms'     => array( $category->slug ),
                    'field'     => 'slug'
                )
            )
        )
    );
?>
    <div class="container container__medium align-center">
        <div class="col">
            <h3 class="heading heading__md mt3 mb2 horiz-sep"><span><?php echo $category->name; ?></span></h3>
        </div>
    </div>

    <div class="shop-items container container__medium cols-4 cols-md-4 cols-sm-6">
        <?php while ($services->have_posts()) : $services->the_post(); ?>
            <div class="col item pb1" furniture="<?php echo get_the_ID(); ?>">
            	<?php $colour = get_field("colour"); ?>
            	<div class="img" style="background-image: url(<?php echo get_field("image")["sizes"]["medium_large"]; ?>);"></div>
            	<div class="content">
                	<div class="heading heading__sm heading__brand spacing1 font400 title"><?php the_title(); //if($colour) echo ","?></div>
                	<?php if($colour): ?>
                	<div class="tilde"></div>
                	    <p><?php echo $colour; ?></p>
                	<?php endif; ?>
                	<div class="button-general">Read More</div>
            	</div>
            </div>
        <?php endwhile; ?>
    </div>
<?php
    $services = null;
    wp_reset_postdata();
    endforeach;
?>

<!-- Call to Action -->

<?php get_template_part("template-parts/bespoke-manufacturing"); ?>

<!-- Stockists -->

<?php get_template_part("template-parts/stockists"); ?>

<!-- Single furniture -->

<div id="show-furniture" class="hidden">
	
	<div class="wrapper">
		<div class="product-info">
    		<div class="close"><span>x</span></div>
    		<div class="image"></div>
    		<div class="info background-primary">
    			<h2 class="heading heading__lg heading__brand heading__light active mt0">Product information</h2>
    			<div class="heading heading__sm heading__light spacing2 title font400"></div>
    			<div class="heading heading__sm heading__light spacing2 colour font200"></div>
    			<?php get_template_part("inc/img/tilde"); ?>
    			<div class="brand-text description"><p></p></div>
    		</div>	
    	</div>
	</div>
</div>

<?php get_footer();?>