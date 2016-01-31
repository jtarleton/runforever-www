<?php
require('/var/jt-web/lib/UniversalClassLoader.php');
require_once dirname(__FILE__).'/../lib/autoload/sfCoreAutoload.class.php';
sfCoreAutoload::register();

class ProjectConfiguration extends sfProjectConfiguration
{
  public function setup()
  {
    $this->enablePlugins('sfDoctrinePlugin');
  	$this->namespacesClassLoader();
	}

	public function namespacesClassLoader() 
 {
   $loader = new UniversalClassLoader();
   $loader->registerNamespaces(array(
        'Facebook' => '/var/jt-web/lib',
    ));
   $loader->register();
 }



}
