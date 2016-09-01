<?php

// this file is saved as SF_PROJECT/batch/cron_example.php
 
define('SF_ROOT_DIR', realpath(dirname(__FILE__).'/..'));
define('SF_APP', 'front');
define('SF_ENVIRONMENT', 'prod');
define('SF_DEBUG', true);
/* 
require_once(SF_ROOT_DIR.DIRECTORY_SEPARATOR.'apps'.DIRECTORY_SEPARATOR.SF_APP.DIRECTORY_SEPARATOR.'config'.DIRECTORY_SEPARATOR.'frontConfiguration.class.php');
 
// get the application instance
sfContext::getInstance();
 */

require_once(dirname(__FILE__).'/../config/ProjectConfiguration.class.php');

$configuration = ProjectConfiguration::getApplicationConfiguration('front',
'dev', true);



sfContext::createInstance($configuration);

$get = array();
$url = 'http://www.nytimes.com/svc/collections/v1/publish/www.nytimes.com/topic/subject/running/rss.xml';
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url . (strpos($url, '?') === FALSE ? '?' : ''). http_build_query($get) );
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

if( ! $curl_resp = curl_exec($ch))
    {
        trigger_error(curl_error($ch));
    } 
curl_close($ch);

$xml = simplexml_load_string(trim($curl_resp));

$blocks  = $xml->xpath('//channel'); //gets all <block/> tags
$b = $xml->xpath('//channel/item'); //gets all <block/> which parent are   <layout/>  tags

?>

<?php
$i=0;
foreach($b as $row){

$p = new RfBlogPosts;
$p->setTitle($row->title->__toString());
$p->setIntro($row->description->__toString() .'<br />Read full article at <a href="' .$row->link->__toString(). '">' . $row->link->__toString() .'</a>');
$p->setBody($row->description->__toString() .'<br />Read full article at <a href="' .$row->link->__toString(). '">' . $row->link->__toString() .'</a>');
$p->setPublishedStatus('published');
$p->setCreatedOn(date('Y-m-d H:i:s'));
$p->save();
$i++;
} 
echo "Read and inserted $i articles into RfBlogPosts";













// put whatever code you need here…
echo "\r\n running cron job….\r\n";


