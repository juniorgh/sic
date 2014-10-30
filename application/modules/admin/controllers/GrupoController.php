<?php

class Admin_GrupoController extends Zend_Controller_Action {

    public function init() {
        /* Initialize action controller here */
    }

    public function indexAction() {
        $grupo = new Admin_Model_Grupo();
        $dados = $grupo->find();
        $this->view->assign('grupo', $dados);
    }

    public function viewAction() {
        $grupo = new Admin_Model_Grupo();
        $id = $this->_request->getParam('id');
        $dados = $grupo->find($id);
        
        
        
        
    }

    public function dropAction() {
        $grupo = new Admin_Model_Grupo();
        $id = $this->_request->getParam('id');
        $grupo->drop($id);

        $this->_redirect('admin/grupo/');
    }

    public function formAction() {

        $grupo = new Admin_Model_Grupo();
        $grupoMenu = new Admin_Model_Grupomenu();
        $menu = new Admin_Model_Menu();
        
        $id = $this->_request->getParam('id');
        $dadosMenu = $menu->find();
        if (!is_null($id)) {
            
            $menuGrupo = $grupoMenu->findGrupoMenu($id);
            $dados = $grupo->find($id);
            
            $this->view->assign('grupo', $dados);
            $this->view->assign('menuGrupo',$menuGrupo);    
        }
        
        $this->view->assign('menu', $dadosMenu);
    }

    public function saveAction() {
        try {
            $request = $this->getRequest();
            if ($request->isPost()) {
                $params = $request->getPost();
                
                $idsGrupoMenu = $request->getPost('grupoMenu');
                unset($params['grupoMenu']);
                
                $grupo = new Admin_Model_Grupo();
                $grupoMenu = new Admin_Model_Grupomenu();
                
                if (!array_key_exists('grupoId', $params)) {
                    $params['grupoId'] = $grupo->save($params);
                } else {    
                        $grupo->update($params);
                }
                
                $grupoMenu->drop($params['grupoId']);   
                
                foreach ($idsGrupoMenu as $menu_id) {
                    $tmp = array(
                        'grupoMenuGrupoId' => $params['grupoId'],
                            'grupoMenuMenuId' => $menu_id
                    );
                    $grupoMenu->save($tmp);
                }
                $this->_redirect('admin/grupo/index');
            }
        } catch (Exception $exc) {
            echo $exc->getMessage();
        }
    }

}
