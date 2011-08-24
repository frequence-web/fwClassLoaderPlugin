<?php

require_once sfConfig::get('sf_lib_dir').'/vendor/symfony2/src/ClassLoader/UniversalClassLoader.php';

use Symfony\Component\ClassLoader\UniversalClassLoader;

/**
 * Wrap the Symfony2 UniversalClassLoader
 *
 * @author Yohan Giarelli <yohan@giarelli.org>
 */
class fwClassLoader
{
  /**
   * @var array
   */
  protected $config;

  /**
   * @var \Symfony\Component\ClassLoader\UniversalClassLoader
   */
  protected $loader;

  public function __construct()
  {
    $this->loader = new UniversalClassLoader;
  }

  public function initialize(array $config)
  {
    foreach ($config as $type => $paths)
    {
      $method = sfInflector::camelize('register_'.$type);
      $this->loader->$method($paths);
    }
  }

  public function register($prepend = false)
  {
    $this->loader->register($prepend);
  }

  /**
   * @param \Symfony\Component\ClassLoader\UniversalClassLoader $loader
   */
  public function setLoader($loader)
  {
    $this->loader = $loader;
  }

  /**
   * @return \Symfony\Component\ClassLoader\UniversalClassLoader
   */
  public function getLoader()
  {
    return $this->loader;
  }
}
