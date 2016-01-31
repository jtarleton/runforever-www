<?php
/*
*
*
*
*/

class genFilter extends sfFilter
{
    public function execute ($filterChain)
    {


      

        $context = $this->getContext();
        $request = $context->getRequest();
        $response = $context->getResponse();
        $usr = $context->getUser();
        $controller = $context->getController();

        $module = strtolower($context->getModuleName());
        $action = strtolower($context->getActionName());

    	//if( $this->isFirstCall() )
    	//{
	    	//RegisterNotify::initialize();
    	//}




	    /*

        SysConfig::getInstance();
		$session = GeneralSession::getInstance();


		// Set the application title

        $response->setTitle( KVStore::getInstance()->get('APPLICATION_NAME','NOT SET') );

		Context::initialize();


*/




        /*
        * Authentication
        */

    	if( ! $usr->isAuthenticated() )
    	{
        	if( $module != 'security'  )
        	{
	        	// If module is 'ajax', we have a special stop point

	        	//if( $module == 'ajax' )
	        		//return $controller->redirect('security/ajax');

	        	// Otherwise, redirect to security/login
       			return $controller->redirect('security/login');
   			}
		} 
        else 
        {
	       // try
	        //{
	        //	$user = new User( $session->getUser() );
        	//}
	        //catch( Exception $e )
	        //{
		    //    $session->clear();
	        //	return $controller->redirect('security/login');
        	//}

	        // Validate that the user is still active


			if(1){ // ! $user->hasPriv('user') )
	        
		        //$session->clear();

	        	//if( $module == 'ajax' )
	        		//return $controller->redirect('security/ajax');


		        //$session->setFlash('notice','You are not authorized to access this application.');
	        	
        	}


	        // Set the user object into our Context
        	//Context::setUser( $user );

    	
            //return $controller->redirect('security/login');
        }





        // Execute next filter in the chain

        $filterChain->execute();


        // Add nocache pragmas
        $response->setHttpHeader('Cache-Control', 'private, must-revalidate, no-cache, no-store');
        $response->setHttpHeader('Pragma','no-cache');
        $response->setHttpHeader('Expires',0);


    }
}