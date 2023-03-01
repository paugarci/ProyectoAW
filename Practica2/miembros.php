<?php
    require "includes/comun/header.php";
    require "database.php";

    $admins = $connection->query("SELECT * FROM admins");
?>
<div>
    <table class="table table-striped align-middle text-center">
        <thead class="table-dark">
            <tr>
                <th>Fotografía</th>
                <th>Nombre</th>
                <th>Apellidos</th>
                <th>Correo electrónico</th>
                <th>Aficiones e intereses</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($admins as $admin): ?>
            <tr>
                <td><img src="<?= $admin["img_path"] ?>" class="h-auto object-fit-contain rounded" style="width: 100px;" alt="<?= $admin["name"] ?>"></td>
                <td class="align-middle"><?= $admin["name"] ?></td>
                <td class="align-middle"><?= $admin["surname"] ?></td>
                <td class="align-middle"><?= $admin["mail"] ?></td>
                <td class="align-middle"><?= $admin["description"] ?></td>
            </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>
<?php require "includes/comun/footer.php" ?>