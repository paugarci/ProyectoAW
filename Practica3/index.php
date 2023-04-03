<?php

require_once 'includes/config.php';

?>

<?php ob_start(); ?>

<div class="px-3 py-2">
    <h1>Zeus Airsoft</h1>
    <p>Página principal de Zeus Airsoft. Puedes navegar las distintas vistas usando la navbar arriba, pinchando en cualquiera de los enlaces.</p>
</div>

<?php $content = ob_get_clean();


require_once PROJECT_ROOT . '/includes/templates/default_template.php';

?>