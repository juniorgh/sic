<?php

class Admin_UsuarioController extends Zend_Controller_Action {

    protected $_flashMessenger = null;

    public function init() {
        $this->_flashMessenger = $this->_helper->getHelper('FlashMessenger');
        $this->initView();
    }

    /*
     * Envia os dados da tabela USUARIO para view index, para listagem dos usuarios
     */

    public function indexAction() {
        try {
            $usuario = new Admin_Model_Usuario();
            $dadosUsuario = $usuario->findUsuarioCurso();
            $this->view->assign('usuario', $dadosUsuario);
            $this->view->messages = $this->_flashMessenger->getMessages();
            $this->render();
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


        try {
            $status = $usuario->drop($id);
        } catch (Exception $exc) {
            echo $exc->getMessage();
        }
        
        if ($status == true) {
            unlink(APPLICATION_PATH . '/../public/imagens/' . $dados['usuarioFotoCaminho']);
            $this->_flashMessenger->addMessage('Usuário excluido com sucesso!!!');
        } else {
            $this->_flashMessenger->addMessage('Usuário está participando de atividades, ou faz parte de algum grupo, não pode ser removido');
        }
        $this->_redirect('admin/usuario/');
    }

    /*
     * Monta formulário da tabela USUÁRIOS, para edição e exclusão
     */

    public function formAction() {
        $this->_helper->layout->disableLayout();
        $grupo = new Admin_Model_Grupo();

        $periodo = array(
            1, 2, 3, 4, 5, 6, 7, 8, 9, 10
        );

        $id = $this->_request->getParam('id');

        $usuario = new Admin_Model_Usuario();
        $usuarioGrupo = new Admin_Model_UsuarioGrupo();

        $usuarioGrupoAll = $usuarioGrupo->findUsuarioGrupoId($id);

        $ids = array();

        foreach ($usuarioGrupoAll as $idt) {
            $ids[] = $idt['usuarioGrupoGrupoId'];
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
            /*
             * Montando as variáveis
             */
            $integrantes = array();
            $usuario = new Admin_Model_Usuario();
            $usuarioGrupo = new Admin_Model_UsuarioGrupo();
            $request = $this->getRequest();
            
            // verifica se há dados vindo por methodo POST
            if ($request->isPost()) {
                $params = $request->getPost();
                $integrantes = array();
                
                /*
                 * destroi os ids dos usuários de dentro do array, e salva em outra variável para atualização da tabela USUÁRIO
                 */
                if (!empty($params['integrantes'])) {
                    $integrantes = $params['integrantes'];
                    unset($params['integrantes']);
                }

                $adm = null;
                
                /*
                 * Destroi senha do administrador de dentro do array vindo do formulário, e à salva em outra variável
                 */
                
                $adm = $params['adm'];
                unset($params['adm']);

//                unset($params['grupos']);

                if (array_key_exists('usuarioSenha', $params) && strlen($params['usuarioSenha']) > 0) {
                    $params['usuarioSenha'] = Admin_Model_Usuario::md5($params['usuarioSenha']);
                }

                if (!array_key_exists('usuarioId', $params)) {

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
