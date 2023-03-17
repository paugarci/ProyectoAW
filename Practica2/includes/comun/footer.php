<!DOCTYPE html>
<html lang="es">
<head>
	<!-- enlace a la hoja de estilos de Bootstrap -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-LhMWr+kf0+FhG7VO9yP+hj5xz5z5DfbyQ1hHxhkuUocP6UZ+i6eH7Ryf9cg4Q1gF4jYwB7VZqtf3Gz7V/Qj+nw==" crossorigin="anonymous" />
    </script>
    
    <style>
        .bot {
        color: #FFF; /* color del texto */
        text-decoration: none; /* quitar subrayado */
        padding: 10px; /* añadir un poco de espacio alrededor del texto */
        border-radius: 5px; /* añadir bordes redondeados */
        
        }

        .bot:hover {
            background-color: #FFFFFF; /* color de fondo al pasar el ratón por encima */
            text-decoration: none; /* quitar subrayado */
            color: darkblue;
        }
        .wa{
            text-decoration: none; /* quitar subrayado */
            color: white;
        }
       
        .wa:hover {
            text-decoration: none; /* quitar subrayado */
            color: green;
        }

        .ins{
            text-decoration: none; /* quitar subrayado */
            color: white;
        }
        .ins:hover {
            text-decoration: none; /* quitar subrayado */
            color: mediumvioletred;
        }

        .face{
            text-decoration: none; /* quitar subrayado */
            color: white;
        }
        .face:hover {
            text-decoration: none; /* quitar subrayado */
            color: darkblue;
        }

        .you{
            text-decoration: none; /* quitar subrayado */
            color: white;
        }
        .you:hover {
            text-decoration: none; /* quitar subrayado */
            color: red;
        }
    </style>
   
</head>

<body>
    
    <footer class="bg-dark text-light py-3" >
        <hr class="border border-primary border-3 opacity-75 m-1"> <!--Una linea antes de las row para que quede bien facehro-->
		<div class="container text-center " style ="width: 1500px">
			<div class="row ">
                <div class = "col-md-2 border-right border-primary" style = "margin-top: 20px">
                <a href="index.php">
                    <img src="img/logo.png" style="display: block; ">
                </a>
                </div>
				
                <div class="col-md-3 border-left border-primary " style = "margin-top: 20px;" >
                <a href="contact.php" style="display: block; height: 100%; width: 100%; text-decoration: none; color: #FFFFFF;">
                    <div  style="display: inline-block; margin-left: 20px;">
                        <i class="fas fa-phone fw-bold fs-4" style="margin-right:5px;" ></i> 
                        <h2 style="display: inline-block;"> 638-XXX-XXX </h2>
                    </div>
                    
                    <p style="margin-top: -13px; margin-left: -35px;">Lunes a viernes</p>
                    <p style="margin-top: -20px; margin-left: 39px;">Horario de 11:00 a 16:14h</p>

                    <div style="display: inline-block;  margin-left: -2px; margin-top: -10px">
                        <i class="fas fa-envelope fw-bold fs-4" style= "margin-right: 5px;"></i> 
                        <h5 style="display: inline-block;"> info@Zeurs-Airsoft</h5>
                        
                    </div>
                    <!-- <ul class="list-unstyled">
                    <li><a href="#">Términos y Condiciones</a></li>
                    </ul> -->
                    </a>
                </div>
                <div class="col-md-7 "><!-- aqui poner bordes para ir proband como queda-->
                    <div class = "row " style = "margin-top: 20px;"><!-- aqui poner bordes para ir proband como queda-->
                        <div class = "col-md-2 " style="text-aling: left;">
                            <p><a class = "bot" href="index.php" > Inicio</a></p>
                        </div>
                        
                        <div class = "col-md-2 ">
                            <p><a href="#" class = "bot">Novedades</a></p>
                        </div>
                        <div class = "col-md-2 ">
                            <p><a href="#" class = "bot">Ofertas</a></p>
                        </div>
                        <div class = "col-md-2 ">
                            <p><a href="info.php" class = "bot">Informaión</a></p>
                        </div>
                        <div class = "col-md-2 ">
                            <p><a href="contact.php" class = "bot">Contacto</a></p>
                        </div>
                        <div class = "col-md-1 ">
                            <p><a href="faqs.php" class = "bot">FAQs</a></p>
                        </div>
                        <div class = "col-md-1 " >
                            <button class="btn btn-primary rounded-circle" onclick="topFunction()" title="Ir arriba">^</button> 
                        </div>
                    </div>
                    <div class="col-md-12  text-right" style = "margin-top: 20px"><!-- aqui poner bordes para ir proband como queda-->
                        <ul class="list-unstyled list-inline social text-right">
                            <li class="list-inline-item"><a href="#" class = "ins"><i class="fab fa-instagram" style="font-size: 50px;"></i></a></li>
                            <li class="list-inline-item"><a href="#" class = "wa"><i class="fab fa-whatsapp" style="font-size: 50px;"></i></a></li>
                            <li class="list-inline-item"><a href="#" class = "you"><i class="fab fa-youtube" style="font-size: 50px;"></i></a></li>
                        <li class="list-inline-item"><a href="#" class = "face"><i class="fab fa-facebook" style="font-size: 50px;"></i></a></li>
                        </ul>
                    </div>
			</div>
            <div class = "row">
                <br>
            </div>
            <hr class="border border-primary border-3 opacity-75">
            <div class="row my-20">
                <div class="col-md-4 border-secondary text-left">
					<p>&copy; 2023 Zeus-Airsoft</p>
				</div>
                <div class="col-md-2 ">
					<p><a href="info.php#politica " style = " color: inherit;  text-decoration: none;">Aviso Legal y política de Privacidad</a></p>
				</div>
                <div class="col-md-1 ">
					<p>-</p>
				</div>
                <div class="col-md-2 ">
					<p><a href="info.php#cookies" style = " color: inherit;  text-decoration: none;">Uso de cookies</a></p>
				</div>
                <div class="col-md-3 text-right">
					<p>Desarrollado por Zeus-Team</p>
				</div>
            </div>
		</div>
	</footer>
    <script>

        function topFunction() {
            document.body.scrollTop = 0; // Para Safari
            document.documentElement.scrollTop = 0; // Para Chrome, Firefox, IE y Opera
        }
    </script>
</body>
</html>

<!-- <!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="static/img/logo.png">
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD"
        crossorigin="anonymous"
    >
    <link
        rel="stylesheet"
        href="static/css/style.css"
    >
    <script 
        defer
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" 
        crossorigin="anonymous">
    </script>
    <title>ZEUS AirSoft</title>
</head>
<body class="bg-dark text-light py-3">
     -->