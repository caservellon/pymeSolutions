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

	$(".add-value").click(function(ev) {
		var input = $('.value-input');
		if (input.val() === "" || input.val().indexOf(';') !== -1) {
			input.val('');
			input.focus();
			return false;
		}

		$("ul.list-group").append("<li class=\"list-group-item\">" + input.val() + "<button class=\"btn btn-danger pull-right\"><span class=\"glyphicon glyphicon-minus\"></span></button></li>");
		input.val('');
		input.focus();

		var values = $('.list-group li').map(function(i, el) {
			return $(el).text();
		}).toArray().join(';');

		$('.value-list-array').val(values);
		ev.preventDefault();
	});

	$(".list-group").on('click', '.list-group-item button', function(ev) {
		//console.log(this);
		$(this).parent().remove();
		ev.preventDefault();
	});
});