<?php

class Application_Plugin_AuthPlugin extends Zend_Controller_Plugin_Abstract {

    public function preDispatch(Zend_Controller_Request_Abstract $request) {
        
        $redirector = new Zend_Controller_Action_Helper_Redirector;
        
        if (!Zend_Auth::getInstance()->hasIdentity() && $request->getControllerName() != "auth" && $request->getModuleName() === 'admin') {
            $redirector->gotoUrl('admin/auth/index')->redirectAndExit();
        } else {
            $acessos = array();
            $urlAtual = $_SERVER['SERVER_NAME'] . '/' . 'sic' . '/public/'.$request->getModuleName().'/'.$request->getControllerName().'/'.$request->getActionName();
            $id = Zend_Auth::getInstance()->hasIdentity();

            $rota = new Admin_Model_Grupomenu();
            $dados = $rota->findMenusDinamicos($id);
            
            
            foreach ($dados as $d) {
                $acessos[] = $_SERVER['SERVER_NAME'] . '/sic/public/' . $request->getModuleName() . '/' . $d['menuController'] . '/' . $request->getActionName();
            }
            
            if (!empty(Zend_Auth::getInstance()->getIdentity()) && $request->getActionName() != "logout" && $request->getControllerName() != "menu" && $request->getControllerName() != "index" && $request->getModuleName() == 'admin') {
                if (!in_array($urlAtual, $acessos)) {
                    $redirector = new Zend_Controller_Action_Helper_Redirector;
                    //$redirector->gotoUrl('admin/')->redirectAndExit();
                }
            }
        }
    }
    
}
?>