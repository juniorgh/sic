<?php

class Admin_Model_Grupo {

    public function find($id = null, $pager = false, array $where = null, array $order = null) {
        $grupo = new Admin_Model_DbTable_Grupo();
        if (!is_null($id)) {
            return $grupo->find($id)->current()->toArray();
        } else {
            $query = $grupo->select();
            if (!is_null($where)) {
                foreach ($where as $cond) {
                    $query->where($cond);
                }
            }

            if (!is_null($order)) {
                $query->order($order);
            } else {
                $query->order('grupoNome');
            }

            if ($pager == false) {
                return $grupo->fetchAll($query)->toArray();
            } else {
                return $query;
            }
        }
    }

    public function drop($id) {
        $grupo = new Admin_Model_DbTable_Grupo();
        $where = $grupo->getAdapter()->quoteInto("grupoId = ?", $id);
        $grupo->delete($where);
    }

    public function save($data = array()) {
        $grupo = new Admin_Model_DbTable_Grupo();
        return $grupo->insert($data);
    }

    public static function update(array $data) {
        $grupo = new Admin_Model_DbTable_Grupo();
        $where = $grupo->getAdapter()->quoteInto('grupoId = ?', $data['grupoId']);
        unset($data['grupoId']);
        return $grupo->update($data, $where);
    }
}
