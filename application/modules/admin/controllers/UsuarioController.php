<?php

class Admin_UsuarioController extends Zend_Controller_Action
{

    public function init()
    {
		/* Initialize action controller here */
    }

    public function indexAction()
    {
		$usuario = new Admin_Model_Usuario();
		$dados = $usuario->find();

		$this->view->assign('usuario',$dados);   		
    }

    public function dropAction()
    {
		$usuario = new Admin_Model_Usuario();
		$id = $this->_request->getParam('id');
		$usuario->drop($id);  
		$this->_redirect('admin/usuario/'); 	
    }

    public function formAction()
    {
		$id = $this->_request->getParam('id');
	   
	    if(!is_null($id)) {
	        $usuario = new Admin_Model_Usuario();
	        $curso = new Admin_Model_Curso();

	        $dadosUsuario = $usuario->find($id);
	        $dadosCursoId = $curso->find($id);
	        $dadosCursoAll = $curso->find();

	        $this->view->assign('usuario', $dadosUsuario);
	        $this->view->assign('curso', $dadosCursoId);
	        $this->view->assign('cursoAll',$dadosCursoAll);
	    }
    }

    public function viewAction()
    {
    	$usuario = new Admin_Model_Usuario();


		$dados = $usuario->find($id = $this->_request->getParam('id'));

		$this->view->assign('usuario',$dados);	
    }


}







