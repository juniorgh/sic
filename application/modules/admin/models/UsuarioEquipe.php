<?php

class Admin_Model_UsuarioEquipe {

    public function find($id = null, $pager = false, array $where = null, array $order = null) {
        $usuarioEquipe = new Admin_Model_DbTable_UsuarioEquipe();
        if (!is_null($id)) {
            return $usuarioEquipe->fetchAll($usuarioEquipe->select())->toArray();
        } else {
            $query = $usuarioEquipe->select();
            if (!is_null($where)) {
                foreach ($where as $cond) {
                    $query->where($cond);
                }
            }

            if (!is_null($order)) {
                $query->order($order);
            } else {
                $query->order('usuarioEQuipeUsuarioId');
            }

            if ($pager == false) {
                return $usuarioEquipe->fetchAll($query)->toArray();
            } else {
                return $query;
            }
        }
    }

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

    public function save($data = array()) {
        $equipe = new Admin_Model_DbTable_UsuarioEquipe();
        return $equipe->insert($data);
    }

    public function drop($id) {
        $curso = new Admin_Model_DbTable_UsuarioEquipe();
        $where = $curso->getAdapter()->quoteInto("usuarioEquipeEquipeId= ?", $id);
        $curso->delete($where);
    }

}
