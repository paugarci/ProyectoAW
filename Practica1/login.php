<?php require "comps/header.php" ?>
<div class="container d-flex justify-content-center" id="borders-form">
  <form class="needs-validation" novalidate="">
    <div class="row g-3 p-4">
      <h2 class="mb-3 d-flex justify-content-center">Inciar sesión</h2>

      <hr class="my-4">

      <div class="col-sm-12">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" id="email" placeholder="usuario@dominio.ext">
        <div class="invalid-feedback">
          Por favor, introduzca una dirección de correo electrónico válida.
        </div>
      </div>

      <div class="col-sm-12">
        <label for="password" class="form-label">Contraseña</label>
        <input type="password" class="form-control" id="password" placeholder="********" required="Mark">
        <div class="invalid-feedback">
          Por favor, rellene los campos obligatorios.
        </div>
      </div>

      <hr class="my-4">

      <button class="w-100 btn btn-primary btn-lg" type="submit">Entrar</button>
  </form>
</div>
<?php require "comps/footer.php" ?>