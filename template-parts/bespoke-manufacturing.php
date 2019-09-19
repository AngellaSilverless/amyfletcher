<?php $bespoke = get_field("section_bespoke"); if($bespoke): ?>

<div class="bespoke background-primary center pt5 pb5">
	
	<div class="container">
	
		<div class="col">
			
			<h2 class="heading heading__md heading__light spacing1 pb3"><?php echo $bespoke["heading"]; ?></h2>
			
			<div class="items-wrapper container cols-2">
				
				<?php foreach($bespoke["items"] as $item): ?>
					
				<div class="col pr2 pl2">
					<div class="icon"><?php echo file_get_contents($item["icon"]); ?></div>
					<div class="label"><?php echo $item["label"]; ?></div>
				</div>
					
				<?php endforeach; ?>
			
			</div>
		
		</div>
		
	</div>

</div>

<?php endif; ?>