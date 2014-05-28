var seleccionado = 1;
var existentes = [];
	
function setExistentes(size){
	var m=size.valueOf();
	
	for (j=1; j < parseInt(m); j++) {
		existentes.push(j);
   }
}
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
	var can=encuentraElemento(valor,'cantidad');
	if(can!=-1){
		valor.elements[can].value=document.getElementById('cantidad'+seleccionado).value;
	}
	var tot=encuentraElemento(valor,'total');
	if(tot!=-1){
		valor.elements[(tot)].value=document.getElementById('total'+seleccionado).value;
	}
}
//funcion para encontrar el elemento solicitado
function encuentraElemento(formulario,nombre){
var encontrado=0;
	for(var i=1; i<formulario.length;i++){
		if(formulario.elements[i].name === nombre+seleccionado){
			return i;
		}
	}
	return -1;
}
function encuentraOtros(formulario,nombre){
var encontrado=0;
	for(var i=1; i<formulario.length;i++){
		if(formulario.elements[i].name === nombre){
			return i;
		}
	}
	return -1;
}
function mostrarVentana()
{
    var ventana = document.getElementById('miVentana');
    ventana.style.marginTop = "100px";
    ventana.style.left = ((document.body.clientWidth-350) / 2) +  "px";
	ventana.style.backgroundColor=' rgba(0,0,0,0.6)';
    ventana.style.display = 'block';
}
function ocultarVentana()
{	
	CambiarCantidad();
	subTotal();
	impuesto();
	total();
    var ventana = document.getElementById('miVentana');
    ventana.style.display = 'none';
}
function subTotal(){
	var sum=0;
	for (var i=0;i<existentes.length;i++){
		var t=existentes[i];
		if(t){sum+=parseFloat(document.getElementById('total'+t).value);}
	}
	document.getElementById('subtotal').value=sum;
	
}
function impuesto(){
	valor=document.forms[0];
	var toge=encuentraOtros(valor,'pISV');
	var imp=parseFloat(document.getElementById('subtotal').value*(valor.elements[toge].value/100));
	document.getElementById('isv').value=imp.toFixed(2);
	
}
function total(){
	var total=parseFloat(document.getElementById('subtotal').value)+parseFloat(document.getElementById('isv').value);
	document.getElementById('total').value=total.toFixed(2);
	valor=document.forms[0];
	var toge=encuentraOtros(valor,'totalGeneral');
	if(toge!=-1){
		valor.elements[toge].value=total.toFixed(2);
	}
}
function getSeleccion(){
	return seleccionado;
}

function eliminar(){
	var borrar = document.getElementById(seleccionado);
	var padre = borrar.parentNode;
	var inx=existentes.indexOf(parseInt(seleccionado));
	if(inx!=-1){
		padre.removeChild(borrar);
		existentes.splice(inx,1);
		seleccionado=existentes[0];
		document.getElementById(seleccionado).style.backgroundColor='rgba(0,50,100,0.6)';
	}	
	subTotal();
	impuesto();
	total();
}
function mostrarVentanaISV()
{
    var ventana = document.getElementById('Porcentaje');
    ventana.style.marginTop = "100px";
    ventana.style.left = ((document.body.clientWidth-350) / 2) +  "px";
	ventana.style.backgroundColor=' rgba(0,0,0,0.6)';
    ventana.style.display = 'block';
}
function ocultarVentanaISV()
{	
	
	impuesto();
	total();
    var ventana = document.getElementById('Porcentaje');
    ventana.style.display = 'none';
}


//Funciones para Cotizacion

function IndiceElemento(Formulario, NombreElemento){
	for(var i = 0; i < Formulario.length; i++){
		if(Formulario.elements[i].name === NombreElemento){
			return i;
		}
	}
	return -1;
}

function AsignarTotales(NombreCampo, Valor){
	Formulario = document.forms[0];
	
	if(NombreCampo != "ImpuestoCotizacion"){
		var IndiceCampo = IndiceElemento(Formulario, NombreCampo);
		var NombreCampoTotal = "Total" + NombreCampo;
		var IndiceCampoTotal = IndiceElemento(Formulario, NombreCampoTotal);
		var Total = Formulario.elements[IndiceCampo].value * Valor;
	
		Total = Total.toFixed(2);
		Total = Total.replace(/\B(?=(\d{3})+(?!\d))/g, ",")
		Formulario.elements[IndiceCampoTotal].value = Total;
	}
	
	var NombreCampoTotalFinal = "TotalFinal";
	var IndiceCampoTotalFinal = IndiceElemento(Formulario, NombreCampoTotalFinal);
	var NombreCampo;
	var ValorCampo;
	var TotalFinal = 0;
	
	for(var i = 0; i < Formulario.length; i++){
		NombreCampo = Formulario.elements[i].name;
		
		if((NombreCampo.match("Total.") != null || NombreCampo == "ImpuestoCotizacion") && NombreCampo != NombreCampoTotalFinal){
			IndiceCampo = IndiceElemento(Formulario, NombreCampo);
			ValorCampo = Formulario.elements[IndiceCampo].value;
			TotalFinal += Number(ValorCampo.replace(",", ""));
		}
	}
	
	TotalFinal = TotalFinal.toFixed(2);
	TotalFinal = TotalFinal.replace(/\B(?=(\d{3})+(?!\d))/g, ",");
	Formulario.elements[IndiceCampoTotalFinal].value = TotalFinal;
}
