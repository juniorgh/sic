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
    
    $dados = $usuario->find($id); 
    
    unlink(APPLICATION_PATH . '/../public/imagens/' . $dados['usuarioFotoCaminho']);
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

        $this->view->assign('usuario', $dadosUsuario);
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
    $request = $this->getRequest();
    if ($request->isPost()) {
      $usuario = new Admin_Model_Usuario();
      
      $params = $request->getPost();
      $senhaMd5 = md5($request->getPost('usuarioSenha'));
      
      unset($params['usuarioSenha']);
      
      $upload = new Zend_File_Transfer();
      $files = $upload->getFileInfo('usuarioFotoCaminho');
      $ext = pathinfo($files['usuarioFotoCaminho']['name'])['extension'];
      $fotoNome = time() . '.' . $ext;
      $upload->addFilter('Rename', APPLICATION_PATH . '/../public/imagens/' . $fotoNome);
      $upload->receive('usuarioFotoCaminho');

      $params['usuarioFotoCaminho'] = $fotoNome;
      $params['usuarioSenha'] = $senhaMd5;
      
      
      if (!array_key_exists('usuarioId', $params)) {
        $usuario->save($params);
      } else {

        $dados = $usuario->find($params['usuarioId']);

        unlink(APPLICATION_PATH . '/../public/imagens/' . $dados['usuarioFotoCaminho']);

        $usuario->update($params);
      }
    }
    $this->_redirect('admin/usuario/index');
  }
}
