$(document).ready(function () {

	actualizarTotales();

	//Busqueda por AJAX
	$('.agregar-producto').on('click',function(){
		$.post("/Inventario/Productos/", {
			"searchTerm" : $('.agregar-producto').val()
		}).success(function(data){
			var new_tbody = document.createElement('tbody');
			//Enchutar las cosas que vienen de data
			$('#product-body').html(new_tbody);
		});
	});

	//Seleccionador
	$('.table').on('click', 'tbody tr', function(event) {
    	$(this).addClass('highlight').siblings().removeClass('highlight');
	});

	//Elimina todos los articulos de la venta
	$('.cancel-venta').on('click',function(){
		var new_tbody = document.createElement('tbody');
		$('tbody.pro-list').html(new_tbody);
		actualizarTotales();
	});

	//Eliminar producto seleccionado
	$('.eliminar-prod').on('click',function(){
		$("tbody.pro-list tr.highlight").remove();
		actualizarTotales();
	}); 

	//Editar cantidad de Productos
	$('.editar-prod').on('click', function(){
		var content = $("tbody.pro-list tr.highlight").find('.cantidad').text();
		$("tbody.pro-list tr.highlight").find('.cantidad').text('');
		$("tbody.pro-list tr.highlight").find('.cantidad').append($('<input>', {
			'class': 'edit-cant',
			'value': content
		}));
		$("tbody.pro-list tr.highlight").find('.edit-cant').focus();
	});

	$('.table').on('blur', '.edit-cant', function(){
		var content = $("tbody.pro-list tr.highlight").find('.edit-cant').val();
		$("tbody.pro-list tr.highlight").find('.cantidad').text(content);
		var newTotal = content * (($("tbody.pro-list tr.highlight").find('.precio').text()).substring(5));
		$("tbody.pro-list tr.highlight").find('.total-art').text("Lps. " + newTotal);
		actualizarTotales();
	});
	
	//Agregar producto
	$('.agregar-producto').on('click',function(){
		var row = $("tbody.pro-search tr.highlight").clone();
		var precioTd = row.find('.precio');
		var precio = precioTd.text()
		precioTd.text('Lps. ' + precio);
		row.append($('<td>', {
			'text': 1,
			'class': 'cantidad'
		}));

		row.append($('<td>', {
			'class': 'total-art',
			'text': 'Lps. ' + precio
		}));

		row.removeClass('highlight');

		$('.pro-list').append(row);

		row.find('td').first().text(row.index() + 1);

		$('#agregarProducto').modal('hide');

		actualizarTotales();
	});

	//Actualiza los totales 
	function actualizarTotales(){
		var table = document.getElementById('pro-list-table');
		var subtotal = 0;
		var rowLength = table.rows.length;

		for(var i=1; i<rowLength; i+=1){
			var row = table.rows[i];
			var subtotaltext = (row.cells[5]).innerText;
			subtotal += (parseFloat(subtotaltext.substring(5)));
		}

		$('.sub-total').text("Lps. " + subtotal.toFixed(2));
		$('.isv').text("Lps. " + (subtotal * 0.15).toFixed(2));
		$('.grand-total').text("Lps. " + (subtotal * (1.15)).toFixed(2));
	}

});

