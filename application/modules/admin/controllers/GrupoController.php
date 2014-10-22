<?php

class Admin_GrupoController extends Zend_Controller_Action {

  public function init() {
    /* Initialize action controller here */
  }

  public function indexAction() {
    $grupo = new Admin_Model_Grupo();

    $dados = $grupo->find();

    $this->view->assign('grupo', $dados);
  }

  public function viewAction() {
    
    $usuarioGrupo = new Admin_Model_UsuarioGrupo();
    $id = $this->_request->getParam('id');
    
    echo '<pre>';
    print_r($usuarioGrupo->findJoinGrupo($id));
    echo '</pre>';
    
//    $dados = $grupo->find($id);
//    $ids = $usuarioGrupo->find();
//    
//    $this->view->assign('grupo', $dados);
//    $this->view->assign('usuarioGrupo', $ids);
  }

  public function dropAction() {
    $grupo = new Admin_Model_Grupo();
    $id = $this->_request->getParam('id');
    $grupo->drop($id);

    $this->_redirect('admin/grupo/');
  }

  public function formAction() {
    $id = $this->_request->getParam('id');
    $grupo = new Admin_Model_Grupo();

    if (!is_null($id)) {
      $dados = $grupo->find($id);
      $this->view->assign('grupo', $dados);
    }
  }

  public function saveAction() {
    try {
      $request = $this->getRequest();
      if ($request->isPost()) {
        $params = $request->getPost();

        $grupo = new Admin_Model_Grupo();

        if (!array_key_exists('grupoId', $params)) {
          $grupo->save($params);
        } else {
          $grupo->update($params);
        }
        $this->_redirect('admin/grupo/index');
      }
    } catch (Exception $exc) {
      echo $exc->getMessage();
    }
  }

}
