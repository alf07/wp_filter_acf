
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
 
	$price_hour_min = $_POST[ 'cena_min' ];
	$price_hour_max = $_POST[ 'cena_max' ];
	var_dump($price_hour_min);
	var_dump($price_hour_max);
		
	$args = array(
		'post_type' => 'sidelki',
		'meta_query' => [
			[
				'key'     => 'price_hour',
				'value'   => array( $price_hour_min, $price_hour_max ),
				'type'    => 'numeric',
				'compare' => 'BETWEEN'
			]
		]
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
