<?php 

if( get_field('hero_type') == 'image' ):
	$heroImage = get_field('hero_background_image');
elseif ( get_field('hero_type') == 'color' ):
	$heroColor = get_field('hero_background_colour');
endif;

if( get_field('hero_type') !== 'slider'):

?>

<div class="hero <?php the_field('hero_height');?>" style="background-image: url(<?php echo $heroImage['url']; ?>); background-color: <?php echo $heroColor; ?>;">

	<div class="container">
		
		<div class="col hero__content">
			
			<a href="<?php echo home_url(); ?>" class="logo hero__logo slide-up">
				<?php echo file_get_contents(get_field('logo', 'options')["url"]); ?>
			</a>
		
			<h1 class="heading heading__xl slow-fade"><?php the_field('hero_heading');?></h1>
		
		</div>
	
	</div>

</div><!--hero-->

<?php endif;?>
