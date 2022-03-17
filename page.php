<?php 
		$defaults = array( 'taxonomy' => 'sidelki' );
		$tags = get_tags( $args, $defaults );
		//var_dump($tags);
	?>	
	<form action="" method="POST" id="filter">
		 
		<div class="polzunok-container-5" >
			<h4>Цена за час</h4>
			<input type="text" name="cena_min_hour" class="polzunok-input-5-left" />
			<input type="text" name="cena_max_hour" class="polzunok-input-5-right "/>
			<div class="polzunok-5"></div>
		</div>
	    <div class="polzunok-container-1">
			<h4>Цена за смену</h4>
			<input type="text" name="cena_min_shift" class="polzunok-input-1-left" />
			<input type="text" name="cena_max_shift" class="polzunok-input-1-right "/>
			<div class="polzunok-1"></div>
		</div>
		<div class="polzunok-container-2">
			<h4>Цена за день</h4>
			<input type="text" name="cena_min_day" class="polzunok-input-2-left" />
			<input type="text" name="cena_max_day" class="polzunok-input-2-right "/>
			<div class="polzunok-2"></div>
		</div>
		
		<div class="tags" style="margin:50px;">
			<?php foreach ( $tags as $tag ) { ?>
			<label><input type="checkbox" name="tags[]" value="<?php echo $tag->slug; ?>"/> <?php echo $tag->name; ?></label>
			<?php } ?>
		</div>
		
		<button>Применить фильтр</button><input type="hidden" name="action" value="myfilter">
	</form>
	<div id="response">
		<?php
			global $post;

			$myposts = get_posts( [
				'post_type' => 'sidelki',
			] );

			foreach( $myposts as $post ){
				setup_postdata( $post );
				?>
				<div class="article-elem">
					<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a><br>
					<?php echo get_the_post_thumbnail( $post->ID, 'thumbnail'); ?>
				</div>
				<?php
			}
			wp_reset_postdata();
		?>
	</div>
