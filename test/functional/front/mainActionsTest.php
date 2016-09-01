<?php

include(dirname(__FILE__).'/../../bootstrap/functional.php');

$browser = new sfTestFunctional(new sfBrowser());

$browser->
  get('/')->

  with('request')->begin()->
    isParameter('module', 'main')->
    isParameter('action', 'runforever')->
  end()->

  with('response')->begin()->
  end()
;
