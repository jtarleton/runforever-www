<?php

class myUser extends sfBasicSecurityUser
{

public $username;


	public function __construct(sfEventDispatcher $e, sfStorage $s = null) {
	$this->init();
	parent::__construct($e, $s);
	}

	public function init( ) {

	$this->username = 'joe'.rand();
	//parent::__construct();




	}

	public function getUsername() {

return $this->username;
	}



}
