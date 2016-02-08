<?php

/**
 * menu actions.
 *
 * @package    runforever
 * @subpackage menu
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class menuActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
	$this->data = array(
		'@rf_blog_posts'=>'Manage Blog Posts',
		'@rf_users'=>'Manage Users',
		'@rf_slideshow'=>'Manage Slideshow',
		'@rf_slides'=>'Manage Slides',
		'@rf_quotes'=>'Manage Quotes',
		'@rf_survey_questions'=>'Manage Survey Questions',
		'@rf_survey_answers'=>'Manage Survey Answers',
		'@rf_films'=>'Manage Films',
		'@rf_sessions'=>'Manage Sessions',
		'@rf_blog_terms'=>'Manage Terms',
		'@rf_blog_term_relationships'=>'Term Relationships',
		'@rf_gear_reviews'=>'Manage Gear Reviews',
		'@rf_events'=>'Manage Events'


);
  }
}
