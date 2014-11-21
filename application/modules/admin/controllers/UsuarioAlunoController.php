<?php

class Admin_UsuarioAlunoController extends Zend_Controller_Action {

    protected $_flashMessenger = null;

    public function init() {
        $this->_flashMessenger = $this->_helper->getHelper('FlashMessenger');
        $this->initView();
    }

    public function indexAction() {
        $usuario = Zend_Auth::getInstance()->getIdentity();
        $this->view->assign('usuario', $usuario);

        $this->view->messages = $this->_flashMessenger->getMessages();
        $this->render();
    }

    public function saveAction() {
        $status = true;
        $usuario = new Admin_Model_Usuario();

        $request = $this->getRequest();

        if ($request->isPost()) {
            $params = $request->getPost();

            if ($params['usuarioSenha'] !== $params['confirmaSenha'] || !empty($params['usuarioSenha']) && empty($params['confirmaSenha'])) {
                $this->_flashMessenger->addMessage('Senhas invalidas');
                $this->_redirect('admin/usuarioAluno/index');
            } else {
                unset($params['confirmaSenha']);

                if (empty($params['usuarioLogin'])) {
                    unset($params['usuarioLogin']);
                }
                if (empty($params['usuarioSenha'])) {
                    unset($params['usuarioSenha']);
                } else {
                    $md5 = $usuario->md5($params['usuarioSenha']);    
                    $params['usuarioSenha'] = $md5;
                }
                
                $status = $usuario->update($params);
                
                if($status == true){
                    $this->_flashMessenger->addMessage('Seus dados foram alterados com sucesso');
                    $this->_redirect('admin/usuarioAluno/index');
                } else {
                    $this->_flashMessenger->addMessage('Seus dados foram alterados com sucesso');
                    $this->_redirect('admin/usuarioAluno/index');
                }
            }
        }
    }
}
