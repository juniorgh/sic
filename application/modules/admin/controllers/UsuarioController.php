<?php

class Admin_UsuarioController extends Zend_Controller_Action {

  public function init() {
    /* Initialize action controller here */
  }

  public function indexAction() {
    $usuario = new Admin_Model_Usuario();
    $dados = $usuario->find();

    $this->view->assign('usuario', $dados);
  }

  public function dropAction() {
    $usuario = new Admin_Model_Usuario();
    $id = $this->_request->getParam('id');
    $usuario->drop($id);
    $this->_redirect('admin/usuario/');
  }

  public function formAction() {
    $id = $this->_request->getParam('id');
    
    $usuario = new Admin_Model_Usuario();
    $curso = new Admin_Model_Curso();
    $dadosCursoAll = $curso->find();
    $this->view->assign('cursoAll', $dadosCursoAll);
    
    if (!is_null($id)) {
      try {
      $dadosUsuario = $usuario->find($id);
      $dadosCursoId = $curso->find($id);

      $this->view->assign('usuario', $dadosUsuario);
      $this->view->assign('curso', $dadosCursoId);
      
      } catch (Exception $exc) {
        echo $exc->getMessage();
      }
    }
  }

  public function viewAction() {
    $usuario = new Admin_Model_Usuario();
    $dados = $usuario->find($id = $this->_request->getParam('id'));
    $this->view->assign('usuario', $dados);
  }

  public function saveAction() {
    try {
      $request = $this->getRequest();
      if ($request->isPost()) {
        $params = $request->getPost();

        if (!array_key_exists('usuarioId', $params)) {
          $usuario = new Admin_Model_Usuario();
          $usuario->save($params);
        } else {
          $upload = new Zend_File_Transfer();
          $files = $upload->getFileInfo('usuarioFotoCaminho');
          $ext = pathinfo($files['usuarioFotoCaminho']['name'])['extension'];
          
          $upload->addFilter('Rename', APPLICATION_PATH.'/../public/imagens/' . time() . '.' . $ext);
          
          $upload->receive('usuarioFotoCaminho');
          $usuario = new Admin_Model_Usuario();
          $usuario->update($params);
        }
      }
//      $this->_redirect('admin/usuario/index');
    } catch (Exception $exc) {
      echo $exc->getMessage();
    }
  }
}
