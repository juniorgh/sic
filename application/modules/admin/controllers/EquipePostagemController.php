<?php

class Admin_EquipePostagemController extends Zend_Controller_Action {

    protected $_flashMessenger = null;

    public function init() {
        $this->_flashMessenger = $this->_helper->getHelper('FlashMessenger');
        $this->initView();
    }

    public function indexAction() {
        $equipeUsuario = new Admin_Model_UsuarioEquipe();

        $usuario = Zend_Auth::getInstance()->getIdentity();

        $equipes = $equipeUsuario->findEquipeUsuario($usuario->usuarioId);

        $this->view->assign('equipes', $equipes);
        $this->view->messages = $this->_flashMessenger->getMessages();
        $this->render();
    }

    public function formAction() {
        $id = $this->_request->getParam('id');
        $idPost = $this->_request->getParam('idPost');
        $this->view->assign('id', $id);
        
        if($idPost){
            $equipePostagem = new Admin_Model_EquipePostagem();
            
            $dadosEquipePostagem = $equipePostagem->findEquipeId($idPost);
            
            $this->view->assign('EquipePostagem',$dadosEquipePostagem);
            $this->view->assign('idPost',$idPost);
        }
    }

    public function saveAction() {

        $equipePostagem = new Admin_Model_EquipePostagem();

        $request = $this->getRequest();
        if ($request->isPost()) {
            $params = $request->getPost();

            if (!array_key_exists('equipePostagemId', $params)) {
                $status = $equipePostagem->save($params);

                if ($status == true) {
                    $this->_flashMessenger->addMessage('Projeto cadastrado com sucesso!!!');
                }
            } else {
                $status = $equipePostagem->update($params);
                if ($status == true) {
                    $this->_flashMessenger->addMessage('Projeto atualizado com sucesso!!!');
                }
            }
            $this->_redirect('admin/equipeUpload/');
        }
    }

    public function listarProjetoAction() {
        $id = $this->_request->getParam('id');
        
        $equipePostagem = new Admin_Model_EquipePostagem();
        $dadosEquipePostagem = $equipePostagem->listaEquipeProjeto($id);
        $this->view->assign('projetos',$dadosEquipePostagem);
    }

}
