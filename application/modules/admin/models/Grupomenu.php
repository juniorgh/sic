<?php

class Admin_Model_Grupomenu {

    public function find($id = null, $pager = false, array $where = null, array $order = null) {
        $grupoMenu = new Admin_Model_DbTable_Grupomenu();
        if (!is_null($id)) {
            return $grupoMenu->find($id)->current()->toArray();
        } else {
            $query = $grupoMenu->select();
            if (!is_null($where)) {
                foreach ($where as $cond) {
                    $query->where($cond);
                }
            }

            if (!is_null($order)) {
                $query->order($order);
            } else {
                $query->order('grupomenuGrupoNome');
            }

            if ($pager == false) {
                return $grupoMenu->fetchAll($query)->toArray();
            } else {
                return $query;
            }
        }
    }

    public function findGrupoMenu($id) {
        $grupoMenu = new Admin_Model_DbTable_Grupomenu();
        $query = $grupoMenu->select()
                ->setIntegrityCheck(false)
                ->from(array('gm' => 'grupomenu'))
                ->join(array('g' => 'grupo'), 'g.grupoId = gm.grupoMenuGrupoId')
                ->join(array('m' => 'menu'), 'm.menuId = gm.grupoMenuMenuId')
                ->where('g.grupoId = ?', $id);
        
        return $grupoMenu->fetchAll($query);
    }
    
    public function drop($id) {
        $grupoMenu = new Admin_Model_DbTable_Grupomenu();
        $where = $grupoMenu->getAdapter()->quoteInto("grupoMenuGrupoId = ?", $id);
        $grupoMenu->delete($where);
    }
    
    public function save($data = array()) {
    $grupoMenu = new Admin_Model_DbTable_Grupomenu();
    return $grupoMenu->insert($data);
  }

}
