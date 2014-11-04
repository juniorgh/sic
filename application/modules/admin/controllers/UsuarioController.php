<?php

class Admin_UsuarioController extends Zend_Controller_Action {

    public function init() {
        /* Initialize action controller here */
    }
    
    /*
     * Envia os dados da tabela USUARIO para view index, para listagem dos usuarios
     */
    
    public function indexAction() {
        $usuario = new Admin_Model_Usuario();
        $dados = $usuario->find();

        $this->view->assign('usuario', $dados);
    }
    
    /*
     * Deleta um usuario da tabela USUARIO
     */
    
    public function dropAction() {
        $usuario = new Admin_Model_Usuario();
        $id = $this->_request->getParam('id');

        $dados = $usuario->find($id);

        unlink(APPLICATION_PATH . '/../public/imagens/' . $dados['usuarioFotoCaminho']);
        $usuario->drop($id);
        $this->_redirect('admin/usuario/');
    }

    
    /*
     * Monta formulário da tabela USUÁRIOS, para edição e exclusão
     */
    
    public function formAction() {
        
        $grupo = new Admin_Model_Grupo();
        
        $periodo = array(
            1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20
        );

        $id = $this->_request->getParam('id');

        $usuario = new Admin_Model_Usuario();
        $usuarioGrupo = new Admin_Model_UsuarioGrupo();
        $usuarioGrupoAll = $usuarioGrupo->find();
        $dadosGrupo = $grupo->find();

        $curso = new Admin_Model_Curso();
        $dadosCursoAll = $curso->find();

        if (!is_null($id)) {    
            try {
                $dadosUsuario = $usuario->find($id);
                $usuarioGrupoFiltrados = $usuarioGrupo->findUsuarioGrupoUsuarioIds($id);

                $this->view->assign('usuario', $dadosUsuario);
                $this->view->assign('usuarioGrupoFiltrado', $usuarioGrupoFiltrados);
                $this->view->assign('id', $id);
                
            } catch (Exception $exc) {
                echo $exc->getMessage();
            }
        }
        $this->view->assign('cursoAll', $dadosCursoAll);
        $this->view->assign('usuarioGrupoAll', $usuarioGrupoAll);
        $this->view->assign('periodo', $periodo);
        $this->view->assign('grupos', $dadosGrupo); 
        
    }
    
    /*
     * visualizar informações sobre cada usuário
     */
    
    public function viewAction() {
        $usuario = new Admin_Model_Usuario();
        $dados = $usuario->find($id = $this->_request->getParam('id'));
        $this->view->assign('usuario', $dados);
    }
    
    /*
     * salvar e editar os usuários
     */
    
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
    