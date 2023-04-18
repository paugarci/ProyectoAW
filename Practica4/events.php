<?php

require_once 'includes/config.php'; 
ob_start();

?>

<p>
    Aquí podrás consultar toda la información acerca de los próximos eventos y gestionar los eventos a los que estás apuntado.
</p>

<?php

$title = 'Eventos';
$content = ob_get_clean();

require_once 'includes/templates/events_template.php';

?>

