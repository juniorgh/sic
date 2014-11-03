<?php

class Admin_Model_UsuarioEquipe
{
    public function findIntegrantesUsuarioEquipe($id) {
        $grupoMenu = new Admin_Model_DbTable_Grupomenu();
        $query = $grupoMenu->select()->distinct()
                                     ->setIntegrityCheck(false)
                                     ->from(array('ue' => 'usuarioEquipe'))
                                     ->join(array('u' => 'usuario'), 'ue.usuarioEquipeUsuarioId = u.usuarioId')
                                     ->join(array('e' => 'equipe'), 'e.equipeId = ue.usuarioEquipeEquipeId')
                                     ->where('e.equipeId = ?', $id);
        return $grupoMenu->fetchAll($query);
    }
    
    public function findEquipeUsuario($id) {
        $grupoMenu = new Admin_Model_DbTable_Grupomenu();
        $query = $grupoMenu->select()->distinct()
                                     ->setIntegrityCheck(false)
                                     ->from(array('ue' => 'usuarioEquipe'))
                                     ->join(array('u' => 'usuario'), 'ue.usuarioEquipeUsuarioId = u.usuarioId')
                                     ->join(array('e' => 'equipe'), 'e.equipeId = ue.usuarioEquipeEquipeId')
                                     ->where('u.usuarioId = ?', $id);
        return $grupoMenu->fetchAll($query);
    }
}

