function Carga_Forms(Formulario) {
    const url = `${Formulario}.php`;

    fetch(url)
        .then(response => {
            if (!response.ok) {
                throw new Error('No se pudo cargar el contenido.');
            }
            return response.text();
        })
        .then(data => {
            document.getElementById('Contenedor-forms').innerHTML = data;
        })
        .catch(error => {
            console.error('Error al cargar la página:', error);
        });
}

document.addEventListener('DOMContentLoaded', function() {
    Carga_Forms('Principal');

    const enlaces = document.querySelectorAll('.nav-item a');
    enlaces.forEach(enlace => {
        enlace.addEventListener('click', function(event) {
            event.preventDefault();
            const Formulario = this.getAttribute('data-pagina');

            document.getElementById('Contenedor-forms').innerHTML = '';
            const carrusel = document.querySelector('#Carrusel');
            if (carrusel) {
                carrusel.style.display = 'none';
            }

            Carga_Forms(Formulario);

            enlaces.forEach(e => e.classList.remove('active'));
            this.classList.add('active');
        });
    });
});
