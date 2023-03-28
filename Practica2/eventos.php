<?php
    require "includes/comun/header.php";

    $basename = basename($_SERVER['PHP_SELF']);
    $subpageKey = 'subpage';
    $subpageValue = 'eventos_disponibles';

    if (isset($_GET[$subpageKey]))
        $subpageValue = $_GET[$subpageKey];
?>

<div class="wrapper d-flex align-items-stretch object-fit-fill">
    <div class="ps-5 py-5 bg-dark" style="width: 350px"> <!-- No me mates, Hugo, jejeje -->
    <form action="<?=$basename?>">
            <ul class="list-unstyled">
                <li class="active">
                    <button type="submit" class="btn btn-link text-decoration-none text-primary" name="<?=$subpageKey?>" value="eventos_disponibles">Eventos disponibles</button>
                </li>
                <li class="mt-2">
                    <button type="submit" class="btn btn-link text-decoration-none text-primary" name="<?=$subpageKey?>" value="mis_eventos">Mis eventos</button>
                </li>
                <li class="mt-2">
                    <button type="submit" class="btn btn-link text-decoration-none text-primary" name="<?=$subpageKey?>" value="mi_equipo">Mi equipo</button>
                </li>
            </ul>
        </div>
        </form>
    <div class="w-100 px-5 py-4">
        <?php
            require "eventos/{$subpageValue}.php"
        ?>
    </div>
</div>

<?php
    require "includes/comun/footer.php";
?>