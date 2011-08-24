<?php

require_once __DIR__.'/../lib/autoload/fwClassLoader.class.php';

/**
 * Plugin configuration
 *
 * @author Yohan Giarelli <yohan@giarelli.org>
 */
class fwClassLoaderPluginConfiguration extends sfPluginConfiguration
{
  /**
   * @var fwClassLoader
   */
  protected $classLoader;
  
  public function setup()
  {
    $this->classLoader = new fwClassLoader;
    $this->dispatcher->connect('context.load_factories', array($this, 'listenToContextLoadFactories'));
  }

  public function listenToContextLoadFactories($event)
  {
    if ($configPath = $event->getSubject()->getConfigCache()->checkConfig('config/fw_class_loader.yml'))
    {
      $config = include $configPath;
      $this->classLoader->initialize($config);
      $this->classLoader->register(true);
    }
  }
}
