<?php

include(dirname(__FILE__).'/../../bootstrap/functional.php');

$browser = new sfTestFunctional(new sfBrowser());

$browser->
  get('/security/index')->

  with('request')->begin()->
    isParameter('module', 'security')->
    isParameter('action', 'index')->
  end()->

  with('response')->begin()->
  end()
;
