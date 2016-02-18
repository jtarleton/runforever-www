<?php

/**
 * profile actions.
 *
 * @package    runforever
 * @subpackage profile
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class profileActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {

	$this->data = array();

  }
public function executePasswordreset($request) {
$this->passwordResetForm = new RfPasswordResetForm;

if($request->isMethod('post')){
	
	$this->passwordResetForm->bind(
array(
'currentpass'=>$request->getParameter('currentpass'),
'newpass'=>$request->getParameter('newpass'),
'confirmpass'=>$request->getParameter('confirmpass')
)); 


if($this->passwordResetForm->isValid()) {

$vals = $this->passwordResetForm->getValues();
die(var_dump($vals));


}

}









}
}
