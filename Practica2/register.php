<?php
  require "database.php";
  $error = null;

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $statement = $connection->prepare("SELECT * FROM users WHERE mail = :mail");
    $statement->bindParam(":mail", $_POST["mail"]);
    
    $selectedState = $connection->prepare("SELECT * FROM states WHERE name = :state");
    $selectedState->bindParam(":state", $_POST["state"]);

    if ($statement->rowCount() > 0)
      $error = "Este mail ya está registrado";
    else {
      $name = trim(strip_tags($_POST["name"]));
      $surname = trim(strip_tags($_POST["surname"]));
      $mail = trim(strip_tags($_POST["mail"]));
      $password = password_hash($_POST["password"], PASSWORD_BCRYPT);
      $address1 = trim(strip_tags($_POST["address1"]));
      $address2 = trim(strip_tags($_POST["address2"]));
      $state = trim(strip_tags($_POST["state"]));
      $zip = trim(strip_tags($_POST["zip"]));

      if ($name == null || $surname == null || $mail == null || $password == null
        || $address1 == null || $state == null || $zip == null) {
        $error = "Campos incorrectos";
      } else {
        $connection
        ->prepare("INSERT INTO users SET 
            name='$name',
            surname='$surname',
            mail='$mail',
            password='$password',
            address1='$address1',
            address2='$address2',
            state='$state',
            zip='$zip'")
          ->execute();

        $statement = $connection->prepare("SELECT * FROM users WHERE mail = :mail LIMIT 1");
        $statement->bindParam(":mail", $_POST["mail"]);
        $statement->execute();
        $user = $statement->fetch(PDO::FETCH_ASSOC);

        session_start();
        $_SESSION["user"] = $user;

        header("Location: index.php");
      }
    }
  }

  $states = $connection->query("SELECT * FROM states ORDER BY name ASC");

  require "includes/comun/header.php";
?>


<div class="container d-flex col-lg-5" id="borders-form">
  <form class="needs-validation" action="register.php" method="post">
    <div class="row g-3 p-4">
      <?php if ($error): ?>
        <div class="alert alert-danger m-2 align-center" role="alert">
          <?= $error ?>
        </div>
      <?php endif ?>
      <h2 class="mb-3 d-flex justify-content-center">Registro</h2>
      
      <hr class="mt-1">

      <div class="col-sm-12">
        <label for="mail" class="form-label">Correo electrónico</label>
        <input type="email" class="form-control" name="mail" placeholder="usuario@dominio.ext" required>
        <div class="invalid-feedback">
          Por favor, introduzca una dirección de correo electrónico válida.
        </div>
      </div>

      <div class="col-sm-12">
        <label for="password" class="form-label">Contraseña</label>
        <input type="password" class="form-control" name="password" placeholder="********" required>
        <div class="invalid-feedback">
          Por favor, rellene los campos obligatorios.
        </div>
      </div>
      
      <hr class="my-4">

      <div class="col-sm-6">
        <label for="firstName" class="form-label">Nombre</label>
        <input type="text" class="form-control" name="name" placeholder="Lorem" required>
        <div class="invalid-feedback">
          Por favor, rellene los campos obligatorios.
        </div>
      </div>

      <div class="col-sm-6">
        <label for="lastName" class="form-label">Apellidos</label>
        <input type="text" class="form-control" name="surname" placeholder="Ipsum" required>
        <div class="invalid-feedback">
          Por favor, rellene los campos obligatorios.
        </div>
      </div>

      <div class="col-12">
        <label for="address1" class="form-label">Dirección de correo postal</label>
        <input type="text" class="form-control" name="address1" placeholder="Calle/Avenida..." required>
        <div class="invalid-feedback">
          Por favor, rellene los campos obligatorios.
        </div>
      </div>

      <div class="col-12">
        <label for="address2" class="form-label">Portal, piso, puerta... <span
            class="text-muted">(Optional)</span></label>
        <input type="text" class="form-control" name="address2" placeholder="Portal 1, escalera A">
      </div>

      <div class="col-md-4">
        <label for="country" class="form-label">País</label>
        <span class="form-control">España</span>
      </div>

      <div class="col-md-5">
        <label for="state" class="form-label">Comunidad Autónoma</label>
        <select class="form-select" name="state" required>
          <option>Seleccionar...</option>
          <?php foreach ($states as $state): ?>
            <option><?= $state["name"] ?></option>
          <?php endforeach ?>
        </select>
        <div class="invalid-feedback">
          Por favor, rellene los campos obligatorios.
        </div>
      </div>

      <div class="col-md-3">
        <label for="zip" class="form-label">Código postal</label>
        <input type="text" class="form-control" name="zip" required>
        <div class="invalid-feedback">
          Por favor, rellene los campos obligatorios.
        </div>
      </div>
    </div>
    <div class="row g-3 m-1">
      <div class="form-check col-md-9">
        <input type="checkbox" class="form-check-input" id="same-address" required>
        <label class="form-check-label" for="same-address">Marque esta casilla para verificar que ha leído nuestros <a
            href="#">política de privacidad</a> y los <a href="#">términos y condiciones</a> del servicio.</label>
      </div>
    </div>

    <hr class="my-4">

    <button class="w-100 btn btn-primary btn-lg" type="submit">Registrarse</button>
  </form>
</div>
<?php require "includes/comun/footer.php" ?>