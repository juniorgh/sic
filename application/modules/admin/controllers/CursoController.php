<?php

class Admin_CursoController extends Zend_Controller_Action {  
    
  public function init() {
  }
  
  /*
   * Manda todos os dados da tabela CURSO, para a view index, para listagem dos cursos
   */
  public function indexAction() {
    $curso = new Admin_Model_Curso();
    $dados = $curso->find();

    $this->view->assign('curso', $dados);
  }

  /*
   * Exclusão de curso
   */
  
  public function dropAction() {
      try {
          $curso = new Admin_Model_Curso();
          $id = $this->_request->getParam('id');
          $curso->drop($id);

          $this->_redirect('admin/curso/');
      } catch (Exception $exc) {
          echo "<div class='alert alert-primary'> Não foi possível excluir esse curso, Existem usuarios que fazem parte desse curso, </div>";
      }
    }

  /*
   * Visualiza informações do curso
   */
  
  public function viewAction() {
    $curso = new Admin_Model_Curso();
    $id = $this->_request->getParam('id');
    $dados = $curso->find($id);
    $this->view->assign('curso', $dados);
  }
  
  /*
   * Exclusão de curso
   */
  
  public function formAction() {
    $id = $this->_request->getParam('id');

    if (!is_null($id)) {
      $curso = new Admin_Model_Curso();
      $dados = $curso->find($id);

      $this->view->assign('curso', $dados);
    }
  }
  
  /*
   * Insere um novo curso no banco de dados
   */
  
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
