<?php
/**
 * ============== Template Name: Shop
 *
 * @package amy-fletcher
 */
get_header();?>

<!-- ******************* Hero Content ******************* -->

<?php get_template_part("template-parts/hero"); ?>

<!-- ******************* Hero Content END ******************* -->

<!-- Text Block -->

<?php set_query_var("text_block", get_field("text_block")); get_template_part("template-parts/text-block"); ?>

<!-- Shop -->

<div class="container container-wrapper cols-3-9 cols-lg-12 gutter-lg shop-container">
	
	<div class="col sidebar pr2">
		
		<?php
				
		$curr_type = $_GET['type'];
		$curr_collection = $_GET['collection'];
		
		function urlType($type) {
			$curr_type = $_GET['type'];
			$curr_collection = $_GET['collection'];
		
			$url = "/shop/";
			$param = array();
			
			if($type != "all")
				array_push($param, "type=" . $type);
			
			if($curr_collection)
				array_push($param, "collection=" . $curr_collection);
			
			if(sizeof($param) > 0)
				$url .= "?" . implode("&", $param);
				
			echo $url;
		}
		
		function urlCollection($type) {
			$curr_type = $_GET['type'];
			$curr_collection = $_GET['collection'];
			
			$url = "/shop/";
			$param = array();
			
			if($curr_type)
				array_push($param, "type=" . $curr_type);
			
			if($type != "all")
				array_push($param, "collection=" . $type);
			
			if(sizeof($param) > 0)
				$url .= "?" . implode("&", $param);
				
			echo $url;
		}
		
		?>
		
		<div>
			
			<div class="heading heading__md spacing1 mt0 title">Browse by:</div>
			
			<div class="list-items pt1 pb3">
				
				<div class="item <?php if(!$curr_type) echo "active"; ?>">
					<a href="<?php urlType("all"); ?>">All furniture</a>
					<?php get_template_part("inc/img/tilde"); ?>
				</div>
				
				<?php $types = get_terms("type"); foreach($types as $type): ?>
				
				<div class="item <?php if($curr_type == $type->slug) echo "active"; ?>">
					<a href="<?php urlType($type->slug); ?>"><?php echo $type->name; ?></a>
					<?php get_template_part("inc/img/tilde"); ?>
				</div>
				
				<?php endforeach; ?>
				
			</div>
			
		</div>
		
		<div>
			
			<div class="heading heading__md spacing1 title">Filter by:</div>
			
			<div class="list-items pt1 pb3">
				
				<div class="item <?php if(!$curr_collection) echo "active"; ?>">
					<a href="<?php urlCollection("all"); ?>">All collections</a>
					<?php get_template_part("inc/img/tilde"); ?>
				</div>
				
				<?php $collections = get_terms("collection"); foreach($collections as $collection): ?>
				
				<div class="item <?php if($curr_collection == $collection->slug) echo "active"; ?>">
					<a href="<?php urlCollection($collection->slug); ?>"><?php echo $collection->name; ?></a>
					<?php get_template_part("inc/img/tilde"); ?>
				</div>
				
				<?php endforeach; ?>
				
			</div>
		
		</div>
		
	</div>
	
	<div class="col shop-items container cols-4 cols-xl-6 cols-sm-12">
	
	<?php
	
	$paged = get_query_var("paged") ? get_query_var("paged") : 1;
	
	$furniture = new WP_Query(array(
		"post_type"      => "furniture",
		"posts_per_page" => 9,
		"paged"          => $paged,
		"type"           => $curr_type,
		"collection"     => $curr_collection
	));
	
	if($furniture->have_posts()): while($furniture->have_posts()): $furniture->the_post(); ?>
		
		<div class="col item center pb1" furniture="<?php echo get_the_ID(); ?>">
			
			<?php $colour = get_field("colour"); ?>
			
			<div class="img" style="background-image: url(<?php echo get_field("image")["sizes"]["medium_large"]; ?>);"></div>
			
			<div class="heading heading__sm spacing1 font400 title"><?php the_title(); if($colour) echo ","?></div>
			
			<?php if($colour): ?>
			
			<div class="heading heading__sm spacing1 font200"><?php echo $colour; ?></div>
			
			<?php endif; ?>
			
		</div>
		
	<?php endwhile; wp_reset_postdata(); endif; ?>
		
	</div>
	
</div>

<div class="container cols-12 pb10">
	
	<?php if($furniture->max_num_pages > 1): ?>
	
	<div class="col pagination font2 pt3">
		<?php
			
			$next_link = "/shop/";
			if($curr_type)
				$next_link .= "?type=" . $curr_type . "&paged=" . ($paged + 1);
			else
				$next_link .= "?paged=" . ($paged + 1);
				
			$prev_link = "/shop/";
			if($curr_type)
				$prev_link .= "?type=" . $curr_type . "&paged=" . ($paged - 1);
			else
				$prev_link .= "?paged=" . ($paged - 1);
		
		?>
		
		<a class="prev" <?php if($paged > 1) echo "href='" . $prev_link . "' class='active'"; ?>><?php get_template_part("inc/img/simple-arrow"); ?></a>
	
		<span class="pages"><?php echo $paged . " / " .  $furniture->max_num_pages; ?></span>
		
		<a class="next" <?php if($paged < $furniture->max_num_pages) echo "href='" . $next_link . "' class='active'"; ?>><?php get_template_part("inc/img/simple-arrow"); ?></a>
		
	</div>
	
	<?php endif; ?>
	
</div>

<!-- Call to Action -->

<?php get_template_part("template-parts/bespoke-manufacturing"); ?>

<!-- Stockists -->

<?php get_template_part("template-parts/stockists"); ?>

<!-- Single furniture -->

<div id="show-furniture" class="hidden">
	
	<div class="wrapper">
	
		<div class="product-info">
			
			<div class="close"><span>x</span></div>
			
			<div class="image"></div>
			
			<div class="info background-primary">
				
				<h2 class="heading heading__lg heading__brand heading__light active mt0">Product information</h2>
				
				<div class="heading heading__sm heading__light spacing2 title font400"></div>
				
				<div class="heading heading__sm heading__light spacing2 colour font200"></div>
				
				<?php get_template_part("inc/img/tilde"); ?>
				
				<div class="brand-text description"><p></p></div>
				
			</div>
				
		</div>
	
	</div>
	
</div>

<?php get_footer();?>