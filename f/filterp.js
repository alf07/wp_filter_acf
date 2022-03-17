(function($){
$(document).ready(function(){
$(".polzunok-5").slider({
    min: 0,
    max: 5000,
    values: [0, 5000],
    range: true,
    animate: "fast",
    slide : function(event, ui) {    
        $(".polzunok-input-5-left").val(ui.values[ 0 ]);   
        $(".polzunok-input-5-right").val(ui.values[ 1 ]);  
    }    
});
$(".polzunok-input-5-left").val($(".polzunok-5").slider("values", 0));
$(".polzunok-input-5-right").val($(".polzunok-5").slider("values", 1));
$(".polzunok-container-5 input").change(function() {
    var input_left = $(".polzunok-input-5-left").val().replace(/[^0-9]/g, ''),    
    opt_left = $(".polzunok-5").slider("option", "min"),
    where_right = $(".polzunok-5").slider("values", 1),
    input_right = $(".polzunok-input-5-right").val().replace(/[^0-9]/g, ''),    
    opt_right = $(".polzunok-5").slider("option", "max"),
    where_left = $(".polzunok-5").slider("values", 0); 
    if (input_left > where_right) { 
        input_left = where_right; 
    }
    if (input_left < opt_left) {
        input_left = opt_left; 
    }
    if (input_left == "") {
    input_left = 0;    
    }        
    if (input_right < where_left) { 
        input_right = where_left; 
    }
    if (input_right > opt_right) {
        input_right = opt_right; 
    }
    if (input_right == "") {
    input_right = 0;    
    }    
    $(".polzunok-input-5-left").val(input_left); 
    $(".polzunok-input-5-right").val(input_right); 
    if (input_left != where_left) {
        $(".polzunok-5").slider("values", 0, input_left);
    }
    if (input_right != where_right) {
        $(".polzunok-5").slider("values", 1, input_right);
    }
});
	});
})(jQuery);


(function($){
$(document).ready(function(){
$(".polzunok-1").slider({
    min: 0,
    max: 5000,
    values: [0, 5000],
    range: true,
    animate: "fast",
    slide : function(event, ui) {    
        $(".polzunok-input-1-left").val(ui.values[ 0 ]);   
        $(".polzunok-input-1-right").val(ui.values[ 1 ]);  
    }    
});
$(".polzunok-input-1-left").val($(".polzunok-1").slider("values", 0));
$(".polzunok-input-1-right").val($(".polzunok-1").slider("values", 1));
$(".polzunok-container-1 input").change(function() {
    var input_left1 = $(".polzunok-input-1-left").val().replace(/[^0-9]/g, ''),    
    opt_left1 = $(".polzunok-1").slider("option", "min"),
    where_right1 = $(".polzunok-1").slider("values", 1),
    input_right1 = $(".polzunok-input-1-right").val().replace(/[^0-9]/g, ''),    
    opt_right1 = $(".polzunok-1").slider("option", "max"),
    where_left1 = $(".polzunok-1").slider("values", 0); 
    if (input_left1 > where_right1) { 
        input_left1 = where_right1; 
    }
    if (input_left1 < opt_left1) {
        input_left1 = opt_left1; 
    }
    if (input_left1 == "") {
    input_left1 = 0;    
    }        
    if (input_right1 < where_left1) { 
        input_right1 = where_left1; 
    }
    if (input_right1 > opt_right1) {
        input_right1 = opt_right1; 
    }
    if (input_right1 == "") {
    input_right1 = 0;    
    }    
    $(".polzunok-input-1-left").val(input_left1); 
    $(".polzunok-input-1-right").val(input_right1); 
    if (input_left1 != where_left1) {
        $(".polzunok-1").slider("values", 0, input_left1);
    }
    if (input_right1 != where_right1) {
        $(".polzunok-1").slider("values", 1, input_right1);
    }
});
	});
})(jQuery);


(function($){
$(document).ready(function(){
$(".polzunok-2").slider({
    min: 0,
    max: 5000,
    values: [0, 5000],
    range: true,
    animate: "fast",
    slide : function(event, ui) {    
        $(".polzunok-input-2-left").val(ui.values[ 0 ]);   
        $(".polzunok-input-2-right").val(ui.values[ 1 ]);  
    }    
});
$(".polzunok-input-2-left").val($(".polzunok-2").slider("values", 0));
$(".polzunok-input-2-right").val($(".polzunok-2").slider("values", 1));
$(".polzunok-container-2 input").change(function() {
    var input_left2 = $(".polzunok-input-2-left").val().replace(/[^0-9]/g, ''),    
    opt_left2 = $(".polzunok-2").slider("option", "min"),
    where_right2 = $(".polzunok-2").slider("values", 1),
    input_right2 = $(".polzunok-input-2-right").val().replace(/[^0-9]/g, ''),    
    opt_right2 = $(".polzunok-2").slider("option", "max"),
    where_left2 = $(".polzunok-2").slider("values", 0); 
    if (input_left2 > where_right2) { 
        input_left2 = where_right2; 
    }
    if (input_left2 < opt_left2) {
        input_left2 = opt_left2; 
    }
    if (input_left2 == "") {
    input_left2 = 0;    
    }        
    if (input_right2 < where_left2) { 
        input_right2 = where_left2; 
    }
    if (input_right2 > opt_right2) {
        input_right2 = opt_right2; 
    }
    if (input_right2 == "") {
    input_right2 = 0;    
    }    
    $(".polzunok-input-2-left").val(input_left2); 
    $(".polzunok-input-2-right").val(input_right2); 
    if (input_left2 != where_left2) {
        $(".polzunok-2").slider("values", 0, input_left2);
    }
    if (input_right2 != where_right2) {
        $(".polzunok-2").slider("values", 1, input_right2);
    }
});
	});
})(jQuery);
