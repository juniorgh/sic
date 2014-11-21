<?php

class Default_ProjetoController extends Zend_Controller_Action {

    public function init() {
        /* Initialize action controller here */
    }

    public function indexAction() {
        $equipePostagem = new Admin_Model_EquipePostagem();
        
        $dados = $equipePostagem->find();
        
        $this->view->assign('postagens', $dados);
        
        
    }
}
