


function updateCart(productID, newQuantity) {
    // Envía una petición POST al servidor para actualizar la cantidad del producto en el carrito
    console.log(productID)
    console.log( newQuantity)
    fetch('update-cart.php', {
        method: 'POST',
        body: 'product_id=' + productID + 'quantity=' + newQuantity
    })
    .then(response => response.json())
    .then(data => {
        // Si la actualización fue exitosa, redirecciona a shopping-cart.php
        if (data.success) {
            window.location.href = 'shopping-cart.php';
        } else {
            // Si hubo un error, muestra un mensaje de error
            alert(data.message);
        }
    })
    .catch(error => console.error(error));
}