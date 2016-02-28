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
  
  $usr=$this->getUser();
  $u =Doctrine_Core::getTable('RfUsers')->findOneBy('username', $usr->getAttribute('username')); 


            $u->setUserpass($vals['confirmpass']);
        
                    $u->save();

                    $usrname=  $u->getUsername();
                $newpassinfo = $vals['confirmpass'];
              // The message
                $message .= "Hello $usrname!\r\nThis is to notify you your password change on Run Forever has been processed.\r\n\r\n$newpassinfo\r\n\r\nIf this information request was initiated in error, please let us know.\r\nThe RunForever Team";
 // In case any of our lines are larger than 70 characters, we should use wordwrap()
            $message = wordwrap($message, 70, "\r\n");

            // Send
            mail( $u->getEmail(), 'Your Run Forever Account Information', $message);
      
              
              $this->getUser()->setFlash('notice','No prob! Your new password has been saved.  Please check your email.');

            $this->redirect('main/index');






}

}









}
}
