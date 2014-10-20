<?php

class Admin_CursoController extends Zend_Controller_Action {

  public function init() {
    /* Initialize action controller here */
  }

  public function indexAction() {
    $curso = new Admin_Model_Curso();
    $dados = $curso->find();

    $this->view->assign('curso', $dados);
  }

  public function dropAction() {
    $curso = new Admin_Model_Curso();
    $id = $this->_request->getParam('id');
    $curso->drop($id);
  }

  public function viewAction() {
    $curso = new Admin_Model_Curso();
    $id = $this->_request->getParam('id');
    $dados = $curso->find($id);
    $this->view->assign('curso', $dados);
  }

  public function formAction() {
    $id = $this->_request->getParam('id');

    if (!is_null($id)) {
      $curso = new Admin_Model_Curso();
      $dados = $curso->find($id);

      $this->view->assign('curso', $dados);
    }
  }

  public function saveAction() {
    $request = $this->getRequest();
    if ($request->isPost()) {
      $params = $request->getPost();

      if (!array_key_exists('cursoId', $params)) {

        $curso = new Admin_Model_Curso();
        $upload = new Zend_File_Transfer();
        $files = $upload->getFileInfo('cursoBanner');
        $ext = pathinfo($files['cursoBanner']['name'])['extension'];
        $fotoNome = time() . '.' . $ext;

        $upload->addFilter('Rename', APPLICATION_PATH . '/../public/imagens/' . $fotoNome);
        $upload->receive('cursoBanner');

        $params['cursoBanner'] = $fotoNome;

        $curso->save($params);
      } else {
        $curso = new Admin_Model_Curso();
        $upload = new Zend_File_Transfer();
        $files = $upload->getFileInfo('cursoBanner');
        $ext = pathinfo($files['cursoBanner']['name'])['extension'];
        $fotoNome = time() . '.' . $ext;

        $upload->addFilter('Rename', APPLICATION_PATH . '/../public/imagens/' . $fotoNome);
        $upload->receive('cursoBanner');
        
        $params['cursoBanner'] = $fotoNome;
        
        $curso->update($params);
      } 
      $this->_redirect('admin/curso/');
    }
  }
}
