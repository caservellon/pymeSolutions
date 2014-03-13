$(document).ready(function () {
	$("a.local-field-btn").on("click",function(){
		
	});

	$("div.campo-local-tipo").change(function() {
		if($(this).find("select").val() === "LIST"){
			$("div.value-list").fadeIn();
		} else {
			$("div.value-list").fadeOut();
			$(".value-input").val(""); 
		}
		
	});

	$(".add-value").click(function() {
		if ($(".value-input").val() === "") {
			alert("hola");
		} else {
			alert("neles");
		}
	});
});