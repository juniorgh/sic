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

  public function findJoinGrupo($id) {
    $usuarioGrupo = new Admin_Model_DbTable_UsuarioGrupo();
    $dados = $usuarioGrupo->select()
        ->from(array('u' => 'usuario'),
            array('usuarioId'))
        ->join(array('ug' => 'usuarioGrupo'), 
            'u.usuarioId = ug.usuarioGrupoUsuarioId')
        ->where(array('ug.usuarioGrupoGrupoId = ?' => $id));

        return $usuarioGrupo->fetchAll($dados);
  }

}
