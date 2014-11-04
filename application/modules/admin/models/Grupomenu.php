<?php

class Admin_Model_Grupomenu {
    
    /*
     * Método Select da tabela grupoMenu
     */
    
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
    
    /*
     * Método Inner Join da tabela grupoMenu, unindo a tabela GrupoMenu, Grupo e Menu,
     * Filtrando pelo id do grupo, trazendo todos os menus que um determinado grupo pode ver
     */
    
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
    
    /*
     * Método Inner Join da tabela grupoMenu, carrega dinamicamente os menus que um determinado grupo pode ver, 
     * caso o usuário esteja em mais de um grupo, ele também consegue trazer.
     */
    
    public function findMenusDinamicos($id) {
        $grupoMenu = new Admin_Model_DbTable_Grupomenu();
        $query = $grupoMenu->select()->setIntegrityCheck(false)
                                     ->from(array('ug' => 'usuariogrupo'),'*')
                                     ->join(array('gm' => 'grupomenu'), 'gm.grupoMenuGrupoId = ug.usuarioGrupoGrupoId')
                                     ->join(array('m' => 'menu'), 'm.menuId = gm.grupoMenuMenuId')
                                     ->where('ug.usuarioGrupoUsuarioId = ?', $id);
        return $grupoMenu->fetchAll($query);
    }
    
    /*
     * Método Insert da tabela grupoMenu
     */
    
    /*
     * Remove o usuario de um determinado grupo
     */
    
    public function drop($id) {
        $grupoMenu = new Admin_Model_DbTable_Grupomenu();
        $where = $grupoMenu->getAdapter()->quoteInto("grupoMenuGrupoId = ?", $id);
        $grupoMenu->delete($where);
    }
    
    
    /*
     * Salva informações do grupo e do usuario na tabela Grupo Usuário
     */
    public function save($data = array()) {
        $grupoMenu = new Admin_Model_DbTable_Grupomenu();
        return $grupoMenu->insert($data);
    }

}
