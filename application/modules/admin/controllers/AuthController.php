<?php

class Admin_AuthController extends Zend_Controller_Action {

  public function init() {
    if (!Zend_Auth::getInstance()->hasIdentity()) {
      $this->_redirect('auth/');
    }
  }

  public function indexAction() {
    $this->_helper->layout->disableLayout();
  }

  public function loginAction() {
    try {
      $this->_helper->viewRenderer->setNoRender(true);
      $dbAdapter = Zend_Db_Table_Abstract::getDefaultAdapter();
      $authAdapter = new Zend_Auth_Adapter_DbTable($dbAdapter);
      $authAdapter->setTableName('usuario')
         ->setIdentityColumn('usuarioLogin')
         ->setCredentialColumn('usuarioSenha');
      
      $authAdapter->setIdentity($this->_getParam('usuarioLogin'))
         ->setCredential($this->_getParam('usuarioSenha'))
         ->setCredentialTreatment('MD5(?)');
      $result = $authAdapter->authenticate();
      
      if($result->isValid()){
         $usuario = $authAdapter->getResultRowObject();
         $storage = Zend_Auth::getInstance()->getStorage();
         $storage->write($usuario);
         $this->_redirect('admin/');
      }else{
         $this->_redirect('admin/auth');
      }
    } catch (Exception $exc) {
      $this->_redirect('admin/auth');
    }
  }
}
