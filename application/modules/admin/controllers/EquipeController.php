<?php

class Admin_EquipeController extends Zend_Controller_Action {

    public function init() {
        /* Initialize action controller here */
    }

    public function indexAction() {
        $usuario = new Admin_Model_Usuario();

        $equipe = new Admin_Model_Equipe();
        $usuarioDados = $usuario->find();

        $dados = $equipe->find();

        $this->view->assign('equipe', $dados);
        $this->view->assign('usuario', $usuarioDados);
    }
    
    public function formAction() {
        $usuario = new Admin_Model_Usuario();
        $equipe = new Admin_Model_Equipe();
        $id = $this->_request->getParam('id', null);
        $usuarioEquipe = new Admin_Model_UsuarioEquipe();
        if (!is_null($id)) {
            try {
                $idUsuarioEquipe = $usuarioEquipe->findEquipeUsuario($id);
                $equipeFiltro = $equipe->find($id);
                
                $this->view->assign('id', $id);
                $this->view->assign('usuarioEquipes', $idUsuarioEquipe);
                $this->view->assign('equipeFiltro', $equipeFiltro);
            } catch (Exception $exc) {
                echo $exc->getMessage();
            }
        }

        $usuarioDados = $usuario->find();

        $dados = $equipe->find();

        $this->view->assign('equipe', $dados);
        $this->view->assign('usuario', $usuarioDados);
    }

    public function saveAction() {
        try {
            $equipe = new Admin_Model_Equipe();
            $request = $this->getRequest();
            $params = $request->getPost();
            $usuarioEquipe = new Admin_Model_UsuarioEquipe();
            
            $integrantes = $params['integrantes'];
            
            if (array_key_exists('equipeId', $params)) {
                $id = $params['id'];
                unset($params['id']);
                unset($params['integrantes']);
                $params['equipeId'] = $id;
                $equipe->update($params);
            } else {
                unset($params['integrantes']);
                $params['usuarioEquipeEquipeId'] = $equipe->save($params);
            }

            unset($params['equipeNome']);
            foreach ($integrantes as $integrarEquipe) {
                unset($params['equipeId']);
                $params['usuarioEquipeEquipeId'];
                $params['usuarioEquipeUsuarioId'] = $integrarEquipe;

                $usuarioEquipe->save($params);
            }
            echo '<pre>';
            print_r($params);
            echo '</pre>';
            
            $this->_redirect('admin/equipe');
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function dropAction() {
        $usuarioEquipe = new Admin_Model_UsuarioEquipe();
        $equipe = new Admin_Model_Equipe();

        $id = $this->_request->getParam('id');
        $usuarioEquipe->drop($id);
        $equipe->drop($id);
        $this->_redirect('admin/equipe/');
    }

}
