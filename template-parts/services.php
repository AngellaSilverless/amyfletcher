<?php $services = get_field("section_services", get_option("page_on_front")); if($services): ?>

<div class="services background-mid center pt5 pb5">
	
	<div class="container">
	
		<div class="col">
			
			<h2 class="heading heading__md heading__light spacing1 pb3"><?php echo $services["heading"]; ?></h2>
			
			<div class="items-wrapper container cols-2">
				
				<?php foreach($services["items"] as $service): ?>
					
				<div class="col pr2 pl2">
					<div class="icon"><?php echo file_get_contents($service["icon"]); ?></div>
					<div class="label"><?php echo $service["label"]; ?></div>
				</div>
					
				<?php endforeach; ?>
			
			</div>
		
		</div>
		
	</div>

</div>

<?php endif; ?>