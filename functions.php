add_action( 'wp_ajax_myfilter', 'true_filter_function' ); 
add_action( 'wp_ajax_nopriv_myfilter', 'true_filter_function' );

 
function true_filter_function(){
	// цены
	$price_hour_min = $_POST[ 'cena_min_hour' ];
	$price_hour_max = $_POST[ 'cena_max_hour' ];
	$price_shift_min = $_POST[ 'cena_min_shift' ];
	$price_shift_max = $_POST[ 'cena_max_shift' ];
	$price_day_min = $_POST[ 'cena_min_day' ];
	$price_day_max = $_POST[ 'cena_max_day' ];
	//цены
	
	$all_tags[] = $_POST[ 'tags' ];

	
	if($all_tags[0] != NULL){
		foreach($all_tags as $one_tag){
			$all_tags[0] = intval($one_tag[0]);
			$all_tags[1] = intval($one_tag[1]);
			$all_tags[2] = intval($one_tag[2]);
			$all_tags[3] = intval($one_tag[3]);
			$all_tags[4] = intval($one_tag[4]);							   
		}
			$args = array(
				'post_type' => 'sidelki', // таксокомия
				'meta_query' => [
					'relation' => 'OR', //сменить OR на AND для строго всех трех совпадение
					[
						'key'     => 'price_hour', // имя поля за час
						'value'   => array( $price_hour_min, $price_hour_max ),
						'type'    => 'numeric',
						'compare' => 'BETWEEN'
					],
					[
						'key'     => 'price_shift', // имя поля за смену
						'value'   => array( $price_shift_min, $price_shift_max ),
						'type'    => 'numeric',
						'compare' => 'BETWEEN'
					],
					[
						'key'     => 'price_day', //имя поля за день
						'value'   => array( $price_day_min, $price_day_max ),
						'type'    => 'numeric',
						'compare' => 'BETWEEN'
					],
				],
				'tag__in' => $all_tags,

			);
	} else {
			$args = array(
				'post_type' => 'sidelki', // таксокомия
				'meta_query' => [
					'relation' => 'OR', //сменить OR на AND для строго всех трех совпадение
					[
						'key'     => 'price_hour', // имя поля за час
						'value'   => array( $price_hour_min, $price_hour_max ),
						'type'    => 'numeric',
						'compare' => 'BETWEEN'
					],
					[
						'key'     => 'price_shift', // имя поля за смену
						'value'   => array( $price_shift_min, $price_shift_max ),
						'type'    => 'numeric',
						'compare' => 'BETWEEN'
					],
					[
						'key'     => 'price_day', //имя поля за день
						'value'   => array( $price_day_min, $price_day_max ),
						'type'    => 'numeric',
						'compare' => 'BETWEEN'
					],
				],
			);
	}

	
		

	$query = new WP_Query;
	$all_sidelki = $query->query($args);
	if( $all_sidelki){
		foreach( $all_sidelki as $sidelka ){
		wp_head;
		echo '<div class="sidelka__card">';
				echo '<div class="sidelka__img">';
					echo get_the_post_thumbnail( $sidelka->ID, 'thumbnail');
					echo '<div class="text-center">Рейтинг 4.9</div>';
					echo '<div class="sidelka__button">';
							echo '<a href="#popup_sidelka-'.$sidelka->ID.'" class="sidelka__btn popup">Заказать</a>';
					echo '</div>';
				echo '</div>';
				echo '<div class="sidelka__desc">';
					echo '<div class="sidelka__fio">'.the_title().'</div>';
					echo '<div class="sidelka__meta">';
						echo '<ul>';
						$posttags = get_the_tags($sidelka->ID);
							if( $posttags ){
								foreach( $posttags as $tag ){
								echo '<li>'. $tag->name. '</li>';
								} 
							}
						echo '</ul>';
					echo '</div>';
					echo '<div class="sidelka__param">';
						echo '<span class="sidelka__param-title">Клинический опыт  </span><span class="sidelka__param-dott"></span>';
						echo '<span class="sidelka__param-value"> ';
						the_field('klinicheskij_opyt', $sidelka->ID);
						echo' лет</span>';
					echo '</div>';
					echo '<div class="sidelka__param">';
						echo '<span class="sidelka__param-title">Цена за час  </span>';
						echo '<span class="sidelka__param-dott"></span><span class="sidelka__param-value">';
						the_field('price_hour', $sidelka->ID);
						echo ' руб.</span>';
					echo '</div>';
					echo '<div class="sidelka__param">';
						echo '<span class="sidelka__param-title">Цена за день  </span><span class="sidelka__param-dott"></span>';
						echo '<span class="sidelka__param-value">';
						the_field('price_day', $sidelka->ID);
						echo ' руб.</span>';
					echo '</div>';
					echo '<div class="sidelka__param">';
						echo '<span class="sidelka__param-title">Цена за смену  </span><span class="sidelka__param-dott"></span>';
						echo '<span class="sidelka__param-value">';
						the_field('price_shift', $sidelka->ID);
						echo ' руб.</span>';
					echo '</div>';
					echo '<div class="sidelka__excerpt">'. $sidelka->post_excerpt .'</div>';
				echo '</div>';
				echo ' <div class="linsid" style="display:none;">'.the_permalink().'</div>';
			echo '</div>';
			
	}
 
	} else {
		echo 'Ничего не найдено';
	}
	
	die();
}
