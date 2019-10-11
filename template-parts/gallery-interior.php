<?php $gallery = get_query_var("gallery");
	
$quotation = get_field("quotation_gallery");
	
if($gallery): $class = get_query_var("class"); ?>

<div class="container cols-12">
	
	<div class="col gallery <?php echo $class; ?>">
		
		<?php $i = 0; foreach($gallery as $image): if($quotation && $i == 2): ?>
		
		<div class="img-wrapper quotation quotation-interior">
		
			<div class="quote-wrapper col">
				
				<div class="quote-block single">
                    <p><?php echo $quotation; ?></p>				
				</div>
				
			</div>
			
		</div>
		
		<?php endif; ?>
		
		<div class="img-wrapper">
			
			<a href="<?php echo $image["url"]; ?>" title="<?php echo $image["title"]; ?>" alt="<?php echo $image["alt"]; ?>" style="background-image: url(<?php echo $image["url"]; ?>);"></a>
			
		</div>
	
		<?php $i++; endforeach; ?>
		
	</div>

</div>

<div class="wrapper-button center pt5 pb5">
	
	<button class="button view-slideshow">View Slideshow</button>
	
</div>

<?php endif; ?>