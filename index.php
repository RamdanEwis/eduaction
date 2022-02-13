<?php
include  'includes/autoloader.inc.php';

require_once 'vendor/autoload.php';


if (isset($_GET['admin'])):
    include 'includes/templates/admin/index.php';


else:

    include 'includes/templates/index.php';
endif;





