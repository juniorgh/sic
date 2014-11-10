<?php

class Admin_Model_EquipeUpload
{
     public function find($id = null, $pager = false, array $where = null, array $order = null) {
        $equipeUpload = new Admin_Model_DbTable_EquipeUpload();
        if (!is_null($id)) {
            return $equipeUpload->find($id)->current()->toArray();
        } else {
            $query = $equipeUpload->select();
            if (!is_null($where)) {
                foreach ($where as $cond) {
                    $query->where($cond);
                }
            }

            if (!is_null($order)) {
                $query->order($order);
            } else {
                $query->order('equipeUploadEquipeId');
            }

            if ($pager == false) {
                return $equipeUpload->fetchAll($query)->toArray();
            } else {
                return $query;
            }
        }
    }
    
    public function save($data = array()) {
        $equipeUpload = new Admin_Model_DbTable_EquipeUpload();
        return $equipeUpload->insert($data);
    }
}

