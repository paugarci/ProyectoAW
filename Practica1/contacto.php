<?php require "comps/header.php" ?>
<div class="d-flex align-items-center justify-content-center" id="contact-form">
    <form>
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" class="form-control" placeholder="Nombre" id="nombre">
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Correo electrónico</label>
            <input type="email" class="form-control" placeholder="nombre@ejemplo.com" id="email" aria-describedby="emailHelp">
            <div id="emailHelp" class="form-text">No publicaremos tus datos con nadie.</div>
        </div>

        <div class="form-check">
            <input class="form-check-input" type="radio" name="flexRadioDefault" id="evaluacion">
            <label class="form-check-label" for="evaluacion">Evaluación</label>
        </div>

        <div class="form-check">
            <input class="form-check-input" type="radio" name="flexRadioDefault" id="sugerencias">
            <label class="form-check-label" for="sugerencias">Sugerencias</label>
        </div>

        <div class="form-check">
            <input class="form-check-input" type="radio" name="flexRadioDefault" id="criticas">
            <label class="form-check-label" for="criticas">Críticas</label>
        </div>
        <br>
        <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="politica">
            <label class="form-check-label" for="politica">Marque esta casilla para verificar que ha leído<br>nuestros términos y condiciones del servicio</label>
        </div>

        <button type="submit" class="btn btn-primary">Envíar</button>
    </form>
</div>
<?php require "comps/footer.php" ?>