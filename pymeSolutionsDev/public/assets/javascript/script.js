$(document).ready(function () {
	$('INV_Categoria_IDCategoriaPadre').on('change', function() {
		var el = $(this);
		console.log(1)
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
		$(this).parent().remove();
		var values = $('.list-group li').map(function(i, el) {
			return $(el).text();
		}).toArray().join(';');

		$('.value-list-array').val(values);
		ev.preventDefault();
	});

	// ------------------------ Campo Local Productos

	$('.input-campo-local').on('blur', function(){
		$.post('/Inventario/Productos/campolocalsave',{
			'nombre': $('.input-campo-local').attr('id'),
			'valor': $('.input-campo-local').val(),
			'codigoprod': $("input[name=INV_Producto_ID]").val()
		}).success(function(data){
			console.log(data);
		});
	});

	// ------------------------ Campo Local Proveedor
	$('.input-campo-local').on('blur', function(){
		$.post('/Inventario/Proveedor/campolocalsave',{
			'nombre': $('.input-campo-local').attr('id'),
			'valor': $('.input-campo-local').val(),
			'codigoprod': $("input[name=INV_Proveedor_ID]").val()
		}).success(function(data){
			console.log(data);
		});
	});
});