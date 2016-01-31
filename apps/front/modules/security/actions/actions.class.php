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
			      'username'    => new sfWidgetFormInputText(array('label'=>'Username'), array('default'=>$request->getUsername(), 'placeholder'=>'username','class'=>'form-control')),
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
