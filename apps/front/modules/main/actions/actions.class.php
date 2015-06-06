<?php

/**
 * main actions.
 *
 * @package    runforever
 * @subpackage main
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class mainActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
  	$c = new MongoClient();
	$db = $c->test;
	$collection = $db->wp_post; 
	$q = array('_id'=>32);
	$row = $collection->findOne($q);
	$this->mongo = $row;
   }
}
