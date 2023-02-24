<?php
  require "database.php";
  $error = null;
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $statement = $connection->prepare("SELECT * FROM users WHERE mail = :mail LIMIT 1");
    $statement->bindParam(":mail", $_POST["mail"]);
    $statement->execute();

    if ($statement->rowCount() == 0) {
      $error = "Error! Invalid credentials.";
    } else {
      $user = $statement->fetch(PDO::FETCH_ASSOC);

      if (!password_verify($_POST["password"], $user["password"])) {
        $error = "Error! Invalid credentials.";
      } else {
        session_start();
        
        unset($user["password"]);
        $_SESSION["user"] = $user;

        header("Location: index.php");
      }
    }
  }
  require "comps/header.php";
?>
<div class="container d-flex justify-content-center col-lg-4" id="borders-form">
  <form class="needs-validation" method="post" action="login.php">
    <div class="row g-3 p-4">
      <h2 class="mb-3 d-flex justify-content-center">Inciar sesión</h2>

      <hr class="my-4">
      
      <?php if ($error): ?>
        <br>
        <div class="alert alert-danger m-2 justify-content-center align-center" role="alert">
          <?= $error ?>
        </div>
      <?php endif ?>

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

      <button class="w-100 btn btn-primary btn-lg" type="submit">Entrar</button>
  </form>
</div>
<?php require "comps/footer.php" ?>