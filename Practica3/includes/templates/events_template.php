<?php

require_once 'includes/config.php';
ob_start();

?>


<div class="d-flex flex-column flex-shrink-0 p-3 bg-dark" style="width: 300px">
    <ul class="nav nav-pills flex-column">
        <li class="nav-item">
            <a href="allEvents.php" class="nav-link">Todos los eventos</a>
        </li>
        <li class="nav-item">
            <a href="myEvents.php" class="nav-link">Mis eventos</a>
        </li>
        <li class="nav-item">
            <a href="myTeam.php" class="nav-link">Mi equipo</a>
        </li>
    </ul>
</div>
<div class="flex-fill p-3">
    <?php if (!isset($_SESSION['user'])) : ?>

        <div class="alert alert-warning">
            Debes iniciar sesión para acceder a esta página.
        </div>

    <?php else : ?>

        <?php echo isset($content) ? $content : 'No hay contenido para esta página' ?>

    <?php endif; ?>
</div>


<?php

$content = ob_get_clean();

require_once 'includes/templates/default_template.php';

?>