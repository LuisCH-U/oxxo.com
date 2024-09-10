W_header = $('.content-header');

const navMenu = document.getElementById('nav-menu');
const menuToggleLabel = document.querySelector('.btn_nadvar');
navMenu.style.display = 'none';
menuToggleLabel.addEventListener('click', function() {
  if (navMenu.style.display === 'none') {
    navMenu.style.display = 'flex';
  } else {
    navMenu.style.display = 'none';
  }
});

/*---------------------------Inicio_Sesión_Desplegable-------------------------*/
document.addEventListener('click', function(event) {
    if (!event.target.closest('.nav-menu') && !event.target.closest('.btn_nadvar')) {
        navMenu.style.display = 'none';
    }
});
document.addEventListener('DOMContentLoaded', function() {
    const dropdown = document.querySelector('.dropdown');
    const Desplegable = document.querySelector('.dropdown-content');
    const dropbtn = document.querySelector('.dropbtn');
    
    Desplegable.style.display = 'none';
    
    dropdown.addEventListener('click', function(e) {
        e.stopPropagation();
    });
    dropbtn.addEventListener('mouseover', function() {
        if (Desplegable.style.display === 'none') {
            Desplegable.style.display = 'block';
        } else {
            Desplegable.style.display = 'none';
        }
    });
    document.addEventListener('click', function(e) {
        if (!dropdown.contains(e.target)) {
            Desplegable.style.display = 'none';
        }
    });
});
/*---------------------------------Carrito-------------------------------------*/
document.addEventListener('DOMContentLoaded', function() {
    const btnCarrito = document.querySelector('.btn-carrito');
    const carritoDesplegable = document.querySelector('.carrito-desplegable');
    if (btnCarrito && carritoDesplegable) {
     btnCarrito.addEventListener('click', function(e) {
        e.preventDefault();
        carritoDesplegable.classList.toggle('show');
    });
    document.addEventListener('click', function(e) {
        if (!btnCarrito.contains(e.target) && !carritoDesplegable.contains(e.target)) {
            carritoDesplegable.classList.remove('show');
        }
    });   
    }
});




