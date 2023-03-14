<!DOCTYPE html>
<html>
<head>
	<title>Gastos de envío</title>
	<meta charset="utf-8">
	<style>
		body {
			font-family: Arial, sans-serif;
		}

		table {
			border-collapse: collapse;
			width: 100%;
			max-width: 800px;
			margin: auto;
			text-align: center;
			font-size: 16px;
			border: 2px solid #333;
		}

		th, td {
			border: 1px solid #333;
			padding: 10px;
		}

		th {
			background-color: #333;
			color: #fff;
			font-size: 18px;
			font-weight: bold;
			text-transform: uppercase;
			letter-spacing: 2px;
		}

		tr:nth-child(even) {
			background-color: #f2f2f2;
		}

		.note {
			font-size: 14px;
			font-style: italic;
			margin-top: 20px;
		}
        .container {
			display: flex;
			justify-content: center;
			align-items: center;
			
		}
        #map {
            height: 500px;
            width: 900px ;
        }
        
		h1 {
			text-align: center;
		}
	
    
	</style>
</head>

<?php require "includes/comun/header.php" ?>
<h1>GASTOS DE ENVÍO</h1>
<table>
    <thead>
        <tr>
            <th>Destino</th>
            <th>Tiempo de entrega</th>
            <th>Gastos de envío</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>España peninsular</td>
            <td>Todos los pedidos<br>Independientemente del peso<br>Tiempo de entrega 24h (sin contar festivos, sábados y domingos)<br>El 97% de los pedidos llegan en 24h, el 3% restante en 48h</td>
            <td>5,95€ IVA Incluido</td>
        </tr>
        <tr>
            <td>Islas Baleares</td>
            <td>Todos los pedidos<br>Independientemente del peso<br>Tiempo de entrega de 1 a 3 días (Menorca e Ibiza pueden tener un retraso de hasta 5 días laborables)</td>
            <td>15,95€ IVA Incluido</td>
        </tr>
        <tr>
            <td>Portugal</td>
            <td>Todos los pedidos<br>Independientemente del peso<br>Tiempo de entrega de 1 a 2 días</td>
            <td>5,95€ IVA Incluido</td>
        </tr>
        <tr>
            <td>Resto de Europa<br>ALEMANIA, FRANCIA, AUSTRIA, BELGICA, DINAMARCA, ITALIA, LUXEMBURGO, PAISES BAJOS, REPUBLICA CHECA, ESLOVAQUIA, ESLOVENIA, HUNGRIA, POLONIA.</td>
            <td>Todos los pedidos<br>Independientemente del peso<br>Tiempo de entrega de 3 a 6 días<br>Gastos de envío gratis a partir de 200€ para toda Europa</td>
            <td>9,95€ IVA Incluido</td>
        </tr>
    </tbody>
</table>
<br>
<p>LOS GASTOS DE ENVÍO SON GRATIS A PARTIR DE 200€ DE COMPRA (para la Península de España y Europa)</p>
<ul>
    <li>Se realizan envíos a toda la Peninsula, Baleares, Portugal y Europa de lunes a viernes (excepto fines de semana y festivos). No se realizan envíos a Ceuta, Melilla y Canarias.</li>
    <li>Enviamos a Baleares por la empresa de transportes GLS</li>
    <li>Los gastos de devolución por cambio de producto o talla es de 10 euros</li>
    <li>Los gastos de devolución por recogida de producto para su posterior devolución del importe 5.95 €</li>
    <li>Los pedidos confirmados y pagados antes de las 16:30h serán enviados en el mismo día.</li>
    <li>Todos los productos disponibles en la tienda los tenemos en stock físico y para enviar inmediatamente.</li>
</ul>
<h1>DONDE ESTAMOS<h1>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB9GE3d4rTQaEMO02CuGCIE4tgIcqKs45M"></script>
    <br>
    <div class="container">
    <div id="map"></div>
    </div>
    <script>
      // Código JavaScript que utiliza la API de Google Maps
      function initMap() {
        // Crea un objeto LatLng con la ubicación deseada
        //40.452776278219496, -3.7335067213426227
        var myLatLng = {lat: 40.452776278219496, lng: -3.7335067213426227};

        // Crea un objeto Map con el centro en la ubicación deseada
        var map = new google.maps.Map(document.getElementById('map'), {
          center: myLatLng,
          zoom: 12
        });

        // Crea un marcador en la ubicación deseada
        var marker = new google.maps.Marker({
          position: myLatLng,
          map: map,
          title: 'Zeus-Airsoft'
        });
      }
    </script>
    <?php
      // Código PHP para obtener la ubicación deseada
      $lat = 40.452776278219496;
      $lng = -3.7335067213426227;
    ?>
    <script>
      // Llama a la función initMap después de que se cargue la API de Google Maps
      google.maps.event.addDomListener(window, 'load', initMap);
    </script>
<h1>DEVOLUCION Y GARANTÍAS<h1>
    <p style="font-size: 16px; line-height: 1.5;font-weight: normal; text-align: left;">Zeus-Airsoft sólo acepta devoluciones por posibles defectos en el producto</p>

    <p style="font-size: 16px; line-height: 1.5;font-weight: normal; text-align: left;">No aceptamos devoluciones por malfuncionamiento de las réplicas debido a un mal uso,desgaste o de réplicas abiertas,modificadas o manipuladas.El plazo de devolución de productos en tu web es de 14 días naturales desde la recepción del producto, en tal caso si el motivo de la devolución no es de indole mayor se procederá a la devolución del importe mediante un vale de compra en la tienda.</p>

    <p style="font-size: 16px; line-height: 1.5;font-weight: normal; text-align: left;">- Los gastos de devolución en el caso de cambio de producto o talla es de 10 €</p>

    
    <p style="font-size: 16px; line-height: 1.5;font-weight: normal; text-align: left;">Para hacer uso de la garantía será imprescindible, presentar la marcadora en su embalaje original con sus complementos de origen.</p>
    
    <p style="font-size: 16px; line-height: 1.5;font-weight: normal; text-align: left;">El periodo de garantía para las réplicas será de 6 meses.Es muy importante para nosotros que el cliente no note la diferencia entre comprar en una tienda física y comprar en una tienda online, esa es sin duda nuestra nuestra prioridad y por ello ponemos especial atención a las devoluciones.
    Despues de ese periodo habria que someter a mantenimiento a las réplicas pagando el coste del mantenimiento</p>

    <p style="font-size: 16px; line-height: 1.5;font-weight: normal; text-align: left;">- Las imagenes de los productos en la web pueden ser a veces ligeramente distintas y no corresponder al 100%, por modificaciones del producto por parte del fabricante</p>

    <p style="font-size: 16px; line-height: 1.5;font-weight: normal; text-align: left;">-Las gafas Bolle o Pegaso una vez abiertas del precinto no se pueden devolver pues estan vienen cerradas y precintadas y todos los clientes quieren que sean nuevas las gafas que les lleguen.</p>

    <p style="font-size: 16px; line-height: 1.5;font-weight: normal; text-align: left;">Si se debe realizar una devolución, se enviarár el producto tal y como se recibió, incluidos el embalaje original y todos los accesorios. Antes de enviar el producto, es necesario ponerse en contacto con nosotros al siguiente email info@Zeus-Airsoft.com para poder hablar sobre la devolución.</p>
    <p style="font-size: 16px; line-height: 1.5;font-weight: normal; text-align: left;">Una vez hablemos sobre el posible problema que pueda tener el producto, enviaremos un mensajero de MRW para la recogida del producto.En el caso de que el producto este en mal estado y no sea culpa del cliente,Zeus-Airsoft correrá con los gastos de envió de ida y vuelta.</p>
    
    <p style="font-size: 16px; line-height: 1.5;font-weight: normal; text-align: left;">- En el caso de comprar una réplica y querer devolver el pedido sin motivo alguno ( aunque pueda parecer poco razonable esta situación nos ha ocurrido varias veces)  el coste por todas las gestiones realizadas por Zeus-Airsoft en el trámite de la réplica y su posterior coste de devolución de transporte será de 30 € .El proceso de probar , hacer factura , probar el vuelo , probar el crono y embalar es un proceso que lleva bastante tiempo y dinero por parte de nuestra tienda y debe de tenerse en cuenta y valorar nuestro trabajo. </p>
    <p style="font-size: 16px; line-height: 1.5;font-weight: normal; text-align: left;">En caso de ser replicas upgradeadas a peticion del cliente se cobrara el precio de volver a montar la replica de serie, pues un upgrade o volver a poner una replica de serie es un proceso lento y minucioso que debe de ser valorado.</p>


    <p style="font-size: 16px; line-height: 1.5;font-weight: normal; text-align: left;">En el caso que el producto enviado no tenga ningún malfuncionamiento, este manipulado o el síntoma no quede cubierto por la garantía del producto, será el cliente el responsable de cubrir los gastos de devolución,la mano de obra y piezas empleados para solventar el problema.</p>

    <p style="font-size: 16px; line-height: 1.5;font-weight: normal; text-align: left;">En caso de proceder a la devolución del dinero , se podrá elegir entre recibir el importe en cuenta o un vale para comprar en la tienda . En caso de extrema gravedad o solvencia económica por parte de la tienda se procederá siempre a la devolución del importe un en un vale de compra por valor del importe de la devolución.</p>
    <p style="font-size: 16px; line-height: 1.5;font-weight: normal; text-align: left;">En el caso de que el cliente compre un producto de ropa en el cual está especificada perfectamente  la talla y se da el caso que no le queda bien y quiere descambiarlo,Zeus-Airsoft se ofrecerá a descambiarlo sin ningún problema, pero el cliente deberá correr con los gastos de envió de ida y vuelta</p>

    <p style="font-size: 16px; line-height: 1.5;font-weight: normal; text-align: left;">Las baterías Lipo tienen un periodo de garantía de 30 días, suficiente para comprobar que funcionan correctamente.</p>

    <p style="font-size: 16px; line-height: 1.5;font-weight: normal; text-align: left;">Cancelación de Pedidos</p>

    <p style="font-size: 16px; line-height: 1.5;font-weight: normal; text-align: left;">Los pedidos podrán ser cancelados siempre y cuando el pedido no haya sido enviado desde nuestra instalaciones. Si el pedido fue enviado el cliente deberà pagar los gastos de envío correspondientes, que rondarán entre 10 y 15 € dependiendo del volumen y peso del pedido, pongase en contacto con nosotros y le indicaremos todos los pasos a seguir.</p>

    <p style="font-size: 16px; line-height: 1.5;font-weight: normal; text-align: left;">Dirección y datos de la empresa:</p>

    <p style="font-size: 16px; line-height: 1.5;font-weight: normal; text-align: left;">Calle del Prof. José García Santesmases, 9,</p>
    <p style="font-size: 16px; line-height: 1.5;font-weight: normal; text-align: left;">Madrid 28040</p>
    <p style="font-size: 16px; line-height: 1.5;font-weight: normal; text-align: left;">Madrid</p>
    <p style="font-size: 16px; line-height: 1.5;font-weight: normal; text-align: left;">España</p>
    <p style="font-size: 16px; line-height: 1.5;font-weight: normal; text-align: left;">Telefono XXX-XXX-XXX</p>

    <p style="font-size: 16px; line-height: 1.5;font-weight: normal; text-align: left;">Dueño de la tienda Sergio Garcia Diez con NIF XXXXXXXXX</p>
<h1>INFORMACIÓN VENTA Y REGLAMENTO<h1>
    <p style="font-size: 16px; line-height: 1.5;font-weight: normal; text-align: left;">Debido a varias preguntas por parte los clientes, agregamos la siguiente información sobre la venta de réplicas en nuestra tienda.</p>

    <p style="font-size: 16px; line-height: 1.5;font-weight: normal; text-align: left;">** Importante - Si se necesita comprar varias réplicas con nombres distintos, indicanoslo en el comentario del pedido para que podamos hacer cada factura con el nombre y datos correspondientes.</p>


    <p style="font-size: 16px; line-height: 1.5;font-weight: normal; text-align: left;">¿Cómo enviamos los pedidos en Zeus-Airsoft y  las réplica que nos compráis?</p>

    <p style="font-size: 16px; line-height: 1.5;font-weight: normal; text-align: left;">En nuestra empresa le damos un importancia muy grande a probar todas las réplicas antes de enviarlas para que el cliente cuando le llegue pueda disfrutarla sin ningún tipo de problema:</p>

    <p style="font-size: 16px; line-height: 1.5;font-weight: normal; text-align: left;">1 - Cuando el cliente realiza el pago , revisamos visualmente la réplica en busca de imperfecciones tanto de materiales como de pintura.</p>

    <p style="font-size: 16px; line-height: 1.5;font-weight: normal; text-align: left;">2 - Después de  comprobar que visualmente está todo bien , pasamos a probar con batería la réplica, cadencia de disparo y cronamos la réplica para ver que está dando los fps adecuados para cada tipo de réplica, en caso negativo revisamos la réplica hasta dar con la solución.</p>

    <p style="font-size: 16px; line-height: 1.5;font-weight: normal; text-align: left;">3 - Una vez pasamos crono, probamos la réplica en nuestra galería de 36 metros para ver que el hop up funciona perfectamente y la precisión y alcance son los adecuados, en caso negativo revisamos la réplica para dar con la solución.</p>

    <p style="font-size: 16px; line-height: 1.5;font-weight: normal; text-align: left;">4 - Una vez esta todo comprobado, pasamos a realizar la factura de la réplica con su número correspondiente ( todas las réplicas que vendemos tienen número de serie único del fabricante) </p>

    <p style="font-size: 16px; line-height: 1.5;font-weight: normal; text-align: left;">5 - Embalamos la réplica con papel de burbuja para que no sufra ningún daño en su transporte, la envolvemos para una mayor seguridad y discreción en papel negro film y enviamos el pedido , el pedido para españa tardará por norma general 24 horas , si se piden modificaciones puede llegar a tardar entre 1 y 3 días, en todo caso siempre informamos en el proceso de compra o en los textos de los productos.</p>

    <p style="font-size: 16px; line-height: 1.5;font-weight: normal; text-align: left;">Este es todo el proceso que realizamos en nuestra tienda antes del envío de las réplicas que vendemos en Zeus-Airsoft.</p>

    <p style="font-size: 16px; line-height: 1.5;font-weight: normal; text-align: left;">6 - Si el cliente cuando le llega la réplica nota un mal funcionamiento de la réplica o cualquier otra irregularidad pedimos por favor que nos lo haga saber para poder resolverle el problema que tenga con la mayor rapidez posible.</p>


    <p style="font-size: 16px; line-height: 1.5;font-weight: normal; text-align: left;">Reglamentos de Armas </p>

    <p style="font-size: 16px; line-height: 1.5;font-weight: normal; text-align: left;">En el siguiente link podreis ver todo el reglamento de Armas actual , para conocer todos los detalles:</p>

    <p style="font-size: 16px; line-height: 1.5;font-weight: normal; text-align: left;"><a href="https://www.boe.es/buscar/doc.php?id=BOE-A-1993-6202">https://www.boe.es/buscar/doc.php?id=BOE-A-1993-6202</a> </p>
<h1>CONDICIONES Y FORMAS DE PAGO<h1>
    <p style="font-size: 16px; line-height: 1.5;font-weight: normal; text-align: left; "> Todas las réplicas que vende Zeus-Airsoft tienen número  de serie unico del fabricante 
    En caso de querer comprar una réplica la factura puede ir a nombre del menor siempre que se tenga más de 14 años, aconsejamos que los padres nos llamen para resolver las dudas que puedan tener.</p>
    <p style="font-size: 16px; line-height: 1.5;font-weight: normal; text-align: left;">Formas de Pago Disponibles</p>
    <p style="font-size: 16px; line-height: 1.5;font-weight: normal; text-align: left;">En Zeus-Airsoft tenemos diferentes formas de pago, pago a plazos , paypal , transferencia bancaría y tarjeta de credito: </p>
    <h4>FINANCIACIÓN AL INSTANTE CON APLAZAME</h4>
    <p>Nuevo sistema de financiación ¡¡ en tan 1 minuto!!  Solo necesitas un número de teléfono móvil, un DNI Español y una tarjeta, serás capaz de financiar tus compras en nuestra tienda con un máximo de 1000 euros y hasta en 36 meses. El sistema de forma automática determinará si un cliente es apto o no para recibir la financiación, la empresa Aplázame es quien decide si da la financiación, nuestra tienda no puedo decidir en este proceso. El coste de financiar una compra será el siguiente comisión de apertura 0,00 €, TIN 22,11 %, 16,5% Tae  </p>
    <p>Pedido mínimo financiable - desde 99 €  </p>
    <p>Al solicitar el préstamo se te pedirá; realizar el pago de una entrada inicial. La cuantía de tu préstamo será el importe de tu cesta menos esa entrada inicial. Ésa es la cantidad que financiaremos en el número de cuotas que elijas. Por ejemplo, una financiación a 6 meses implicará 7 pagos, uno en el momento de la concesión del crédito y 6 pagos en cada uno de los 6 meses siguientes a la compra.</p>
    <p>Los pagos se hacen con la tarjeta que aporte el cliente a Aplázame.<p>
    <p>- Los pedidos con este sistema pueden demorarse en enviar 1 día para verificar la operación</p>
    <p>El SMS enviado por Aplázame para la tramitación de la solicitud de crédito no tiene ningún coste para ti.</p>
    <p>- Ejemplo de financiación para una cesta de 1000 euros a 12 meses. Se pide una entrada de 85,63 euros que el cliente pagará con su tarjeta en el momento de realizar la operación. El importe a financiar es la diferencia entre el importe de la cesta y la entrada que hemos pagado 914,37 €. Se solicitarán 12 pagos mensuales de 85,63 €, entonces el importe total que debemos será de 1027,56 €</p>
    <h4>-TRANSFERENCIA BANCARIA</h4>
    <p>Su pedido será enviado cuando sea confirmado el pago. Para agilizar el processo, envíe el comprobante por email: info@Zeus-Airsoft.com</p>
    <p>Datos para Transferencia Bancaria:</p>
    <p>Sergio Garcia Diez</p>
    <p>Banco: Cajamar</p>
    <p>Cuenta Corriente: </p>
    <p>Número (CAJAMAR): ES98 3058 5018 7927 2001 2204 </p>
    <p>Codigo SWIFT O BIC : CCRIES2AXXX</p>
    <h4>TARJETA CRÉDITO</h4>
    <p>Una vez confirme la compra, será redirigido automáticamente a un servidor seguro HTTPS, donde podrá proceder al pago, necesitará el numero de tarjeta, fecha de caducidad y numero de seguridad que se encuentra en la parte trasera de su tarjeta.</p>
    <h4>PAYPAL</h4>
    <p>Pague su pedido con su cuenta de Paypal.Este método de pago tiene una comisión por parte de Paypal, antes de finalizar el pedido puede revisar el importe de la comision, ya que lo calcula directamente el sistema y se lo muestra antes de confirmar el mismo.</p>
<h1>AVISO LEGAL y POLITICA DE PRIVACIDAD ADAPTADO RGPD (Versión Mayo-18)<h1>
    
    <p style="font-size: 16px; line-height: 1.5;font-weight: normal; text-align: left ">En cumplimiento de la Ley 34/2002 de Servicios de la Sociedad de la Información y de Comercio Electrónico de España, le informamos que esta página Web es propiedad de Sergio Garcia Diez y siguiendo los principios de licitud, lealtad y transparencia, ponemos a su disposición la siguiente información sobre el tratamiento que realizaremos de sus datos de carácter personal.</t>
    
    <h4>¿QUIÉN ES EL RESPONSABLE DEL TRATAMIENTO DE SUS DATOS DE CARÁCTER PERSONAL?</h4>
    
    <p>TITULAR WEB</p>
    
    <p>Denominación social: Sergio Garcia Diez</p>
    
    <p>NIF:XXXXXXXXX </p>
    <p>Dirección de correo electrónico: info@Zeus-Airsoft.com</p>
    
    <p>Domicilio social: Calle del Prof. José García Santesmases, 9, 28040 Madrid</p>
    
    <p>La presente información regula las condiciones de uso, las limitaciones de responsabilidad y las obligaciones que los usuarios de la página Web que se publica bajo el nombre del dominio www.Zeus-Airsoft.com las cuales los usuarios asumen y se comprometen a respetar.</p>
    
    <h4>¿CON QUÉ FINALIDAD TRATAMOS SUS DATOS?</h4>
    
    <p>A través del presente Portal, únicamente tratamos los datos de carácter personal que nos facilita en el formulario “Contacto y a través de la intranet”, exclusivamente con la finalidad de remitirle la información solicitada y/o resolver las dudas o cuestiones que nos plantea; y, si así lo ha consentido expresamente, para enviarle comunicaciones electrónicas relativas a nuestras actividades o servicios, boletines, etc.</p>
    
    <h4>¿POR CUÁNTO TIEMPO LOS CONSERVAREMOS?</h4>
    
    <p>Sus datos, serán conservados el tiempo mínimo necesario para satisfacer la finalidad para la cual los facilitó así como para atender las responsabilidades que se pudieran derivar de los datos suministrados y de cualquier otra exigencia legal.</p>
    
    <p>Al respecto, consideramos que si no se opone al tratamiento de sus datos y/o no los cancela expresamente, continúa interesado en seguir incorporado a nuestros tratamientos hasta que  Zeus-Airsoft lo considere oportuno y mientras sea adecuado a la finalidad para la que se obtuvieron.</p>
    
    <h4>¿CUÁL ES LA LEGITIMACIÓN PARA EL TRATAMIENTO DE SUS DATOS?</h4>
    
    <p>La base legal para el tratamiento de sus datos personales es el consentimiento que presta al aceptar esta Política de Privacidad antes de enviarnos/ facilitarnos sus datos.</p>
    
    <p>Los datos que le solicitamos son adecuados, pertinentes y estrictamente necesarios y en ningún caso está obligado a facilitárnoslos, pero su no comunicación podrá afectar a la finalidad del servicio o la imposibilidad de prestarlo.</p>
    
    <h4>¿PODEMOS OBTENER SUS DATOS DE REDES SOCIALES, ESPACIOS WEB, REGISTRO MERCANTIL, GUIAS TELEFÓNICAS?</h4>
    <p>Zeus-Airsoft está presente en  distintas redes sociales que podrá ver en nuestro espacio web, con 
    la finalidad de informar sobre los servicios que ofrece, así como de cualquier otra actividad o
    evento que se realice y se quiera dar publicidad, pero en ningún momento obtendrá de las mismas 
    datos personales de los usuarios que interactúen en ellas, a menos que haya autorización expresa.

    <h4>¿PODEMOS CEDER SUS DATOS A TERCEROS?</h4>
    <p>Zeus-Airsoft no comunicará sus datos a ningún tercero, salvo que se le informe de ello expresamente o exista 
    obligación legal.</p>

    <h4>¿CUÁLES SON SUS DERECHOS CUANDO NOS LOS FACILITA?</h4>
    <p>Los derechos de protección de datos de los que dispone como titular o interesado son:</p>

    <p>·         Derecho a solicitar el acceso a los datos personales relativos al interesado</p>

    <p>·         Derecho de rectificación</p>

    <p>·         Derecho de supresión</p>

    <p>·         Derecho de oposición</p>

    <p>·         Derecho a solicitar la limitación de su tratamiento</p>

    <p>·         Derecho a la portabilidad de los datos</p>
    
    
    <p>Podrá ejercer sus derechos de protección de datos personales dirigiendo una comunicación por
    escrito al domicilio social de Zeus-Airsoft o al correo electrónico habilitado a tal efecto, info@Zeus-Airsoft.com 
    incluyendo en ambos casos fotocopia de su DNI u otro documento de identificación equivalente.por escrito
    al domicilio social de Zeus-Airsoft o al correo electrónico habilitado a tal efecto, info@Zeus-Airsoft.com incluyendo
    en ambos casos fotocopia de su DNI u otro documento de identificación equivalente.</p>

    <h4>¿PUEDE RETIRAR SU CONSENTIMIENTO EN CUALQUIER MOMENTO?</h4>
    <p>Usted tiene la posibilidad y el derecho a retirar el consentimiento para cualquiera finalidad específica 
    otorgada en su momento, sin que ello afecte a la licitud del tratamiento basado en el consentimiento previo
    a su retirada.</p>

    <h4>¿DÓNDE PUEDE RECLAMAR EN CASO DE CONSIDERAR QUE SUS DATOS NO SON TRATADOS ADECUADAMENTE?</h4>
    <p>Si lo estima pertinente, puede dirigir sus reclamaciones al correo info@prevenfor.es o a la autoridad de
    protección de datos que corresponda, siendo la AEPD la indicada  en España, www.agpd.es</p>
    
    <h4>¿QUÉ HACEMOS PARA GARANTIZAR LA SEGURIDAD Y CONFIDENCIALIDAD DE SUS DATOS?</h4>
    <p>Con el objetivo de salvaguardar la seguridad de sus datos personales, le informamos que Zeus-Airsoft ha adoptado todas las medidas de índole técnica y organizativa necesarias para garantizar la seguridad de los datos personales suministrados. Todo ello para evitar su alteración, pérdida, y/o tratamientos o accesos no autorizados, tal como exige la normativa, si bien la seguridad absoluta no existe.

    Igualmente, Zeus-Airsoft le informa que todo nuestro personal, cualquiera que sea la fase del tratamiento en la que intervenga, ha adoptado el compromiso de tratar sus datos con el máximo celo y confidencialidad. Le recordamos que ni  Zeus-Airsoft, ni cualquiera de sus empleados, cederá o comunicará sus datos a terceros, excepto en los casos legalmente previstos, o salvo que usted lo autorice expresamente en su contrato de prestación de servicios.

    Zeus-Airsoft puede alterar la presente política de privacidad para adaptarla a las modificaciones que se produzcan en la página Web así como por los cambios legislativos sobre datos personales que vayan apareciendo y afecten a dicha política.

    Por ello, le recomendamos su lectura, cada vez que nos facilite sus datos a través de la Página Web.</p>

    <h4>APLAZAME Financiación</h4>
    <p>
    El usuario acepta que todos sus datos de carácter personal sean íntegramente cedidos a Aplazame desde el momento en que el usuario haya iniciado la contratación del servicio de pago aplazado ofrecido por ésta última en el momento de elegir la forma de pago.

    Esta aceptación se extiende a terceras entidades que tuvieran que acceder a los ficheros para el buen fin del contrato.</p>
<?php require "includes/comun/footer.php" ?>