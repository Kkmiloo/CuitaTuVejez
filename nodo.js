(function(){

var alertaElement1 = document.getElementById("circulo");
var alertaElement2 = document.getElementById("circulo1");
var alarma1 =document.getElementById("a1");
var alarma2 =document.getElementById("a2");
if(alarma1.innerHTML==' 1 '){
    alertaElement1.style.background= 'red';
}else{
    alertaElement1.style.background= '#8CC657';
}

if(alarma2.innerHTML==' 1 '){
    alertaElement2.style.background= 'red';
}else{
    alertaElement2.style.background= '#8CC657';
}


})();