<?php

class Admin_IndexController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
      $usuario = Zend_Auth::getInstance()->getIdentity();
     
      $this->view->assign('usuarioMenu',$usuario);
      
    }


}

