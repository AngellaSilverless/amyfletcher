<?php $text_block = get_query_var("text_block"); ?>

<div class="container cols-4-10 pt5 pb5">
	
	<div class="col block-text">
		
		<div class="heading heading__md heading__caps font600 spacing1"><?php echo $text_block["heading"]; ?></div>
		
		<div class="text"><p><?php echo $text_block["text_block_text"]; ?></p></div>
		
		<?php if($text_block["text_block_text_more"]): ?>
		
		<div class="text" style="display: none"><p><?php echo $text_block["text_block_text_more"]; ?></p></div>
		
		<button class="read-more mt1">Read More</button>
		
		<?php endif; ?>
	</div>
	
</div>