<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{
  /**
   * Instancia e registra os plugins utilizados pela aplicação
   * 
   * @return void
   */
  protected function _initPlugins() {
  	$front = Zend_Controller_Front::getInstance();
  	$front->registerPlugin(new Application_Plugin_LayoutPlugin());
  }

  /** 
   * Define os parâmetros padrões de localização.
   * 
   * @return Zend_Locale
   */
  public function _initLocale() {
    Zend_Locale::setDefault('pt_BR');
  }

  /**
   * Realiza o autoload de Namespaces da aplicação
   * 
   * @return Zend_Application_Module_Autoloader
   */
  protected function _initAutoload() {
    $autoloader = new Zend_Application_Module_Autoloader(array(
      'basePath' => APPLICATION_PATH . '/modules/default/',
      'namespace' => 'Default'
      ));

    $autoloader = new Zend_Application_Module_Autoloader(array(
      'basePath' => APPLICATION_PATH . '/modules/admin/',
      'namespace' => 'Admin'
      ));
  }

}

