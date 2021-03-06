<?php

class Admin_Model_Equipe {
    /*
     * Método Select da tabela Equipe
     */
    public function find($id = null, $pager = false, array $where = null, array $order = null) {
        $curso = new Admin_Model_DbTable_Equipe();
        if (!is_null($id)) {
            return $curso->find($id)->current()->toArray();
        } else {
            $query = $curso->select();
            if (!is_null($where)) {
                foreach ($where as $cond) {
                    $query->where($cond);
                }
            }

            if (!is_null($order)) {
                $query->order($order);
            } else {
                $query->order('equipeNome');
            }

            if ($pager == false) {
                return $curso->fetchAll($query)->toArray();
            } else {
                return $query;
            }
        }
    }
    
    /*
     * Método Delete da tabela Equipe
     */
    public function drop($id) {
        $curso = new Admin_Model_DbTable_Equipe();
        $where = $curso->getAdapter()->quoteInto("equipeId = ?", $id);
        return $curso->delete($where);
    }
    
    /*
     * Método Insert da tabela Equipe
     */
    
    public function save($data = array()) {
        $curso = new Admin_Model_DbTable_Equipe();
        return $curso->insert($data);
    }
    
    /*
     * Método Update da tabela Equipe
     */
    
    public static function update(array $data) {
        $curso = new Admin_Model_DbTable_Equipe();
        $where = $curso->getAdapter()->quoteInto('equipeId = ?', $data['equipeId']);
        unset($data['equipeId']);
        return $curso->update($data, $where);
    }
}
