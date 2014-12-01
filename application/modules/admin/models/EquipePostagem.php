<?php

class Admin_Model_EquipePostagem
{
    public function find($id = null, $pager = false, array $where = null, array $order = null) {
       $equipePostagem = new Admin_Model_DbTable_EquipePostagem();
       if (!is_null($id)) {
           return $equipePostagem->find($id)->current()->toArray();
       } else {
           $query = $equipePostagem->select();
           if (!is_null($where)) {
               foreach ($where as $cond) {
                   $query->where($cond);
               }
           }

           if (!is_null($order)) {
               $query->order($order);
           } else {
               $query->order('equipePostagemId');
           }

           if ($pager == false) {
               return $equipePostagem->fetchAll($query)->toArray();
           } else {
               return $query;
           }
       }
    }
    
    public static function update(array $data) {
        $equipePostagem = new Admin_Model_DbTable_EquipePostagem();
        $where = $equipePostagem->getAdapter()->quoteInto('equipePostagemId = ?', $data['equipePostagemId']);
        unset($data['equipePostagemId']);
        return $equipePostagem->update($data, $where);
    }
    
    public function save($data = array()) {
        $equipePostagem = new Admin_Model_DbTable_EquipePostagem();
        return $equipePostagem->insert($data);
    }
    
    public function findEquipeId($id){
        $equipePostagem = new Admin_Model_DbTable_EquipePostagem();
        
        $query = $equipePostagem->select()->where("equipePostagemId = ?", $id);
        return $equipePostagem->fetchAll($query)->current()->toArray();
    }
    
    public function listaEquipeProjeto($id) {
        $equipePostagem = new Admin_Model_DbTable_EquipePostagem();
        $query = $equipePostagem->select()
                ->setIntegrityCheck(false)
                ->from(array('ep' => 'equipePostagem'))
                ->join(array('e' => 'equipe'), 'e.equipeId = ep.equipePostagemEquipeId')
                ->where('e.equipeId = ?', $id);

        return $equipePostagem->fetchAll($query);
    }
    
    
    public function listaEquipeImagens() {
        $equipePostagem = new Admin_Model_DbTable_EquipePostagem();
        $query = $equipePostagem->select()
                ->setIntegrityCheck(false)
                ->from(array('ep' => 'equipePostagem'),'eu.equipeUploadCaminho')
                ->join(array('eu' => 'equipeUpload'), 'ep.equipePostagemId = eu.equipeUploadEquipePostagemId');

        return $equipePostagem->fetchAll($query);
    }
    
}

    