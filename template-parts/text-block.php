<?php $text_block = get_query_var("text_block"); ?>

<div class="container cols-4-10 pt5 pb5">
	
	<div class="col block block-text">
		
		<h2 class="heading heading__md spacing1 mb0"><?php echo $text_block["heading"]; ?></h2>
		
		<div class="text"><p><?php echo $text_block["text_block_text"]; ?></p></div>
		
		<?php if($text_block["text_block_text_more"]): ?>
		
		<div class="text" style="display: none"><p><?php echo $text_block["text_block_text_more"]; ?></p></div>
		
		<button class="read-more button mt1">Read More</button>
		
		<?php endif; ?>
	</div>
	
</div>