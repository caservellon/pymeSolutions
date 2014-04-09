$(document).ready(function () {
	$("a.local-field-btn").on("click",function(){	
	});
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