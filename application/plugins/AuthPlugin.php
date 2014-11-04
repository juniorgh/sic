<?php

class Application_Plugin_AuthPlugin extends Zend_Controller_Plugin_Abstract {

    public function preDispatch(Zend_Controller_Request_Abstract $request) {
        if (!Zend_Auth::getInstance()->hasIdentity() && $request->getControllerName() != "auth" && $request->getModuleName() == 'admin' && Zend_Auth::getInstance()->usuarioStatus == 0) {
            $redirector = new Zend_Controller_Action_Helper_Redirector;
            $redirector->gotoUrl('admin/auth/index')->redirectAndExit();
        } else {
            $urlAtual = $_SERVER['SERVER_NAME'] . $_SERVER ['REQUEST_URI'];
            $id = Zend_Auth::getInstance()->hasIdentity();

            $rota = new Admin_Model_Grupomenu();
            $dados = $rota->findMenusDinamicos($id);

            foreach ($dados as $d) {
                $acessos[] = $_SERVER['SERVER_NAME'] . '/sic/public/' . $request->getModuleName() . '/' . $d['menuController'];
            }
            
            if (!empty(Zend_Auth::getInstance()->getIdentity()) && $request->getActionName() != "logout" && $request->getControllerName() != "index" && $request->getModuleName() == 'admin') {
                if (!in_array($urlAtual, $acessos)) {
                    $redirector = new Zend_Controller_Action_Helper_Redirector;
                    $redirector->gotoUrl('admin/')->redirectAndExit();
                }
            }
        }
    }
    
}
?>