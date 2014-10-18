<?php

class Admin_MenuController extends Zend_Controller_Action {

  protected $_redirector    = null;
  protected $indexRoute     = null;

  public function init() {
    $this->indexRoute  = array('module' => 'admin', 'controller' => 'menu', 'action' => 'index');
    $this->_redirector = $this->_helper->getHelper('Redirector');
    $this->initView();
  }

  public function indexAction() {
    try {
      $menus = Admin_Model_Menu::find(null, null, null, array('menuOrdem ASC'));
      $this->view->assign('menus', $menus);
    } catch (Exception $e) {
      echo $e->getMessage();
      exit;
    }
  }

  public function formAction() {
    $id             = $this->_request->getParam('id', null);
    $formActionName = "Cadastrar";
    $menu           = array();
    $menus          = array();

    if ($id !== null) {
      $formActionName = "Alterar";
      $menu = Admin_Model_Menu::find($id);
      $menus = Admin_Model_Menu::find(null, null, null, array('menuOrdem ASC'));
    }

    $this->view->assign('menu', $menu);
    $this->view->assign('menus', $menus);
    $this->view->assign('formActionName', $formActionName);
  }

  public function saveAction() {
    try {
      $data = $this->_request->getParam('menu');

      if (!array_key_exists('menuId', $data)) {
        Admin_Model_Menu::insert($data);
      } else {
        Admin_Model_Menu::update($data);
      }

      return $this->_redirector->gotoRoute($this->indexRoute, null, true);
    } catch (Exception $e) {
      echo $e->getMessage();
      exit;
    }
  }

  public function dropAction() {
    try {
      $id = $this->_request->getParam('id');
      Admin_Model_Menu::drop($id);

      return $this->_redirector->gotoRoute($this->indexRoute, null, true);
    } catch (Exception $e) {
      echo $e->getMessage();
      exit;
    }
  }

  public function viewAction() {
    try {
      $id = $this->_request->getParam('id');
      $menu = Admin_Model_Menu::find($id);

      $this->view->assign('menu', $menu);
    } catch (Exception $e) {
      echo $e->getMessage();
      exit;
    }
  }


}

