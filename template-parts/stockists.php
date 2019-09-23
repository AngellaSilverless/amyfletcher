<?php $stockists = get_field("stockists"); if($stockists): ?>

<div class="stockists background-white center pt5 pb5">
	
	<div class="container container-wrapper">
	
		<div class="col small-col">
			
			<h2 class="heading heading__md spacing1 pb1"><?php echo $stockists["heading"]; ?></h2>
			
			<div class="items-wrapper container cols-4 cols-md-6">
				
				<?php $i = 0; foreach($stockists["gallery"] as $img): $i++ ?>
					
				<div class="col item">
					<?php echo file_get_contents($img["url"]); ?>
				</div>
					
				<?php endforeach; ?>
			
			</div>
			
		</div>
	
	</div>

</div>

<?php endif; ?>