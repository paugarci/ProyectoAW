<?php require "comps/header.php" ?>

<div class="alert alert-primary m-2" role="alert" style="text-align: center">
  <b>¡ATENCIÓN!</b> Los diseños expuestos en los bocetos pueden cambiar durante el desarrollo.
</div>
<div class="bocetos">
<h3>Login</h3>
<p>DESCRIPCION: En esta imagen podemos observar la pantalla de iniciar sesión. Será necesario introducir los datos de un usuario registrado
y una vez estén cumplimentados, al presionar el botón de la parte inferior en el que pone "Iniciar Sesión" se buscará en la
base de datos si esta dado de alta, además de comprobar que la información introducida sea válida.
</p>
<img src="static/img/bocetos/login.png" class="d-block w-100" alt="login">
<h3>Registro</h3>
<p>DESCRIPCION: En esta imagen podemos observar la pantalla de registro. Será necesario introducir los datos de un usuario no registrado
y una vez estén cumplimentados, al presionar el botón de la parte inferior en el que pone "Registrarse" se comprobara que los datos introducidos
no sean repetidos, es decir, que ya estén dados de alta en la base de datos, así como que los caracteres no sean un problema
para nuestro Código. Una vez aceptados los datos se guardarán en la base de datos y el usuario para acceder a la zona de usuarios. 
</p>
<img src="static/img/bocetos/registro.png" class="d-block w-100" alt="registro">

    <h3>Página principal</h3>
    <p>DESCRIPCION: La página principal es la primera página que aparece cuando se ingresa al sitio web.
      En ella proporcionamos una introducción clara y concisa del sitio web, lo que ayuda a los usuarios
      a comprender el propósito y el contenido. Incluye un encabezado que identifica el nombre
      del sitio web, un logotipo, así como un menú de navegación que permite a los usuarios acceder a 
      diferentes secciones del sitio, como son en este caso la "Tienda", el "Foro", "Ofertas y eventos", 
      "Información sobre Airsoft" y un logo con el usuario, que en caso de que no haya iniciado sesión aparecerán 2 botones 
      con "Iniciar sesión" y "Regístrate". El contenido principal de la página principal
      incluye una breve descripción del sitio web y su propósito, así como enlaces a categorías de productos y una sección de productos
      destacados. En esta página habrá una scrollbar para poder bajar y subir dentro de la página y así poder 
      visualizar todas las categorías anteriormente mencionadas</p>
    <img src="static/img/bocetos/PagPrincipal.png" class="d-block w-100" alt="pagprincipal">

    <h3>Producto</h3>
    <p>DESCRIPCION: Una vez seleccionado el apartado Tienda, accederemos a la página en la que tenemos los productos.
      En esta podremos filtrar la búsqueda de los productos, así como, realizar una búsqueda de forma manual con la barra
      de búsqueda. Podremos filtrar los productos por armas, equipamiento, munición, y equipo completo. Dentro del apartado
      de armas seleccionaremos el tipo de arma que estamos buscando. En el de munición habrá que indicar el calibre, el 
      material de fabricación de la munición, que generalmente serán de plástico. En equipamiento tendremos las opciones de 
      cascos, guantes, petos, pantalones y botas. Una vez seleccionado el producto, nos mostrará una pantalla con el nombre, 
      el precio (en euros), una imagen del producto, y dos botones que serán para comprar el producto o para añadirlo a la cesta. 
      Habrá 5 estrellas las cuales indicaran la valoración media que tendrá ese producto, que vendrán dadas por las opiniones de 
      los usuarios. También tendremos una descripción del producto, sus características y debajo de estas dos, 
      las opiniones de los compradores de los productos. Abajo del todo tendremos los productos relacionados que vendrán con su 
      precio y con su valoración. En esta pantalla tendremos una scrollbar para subir y bajar dentro de la página.
    </p>
    <img src="static/img/bocetos/Producto.png" class="d-block w-100" alt="producto">

    <h3>Ofertas y eventos</h3>
    <p>DESCRIPCION: En esta página encontramos las ofertas más populares, las cuales incluyen packs de varios productos con su precio
       y las valoraciones que ha tenido a la hora de ser compradas por los usuarios. Tambien tendremos un temporizador con el tiempo 
       que durara la oferta activa, para fomentar la compra de estos. En cuanto a los eventos, tendremos diferentes categorías las
       cuales incluyen quedadas para partidas de airsoft, el precio de estos eventos, lo que incluyen, una descripción de los mismos,
       descripciones y el precio.
    </p>
    <img src="static/img/bocetos/OfertasEventos.png" class="d-block w-100" alt="pagprincipal">
 
    <h3>Foro</h3>
    <p>DESCRIPCION: En esta página podemos observar los temas que se han comentado, el número de respuestas y la última respuesta. También 
      se pueden hacer nuevos temas, pero es necesario estar registrado para crearlos. En cambio para leer no es necesario estar registrado.
       Se puede seleccionar un foro para que aparezca de forma permanente, es decir, mantener un seguimiento y recibir notificaciones cuando 
       se hace algún comentario en este.
    </p>
    <img src="static/img/bocetos/Foro.png" class="d-block w-100" alt="producto">
  
    <h3>Info</h3>
    <p>DESCRIPCION: Tras seleccionar "Información sobre Airsoft" nos redirigiría a esta página en la cual podemos obtener información tanto 
      de la página como de nosotros. La información de la página es una descripción de nuestras políticas y de la forma en la que trabajamos.
      Tambien podemos obtener una descripción de los trabajadores. Aqui tenemos un apartado de redes sociales en el que incluimos YouTube, 
      Instagram, Twitter, WhatsApp y Facebook con iconos para que sea más intuitivo. Hay un apartado para contactar con nosotros por si algún
      cliente tiene algún tipo de problema con alguno de nuestros productos o algún tipo de duda para que la podamos solucionar. Por ultimo
      tambien hay una captura con la ubicación de la sede y en caso de hacer clic en esta nos lleva a una nueva ventana de Google en la que 
      podemos observar en el maps cual es la ubicación exacta para poder ir de forma física.
    </p>
    <img src="static/img/bocetos/Info.png" class="d-block w-100" alt="info">
  

<?php require "comps/footer.php" ?>