<?php

class Admin_Model_Curso
{
	public function find($id = null, $pager = false, array $where = null, array $order = null) {
    $curso = new Admin_Model_DbTable_Curso();
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
        $query->order('cursoNome');
      }

      if ($pager == false) {
        return $curso->fetchAll($query)->toArray();
      } else {
        return $query;
      }
    }
  } 

  public function drop($id){
    $curso = new Admin_Model_DbTable_Curso();
    $where = $curso->getAdapter()->quoteInto("cursoId = ?", $id);
    $curso->delete($where);
  }
  
  public function save($data = array()){
     $curso = new Admin_Model_DbTable_Curso();
     return $curso->insert($data);
  }
  
  public static function update(array $data) {
        $curso = new Admin_Model_DbTable_Curso();
        $where = $curso->getAdapter()->quoteInto('cursoId = ?', $data['cursoId']);
        unset($data['cursoId']);
        return $curso->update($data, $where);
    }
}



