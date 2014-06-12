$(document).ready(function(){
	// ---------------- Seguridad -------------------

	if($('.cambio-view').length){
       $('#NuevaContrasena').pwstrength();
    };

	// ---------------- Devoluciones ------------------------------

	// POST busca factura y devuelve items
	$('.no-fact-accept').on('click',function(){
		var new_tbody = document.createElement('tbody');
		$('#detalle-factura > tbody').html(new_tbody);
		$.post('/Ventas/Ventas/searchInvoice' ,{
			'searchTerm' : $('.no-factura').val()
		}).success(function(data){
			$("div.alert").hide();
			 $.each(data, function(index, value){
				$('#detalle-factura > tbody:last').append('<tr><td><input type="checkbox" class="check"></td><td class="codigo">'+value["VEN_DetalleDeVenta_Codigo"]+'</td><td>'+value["VEN_DetalleDeVenta_Nombre"]+'</td><td>'+value["VEN_DetalleDeVenta_PrecioVenta"]+'</td><td><input type="number" class="quantity" min="1" max="'+value["VEN_DetalleDeVenta_CantidadVendida"]+'" > / <span class=\"Maxtop\">'+value["VEN_DetalleDeVenta_CantidadVendida"]+'</span></td><td>'+(value["VEN_DetalleDeVenta_CantidadVendida"] * value["VEN_DetalleDeVenta_PrecioVenta"])+'</td></tr>');		
			 });
		}).fail(function(data){
			$("div.alert").html("<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">×</button><h4>No se encontró la factura!</h4>");
			$("div.alert").show();
		});
	});

	// POST get selected and quantity
	$('.crear-devolucion').on('click', function(){
		devolver = [];
		if($('.productos-dev input:checked').length == 0){
			$('div.alert').html("<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">×</button><h4>No se seleccionó ninguna devolución!</h4>");
			$('div.alert').show();
		} else {
			$('div.alert').hide();
		}
		$('.productos-dev input:checked').parents('tr').map(function(i, producto) {
		    var td = $(producto).find('td');
		    var codigo = td.eq(1).text();
		    var cantidad = td.eq(4).find('.quantity').val();
		   	var top = td.eq(4).find('.Maxtop').val();
		   	if(cantidad < top ){
		   		$("div.alert").html("<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">×</button><h4>No puede exceder las cantidades!</h4>");
		   		$("div.alert").show();
		   	} else if(cantidad === ""){
		   		$("div.alert").html("<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">×</button><h4>No puede dejar vacias las cantidades!</h4>");
		   		$("div.alert").show();
		   	} else {
		   		$("div.alert").hide();
			    devolver.push({
			        codigo: codigo,
			        cantidad: cantidad
			    });	   		
		   	}
		});

		$.post('/Ventas/Devoluciones/process', {
			'data' : devolver,
			'no-factura' : $('.no-factura').val()
		}).success(function(data){
			$('#resultadoDevolucion').modal('show');
			$('.bono-compra').hide();
			$.each(data, function(key, value){
				$.each(value, function(keyin, valuein){
					if ($.isNumeric(keyin)) {
						if (keyin == "BonoCompraCantidad") {
							$('.cantidad-bc').text('Lps. ' + valuein);
							$('.bono-compra').show();
						}
						if (keyin == "BonoCompraCodigo") {
							$('.codigo-bc').text(valuein);
						};
					} else {
						$('#detalle-devolucion > tbody:last').append('<tr><td>'+keyin+'</td><td>'+valuein+'</td></tr>');
						
					}

				});
			});

		});
	});

	// POST busca si hay articulos
	$('#detalle-factura').on('click','button', function(){
		var stock = $(this).closest("tr").find(".codigo").text();
		$.post('/Ventas/Ventas/checkStock', {
			'codigo' : stock
		}).success(function(data){
			console.log(data);

		});
	});


	// ---------------- Caja de Venta - POS ------------------------------

	if($('#pro-list-table').length){
        actualizarTotales();
    };

    $('.search-cliente').on('click', function(){
    	if($('.cliente').val() !==  ""){
			if ($('.Tipo_de_Cliente').val() == '0') {
				$.post('/CRM/Personas/buscar',
{					'name' : $('.cliente').val()
				}).success(function(data){
					console.log(data);
					$.each(data, function(i, value){
						$('.clientes-buscados-list').append('<tr><td>'+value['CRM_Personas_ID']+'</td><td>'+value['CRM_Personas_Nombres']+'</td><td>'+value['CRM_Personas_Apellidos']+'</td></tr>');
					});
				}).fail(function(data) {
					//TODO: Mensaje de no encontrado
				});
			} else {
				$.post('/CRM/Empresas/buscar',{
					'name' : $('.cliente').val()
				}).success(function(data){
					$.each(data, function(i, value){
						$('.clientes-buscados-list').append('<tr><td>'+value['CRM_Empresas_ID']+'</td><td>'+value['CRM_Empresas_Nombre']+'</td><td>'+value['CRM_Empresas_Codigo']+'</td></tr>');
					});
				}).fail(function (data) {

				});
			};

			$('#buscarCliente').modal('show');
		} else {
			if ($('.Tipo_de_Cliente').val() == '0') {
				$.post('/CRM/Personas/buscar',
{					'name' : ""
				}).success(function(data){
					console.log(data);
					$.each(data, function(i, value){
						$('.clientes-buscados-list').append('<tr><td>'+value['CRM_Personas_ID']+'</td><td>'+value['CRM_Personas_Nombres']+'</td><td>'+value['CRM_Personas_Apellidos']+'</td></tr>');
					});
				}).fail(function(data) {
					//TODO: Mensaje de no encontrado
				});
			} else {
				$.post('/CRM/Empresas/buscar',{
					'name' : $('.cliente').val()
				}).success(function(data){
					$.each(data, function(i, value){
						$('.clientes-buscados-list').append('<tr><td>'+value['CRM_Empresas_ID']+'</td><td>'+value['CRM_Empresas_Nombre']+'</td><td>'+value['CRM_Empresas_Codigo']+'</td></tr>');
					});
				}).fail(function (data) {

				});
			};

			$('#buscarCliente').modal('show');
		}
	});

	$('.agregar-cliente-sel').on('click', function(){
		var nodoCliente = $("tbody.clientes-buscados-list tr.highlight");
		var cliente = nodoCliente.find('td:eq(1)').text() + " " +nodoCliente.find('td:eq(2)').text();
		$('.id-cliente-buscado').val(nodoCliente.find('td:eq(0)').text());
		$('.cliente').val(cliente);
		$('#buscarCliente').modal('hide');
	});

	if($('#pro-list-table').length){
        actualizarTotales();
        $('#no-valido').hide();
 		$('#valido').hide();
 		$('#no-existe').hide();
    }

    //Bono de Compra
    $('.add-bono-modal-bt').on('click', function(){
    	$('#agregarPago').modal('hide');
    	$('#agregarBono').modal('show');
    });

    $('.cerrar-bono-modal').on('click', function(){
    	$('#agregarPago').modal('show');
    	$('#agregarBono').modal('hide');	
    });

    $('.veri-bono').on('click', function(){
    	$('#no-valido').hide();
 		$('#valido').hide();
 		$('#no-existe').hide();
 		console.log($('.bono-compra-tb').val());
    	$.post('/Ventas/BonoDeCompras/validar',{
    		'bono':$('.bono-compra-tb').val()
    	}).success(function(data){
    		if (data == 'vigente') {
    			$('#valido').show();
    			$.post('/Ventas/BonoDeCompras/valor',{
    				'bono': $('.bono-compra-tb').val()
    			}).success(function(pago){
    				pago = parseFloat(pago);
					pago = 'Lps. ' + pago;
					$('.pagos-list').append('<tr><td>Bono de Compra</td><td>'+pago+'</td></tr>');
					actualizarPagos();
    				actualizarTotales();
    			});
    			

    		};
    		if (data == 'vencido') {
    			$('#no-valido').hide();
    		};

    		if (data == 'canjeado') {
    			$('#no-valido').hide();

    		};
    	}).fail(function(data){
    		$('#no-existe').show();
    		$('.bono-compra-tb').val("");

    	});
    });

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

	//Mandar todo pa-tras
	$('.guardar-compra').on('click',function(){

		var data = {};

		data.productos = [];

		$('.pro-list tr').each(function(i, producto) {
		    var td = $(producto).find('td');
		    var codigo = td.eq(1).text();
		    var cantidad = td.eq(4).text();

		    data.productos.push({
		        codigo: codigo,
		        cantidad: cantidad
		    });
		});

		data.descuentos = [];

		$('.descuento-add input:checked').parents('tr').map(function(i, descuento) {
		    var id = $(descuento).find('td:eq(1)').text();
		    data.descuentos.push(id);
		});

		data.abonos = [];

		$('.pagos-list').find('tr').each(function(i, abono){
			//console.log("dafsdafdfS", abono);
			data.abonos.push({
				metodo: $(abono).find('td:eq(0)').text(),
				monto: $(abono).find('td:eq(1)').text().substring(5)
			});
		});

		data.isv = $('.isv').text().substring(5);

		data.saldo = $('.saldo-info').text().substring(5);

		data.tipocliente = $('.Tipo_de_Cliente').val();

		data.cliente = $('.cliente').val();

		data.total = $('.grand-total').text().substring(5);
		data.clienteid = $('.id-cliente-buscado').val();
		data.caja = '1';

		console.log(data);

		$.post("/Ventas/Ventas/guardar", data).success(function(data){
			$('.num-factura').text(data[0].numFact);
			console.log(data[0].numFact);
			window.print();
		});
	});

	//Seleccionador
	$('.selectable').on('click', 'tbody tr', function(event) {
    	$(this).addClass('highlight').siblings().removeClass('highlight');
	});

	//Elimina todos los articulos de la venta
	$('.cancel-venta').on('click',function(){
		var new_tbody = document.createElement('tbody');
		$('tbody.pro-list').html(new_tbody);
		actualizarTotales();
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

	/*// ------------------------ Campo Local Proveedor
	$('#INV_Proveedor_Nombre').on('blur', function(){
		$.post('/Inventario/Proveedor/campolocalsave',{
			'valor': $('#INV_Proveedor_Nombre').val(),
			alert('HOLIXXX');
		}).success(function(data){
			console.log(data);
		});
	});*/

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
		$.post('/Ventas/Ventas/checkStock', {
 			'codigo': $("tbody.pro-list tr.highlight").find('.cod').text()
 		}).success(function(data){
 			if (data == 0) {
 				$("tbody.pro-list tr.highlight").find('.nombre').append('<spam class="glyphicon glyphicon-remove"></spam>');
 			};
 			if (data < 5) {
 				$("tbody.pro-list tr.highlight").find('.nombre').append('<spam class="glyphicon glyphicon-info-sign"></spam>');
 			};
 		});
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

	//Agregar Pago
	$('.add-pago-modal-bt').on('click',function(){
		var pago = $('.ammount-pago').val();
		if(!isNaN(pago)){
			pago = parseFloat(pago);
			pago = 'Lps. ' + pago;
			$('.pagos-list').append('<tr><td>Efectivo</td><td>'+pago+'</td></tr>');
			actualizarPagos();
		} else {
			$('.ammount-pago').val("");
		}
	});

	//Setear Descuentos
	$('.agregar-descuento').on('click',function(){
		
		$('.descuento-add input:checked').parents('tr').map(function(i, descuento) {
		    var cantidad = $(descuento).find('td:eq(4)').text();
		    cantidad = cantidad/100;
		    var subtotal = $('.sub-total').text();
		    subtotal = parseFloat(subtotal.substring(5));
		    var descuento = subtotal*cantidad;
		    var isv = (subtotal - descuento)* 0.15;
		    var totallyTotalBro = (subtotal - descuento) + isv;
		    $('.descuento').text("Lps. " + descuento.toFixed(2));
			$('.sub-total').text("Lps. " + subtotal.toFixed(2));
			$('.isv').text("Lps. " + isv.toFixed(2));
			$('.grand-total').text("Lps. " + totallyTotalBro.toFixed(2));
			var abonado = parseFloat($('.abonado-info').text().substring(5));

			$('.saldo-info').text("Lps. " + (totallyTotalBro - abonado).toFixed(2));
		});
		$('#agregarDescuento').modal('hide');
	});


	//precio 
	$("div.precio-costo-producto").change(function() {
		if($(this).find("select").val() === "2"){
			$("div.agregar-precio").fadeIn();
		} else {
			$("div.agregar-precio").fadeOut();
			$(".value-input").val(""); 
		}
	});


	//Selectores para Tipos de Documento
	$('select#CRM_TipoDocumento_CRM_TipoDocumento_ID').on('click', function() {
		$('input#CRM_Personas_codigo').prop('placeholder',$('input#' + $('select#CRM_TipoDocumento_CRM_TipoDocumento_ID option:selected').val()).first().prop('name'));
		$('input#CRM_Personas_codigo').prop('maxlength',$('input#' + $('select#CRM_TipoDocumento_CRM_TipoDocumento_ID option:selected').val()).first().attr('data-val'));
    });

    $('select#CRM_TipoDocumento_CRM_TipoDocumento_ID').on('click', function() {
		$('input#CRM_Empresas_Codigo').prop('placeholder',$('input#' + $('select#CRM_TipoDocumento_CRM_TipoDocumento_ID option:selected').val()).first().prop('name'));
		$('input#CRM_Empresas_Codigo').prop('maxlength',$('input#' + $('select#CRM_TipoDocumento_CRM_TipoDocumento_ID option:selected').val()).first().attr('data-val'));
    });


	//Actualiza los totales
	function actualizarPagos(){
		var table = document.getElementById('pagos-tabla');
		var pagos = 0;
		var rowLength = table.rows.length;

		for(var i=1; i<rowLength; i+=1){
			var row = table.rows[i];
			var subtotaltext = (row.cells[1]).innerText;
			pagos += (parseFloat(subtotaltext.substring(5)));
		}

		$('.abonado-info').text("Lps. " + pagos.toFixed(2));
		var saldo = $('.grand-total').text();
		$('.saldo-info').text("Lps. " + (parseFloat(saldo.substring(5)) - pagos).toFixed(2));
	}

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
		actualizarPagos();
	}

	$('#VEN_DescuentoEspecial_FechaInicio').appendDtpicker({
		"onShow": function(handler){
			
		},
		"onHide": function(handler){
			
		}
	});

	$('#VEN_DescuentoEspecial_FechaFinal').appendDtpicker({
		"onShow": function(handler){
			
		},
		"onHide": function(handler){
			
		}
	});

	function setearTotalcc(valor,x){
	    var a= valor.elements[x].value;
	    var b=valor.elements[x+1].value;
	    var c=valor.elements[x+2].value;
	    var total=(a*b);
	    valor.elements[x+2].value=total;
	    document.getElementById("total").value-=c;
	    document.getElementById("total").value= parseFloat(document.getElementById("total").value) + parseFloat(total);
	    valor.elements[valor.length-3].value=document.getElementById("total").value;
	}

	function setearTotalcp(valor,x){
	    var a= valor.elements[x-1].value;
	    var b=valor.elements[x].value;
	    var c=valor.elements[x+1].value;
	    var total=(a*b);
	    valor.elements[x+1].value=total;
	    document.getElementById("total").value-=c;
	    document.getElementById("total").value= parseFloat(document.getElementById("total").value) + parseFloat(total);
	    valor.elements[valor.length-3].value=document.getElementById("total").value;

    }

    // ----------------------------- Inventario

    if($('.detalle-movi').length){
    	$('#FechaInc').appendDtpicker();

		$('#FechaFin').appendDtpicker();
    }

    if($('#p2p-view').length){
    	$(function(){
		    $('select').combobox();
		    if($('#f2p-view').length){
		    	$("#INV_FormaPago_Nombre").combobox("destroy");
		    	$("#INV_Proveedor_Nombre").combobox({
	            	selected: function (event, ui) {
	                	$.post("/Inventario/Proveedor/FDP", {
							"id" : $( "#INV_Proveedor_Nombre option:selected" ).val()
						}).success(function(data){
							var s = document.getElementById('INV_FormaPago_Nombre');
							while (s.firstChild) {
							    s.removeChild(s.firstChild);
							}

							$.each(data, function(i, value){
								var t = document.createElement("option")
							   	t.value = value;
							   	t.textContent = value;
							   	s.appendChild(t)
							});
						});
	            	}
       		 	});
    		}
		});

		(function ($) {
        $.widget("ui.combobox", {
            _create: function () {
                var input,
                  that = this,
                  wasOpen = false,
                  select = this.element.hide(),
                  selected = select.children(":selected"),
                  defaultValue = selected.text() || "",
                  wrapper = this.wrapper = $("<span>")
                    .addClass("ui-combobox")
                    .insertAfter(select);

                function removeIfInvalid(element) {
                    var value = $(element).val(),
                      matcher = new RegExp("^" + $.ui.autocomplete.escapeRegex(value) + "$", "i"),
                      valid = false;
                    select.children("option").each(function () {
                        if ($(this).text().match(matcher)) {
                            this.selected = valid = true;
                            return false;
                        }
                    });

                    if (!valid) {
                        // remove invalid value, as it didn't match anything
                        $(element).val(defaultValue);
                        select.val(defaultValue);
                        input.data("ui-autocomplete").term = "";
                    }
                }

                input = $("<input>")
                  .appendTo(wrapper)
                  .val(defaultValue)
                  .attr("title", "")
                  .addClass("ui-state-default ui-combobox-input")
                  .width(select.width())
                  .autocomplete({
                      delay: 0,
                      minLength: 0,
                      autoFocus: true,
                      source: function (request, response) {
                          var matcher = new RegExp($.ui.autocomplete.escapeRegex(request.term), "i");
                          response(select.children("option").map(function () {
                              var text = $(this).text();
                              if (this.value && (!request.term || matcher.test(text)))
                                  return {
                                      label: text.replace(
                                        new RegExp(
                                          "(?![^&;]+;)(?!<[^<>]*)(" +
                                          $.ui.autocomplete.escapeRegex(request.term) +
                                          ")(?![^<>]*>)(?![^&;]+;)", "gi"
                                        ), "<strong>$1</strong>"),
                                      value: text,
                                      option: this
                                  };
                          }));
                      },
                      select: function (event, ui) {
                          ui.item.option.selected = true;
                          that._trigger("selected", event, {
                              item: ui.item.option
                          });
                      },
                      change: function (event, ui) {
                          if (!ui.item) {
                              removeIfInvalid(this);
                          }
                      }
                  })
                  .addClass("ui-widget ui-widget-content ui-corner-left");

                input.data("ui-autocomplete")._renderItem = function (ul, item) {
                    return $("<li>")
                      .append("<a>" + item.label + "</a>")
                      .appendTo(ul);
                };

                $("<a>")
                  .attr("tabIndex", -1)
                  .appendTo(wrapper)
                  .button({
                      icons: {
                          primary: "ui-icon-triangle-1-s"
                      },
                      text: false
                  })
                  .removeClass("ui-corner-all")
                  .addClass("ui-corner-right ui-combobox-toggle")
                  .mousedown(function () {
                      wasOpen = input.autocomplete("widget").is(":visible");
                  })
                  .click(function () {
                      input.focus();

                      // close if already visible
                      if (wasOpen) {
                          return;
                      }

                      // pass empty string as value to search for, displaying all results
                      input.autocomplete("search", "");
                  });
            },

            _destroy: function () {
                this.wrapper.remove();
                this.element.show();
            }
        });
    })(jQuery);
	};
        
        //compras
        $('.imprimir-solicitud').on('click', function(){
            window.print();
        });



});
