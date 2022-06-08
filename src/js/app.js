document.addEventListener('DOMContentLoaded', function() {

    eventListeners();

    darkMode();
});

function darkMode() {
//solo modo oscuro
   const prefiereDarkMode = window.matchMedia('(prefers-color-scheme: dark)');

     console.log(prefiereDarkMode.matches);

    if(prefiereDarkMode.matches) {
        document.body.classList.add('dark-mode');
    } else {
        document.body.classList.remove('dark-mode');
    }
//automatico
    prefiereDarkMode.addEventListener('change', function() {
        if(prefiereDarkMode.matches) {
            document.body.classList.add('dark-mode');
        } else {
            document.body.classList.remove('dark-mode');
        }
    });

    const botonDarkMode = document.querySelector('.dark-mode-boton');
    botonDarkMode.addEventListener('click', function() {
        document.body.classList.toggle('dark-mode');
    });
}

function eventListeners() {
    const mobileMenu = document.querySelector('.mobile-menu');

    mobileMenu.addEventListener('click', navegacionResponsive);

    //muestra campos condicionales
    const metodoContactos = document.querySelectorAll('input[name="contacto[contacto]"]');
    metodoContactos.forEach(input => input.addEventListener('click', mostrarMetodosContactos))
}

function navegacionResponsive() {
    const navegacion = document.querySelector('.navegacion');

    navegacion.classList.toggle('mostrar')
}

function mostrarMetodosContactos(e) {//evento = e 
    const contactos = document.querySelector('#contactos');

    if(e.target.value === 'telefono'){
        contactos.innerHTML = `     
        <p>Elija la fecha y la hora</p>

        <label for="fecha">Fecha:</label>
        <input type="date" id="fecha" name="contacto[fecha]">

        <label for="hora">Hora:</label>
        <input type="time" id="hora" min="09:00" max="18:00" name="contacto[hora]">

        <label for="telefono">Teléfono</label>
        <input type="tel" placeholder="Tu Teléfono" id="telefono" name="contacto[telefono]">

        `;
    }else{
        contactos.innerHTML = `
        <label for="email">E-mail</label>
        <input type="email" placeholder="Tu Email" id="email" name="contacto[mail]" >

        `;
    }
    

}