<?php

class Admin_Model_Usuario {

    public function find($id = null, $pager = false, array $where = null, array $order = null) {
        $usuario = new Admin_Model_DbTable_Usuario();
        if (!is_null($id)) {
            return $usuario->find($id)->current()->toArray();
        } else {
            $query = $usuario->select();
            if (!is_null($where)) {
                foreach ($where as $cond) {
                    $query->where($cond);
                }
            }

            if (!is_null($order)) {
                $query->order($order);
            } else {
                $query->order('usuarioNome');
            }

            if ($pager == false) {

                return $usuario->fetchAll($query)->toArray();
            } else {
                return $query;
            }
        }
    }

    public function drop($id) {

        $usuario = new Admin_Model_DbTable_Usuario();
        $where = $usuario->getAdapter()->quoteInto("usuarioId = ?", $id);
        $usuario->delete($where);
    }

    public function save($data = array()) {
        $usuario = new Admin_Model_DbTable_Usuario();
        return $usuario->insert($data);
    }

    public static function update(array $data) {
        $usuario = new Admin_Model_DbTable_Usuario();

        $where = $usuario->getAdapter()->quoteInto('usuarioId = ?', $data['usuarioId']);
        unset($data['usuarioId']);
        return $usuario->update($data, $where);
    }

    public static function md5($senha) {
        $usuario = new Admin_Model_DbTable_Usuario();
        return new Zend_Db_Expr($usuario->getAdapter()->quoteInto('MD5(?)', $senha));
    }

}
