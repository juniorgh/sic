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

        $comentar = new Admin_Model_Comentar();

        $comentarios = $comentar->comentarEquipePostagemId($id);

        $equipeUpload = new Admin_Model_EquipeUpload();

        $equipePostagem = new Admin_Model_EquipePostagem();

        $imagens = $equipeUpload->findEquipeUploadEquipePostagemId($id);
        $posts = $equipePostagem->find($id);

        $this->view->assign('imagens',$imagens);
        $this->view->assign('posts',$posts);
        $this->view->assign('comentario',$comentarios);
    }

    public function savePostAction()
    {

        $request = $this->getRequest();
        if ($request->isPost()) {
            $params = $request->getPost();

            $comentar = new Admin_Model_Comentar();
            
            $comentar->save($params);

            $postId = (String) $params['comentarEquipePostagemId'];

            $this->_redirect('projeto/post/id/' . $postId);
        }

    }
}




