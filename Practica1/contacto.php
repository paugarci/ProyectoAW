<?php require "comps/header.php" ?>
<div class="container d-flex justify-content-center" id="borders-form">
  <form class="needs-validation" novalidate="">
    <div class="row g-3 p-4">
      <h2 class="mb-3 d-flex justify-content-center">Contacta con nosotros</h2>

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

      <div class="col-12">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" id="email" placeholder="usuario@dominio.ext">
        <div class="invalid-feedback">
          Por favor, introduzca una dirección de correo electrónico válida.
        </div>
      </div>


      <div class="row g-3 m-1 d-flex justify-content-center">
        <div class="form-check col-md-4">
          <input id="evaluacion" name="contactReason" type="radio" class="form-check-input" checked="" required="">
          <label class="form-check-label" for="credit">Evaluación</label>
        </div>
        <div class="form-check col-md-4">
          <input id="sugerencias" name="contactReason" type="radio" class="form-check-input" required="">
          <label class="form-check-label" for="debit">Sugerencias</label>
        </div>
        <div class="form-check col-md-4">
          <input id="criticas" name="contactReason" type="radio" class="form-check-input" required="">
          <label class="form-check-label" for="paypal">Críticas</label>
        </div>
      </div>

      <div class="form-group">
        <label for="textBox" class="form-label">Motivo de su consulta</label>
        <textarea class="form-control" id="textBox" rows="5"></textarea>
      </div>

      <div class="form-check col-md-8">
        <input type="checkbox" class="form-check-input" id="same-address">
        <label class="form-check-label" for="same-address">Marque esta casilla para verificar que ha leído nuestros <a
            href="#">términos y condiciones</a> de uso.</label>
      </div>

      <hr class="my-4">

      <button class="w-100 btn btn-primary btn-lg" type="submit">Enviar</button>
  </form>
</div>

<?php require "comps/footer.php" ?>