<?php

class Admin_GrupoController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
    	$grupo = new Admin_Model_Grupo();

    	$dados = $grupo->find();

    	$this->view->assign('grupo', $dados);
    }

    public function viewAction()
    {
        $grupo = new Admin_Model_Grupo();

        $id = $this->_request->getParam('id');
        $dados = $grupo->find($id);
        $this->view->assign('grupo', $dados);
    }

    public function dropAction()
    {
        // action body
    }


}





