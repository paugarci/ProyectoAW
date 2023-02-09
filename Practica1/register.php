<?php require "comps/header.php" ?>
<div class="d-flex align-items-center justify-content-center" id="contact-form">
<form class="row g-3">
  <div class="col-md-6">
    <label for="nombre" class="form-label">Nombre</label>
    <input type="text" class="form-control" id="nombre" placeholder="Lorem">
  </div>
  <div class="col-md-6">
    <label for="apellidos" class="form-label">Apellidos</label>
    <input type="text" class="form-control" id="apellidos" placeholder="Ipsum">
  </div>
  <div class="col-12">
    <label for="inputAddress" class="form-label">Correo electrónico</label>
    <input type="text" class="form-control" id="inputAddress" placeholder="example@ucm.es">
  </div>
  <div class="col-12">
    <label for="inputAddress" class="form-label">Address</label>
    <input type="text" class="form-control" id="inputAddress" placeholder="Calle Lorem Ipsum">
  </div>
  <div class="col-12">
    <label for="inputAddress2" class="form-label">Address 2</label>
    <input type="text" class="form-control" id="inputAddress2" placeholder="Apartamento, estudio o piso">
  </div>
    <div class="col-sm-4">
      <label for="inputAddress2" class="form-label">País</label>
      <input type="text" class="form-control" placeholder="City" aria-label="City">
    </div>
    <div class="col-sm-4">
      <label for="inputAddress2" class="form-label">Estado</label>
      <input type="text" class="form-control" placeholder="State" aria-label="State">
    </div>
    <div class="col-sm-4">
      <label for="inputAddress2" class="form-label">Código postal</label>
      <input type="text" class="form-control" placeholder="Zip" aria-label="Zip">
    </div>
  <div class="col-12">
    <div class="form-check">
      <input class="form-check-input" type="checkbox" id="gridCheck">
      <label class="form-check-label" for="gridCheck">
        Check me out
      </label>
    </div>
  </div>
  <div class="col-12">
    <button type="submit" class="btn btn-primary">Sign in</button>
  </div>
</form>
</div>
<?php require "comps/footer.php" ?>