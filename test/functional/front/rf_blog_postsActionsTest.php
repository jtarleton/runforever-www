<?php

include(dirname(__FILE__).'/../../bootstrap/functional.php');

$browser = new sfTestFunctional(new sfBrowser());

$browser->
  get('/rf_blog_posts/index')->

  with('request')->begin()->
    isParameter('module', 'rf_blog_posts')->
    isParameter('action', 'index')->
  end()->

  with('response')->begin()->
  end()
;
