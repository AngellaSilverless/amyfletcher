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

<div class="border-separator"></div>

<!-- Services Block -->

<?php get_template_part("template-parts/services"); ?>

<!-- Signature Block -->
<div class="signature-block slide-up slow">
    <?php echo file_get_contents(get_field("logo_standard", "options")["url"]); ?>
</div>

<!-- Information Block -->
<?php $info = get_field("information_block"); ?>

<div class="container container-wrapper container__narrow pb5 cols-5-7 cols-md-12">

	<div class="col">
		<img src="<?php the_field('profile_image');?>"/>
        <div class="summary-block mt1">
            <h2 class="heading heading__md spacing1 font700 mt0">Qualifications</h2>
            <div class="mt1"><?php the_field('qualifications');?></div>
            <h2 class="heading heading__md spacing1 font700 mt1">Career History</h2>
            <div class="mt1"><?php the_field('career_history');?></div>
        </div>
	</div>

	<div class="col ml2">
    	<h2 class="heading heading__md spacing1 font700 mt0" style="line-height: 0.65em;"><?php echo $info["heading"]; ?></h2>
		<div class="text mb1"><?php echo $info["copy"]; ?></div>
        <a href="/interior/" class="button-general">See Some Of Our work</a>
        
        <div class="awards mt3">
        <h2 class="heading heading__md spacing1 font700 mb0 mt0">Awards</h2>
        <?php $awards = get_field("awards"); 
            foreach($awards as $award): ?>
				<img src="<?php echo $award["award_image"]; ?>"/>
				<?php endforeach; ?>
        </div>
        
	</div>

    <div class="col"></div>

</div>

</div>

<!-- Quote Block -->
<div class="background-light pt3 pb3">
    <div class="container">
    <div class="col">
        <div class="quote-block single">
        <?php the_field('quote');?>
        </div>
    </div>
</div>
</div>

<!-- Instagram Gallery -->

<?php get_template_part("template-parts/gallery", "instagram"); ?>

<?php get_footer();?>
