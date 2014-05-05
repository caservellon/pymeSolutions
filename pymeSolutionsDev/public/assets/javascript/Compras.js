function alerta(){
		alert("hola mundo");
	}
var seleccionado = 1;
	
function muestra(valor){
	if(seleccionado==null){
		seleccionado=1;
	}
	document.getElementById(seleccionado).style.backgroundColor='white';
   seleccionado=valor;
   document.getElementById(valor).style.backgroundColor='rgba(0,50,100,0.6)';
}
function CambiarCantidad(){
	if(seleccionado==null){
		seleccionado=1;
	}
	document.getElementById('total'+seleccionado).value=document.getElementById('precio'+seleccionado).value*document.getElementById('Ccantidad').value;
	document.getElementById('cantidad'+seleccionado).value=document.getElementById('Ccantidad').value;
	valor=document.forms[0];
	valor.elements[(seleccionado*7)-2].value=document.getElementById('cantidad'+seleccionado).value;
	valor.elements[(seleccionado*7)].value=document.getElementById('total'+seleccionado).value;
	
	

}
function mostrarVentana()
{
    var ventana = document.getElementById('miVentana');
    ventana.style.marginTop = "100px";
    ventana.style.left = ((document.body.clientWidth-350) / 2) +  "px";
	ventana.style.backgroundColor=' rgba(0,0,0,0.6)';
    ventana.style.display = 'block';
}
function ocultarVentana(elementos)
{	
	CambiarCantidad();
	subTotal(elementos);
	impuesto();
	total();
    var ventana = document.getElementById('miVentana');
    ventana.style.display = 'none';
}
function subTotal(size){
	var sum=0;
	for(var i=1;i<size;i++){
		sum+=parseFloat(document.getElementById('total'+i).value);
	}
	document.getElementById('subtotal').value=sum;
	
}
function impuesto(){
	var imp=parseFloat(document.getElementById('subtotal').value*0.15);
	document.getElementById('isv').value=imp.toFixed(2);
	
}
function total(){
	var total=parseFloat(document.getElementById('subtotal').value)+parseFloat(document.getElementById('isv').value);
	document.getElementById('total').value=total.toFixed(2);
	
}
function getSeleccion(){
	return seleccionado;
}
