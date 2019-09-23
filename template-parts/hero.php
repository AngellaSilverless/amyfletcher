<?php

$ID = get_the_ID();

if(get_query_var("pagename") == "blog") {
	$ID = get_option("page_for_posts");
}

if(get_field("hero_type", $ID) == "image") {
	$heroImage = get_field("hero_background_image", $ID);
} else if(get_field("hero_type", $ID) == "color") {
	$heroColor = get_field('hero_background_colour', $ID);
}

if(is_single() && get_post_type() == "post") {
	$heading = get_field("hero_heading", get_option("page_for_posts"));
} else {
	$heading = get_field("hero_heading", $ID);
}

if( get_field('hero_type', $ID) !== 'slider'):

?>

<div class="hero pt5 <?php the_field('hero_height', $ID);?>" style="background-image: url(<?php echo $heroImage['url']; ?>); background-color: <?php echo $heroColor; ?>;">

	<div class="container container-wrapper">
		
		<div class="col hero__content">
			
			<a href="<?php echo home_url(); ?>" class="logo hero__logo slide-up">
				<?php echo file_get_contents(get_field('logo', 'options')["url"]); ?>
			</a>
		
			<h1 class="heading heading__xl heading__brand heading__light slow-fade"><?php echo $heading; ?></h1>
		
		</div>
	
	</div>

</div><!--hero-->

<?php endif;?>
