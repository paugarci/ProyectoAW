<?php

require_once 'includes/config.php';

$current_page = basename($_SERVER['PHP_SELF']);
$logoPath = 'images/logo.png';
$menu = array(
    "index.php" => 'Inicio',
    "products.php" => 'Productos',
    "forum.php" => 'Foro',
    "events.php" => 'Eventos',
    "contact.php" => 'Contacto',
    "information.php" => 'Información'
);
?>

<nav class="navbar navbar-dark bg-dark navbar-expand-lg bg-body-tertiary" data-bs-theme="dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="index.php">
            <img src="<?= $logoPath ?>" alt="Logo" width="40" height="40" class="d-inline-block align-text-top">
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 justify-content-center">
                <?php foreach ($menu as $key => $value) : ?>
                    <li class="nav-item">
                        <a class="nav-link<?= $key == $current_page ? ' active' : '' ?>" href="<?= $key ?>"><?= $value ?></a>
                    </li>
                <?php endforeach ?>
            </ul>

            <?php if (isset($_SESSION["user"])) : ?>
                <form action="shopping-cart.php">
                    <button type="submit" class="btn btn-secondary m-1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16">
                            <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"></path>
                        </svg>
                    </button>
                </form>
                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle m-1" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Hola, <?= $_SESSION["user"]->getName() ?>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-dark">
                        <li><a class="dropdown-item" href="#">Cuenta</a></li>
                        <li><a class="dropdown-item" href="#">Pedidos</a></li>
                        <li><a class="dropdown-item" href="#">Lista de deseos</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="logout.php">Cerrar sesión</a></li>
                    </ul>
                </div>
            <?php else : ?>
                <form action="login.php">
                    <button class="btn btn-outline-primary m-1" type="submit">Iniciar sesión</button>
                </form>
                <form action="register.php">
                    <button class="btn btn-primary m-1" type="submit">Registrarse</button>
                </form>
            <?php endif ?>
        </div>
    </div>
</nav>