<?php
  $navBar = array (
    "index.php" => 'Inicio',
    "detalles.php" => 'Detalles',
    "bocetos.php" => 'Bocetos',
    "miembros.php" => 'Miembros',
    "planificacion.php" => ' Planificación',
    "contacto.php" => 'Contacto'
  );
  $current_page = basename($_SERVER['PHP_SELF']); 
?>

<nav class="navbar navbar-dark bg-dark navbar-expand-lg bg-body-tertiary" data-bs-theme="dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">
    <img src="static/img/logo.png" alt="" width="40" height="auto" class="d-inline-block align-text-top">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarText">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0 justify-content-center">
        <?php foreach($navBar as $key => $value): ?>
        <li class="nav-item">
          <a class="nav-link<?= $key == $current_page ? ' active' : '' ?>" href="<?= $key?>"><?= $value ?></a>
        </li>
        <?php endforeach ?>
      </ul>
      <!-- <div class="container-fluid justify-content-end d-flex"></div> -->
        <form action="login.php">
          <button class="btn btn-outline-light me-2" type="submit">Iniciar sesión</button>
        </form>
        <form action="register.php">
          <button class="btn btn-success" type="submit">Registrarse</button>
        </form>
      <!-- </div> -->
      <!-- <span class="navbar-text">
        [TIPO DE USUARIO]
      </span> -->
    </div>
  </div>
</nav>