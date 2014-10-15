<?php

class Admin_CursoController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
    	$curso = new Admin_Model_Curso();
    	$dados = $curso->find();

    	$this->view->assign('curso',$dados); 
    }

    public function dropAction()
    {
        $curso = new Admin_Model_Curso();
        $id = $this->_request->getParam('id');
        $curso->drop($id);
    }

    public function viewAction()
    {
        $curso = new Admin_Model_Curso();
        $id = $this->_request->getParam('id');
        $dados = $curso->find($id);

        $this->view->assign('curso',$dados); 
    }


}





