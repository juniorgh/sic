<?php

class Admin_UsuarioController extends Zend_Controller_Action {

    public function init() {
        /* Initialize action controller here */
    }

    /*
     * Envia os dados da tabela USUARIO para view index, para listagem dos usuarios
     */

    public function indexAction() {
        try {
            $usuario = new Admin_Model_Usuario();
            $dadosUsuario = $usuario->findUsuarioCurso();
            $this->view->assign('usuario', $dadosUsuario);
        } catch (Exception $exc) {
            echo $exc->getMessage();
        }
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
        $this->_helper->layout->disableLayout();
        $grupo = new Admin_Model_Grupo();

        $periodo = array(
            1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20
        );

        $id = $this->_request->getParam('id');

        $usuario = new Admin_Model_Usuario();
        $usuarioGrupo = new Admin_Model_UsuarioGrupo();
        
        $usuarioGrupoAll = $usuarioGrupo->findUsuarioGrupoId($id);
        
        $ids = array();

        foreach ($usuarioGrupoAll as $id) {
            $ids[] = $id['usuarioGrupoGrupoId'];
        }

        $dadosGrupo = $grupo->find();

        $curso = new Admin_Model_Curso();
        $dadosCursoAll = $curso->find();

        if (!is_null($id)) {
            try {
                $dadosUsuario = $usuario->find($id);
                $usuarioGrupoFiltrados = $usuarioGrupo->find();

                $this->view->assign('usuario', $dadosUsuario);
                $this->view->assign('usuarioGrupoFiltrado', $usuarioGrupoFiltrados);
                $this->view->assign('id', $id);
            } catch (Exception $exc) {
                echo $exc->getMessage();
            }
        }
        $this->view->assign('cursoAll', $dadosCursoAll);
        $this->view->assign('usuarioGrupoAll', $ids);
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
        try {
            $integrantes = array();
            $usuario = new Admin_Model_Usuario();
            $usuarioGrupo = new Admin_Model_UsuarioGrupo();
            $request = $this->getRequest();

            if ($request->isPost()) {
                $params = $request->getPost();
                
                echo '<pre>';
                print_r($params);
                echo '</pre>';
                exit;
                $integrantes = array();
                
                if ($params['integrantes']) {
                    $integrantes = $params['integrantes'];
                }
                
                $adm = null;
                
                if(!empty($params['adm'])){
                    $adm = $params['adm'];
                    unset($params['adm']);
                }
                
                unset($params['grupos']);

                if (array_key_exists('usuarioSenha', $params) && strlen($params['usuarioSenha']) > 0) {
                    $params['usuarioSenha'] = Admin_Model_Usuario::md5($params['usuarioSenha']);
                }

                if (!array_key_exists('usuarioId', $params)) {
                    unset($params['integrantes']);
                    
                    $params['usuarioId'] = $usuario->save($params);
                }

                $dados = $usuario->find($params['usuarioId']);

                $upload = new Zend_File_Transfer();
                if ($upload->isUploaded('usuarioFotoCaminho')) {
                    $files = $upload->getFileInfo('usuarioFotoCaminho');
                    $ext = pathinfo($files['usuarioFotoCaminho']['name'])['extension'];
                    $fotoNome = time() . '.' . $ext;
                    $upload->addFilter('Rename', APPLICATION_PATH . '/../public/imagens/' . $fotoNome);
                    $upload->receive('usuarioFotoCaminho');
                    $params['usuarioFotoCaminho'] = $fotoNome;
                    
                    @unlink(APPLICATION_PATH . '/../public/imagens/' . $dados['usuarioFotoCaminho']);

                    $params['usuarioFotoCaminho'] = $fotoNome;
                }

                $usuario->update($params);

                $usuarioGrupo->dropUsuarios($dados['usuarioId']);
                
                foreach ($integrantes as $ids) {
                    $usuarioGrupo->save(array(
                        'usuarioGrupoUsuarioId' => $dados['usuarioId'],
                        'usuarioGrupoGrupoId' => $ids
                    ));
                }
            }
            $this->_redirect('admin/usuario/index');
        } catch (Exception $exc) {
            echo $exc->getMessage();
        }
    }
}