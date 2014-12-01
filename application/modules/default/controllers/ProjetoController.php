<?php

class Default_ProjetoController extends Zend_Controller_Action
{
    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        $equipePostagem = new Admin_Model_EquipePostagem();
        
        $dados = $equipePostagem->find();
        
        $this->view->assign('postagens', $dados);
    }

    public function postAction()
    {
        $this->_helper->layout->disableLayout();
        
        $id = $this->_request->getParam('id');
        
        $equipeUpload = new Admin_Model_EquipeUpload();
        
        $equipePostagem = new Admin_Model_EquipePostagem();
        
        $imagens = $equipeUpload->findEquipeUploadEquipePostagemId($id);
        $posts = $equipePostagem->find($id);
        
        $this->view->assign('imagens',$imagens);
        $this->view->assign('posts',$posts);
    }


}


