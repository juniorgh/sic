<?php

class Admin_Model_UsuarioGrupo {

    public function find($id = null, $pager = false, array $where = null, array $order = null) {
        $usuarioGrupo = new Admin_Model_DbTable_UsuarioGrupo();
        if (!is_null($id)) {
            return $usuarioGrupo->find($id)->current()->toArray();
        } else {
            $query = $usuarioGrupo->select();
            if (!is_null($where)) {
                foreach ($where as $cond) {
                    $query->where($cond);
                }
            }

            if (!is_null($order)) {
                $query->order($order);
            } else {
                $query->order('usuarioGrupoId');
            }

            if ($pager == false) {
                return $usuarioGrupo->fetchAll($query)->toArray();
            } else {
                return $query;
            }
        }
    }

    public function findUsuarioGrupo($id = null) {
        $usuarioGrupo = new Admin_Model_DbTable_UsuarioGrupo();
        if(!is_null($id)){
            $query = $usuarioGrupo->select()
                ->setIntegrityCheck(false)
                ->from(array('u' => 'usuario'))
                ->join(array('ug' => 'usuariogrupo'), 'u.usuarioId = ug.usuarioGrupoUsuarioId')
                ->join(array('g' => 'grupo'), 'g.grupoId = ug.usuarioGrupoGrupoId')
                ->where('g.grupoId = ?', $id);

        } else {
            $query = $usuarioGrupo->select()
                ->setIntegrityCheck(false)
                ->from(array('u' => 'usuario'))
                ->join(array('ug' => 'usuariogrupo'), 'u.usuarioId = ug.usuarioGrupoUsuarioId')
                ->join(array('g' => 'grupo'), 'g.grupoId = ug.usuarioGrupoGrupoId');
        }
        return $usuarioGrupo->fetchAll($query);

    }

    public function findUsuarioGrupoUsuarioIds($id) {
        $usuarioGrupo = new Admin_Model_DbTable_UsuarioGrupo();
        $query = $usuarioGrupo->select()
                ->setIntegrityCheck(false)
                ->from(array('u' => 'usuario'))
                ->join(array('ug' => 'usuarioGrupo'), 'u.usuarioId = ug.usuarioGrupoUsuarioId')
                ->where('u.usuarioId = ?', $id);

        return $usuarioGrupo->fetchAll($query);
    }

    public static function drop($id) {
        $usuarioGrupo = new Admin_Model_DbTable_UsuarioGrupo();
        $where = $usuarioGrupo->getAdapter()->quoteInto("usuarioGrupoGrupoId = ?", $id);
        $usuarioGrupo->delete($where);
    }
    public function save($data = array()) {
        $equipe = new Admin_Model_DbTable_Equipe();
        return $equipe->insert($data);
    }
}
