<?php $bespoke = get_field("section_bespoke"); if($bespoke): ?>

<div class="bespoke center pt3 pb5">
	
	<div class="container">
	
		<div class="col">
			
			<h2 class="heading heading__md heading__light spacing1"><?php echo $bespoke["heading"]; ?></h2>
				<div class="container cols-4-10">
                    <div class="col"><?php echo $bespoke["copy"]; ?></div>
				</div>
			<div class="items-wrapper container cols-2 cols-xl-4 cols-sm-6 mt3">
				
				<?php $i = 0; foreach($bespoke["items"] as $item): ?>
					
				<div class="item col pr2 pl2 <?php if($i == 0) echo " active"; ?>" description="<?php echo htmlspecialchars($item["copy"]); ?>">
					<div class="icon"><?php echo file_get_contents($item["icon"]); ?></div>
					<div class="label"><?php echo $item["label"]; ?></div>
				</div>
					
				<?php $i++; endforeach; ?>
			
			</div>
		
		</div>
		
	</div>

</div>

<div class="bespoke-items background-brand center pt5 pb5">
	
	<div class="container">
	
		<div class="col">
			
			<h2 class="heading heading__md spacing1"><?php echo $bespoke["items"][0]["label"]; ?></h2>
			
			<div class="container cols-4-10 cols-xl-3-11 cols-md-2-12">
	
				<div class="col">
					
					<div class="brand-text"><p><?php echo $bespoke["items"][0]["copy"]; ?></p></div>
					
				</div>
				
			</div>
			
		</div>
	
	</div>

</div>

<?php endif; ?>