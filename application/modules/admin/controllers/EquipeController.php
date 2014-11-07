<?php

class Admin_EquipeController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        $usuario = new Admin_Model_Usuario();

        $equipe = new Admin_Model_Equipe();
        $usuarioDados = $usuario->find();

        $dados = $equipe->find();

        $this->view->assign('equipe', $dados);
        $this->view->assign('usuario', $usuarioDados);
    }

    public function formAction()
    {
        $usuario = new Admin_Model_Usuario();
        $equipe = new Admin_Model_Equipe();
        $integrantesEquipe = new Admin_Model_UsuarioEquipe();

        $id = $this->_request->getParam('id');

        $equipeAll = $equipe->find();
        $usuarioAll = $usuario->find();


        if (!is_null($id)) {
            $equipeFiltro = $equipe->find($id);
            $integrantesEquipeFiltro = $integrantesEquipe->find($id);

            $this->view->assign('equipeFiltro', $equipeFiltro);
            $this->view->assign('integrantesEquipeFiltro', $integrantesEquipeFiltro);
            $this->view->assign('id', $id);
        }

        $this->view->assign('usuarioAll', $usuarioAll);
        $this->view->assign('equipeAll', $equipeAll);
    }

    public function saveAction()
    {
        try {
            $equipe = new Admin_Model_Equipe();
            $usuarioEquipe = new Admin_Model_UsuarioEquipe();
            
            $request = $this->getRequest();
            $params = $request->getPost();

            $id = $params['equipeId'];

            $integrantes = $params['integrantes'];

            if (array_key_exists('equipeId', $params)) {
                unset($params['integrantes']);

                $equipe->update($params);
                
                $usuarioEquipe->drop($id);
                
                unset($params['equipeId']);
                unset($params['equipeNome']);

                $params['usuarioEquipeEquipeId'] = $id;
            } else {
                $integrantes = $params['integrantes'];
                unset($params['integrantes']);
                $params['usuarioEquipeEquipeId'] = $equipe->save($params);
            }

            if($params['equipeNome']){
                unset($params['equipeNome']);
            }

            foreach ($integrantes as $integrarEquipe) {
                $params['usuarioEquipeEquipeId'];
                $params['usuarioEquipeUsuarioId'] = $integrarEquipe;

                $usuarioEquipe->save($params);
            }
            $this->_redirect('admin/equipe');
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function dropAction()
    {
        $usuarioEquipe = new Admin_Model_UsuarioEquipe();
        $equipe = new Admin_Model_Equipe();

        $id = $this->_request->getParam('id');
        $usuarioEquipe->drop($id);
        $equipe->drop($id);
        $this->_redirect('admin/equipe/');
    }

    public function viewAction()
    {
        // action body
    }


}


