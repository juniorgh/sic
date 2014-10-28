<?php

class Default_CursoController extends Zend_Controller_Action
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


}

