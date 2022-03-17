//подключение скриптов и обработчик фильтра
add_action( 'wp_enqueue_scripts', 'f_jquery_scripts' );
function f_jquery_scripts() {
 
	wp_enqueue_script( 'jquery' );
 
	wp_register_script( 'filter', get_stylesheet_directory_uri() . '/f/filterp.js', array( 'jquery' ), time(), true );
	wp_enqueue_script( 'filter' );
	wp_register_script( 'jquery-ui', get_stylesheet_directory_uri() . '/f/jquery-ui.min.js', array( 'jquery' ), time(), true );
	wp_enqueue_script( 'jquery-ui' );
	wp_register_script( 'jquery.ui.touch-punch', get_stylesheet_directory_uri() . '/f/jquery.ui.touch-punch.min.js', array( 'jquery' ), time(), true );
	wp_enqueue_script( 'jquery.ui.touch-punch' );
 
}
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
	//Теги
	$all_tags[] = $_POST[ 'tags' ];
	//var_dump($all_tags);
	//Теги
	
		
	$args = array(
		'post_type' => 'sidelki', // таксокомия
		'meta_query' => [
			'relation' => 'AND', //сменить OR на AND для строго всех трех совпадение
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
			//[
			//	'taxonomy' => 'post_tag',
            //	'field' => 'slug',
            //	'terms' => $all_tags,
			//]
		],
		
	);
	$query = new WP_Query;
	$all_sidelki = $query->query($args);
	if( $all_sidelki){
		foreach( $all_sidelki as $sidelka ){
		echo '<p>'. $sidelka->post_title .'</p>';
	}
 
	} else {
		echo 'Ничего не найдено';
	}
	
	die();
}
