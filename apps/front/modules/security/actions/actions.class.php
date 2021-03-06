<?php

/**
 * security actions.
 *
 */



class securityActions extends sfActions
{

	public function executeNotadmin( sfWebRequest $request )
	{}

	public function executeException( sfWebRequest $request )
	{
	}

		public function executeInvited( sfWebRequest $request )
	{
	}

	public function executeLogout( sfWebRequest $request )
	{
		$this->getUser()->setAuthenticated(false);
		//GeneralSession::getInstance()->clear();
		$this->redirect('security/login');
	}

	public function executeVerify( sfWebRequest $request )
	{

		$u =Doctrine_Core::getTable('RfUsers')->findOneBy('verification_token', $request->getParameter('link')); 

		$usertoken = $u->getVerificationToken();

		$token = $request->getParameter('link');
		$now = time();
		$expiredDiff = $now  - $u->getVerificationTokenTs();
		$expiredInvite = ($expiredDiff > 1800 ) ? true : false;
		$alreadyVerified = !empty($u->getIsVerified()) ? true : false;
		if($token === $usertoken && $u instanceof RfUsers && !$expiredInvite && !$alreadyVerified) {
			$u->setIsVerified(1);
			$u->save();
			$this->getUser()->setFlash('notice','Your account has been successfully activated.  You may now login.');
			$this->getUser()->setAuthenticated(false);
						$this->redirect('security/login?username='.$u->getUsername()); 
		} elseif($alreadyVerified) {
			$this->getUser()->setFlash('error','This account has already been verified.');
			$this->getUser()->setAuthenticated(false);

		}elseif($expiredInvite && !$alreadyVerified) {
						$this->getUser()->setFlash('error','The invitation to activate this account has expired. Please submit a new registration request.');
			$this->getUser()->setAuthenticated(false);	
		}

	}

	public function executeAjax( sfWebRequest $request )
	{
		$this->setLayout(false);

		return $this->renderText('Error: Not logged in');
	}


	public function executeForgotpassword($request) {

		$this->form = new sfForm;
			$this->form->setWidgets(
				array(
			      'email'    => new sfWidgetFormInputText(array('label'=>'Email'), array('placeholder'=>'me@example.com','class'=>'form-control')),
			      
			      )
			);

		$this->form->setValidators(
				array(
			      'email'    => new sfValidatorString(),
			'g-recaptcha-response'=>new GoogleCaptchaValidator
			      )
			);

    if ($request->isMethod('post'))
    {
      $this->form->bind(array(
  'g-recaptcha-response'=>$request->getParameter('g-recaptcha-response'),
      	'email'=>$request->getParameter('email')));
      
          if ($this->form->isValid())
          {
           

          	$message = '';
            if(!empty($request->getParameter('email'))){

              

                    $random = Hashlib::generateRandomString();
                    $u =Doctrine_Core::getTable('RfUsers')->findOneBy('email', $request->getParameter('email')); 
          
                    if(empty($u->getIsVerified())) {
                    	    $this->getUser()->setFlash('notice','Sorry, this feature is only available to activated accounts. Please activate the account from the link in the invitation you received or submit a new registration.');

            				$this->redirect('main/register');

                    }

                    $now = time();
                    
                    $hashpass = Hashlib::create_hash($random);
                    $u->setUserpass($hashpass);
        
                    $u->save();

                    $usrname=  $u->getUsername();
		            $newpassinfo = $random;
		    	    // The message
		            $message .= "Hello $usrname!\r\nThis is to provide you with a reset password on Run Forever.\r\n\r\n$newpassinfo\r\n\r\nIf this information request was initiated in error, please let us know.\r\nThe RunForever Team";

                  
            }


            

            
            // In case any of our lines are larger than 70 characters, we should use wordwrap()
            $message = wordwrap($message, 70, "\r\n");

            // Send
            mail($request->getParameter('email'), 'Your Run Forever Account Information', $message);
      
              
              $this->getUser()->setFlash('notice','No worries! Your new password has been sent.  Please check your email.');

            $this->redirect('security/invited');
          } 
          else {

            		$user = $this->getUser();
            		$user->setFlash('error','Something went wrong!');
            		

            	foreach($this->form->getErrorSchema()->getErrors() as $key => $error)
              {
                echo '<p>' . $key . ': ' . $error . '</p>';
              }


    		}





















}


	}


	public function executeLogin(sfWebRequest $request)
	{
/*
$ips=array();
foreach( Doctrine_Query::create()->select('j.geoip_addr')->from('JtGeodata j')->fetchArray() as $row) {
	$ips[$row['geoip_addr']] = $row['geoip_addr'];
}
if(!in_array( $_SERVER['GEOIP_ADDR'], $ips) ){
	JtGeodataTable::doIns();
} */
		// Invalidate the session, but save flash messages
		//$this->setLayout('tbs_login');

		//	$sfSecUser = new sfBasicSecurityUser ;
		//$sfSecUser->clearCredentials();

		// Define the form
		$this->form = new sfForm();


	
		$this->form->setWidgets(
				array(
			      'username'    => new sfWidgetFormInputText(array('label'=>'Username'), array('default'=>$request->getParameter('username'), 'placeholder'=>'username','class'=>'form-control')),
			      'passwd'   => new sfWidgetFormInputPassword(array('label'=>'Password'), array('placeholder'=>'password','class'=>'form-control')) 
			      )
			);

		$this->form->setValidators(
				array(
			      'username'    => new sfValidatorString(),
			      'passwd'   => new sfValidatorString() 
			      )
			);

		$this->form->getValidatorSchema()->setPostValidator(
            new sfValidatorCallback(array('callback' => array($this, 'checkPassword')))
        );














		if($request->isMethod('post')){
			$this->form->bind( array( 
				'username' => $request->getParameter( 'username'), 
				'passwd' => $request->getParameter('passwd') 

				) 
			);

			if($this->form->isValid())
			{

					//cleaned request data
					$clean = $this->form->getValues();




						// set props with clean data

				  		$usr = new stdClass; //$sfSecUser->isAuthenticated(); //$this->form['user']->getFinalValue();
				  		$usr->username = $clean['username'];
				  		$usr->passwd = $clean['passwd'];
				  	

	
				  		$this->getUser()->setAuthenticated(true);

				  		$this->getUser()->setAttribute('username',  $clean['username']);
sfContext::getInstance()->getStorage()->write('usr',$usr);

if($usr->username=='jtarleton') {
$this->getUser()->addCredential('admin');

}



						$this->redirect('main/index'); //Login succeeded!


						// Remove auth for development
						//$bypass = SysConfig::getInstance()->get('LOGIN_BYPASS','N');

					
	  		} 
  		} 
  		


			
  		
	}




	public function checkPassword($validator, $values)
	{
		$usernameOK = false;
		$passOK = false;
		try
		{
			$u = null;
			if(!empty($values['username'])){
				$u =Doctrine_Core::getTable('RfUsers')->findOneBy('username', $values['username']); 
			}
			if($u instanceof RfUsers) {
				$usernameOK = true;
				$dbhash = $u->getUserpass();

				$passOK     = HashLib::validate_password($values['passwd'], $dbhash);
			}
			else {
				throw new Exception('Invalid credentials');	
			}
	   	}
	   	catch(Exception $e) {
	   		throw new sfValidatorError($validator, $e->getMessage());
	   	}



		if( $usernameOK  && $passOK ) {
			return $values;
		}
		else
		{ 
	       throw new sfValidatorError($validator, 'Invalid credentials');
	        // throw an error bound to the password field
	        //throw new sfValidatorErrorSchema($validator, array('username' => $error,              'passwd' => $error));
	    }
	    return $values;
	}
}
