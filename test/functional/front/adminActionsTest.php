<?php

include(dirname(__FILE__).'/../../bootstrap/functional.php');

$browser = new sfTestFunctional(new sfBrowser());

$browser->
  get('/admin/index')->

  with('request')->begin()->
    isParameter('module', 'admin')->
    isParameter('action', 'index')->
  end()->

  with('response')->begin()->
  end()
;
