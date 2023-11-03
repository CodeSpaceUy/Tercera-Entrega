if(document.querySelector('#container-slider')){
    setInterval('fntExecuteSlide("next")',5000);
 }
 //------------------------------ LIST SLIDER -------------------------
 if(document.querySelector('.listslider')){
    let link = document.querySelectorAll(".listslider li a");
    link.forEach(function(link) {
       link.addEventListener('click', function(e){
          e.preventDefault();
          let item = this.getAttribute('itlist');
          let arrItem = item.split("_");
          fntExecuteSlide(arrItem[1]);
          return false;
       });
     });
 }
 
 function fntExecuteSlide(side){
     let parentTarget = document.getElementById('slider');
     let elements = parentTarget.getElementsByTagName('li');
     let curElement, nextElement;
 
     for(var i=0; i<elements.length;i++){
 
         if(elements[i].style.opacity==1){
             curElement = i;
             break;
         }
     }
     if(side == 'prev' || side == 'next'){
 
         if(side=="prev"){
             nextElement = (curElement == 0)?elements.length -1:curElement -1;
         }else{
             nextElement = (curElement == elements.length -1)?0:curElement +1;
         }
     }else{
         nextElement = side;
         side = (curElement > nextElement)?'prev':'next';
 
     }
     //RESALTA LOS PUNTOS
     let elementSel = document.getElementsByClassName("listslider")[0].getElementsByTagName("a");
     elementSel[curElement].classList.remove("item-select-slid");
     elementSel[nextElement].classList.add("item-select-slid");
     elements[curElement].style.opacity=0;
     elements[curElement].style.zIndex =0;
     elements[nextElement].style.opacity=1;
     elements[nextElement].style.zIndex =1;
 }
 var prevScrollpos = window.pageYOffset;

window.onscroll = function() {
    var currentScrollPos = window.pageYOffset;
    if (prevScrollpos > currentScrollPos) {
        document.getElementById("miCabecera").style.top = "0";
    } else {
        document.getElementById("miCabecera").style.top = "-200px";
    }
    prevScrollpos = currentScrollPos;
}
document.addEventListener("DOMContentLoaded", function() {
    const links = document.querySelectorAll(".scroll-link");

    links.forEach(link => {
        link.addEventListener("click", scrollToSection);
    });

    function scrollToSection(e) {
        e.preventDefault();

        const targetId = this.getAttribute("href").substring(1);
        const targetSection = document.getElementById(targetId);

        window.scrollTo({
            top: targetSection.offsetTop,
            behavior: "smooth"
        })
    }
});
function mostrarCuadroCookies() {
    document.getElementById("cuadroCookies").style.display = "block";
}

// Función para ocultar el cuadro de consentimiento de cookies
function ocultarCuadroCookies() {
    document.getElementById("cuadroCookies").style.display = "none";
}

// Función para manejar la acción de aceptar las cookies
function aceptarCookies() {
    ocultarCuadroCookies();
    // Aquí puedes agregar el código para establecer cookies o realizar otras acciones relacionadas con las cookies.
    alert("Cookies permitidas. Gracias por su elección.");
}

// Asocia las funciones a los eventos
window.addEventListener("load", mostrarCuadroCookies);
document.getElementById("botonAceptarCookies").addEventListener("click", aceptarCookies);