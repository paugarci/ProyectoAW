function actualizarTabla(productID) {
    // Obtener la cantidad de productos del input
    const cantidad = parseInt(document.getElementById(`amount-${productID}`).value);
    console.log(cantidad)
    // Calcular el nuevo precio para el producto
    const PxU = parseFloat(document.getElementById(`price-unity-${productID}`).textContent);
    console.log(PxU)
    const nuevoPrecio = cantidad * PxU;
    console.log(nuevoPrecio)

    // Actualizar el texto dentro del <td> que contiene el precio
    document.getElementById(`price-${productID}`).textContent = nuevoPrecio.toFixed(2);

    // Calcular el subtotal de la tabla sumando los precios de todos los productos
    let subtotal = 0;
    document.querySelectorAll('table tbody tr').forEach(row => {
      const precioPorUnidad = parseFloat(row.querySelector('td:nth-child(5) p').textContent);
      subtotal += precioPorUnidad;
    });
    console.log(subtotal)
    // Actualizar el texto dentro del <p> que contiene el subtotal
    document.getElementById('subtotal').textContent = subtotal.toFixed(2);
  }