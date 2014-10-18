<?php

class Application_Plugin_AuthPlugin extends Zend_Controller_Plugin_Abstract {

  public function preDispatch(Zend_Controller_Request_Abstract $request) {
    if (!Zend_Auth::getInstance()->hasIdentity() && $request->getControllerName() != "auth" && $request->getModuleName() == 'admin' && Zend_Auth::getInstance()->usuarioStatus == 0) {
      $redirector = new Zend_Controller_Action_Helper_Redirector;
      $redirector->gotoUrl('admin/auth/index')->redirectAndExit();
    }
  }
}
