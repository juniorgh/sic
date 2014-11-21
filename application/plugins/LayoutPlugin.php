<?php

/**
 * Plugin de gerenciamento do layout da aplicação.
 * 
 * @package Plugins
 * @category Controller Plugin
 * @author Gilson G. Junior <jr_juk@hotmail.com>
 */
class Application_Plugin_LayoutPlugin extends Zend_Controller_Plugin_Abstract {

    /**
     * Método invocado antes que uma Action seja executada e despachada.
     * Este método permite verificar o comportamento de filtros. Alterando
     * a requisição e redefinindo seus parâmetros a Action atual pode ser
     * ignorada e/ou substituída
     * 
     * @param type Zend_Controller_Request_Abstract $request 
     * @return void
     */
    public function preDispatch(Zend_Controller_Request_Abstract $request) {
        $layout = Zend_Layout::getMvcInstance();

        $view = $layout->getView();
        $view->doctype('HTML5');
        $view->headMeta()->setCharset('utf-8')
                ->appendHttpEquiv('X-UA-Compatible', 'IE=edge,chrome=1')
                ->appendHttpEquiv('viewport', 'width=device-width, initial-scale=1.0');

        // Escolhendo em qual layout a página irá renderizar a view

        if ($request->getModuleName() == 'admin') {
            $layout->setLayout('admin');
            if (!is_null(Zend_Auth::getInstance()->getIdentity())) {
                $usuario = Zend_Auth::getInstance()->getIdentity();

                $id = $usuario->usuarioId;

                $grupoMenu = new Admin_Model_Grupomenu();
                $menu = new Admin_Model_Menu();

                $dados = $grupoMenu->findMenusDinamicos($id);
                $dadosMenu = $menu->find();

                $ids = null;

                foreach ($dados as $d) {
                    $ids[] = $d['menuId'];
                }
                
                $view->assign('ids', $ids);
                $view->assign('menus', $dadosMenu);
            }
        }
    }
}
