<?php

use es\ucm\fdi\aw\forms\CreateEventForm;

require_once 'includes/config.php';

if (!isset($_SESSION['user']))
    goto end;

ob_start();

?>

<?=($form = new CreateEventForm())->handleForm(); ?>

<?php
end:

$content = ob_get_clean();
require_once 'includes/templates/events_template.php';

?>