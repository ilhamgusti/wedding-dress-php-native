<?php
//Require libraries from folder libraries
require_once 'libraries/Core.php';
require_once 'libraries/Controller.php';
require_once 'libraries/Database.php';

require_once 'helpers/session_helper.php';
require_once 'helpers/tags_status_helper.php';
require_once 'helpers/date_converter_helper.php';

require_once 'config/config.php';

//Instantiate core class
$init = new Core();
