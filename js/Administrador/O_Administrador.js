var W_Admin = $(".content-admin");

W_Admin.find("#bt_add").on('click', function () {
    agregarProducto(); 
});

function agregarProducto() {
    let Nombre = document.getElementById("nombreProducto").value,
        Descripcion = document.getElementById("descripcionProducto").value,
        Precio = document.getElementById("precioProducto").value;

    let Nuevo_Producto = document.createElement("div");
    Nuevo_Producto.classList.add("card_product");
    Nuevo_Producto.innerHTML = `  
    <div class="row"> 
        <div class="card_product zoom-img">
            <div class="card_p">
               <img class="card-img-top" src="img/Gaseosa.jpeg">  
               <div class="card-body1">
                     <h5 class="card-title">${Nombre}</h5>
                     <p class="card-text">${Descripcion}</p>
                     <p>Precio: S/${Precio}</p>
                     <a href="#" class="btn">Eliminar</a>
               </div>
            </div>
        </div>
    </div>`;
    let Productos_Contenedor = document.getElementById("contenedorProductos");
    Productos_Contenedor.appendChild(Nuevo_Producto);

    document.getElementById("formularioProducto").reset();
}
