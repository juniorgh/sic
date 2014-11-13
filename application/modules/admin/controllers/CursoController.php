<?php

class Admin_CursoController extends Zend_Controller_Action {  
    
  protected $_flashMessenger = null;   
    
  public function init() {
      $this->_flashMessenger =
      $this->_helper->getHelper('FlashMessenger');
      $this->initView();
  }
  
  /*
   * Manda todos os dados da tabela CURSO, para a view index, para listagem dos cursos
   */
  public function indexAction() { 
      
    $curso = new Admin_Model_Curso();
    $dados = $curso->find();

    $this->view->assign('curso', $dados);
    $this->view->messages = $this->_flashMessenger->getMessages();
    $this->render();
  }

  /*
   * Exclusão de curso
   */
  
  public function dropAction() {
      try {
          $curso = new Admin_Model_Curso();
          $id = $this->_request->getParam('id');
          $status = $curso->drop($id);
          
          if($status == true){
            $this->_flashMessenger->addMessage('Curso excluido com sucesso!!!');
          }
            
          $this->_redirect('admin/curso/');
          
      } catch (Exception $exc) {
          $this->_flashMessenger->addMessage('Erro!!!!!!');
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
        $this->_flashMessenger->addMessage('Curso salvo com sucesso!!!');
      } else {
        $dados = $curso->find($params['cursoId']);
        
        unlink(APPLICATION_PATH . '/../public/imagens/' . $dados['cursoBanner']);
        
        $status = $curso->update($params);
       
        if($status == true){
            $this->_flashMessenger->addMessage('Curso atualizado com sucesso!!!');
        }
      }
      $this->_redirect('admin/curso/');
    }
  }
}
