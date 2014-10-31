<?php

class Admin_CursoController extends Zend_Controller_Action {

  protected $_flashMessenger = null;  
    
  public function init() {
      $this->_flashMessenger =
      $this->_helper->getHelper('FlashMessenger');
      $this->initView();
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

      $curso = new Admin_Model_Curso();
      $upload = new Zend_File_Transfer();
      $files = $upload->getFileInfo('cursoBanner');
      $ext = pathinfo($files['cursoBanner']['name'])['extension'];
      $fotoNome = time() . '.' . $ext;

      $upload->addFilter('Rename', APPLICATION_PATH . '/../public/imagens/' . $fotoNome);
      $upload->receive('cursoBanner');

      $params['cursoBanner'] = $fotoNome;

      if (!array_key_exists('cursoId', $params)) {
        $curso->save($params);
      } else {
        $dados = $curso->find($params['cursoId']);
        
        unlink(APPLICATION_PATH . '/../public/imagens/' . $dados['cursoBanner']);
        
        if($curso->update($params)){
            $this->_flashMessenger->addMessage('Record Saved!');
        }
      }
      $this->_redirect('admin/curso/');
    }
  }
}
