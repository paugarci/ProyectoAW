<?php

use es\ucm\fdi\aw\forms\DeleteEventForm;

require_once 'includes/config.php';

if (!isset($_SESSION['user']))
    goto end;

    ob_start();
?>

<?=($form = new DeleteEventForm($_GET['eventID']))->handleForm(); ?>

<?php
end:

$content = ob_get_clean();
require_once 'includes/templates/events_template.php';

?>