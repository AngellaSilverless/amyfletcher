<?php $services = get_field("section_services", get_option("page_on_front")); if($services): ?>

<div class="services dark-background center pt5 pb5">
	
	<div class="container">
	
		<div class="col">
			
			<div class="heading heading__md heading__caps heading__light font600 spacing1 pb3"><?php echo $services["heading"]; ?></div>
			
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