<?php

class Admin_EquipeUploadController extends Zend_Controller_Action {

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
    }

    public function formAction() {
        $id = $this->_request->getParam('id');

        $this->view->assign('id', $id);
    }

    public function saveAction() {
        try {
            $imgUploads = array();
            $equipePostagem = new Admin_Model_EquipePostagem();
            $equipeUpload = new Admin_Model_EquipeUpload();

            $ext1 = null;
            $ext2 = null;
            $ext3 = null;

            $request = $this->getRequest();
            if ($request->isPost()) {
                $params = $request->getPost();

                $statusSave = $equipePostagem->save($params);

                $id = $params['equipePostagemEquipeId'];
                $upload = new Zend_File_Transfer();

                $file1 = $upload->getFileInfo('imagem1');

                if (!empty($file1['imagem1']['name'])) {
                    $ext1 = pathinfo($file1['imagem1']['name'])['extension'];
                    $fotoNome1 = time() . '.' . $ext1;

                    $upload->addFilter('Rename', APPLICATION_PATH . '/../public/imagens/' . $fotoNome1);
                    $upload->receive('imagem1');

                    $imgUploads[] = $fotoNome1;
                }

                $file2 = $upload->getFileInfo('imagem2');
                if (!empty($file2['imagem2']['name'])) {
                    $ext2 = pathinfo($file2['imagem2']['name'])['extension'];
                    $fotoNome2 = '2' . time() . '.' . $ext2;

                    $upload->addFilter('Rename', APPLICATION_PATH . '/../public/imagens/' . $fotoNome2);
                    $upload->receive('imagem2');

                    $imgUploads[] = $fotoNome2;
                }

                $file3 = $upload->getFileInfo('imagem3');
                if (!empty($file3['imagem3']['name'])) {
                    $ext3 = pathinfo($file3['imagem3']['name'])['extension'];
                    $fotoNome3 = '3' . time() . '.' . $ext3;

                    $upload->addFilter('Rename', APPLICATION_PATH . '/../public/imagens/' . $fotoNome3);
                    $upload->receive('imagem3');

                    $imgUploads[] = $fotoNome3;
                }
                foreach ($imgUploads as $value) {
                    $equipUloadInset['equipeUploadCaminho'] = $value;
                    $equipUloadInset['equipeUploadEquipeId'] = $id;

                    echo '<pre>';
                    print_r($equipUloadInset);
                    echo '</pre>';


                    if ($statusSave) {
                        $equipeUpload->save($equipUloadInset);
                    }
                }
            }
        } catch (Exception $exc) {
            echo $exc->getMessage();
        }
    }

}
