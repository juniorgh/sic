<?php

class Admin_EquipeController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        $usuario = new Admin_Model_Usuario();
        
        $equipe = new Admin_Model_Equipe();
        $usuarioDados = $usuario->find();
        
        $dados = $equipe->find();
        
        $this->view->assign('equipe', $dados);
        $this->view->assign('usuario',$usuarioDados);
        
    }

    public function formAction()
    {
        $usuario = new Admin_Model_Usuario();
        $equipe = new Admin_Model_Equipe();
        $id = $this->_request->getParam('id', null);
        $usuarioEquipe = new Admin_Model_UsuarioEquipe();
        
        if(!is_null($id)){
          try {
              $idUsuarioEquipe = $usuarioEquipe->findEquipeUsuario($id);
               $this->view->assign('id', $id);
              $this->view->assign('usuarioEquipes',$idUsuarioEquipe);
          } catch (Exception $exc) {
              echo $exc->getMessage();
          }
              }
        
        $usuarioDados = $usuario->find();
        
        $dados = $equipe->find();
        
        $this->view->assign('equipe', $dados);
        $this->view->assign('usuario',$usuarioDados);
    }


}



