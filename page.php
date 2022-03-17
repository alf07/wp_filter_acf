<form action="" method="POST" id="filter">	 
	<div class="polzunok-container-5">
		<input type="text" name="cena_min" class="polzunok-input-5-left" />
		<input type="text" name="cena_max" class="polzunok-input-5-right "/>
		<div class="polzunok-5"></div>
	</div>

	<button>Применить фильтр</button><input type="hidden" name="action" value="myfilter">
</form>
<div id="response"><!-- тут фактически можете вывести посты без фильтрации --></div>

<script>
jQuery( function( $ ){
	$( '#filter' ).submit(function(){
		var filter = $(this);
		$.ajax({
			url : '<?php echo admin_url( "admin-ajax.php" ) ?>', // обработчик
			data : filter.serialize(), // данные
			type : 'POST', // тип запроса
			beforeSend : function( xhr ){
				filter.find( 'button' ).text( 'Загружаю...' ); // изменяем текст кнопки
				console.log(filter);
			},
			success : function( data ){
				filter.find( 'button' ).text( 'Применить фильтр' ); // возвращаеи текст кнопки
				$( '#response' ).html(data);
				
			}
		});
		return false;
	});
});
</script>
