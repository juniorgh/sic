<?php

class Default_IndexController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        $equipePostagem = new Admin_Model_EquipePostagem();
        $dados = $equipePostagem->find();
        
        $img = $equipePostagem->listaEquipeImagens($id);
        
        $this->view->assign('postagens', $dados);
        $this->view->assign('caminhos', $img);
        
    }

    public function formAction()
    {
    }


}



