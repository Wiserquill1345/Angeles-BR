//menu
const menu = document.querySelector(".menu");
const openMenuBtn = document.querySelector(".open-menu-btn");
const closeMenuBtn = document.querySelector(".close-menu-btn");
[openMenuBtn,closeMenuBtn].forEach((btn) => {
    btn.addEventListener("click", () => {
        menu.classList.toggle("open");
        menu.style.transition = "transform 0.5s ease";
    });
});
menu.addEventListener("transitionend", function(){
    this.removeAttribute("style");
});

menu.querySelectorAll(".dropdown > i").forEach((arrow)=>{
    arrow.addEventListener("click",function(){
        this.closest(".dropdown").classList.toggle("active");
    });
});
menu.querySelectorAll(".dropdown > a").forEach((arrow)=>{
    arrow.addEventListener("click",function(){
        this.closest(".dropdown").classList.toggle("active");
    });
});

document.addEventListener("DOMContentLoaded", function(){
    eventListeners();
    darkMode();
});

function darkMode(){

    const prefiereDarkMode = window.matchMedia("(prefers-color-scheme:dark)");

    if(prefiereDarkMode.matches){
        document.body.classList.add("dark-mode");
    }else{
        document.body.classList.remove("dark-mode");
    }

    prefiereDarkMode.addEventListener("change",function(){
        if(prefiereDarkMode.matches){
            document.body.classList.add("dark-mode");
        }else{
            document.body.classList.remove("dark-mode");
        }
    })

    const botonDarkMode=document.querySelector(".dark-mode-boton");

    botonDarkMode.addEventListener("click", function(){
        document.body.classList.toggle("dark-mode");
    });
}

function eventListeners(){
    
    //Muestra campos condicionales
    const metodoContacto = document.querySelectorAll('input[name="contacto[contacto]"]');
    metodoContacto.forEach(input=>input.addEventListener("click",mostrarMetodosContacto));
}

function mostrarMetodosContacto(e){
    const contactoDiv = document.querySelector("#contacto");
    if(e.target.value==="telefono"){
        contactoDiv.innerHTML= `
            <label for="telefono">Número Telefono</label>
            <input type="tel" placeholder="Tu telefono" id="telefono" name="contacto[telefono]">

            <p>Elija la fecha y la hora para la llamada</p>

            <label for="fecha">Fecha</label>
            <input type="date" id="fecha" name="contacto[fecha]">

            <label for="hora">Hora</label>
            <input type="time" id="hora" min="09:00" max="18:00" name="contacto[hora]">
        `;
    }else{
        contactoDiv.innerHTML= `
            <label for="email">E-mail</label>
            <input type="email" placeholder="Tu email" id="email" name="contacto[email]">
        `;
    }
}