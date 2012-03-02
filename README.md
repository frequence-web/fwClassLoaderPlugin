fwClassLoaderPlugin
===================

Add ability to Use PHP5.3 inside a sf1.4 project

Usage
-----

### Install the plugin

#### Via symfony plugin manager

    ./symfony plugin:install fwClassLoader

#### Via git

    git submodule add https://github.com/frequence-web/fwClassLoaderPlugin.git plugins/fwClassLoaderPlugin

or

    git clone https://github.com/frequence-web/fwClassLoaderPlugin.git plugins/fwClassLoaderPlugin

Add the plugin to your ProjectConfiguration

    # config/PluginConfiguration.class.php
    <?php

    class ProjectConfiguration extends sfProjectConfiguration
    {
      public function setup()
      {
        ....
        $this->enablePlugins('fwClassLoaderPlugin');
      }
    }

### Install the Symfony2 ClassLoader component (only for the git install)

You must put the component into  sf_lib_dir/vendor/symfony2/src

    git submodule add https://github.com/symfony/ClassLoader lib/vendor/symfony2/src/ClassLoader

or

    git clone https://github.com/symfony/ClassLoader lib/vendor/symfony2/src/ClassLoader

### Configuration

This plugin is configured with a fw_class_loader.yml file. The file looks like this :

    all:
      namespaces:
        Imagine: /path/to/imagine/namespace

      namespace_fallbacks:
        - /path/to/your/namespace/fallback

      prefixes:
        Twig_: /path/to/your/twig/prefix

      prefix_fallbacks:
        - /path/to/your/prefix/fallbacks



