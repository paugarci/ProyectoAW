<?php require "comps/header.php" ?>
<div class="container d-flex justify-content-center" id="borders-form">
  <form class="needs-validation" novalidate="">
    <div class="row g-3 p-4">
      <h2 class="mb-3 d-flex justify-content-center">Registro</h2>

      <hr class="my-4">

      <div class="col-sm-6">
        <label for="firstName" class="form-label">Nombre</label>
        <input type="text" class="form-control" id="firstName" placeholder="Lorem" required="Mark">
        <div class="invalid-feedback">
          Por favor, rellene los campos obligatorios.
        </div>
      </div>

      <div class="col-sm-6">
        <label for="lastName" class="form-label">Apellidos</label>
        <input type="text" class="form-control" id="lastName" placeholder="Ipsum" required="Mark">
        <div class="invalid-feedback">
          Por favor, rellene los campos obligatorios.
        </div>
      </div>

      <div class="col-sm-12">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" id="email" placeholder="usuario@dominio.ext">
        <div class="invalid-feedback">
          Por favor, introduzca una dirección de correo electrónico válida.
        </div>
      </div>

      <div class="col-sm-6">
        <label for="password" class="form-label">Contraseña</label>
        <input type="password" class="form-control" id="password" placeholder="********" required="Mark">
        <div class="invalid-feedback">
          Por favor, rellene los campos obligatorios.
        </div>
      </div>

      <div class="col-sm-6">
        <label for="password" class="form-label">Confirmar contraseña</label>
        <input type="password" class="form-control" id="password" placeholder="********" required="Mark">
        <div class="invalid-feedback">
          Por favor, rellene los campos obligatorios.
        </div>
      </div>

      <div class="col-12">
        <label for="address" class="form-label">Dirección de correo postal</label>
        <input type="text" class="form-control" id="address" placeholder="Calle/Avenida..." required="">
        <div class="invalid-feedback">
          Por favor, rellene los campos obligatorios.
        </div>
      </div>

      <div class="col-12">
        <label for="address2" class="form-label">Portal, piso, puerta... <span
            class="text-muted">(Optional)</span></label>
        <input type="text" class="form-control" id="address2" placeholder="Portal 1, escalera A">
      </div>

      <div class="col-md-4">
        <label for="country" class="form-label">País</label>
        <span class="form-control">España</span>
        <div class="invalid-feedback">
          Por favor, rellene los campos obligatorios.
        </div>
      </div>

      <div class="col-md-5">
        <label for="state" class="form-label">Comunidad Autónoma</label>
        <select class="form-select" id="country" required="Mark">
          <option value="">Seleccionar...</option>
          <option>Andalucía</option>
          <option>Aragón</option>
          <option>Principado de Asturias</option>
          <option>Illes Balears</option>
          <option>Canarias</option>
          <option>Cantabria</option>
          <option>Castilla y León</option>
          <option>Castilla-La Mancha</option>
          <option>Cataluña</option>
          <option>Comunitat Valenciana</option>
          <option>Extremadura</option>
          <option>Galicia</option>
          <option>Comunidad de Madrid</option>
          <option>Región de Murcia</option>
          <option>Comunidad Foral de Navarra</option>
          <option>País Vasco</option>
          <option>La Rioja</option>
          <option>Ciudad Autónoma de Ceuta</option>
          <option>Ciudad Autónoma de Melilla</option>
        </select>
        <div class="invalid-feedback">
          Por favor, rellene los campos obligatorios.
        </div>
      </div>

      <div class="col-md-3">
        <label for="zip" class="form-label">Código postal</label>
        <input type="text" class="form-control" id="zip" placeholder="" required="">
        <div class="invalid-feedback">
          Por favor, rellene los campos obligatorios.
        </div>
      </div>
    </div>
    <div class="row g-3 m-1">
      <div class="form-check col-md-8">
        <input type="checkbox" class="form-check-input" id="same-address">
        <label class="form-check-label" for="same-address">Marque esta casilla para verificar que ha leído nuestros <a
            href="#">política de privacidad</a> del servicio.</label>
      </div>
    </div>
    <div class="row g-3 m-1">
      <div class="form-check col-md-8">
        <input type="checkbox" class="form-check-input" id="same-address">
        <label class="form-check-label" for="same-address">Marque esta casilla para verificar que ha leído nuestros <a
            href="#">términos y condiciones</a> de uso.</label>
      </div>
    </div>
    <hr class="my-4">

    <button class="w-100 btn btn-primary btn-lg" type="submit">Registrarse</button>
  </form>
</div>
<?php require "comps/footer.php" ?>