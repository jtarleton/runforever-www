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
  	$c = new MongoDB\Driver\Manager();
/*	$db = $c->test;
	$collection = $db->wp_post; 
	$q = array('_id'=>32);
	$row = $collection->findOne($q);
	$this->mongo = $row;
*/
	$query = 1;
	$this->post = RfBlogPostsTable::getInstance()->find($query);

   }
public function executeKit() {

}
public function executeFilms(sfWebRequest $request) {
$this->films = RfInspirationalMoviesTable::getInstance()->findAll();
}



public function executeRegister(sfWebRequest $request) {

    $user = $this->getUser();

    if($user->isAuthenticated()) {
      $this->forward('main','index');
    }
    $this->form = new RfRegistrationForm;


    if ($request->isMethod('post'))
    {
      $this->form->bind(array('email'=>$request->getParameter('email'),
        	'username'=>$request->getParameter('username'),

        'userpass'=>$request->getParameter('userpass')


        	));
      
          if ($this->form->isValid())
          {
            $token = md5($request->getParameter('email').time());
            $activateLink = 'http://www.runforever.co/security/verify?link='.$token;



            if(!empty($request->getParameter('username'))){

              
              $ipAddress = $_SERVER['REMOTE_ADDR'];
                  if (array_key_exists('HTTP_X_FORWARDED_FOR', $_SERVER)) {
                        $ipAddress = array_pop(explode(',', $_SERVER['HTTP_X_FORWARDED_FOR']));
                    }

                    $u =new RfUsers;
                    $now = time();
                    $u->setUsername($request->getParameter('username'));
                    $hashpass = Hashlib::create_hash($request->getParameter('userpass'));
                    $u->setUserpass($hashpass);
                    $u->setEmail($request->getParameter('email'));
                      $u->setIp($ipAddress);
                    $u->setVerificationToken($token);
                     $u->setVerificationTokenTs($now);
                    $u->setIsVerified(0);
                    $u->save();
                  
            }


            $u =Doctrine_Core::getTable('RfUsers')->findOneBy('username', $request->getParameter('username')); 
          

            $usrname=  $request->getParameter('username');

    	       // The message
            $message = "Hello $usrname!\r\nThis is to confirm your request for an account on Run Forever. Please click on the following link to activate your account, or this activation link will expire and the registation process will not complete.\r\n\r\n$activateLink\r\n\r\nIn the event this registration was initiated in error, please let us know.\r\nThe RunForever Team";

            // In case any of our lines are larger than 70 characters, we should use wordwrap()
            $message = wordwrap($message, 70, "\r\n");

            // Send
            mail($request->getParameter('email'), 'Run Forever Registration', $message);
      
              
              $user->setFlash('notice','Thanks! Your registration invitation has been sent.  Please check your email to verify the account.');

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

public function executeLogin(sfWebRequest $request) {
   $user = $this->getUser();

 if($user->isAuthenticated()) {
      $this->forward('main','index');
    }
	$this->form = new RfLoginForm;

 	if ($request->isMethod('post'))
    	{
      	$this->form->bind($request->getParameter('login'));
      	if ($this->form->isValid())
      	{
        // authenticate user and redirect them
        $this->getUser()->setAuthenticated(true);
        $this->getUser()->addCredential('user');
        $this->redirect('/');
      	}
    	}
}

public function executeLoginfb(sfWebRequest $request) {

}













public function executeAbout() {
}
public function executeGear() {
$this->gear = RfGearReviewsTable::getInstance()->findAll();
}
public function executeRecipes() {
$this->recipes = RfRecipesTable::getInstance()->findAll();
}
public function executeRecipedetail(sfWebRequest $request) {
$rid = $request->getParameter('rid');
$this->recipe = RfRecipesTable::getInstance()->find($rid);
}
public function executeRunforever() {


$this->posts =Doctrine_Query::create()
        ->select('p.*')
        ->from('RfBlogPosts p')
        ->orderBy('p.id DESC')->execute();

 //$this->posts =RfBlogPostsTable::getInstance()->findBy(array(), array('id' => 'ASC'));
}

public function executeEvents() {
$this->events = RfEventsTable::getInstance()->findAll();
}
public function executeArticles() {
$this->articles = RfArticlesTable::getInstance()->findAll();
}
public function executeQuotes() {
$this->quotes = RfQuotesTable::getInstance()->findAll();
}
public function executeSlideshows() {
$this->slides = RfSlidesTable::getInstance()->findAll();
}
}
