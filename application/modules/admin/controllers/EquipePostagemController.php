<?php

class Admin_EquipePostagemController extends Zend_Controller_Action {

    protected $_flashMessenger = null;

    public function init() {
        $this->_flashMessenger = $this->_helper->getHelper('FlashMessenger');
        $this->initView();
    }

    public function indexAction() {
        $equipeUsuario = new Admin_Model_UsuarioEquipe();
        $usuario = Zend_Auth::getInstance()->getIdentity();

        $equipes = $equipeUsuario->findEquipeUsuario($usuario->usuarioId);

        $this->view->assign('equipes', $equipes);
        $this->view->messages = $this->_flashMessenger->getMessages();
        $this->render();
    }

    public function formAction() {
        $id = $this->_request->getParam('id');
        $idPost = $this->_request->getParam('idPost');
        $this->view->assign('id', $id);

        if ($idPost) {
            $equipePostagem = new Admin_Model_EquipePostagem();
            $dadosEquipePostagem = $equipePostagem->findEquipeId($idPost);

            $this->view->assign('EquipePostagem', $dadosEquipePostagem);
            $this->view->assign('idPost', $idPost);
        }
    }

    public function saveAction() {
        try {
            $equipePostagem = new Admin_Model_EquipePostagem();
            $request = $this->getRequest();
            if ($request->isPost()) {
                $params = $request->getPost();

                if (!array_key_exists('equipePostagemId', $params)) {
                    $status = $equipePostagem->save($params);

                    if ($status == true) {
                        $this->_flashMessenger->addMessage('Projeto cadastrado com sucesso!!!');
                    }
                } else {
                    $status = $equipePostagem->update($params);
                    if ($status == true) {
                        $this->_flashMessenger->addMessage('Projeto atualizado com sucesso!!!');
                    }
                }
                $this->_redirect('admin/equipePostagem/');
            }
        } catch (Exception $exc) {
            echo $exc->getMessage();
        }
    }

    public function listarProjetoAction() {
        $id = $this->_request->getParam('id');
        $equipePostagem = new Admin_Model_EquipePostagem();
        $dadosEquipePostagem = $equipePostagem->listaEquipeProjeto($id);
        $this->view->assign('projetos', $dadosEquipePostagem);
    }

    public function uploadAction() {
        $idPost = $this->_request->getParam('idPost');

        $equipeUpload = new Admin_Model_EquipeUpload();
        $eqUploadDados = $equipeUpload->findEquipeUploadEquipePostagemId($idPost);
        
        if ($eqUploadDados != null) {
            $this->view->assign('equipeUploadDados', $eqUploadDados);
        }

        $this->view->assign('idPost', $idPost);
    }

    public function saveUploadAction() {
        try {
            
            $request = $this->getRequest();
            if ($request->isPost()) {
                $params = $request->getPost();
                $upload = new Zend_File_Transfer();
                $equipeUpload = new Admin_Model_EquipeUpload();
                
                if ($upload->isUploaded('equipeUploadCaminho')) {
                    $files = $upload->getFileInfo('equipeUploadCaminho');

                    $ext = pathinfo($files['equipeUploadCaminho']['name'])['extension'];
                    $fotoNome = '1' . time() . '.' . $ext;
                    $upload->addFilter('Rename', APPLICATION_PATH . '/../public/imagens/' . $fotoNome);
                    $upload->receive('equipeUploadCaminho');
                    $params['equipeUploadCaminho'] = $fotoNome;

                    @unlink(APPLICATION_PATH . '/../public/imagens/' . $dados['equipeUploadCaminho']);

                    $params['equipeUploadCaminho'] = $fotoNome;
                }

                if ($upload->isUploaded('equipeUploadCaminho2')) {
                    $files2 = $upload->getFileInfo('equipeUploadCaminho2');

                    $ext2 = pathinfo($files2['equipeUploadCaminho2']['name'])['extension'];
                    $fotoNome2 = time() . '2' . '.' . $ext2;
                    $upload->addFilter('Rename', APPLICATION_PATH . '/../public/imagens/' . $fotoNome2);
                    $upload->receive('equipeUploadCaminho2');
                    $params['equipeUploadCaminho2'] = $fotoNome2;
                    @unlink(APPLICATION_PATH . '/../public/imagens/' . $dados['equipeUploadCaminho2']);
                    $params['equipeUploadCaminho2'] = $fotoNome2;
                }

                if ($upload->isUploaded('equipeUploadCaminho3')) {
                    $files3 = $upload->getFileInfo('equipeUploadCaminho3');
                    $ext3 = pathinfo($files3['equipeUploadCaminho3']['name'])['extension'];
                    $fotoNome3 = time() . '3' . '.' . $ext3;
                    $upload->addFilter('Rename', APPLICATION_PATH . '/../public/imagens/' . $fotoNome3);
                    $upload->receive('equipeUploadCaminho3');
                    $params['equipeUploadCaminho3'] = $fotoNome3;
                    @unlink(APPLICATION_PATH . '/../public/imagens/' . $dados['equipeUploadCaminho3']);
                    $params['equipeUploadCaminho3'] = $fotoNome3;
                }
                
                $img1 = array(
                    'equipeUploadEquipePostagemId' => $params['equipeUploadEquipePostagemId'],
                    'equipeUploadCaminho' => $fotoNome
                );

                $img2 = array(
                    'equipeUploadEquipePostagemId' => $params['equipeUploadEquipePostagemId'],
                    'equipeUploadCaminho' => $fotoNome2
                );
                $img3 = array(
                    'equipeUploadEquipePostagemId' => $params['equipeUploadEquipePostagemId'],
                    'equipeUploadCaminho' => $fotoNome3
                );
                
                $equipeUpload->save($img1);
                $equipeUpload->save($img2);
                $equipeUpload->save($img3);
            }
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }
}
        