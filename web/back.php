<?php

date_default_timezone_set('America/New_York');

require_once(dirname(__FILE__).'/../config/ProjectConfiguration.class.php');

$configuration = ProjectConfiguration::getApplicationConfiguration('back', 
'dev', true);


sfContext::createInstance($configuration)->dispatch();
