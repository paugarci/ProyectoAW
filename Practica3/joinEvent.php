<?php

use es\ucm\fdi\aw\forms\JoinEventForm;

require_once 'includes/config.php';

if (!isset($_SESSION['user']))
    goto end;

$eventID = $_GET['eventID'];

ob_start();


?>

<?=($form = new JoinEventForm($eventID))->handleForm(); ?>

<?php
end:

$content = ob_get_clean();
require_once 'includes/templates/events_template.php';

?>