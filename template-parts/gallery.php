<?php $gallery = get_query_var("gallery"); if($gallery): $class = get_query_var("class"); ?>

<div class="container cols-12">
	
	<div class="col gallery <?php echo $class; ?>">
		
		<?php foreach($gallery as $image): ?>
		
		<div class="img-wrapper">
			<a href="<?php echo $image["url"]; ?>" title="<?php echo $image["title"]; ?>" alt="<?php echo $image["alt"]; ?>" style="background-image: url(<?php echo $image["url"]; ?>);"></a>
		</div>
	
		<?php endforeach; ?>
		
	</div>

</div>

<?php endif; ?>