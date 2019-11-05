<?php
/**
 * The template for displaying single posts
 *
 * @package amy-fletcher
 */
get_header();?>

<!-- ******************* Hero Content ******************* -->
<?php $heroImage = get_field("hero_background_image");?>
<div class="hero pt5 mb5 <?php the_field('hero_height');?>" style="background-image: url(<?php echo $heroImage['url']; ?>); background-color: <?php echo $heroColor; ?>;">
	<div class="container container-wrapper">
		<div class="col hero__content">
			 <?php if( is_front_page() ) :
				echo file_get_contents(get_field("logo", "options")["url"]);
				endif;
			?>
			<h1 class="heading heading__xl heading__brand heading__light slow-fade"><?php the_title(); ?></h1>
		</div>
	</div>
</div><!--hero-->

<!-- ******************* Hero Content END ******************* -->

<?php $sections = get_field("section"); if($sections): ?>

<div class="post-content pb5">
	
<?php $i = 0; foreach($sections as $section): ?>

	<div class="pb5">
	
		<div class="container container-wrapper cols-12">
			
			<div class="col container cols-4-10 cols-xl-3-11 cols-lg-2-12 cols-sm-12">
				
				<div class="col">
				
					<div class="heading heading__md spacing1 mb1"><?php echo $section["heading"]; ?></div>
					
					<div class="text brand-text"><p><?php echo $section["copy"]; ?></p></div>
				
				</div>
							
			</div>
			
			<?php $gallery = $section["gallery"];  if($gallery):
			
			$amount = sizeof($gallery);
			$class = "img-3";
			
			if($amount % 5 == 0) $class = "img-5"; else
			if($amount % 4 == 0) $class = "img-4"; else
			if($amount % 3 == 0) $class = "img-3"; else
			if($amount % 2 == 0) $class = "img-2"; else
			if($amount == 1)     $class = "img-1";
			
			?>
			
			<div class="col gallery gallery__artisan pt2 <?php echo $class; ?>">
				
				<?php foreach($gallery as $image): ?>
				
				<div class="img-wrapper">
					<a href="<?php echo $image["url"]; ?>" title="<?php echo $image["title"]; ?>" alt="<?php echo $image["alt"]; ?>" style="background-image: url(<?php echo $image["url"]; ?>);"></a>
				</div>
			
				<?php endforeach; ?>
				
			</div>
			
			<?php endif; ?>
		
		</div>
		
	</div>
		
	<?php endforeach; ?>
	
</div>

<?php endif; ?>

<div class="wrapper-button center pt5 pb5">
	
	<a href="/blog" class="button view-slideshow">Back to Blog</a>
	
</div>

<?php get_footer();?>