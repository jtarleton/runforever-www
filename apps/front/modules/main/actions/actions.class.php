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
$this->form = new RfRegistrationForm;


if ($request->isMethod('post'))
    {
      $this->form->bind(array('field1'=>$request->getParameter('field1'),
	'field2'=>$request->getParameter('field2'),


'subject'=>$request->getParameter('subject'),
'message'=>$request->getParameter('message')


	));
      
      if ($this->form->isValid())
      {


	// The message
$message = "This email has been registered for an account on Run Forever. Please click on the following link to activate your account, or this activation link will expire and the registation process will not complete. \r\nIn the event this registration was initiated in error, please let us know.\r\nThe RunForever Team";

// In case any of our lines are larger than 70 characters, we should use wordwrap()
$message = wordwrap($message, 70, "\r\n");

// Send
mail('jamestarleton@gmail.com', 'Registration Successful', $message);
        $this->redirect('home/index');
      } else {

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
